<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\EmailTemplate;
use App\Http\Controllers\Controller;
use App\Constants\EmailTemplateConst;
use Illuminate\Support\Facades\Validator;

class EmailTemplateController extends Controller
{
    /**
     * Method for view email templates information page
     * @return view
     */
    public function index(){
        $page_title         = "Email Templates";
        $email_templates    = EmailTemplate::with('admin')->get();

        return view('admin.sections.email-templates.index',compact(
            'page_title',
            'email_templates'
        ));
    }
    /**
     * Method for view email template create page
     * @return view
     */
    public function create(){
        $page_title         = "Create Email Templates";

        return view('admin.sections.email-templates.create',compact(
            'page_title',
        ));
    }
    /**
     * Method for store email template information
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request){
        $validator                      = Validator::make($request->all(),[
            'type'                      => 'required|string',
            'subject'                   => 'required|string',
            'body'                      => 'required|string'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput($request->all());
        $validated                      = $validator->validate();
        $validated['slug']              = Str::slug($validated['type']);
        $validated['last_edit_by']      = auth()->user()->id;

        try{
            EmailTemplate::create($validated);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return redirect()->route('admin.email.template.index')->with(['success' => ['Email template information saved successfully.']]);
    }
    /**
     * Method for view specific email template edit page
     * @param $slug
     * @return view
     */
    public function edit($slug){
        $page_title                 = "Edit Email Template";
        $email_template             = EmailTemplate::where('slug',$slug)->first();
        if(!$email_template) return back()->with(['error' => ['Sorry! Email template not found!']]);

        return view('admin.sections.email-templates.edit',compact(
            'page_title',
            'email_template'
        ));
    }
    /**
     * Method for update specific email template information
     * @param Illuminate\Http\Request $request, $slug
     */
    public function update(Request $request,$slug){
        $email_template             = EmailTemplate::where('slug',$slug)->first();
        if(!$email_template) return back()->with(['error' => ['Sorry! Email template not found!']]);
        $validator                  = Validator::make($request->all(),[
            'subject'               => 'required|string',
            'body'                  => 'required|string'
        ]);
        if($validator->fails()) return back()->withErrors($validator)->withInput($request->all());
        $validated                  = $validator->validate();
        $validated['last_edit_by']  = auth()->user()->id;

        try{
            $email_template->update($validated);
        }catch(Exception $e){
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return redirect()->route('admin.email.template.index')->with(['success' => ['Email template information updated successfully.']]);
    }
    /**
     * Method for update email template status
     * @param Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator           = Validator::make($request->all(), [
            'status'         => 'required|boolean',
            'data_target'    => 'required|string',
        ]);
        if($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }
        $validated  = $validator->validate();
        $item_id    = $validated['data_target'];

        $email_template = EmailTemplate::find($item_id);
        if(!$email_template) {
            $error = ['error' => ['Sorry! Email template not found!']];
            return Response::error($error,null,404);
        }

        try{
            $email_template->update([
                'status' => ($validated['status'] == true) ? false : true,
            ]);
        }catch (Exception $e) {
            $error = ['error' => ['Something went wrong!. Please try again.']];
            return Response::error($error,null,500);
        }

        $success = ['success' => ['Email template status is updated successfully!']];
        return Response::success($success,200);
    }
    /**
     * Method for show email template preview
     * @param $slug
     */
    public function preview($slug){
        $page_title             = "Email Template Preview";
        $email_template         = EmailTemplate::where('slug',$slug)->first();
        if(!$email_template) return back()->with(['error' => ['Sorry ! Data not found.']]);

        $basic_settings         = BasicSettings::first();
        $defined_variable       = EmailTemplateConst::DEFINED_VALUE;

        if (isset($defined_variable['logo'])) {
            $defined_variable['logo'] = get_logo($basic_settings);
        }

        if(isset($defined_variable['site_name'])){
            $defined_variable['site_name'] = $basic_settings->site_name;
        }
        if(isset($defined_variable['current_year'])){
            $defined_variable['current_year'] = date('Y');
        }

        $email_body = $email_template->body;

        foreach ($defined_variable as $key => $value) {
            if ($key === 'logo') {
                $email_body = str_replace("{{{$key}}}", "<img src='{$value}' alt='Logo' style='max-width:150px; width:auto; height:auto;'>", $email_body);
            } else {
                $email_body = str_replace("{{{$key}}}", $value, $email_body);
            }
        }

        return view('admin.sections.email-templates.preview',compact(
            'page_title',
            'email_template',
            'email_body',
        ));
    }

}
