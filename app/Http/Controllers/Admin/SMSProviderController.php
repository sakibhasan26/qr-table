<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use App\Models\Admin\SMSProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SMSProviderController extends Controller
{
    /**
     * Method for view sms provider page
     * @return view
     */
    public function index(){
        $page_title         = "SMS Providers";
        $providers          = SMSProvider::orderBy('id','desc')->get();

        return view('admin.sections.sms-provider.index',compact(
            'page_title',
            'providers'
        ));
    }
    /**
     * Method for store sms provider information
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'provider_name'             => 'required|string',
            'provider_title'            => 'required|string',
            'title'                     => 'required|array',
            'title.*'                   => 'string|max:60',
            'name'                      => 'required|array',
            'name.*'                    => 'string|max:60',
            'value'                     => 'nullable|array',
            'value.*'                   => 'nullable|string|max:255',
            'image'                     => 'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('modal','sms-provider-add');
        }
        $validated = $validator->validate();

        $input_fields = [];
        foreach($validated['title'] as $key => $title) {
            $input_fields[] = [
                'label'         => $title,
                'placeholder'   => "Enter " . $title,
                'name'          => $validated['name'][$key],
                'value'         => $validated['value'][$key] ?? "",
            ];
        }
        $validated['config']        = $input_fields;
        $validated['admin_id']      = Auth::user()->id;
        $validated['slug']          = Str::uuid();
        $validated['status']        = false;

        if($request->hasFile('image')) {
            $image = get_files_from_fileholder($request,'image');
            $upload = upload_files_from_path_dynamic($image,'sms-provider');
            $validated['image'] = $upload;
        }

        try{
            SMSProvider::create($validated);
        }catch(Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return back()->with(['success' => ['SMS Provider added successfully!']]);
    }
    /**
     * Method for view sms provider edit page
     * @param $slug
     */
    public function edit($slug){
        $page_title         = "Edit SMS Provider";
        $provider           = SMSProvider::where('slug',$slug)->first();
        if(!$provider) return back()->with(['error' => ['Sorry ! Provider not found.']]);

        return view('admin.sections.sms-provider.edit',compact(
            'page_title',
            'provider'
        ));
    }
    /**
     * Method for update sms provider information
     * @param Illuminate\Http\Request $request,$slug
     */
    public function update(Request $request,$slug){
        $provider           = SMSProvider::where('slug',$slug)->first();
        if(!$provider) return back()->with(['error' => ['Sorry ! Provider not found.']]);

        $validator          = Validator::make($request->all(),[
            'title'                     => 'required|array',
            'title.*'                   => 'string|max:60',
            'name'                      => 'required|array',
            'name.*'                    => 'string|max:60',
            'value'                     => 'nullable|array',
            'value.*'                   => 'nullable|string|max:255',
            'provider_image'            => 'nullable|image|mimes:png,jpg,jpeg,svg,webp',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }
        $validated = $validator->validate();
        $input_fields = [];
        foreach($validated['title'] as $key => $title) {
            $input_fields[] = [
                'label'         => $title,
                'placeholder'   => "Enter " . $title,
                'name'          => $validated['name'][$key],
                'value'         => $validated['value'][$key] ?? "",
            ];
        }
        $validated['config']        = $input_fields;
        if($request->hasFile('provider_image')) {
            $image = get_files_from_fileholder($request,'provider_image');
            $upload = upload_files_from_path_dynamic($image,'sms-provider');
            $validated['image'] = $upload;
        }
        try{
            $provider->update($validated);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return redirect()->route('admin.setup.sms.provider.index')->with(['success' => ['SMS Provider data updated successfully.']]);

    }
    /**
     * update driver status
     * @param \Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }
        $validated = $validator->validate();
        $item_id = $validated['data_target'];

        $provider = SMSProvider::find($item_id);
        if (!$provider) {
            $error = ['error' => ['Provider is not found!.']];
            return Response::error($error,null,404);
        }

        try {
            SMSProvider::query()->update(['status' => false]);
            $provider->update([
                'status' => ($validated['status'] == true) ? false : true,
            ]);
        } catch (Exception $e) {
            $error = ['error' => ['Something went wrong!. Please try again.']];
            return Response::error($error,null,500);
        }

        $success = ['success' => ['SMS provider status is updated successfully!']];
        return Response::success($success,['redirect_url' => setRoute('admin.setup.sms.provider.index')],200);
    }
    /**
     * Method for send test sms
     * @param Illuminate\Http\Request $request
     */
    public function testSMSSend(Request $request){
        $validator      = Validator::make($request->all(),[
            'mobile'    => 'required'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput($request->all());

        $validated      = $validator->validate();

        $provider_info      = SMSProvider::where('provider_name',GlobalConst::TWILIO)->first();
        if(!$provider_info) return back()->with(['error' => ['Sorry ! Twilio not found.']]);

        $credentials = collect($provider_info->config)->pluck('value', 'name');

        $account_sid = $credentials['account_sid'] ?? null;
        $auth_token = $credentials['auth_token'] ?? null;
        $from_number = $credentials['from_number'] ?? null;

        $client = new Client($account_sid, $auth_token);

        $client->messages->create(
            '+' . $validated['mobile'],
            [
                'from' => $from_number,
                'body' => "Hey Jenny! Good luck on the bar exam!"
            ]
        );
        dd($client);
    }
}
