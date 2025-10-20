<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }

    public function index() {
        $page_title = __('Category List');
        $categories = Category::latest()->paginate(15);
        $languages = $this->languages;
        return view('admin.sections.category.index',compact('categories','page_title','languages'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $basic_field_name = [
            'name'          => "required|string|max:150",
        ];

        $data['language']  = $this->contentValidate($request,$basic_field_name);

        $slugData = Str::slug($data['language']['en']['name']);

        $makeUnique = Category::where('slug',  $slugData)->first();
        if($makeUnique){
            return back()->with(['error' => [ $data['language']['en']['name'].' '.'Category Already Exists!']]);
        }

        $validated['slug']       = $slugData;
        $validated['data']       = $data;
        $validated['admin_id'] = auth()->user()->id;
        try{
            Category::create($validated);
            return back()->with(['success' => [__('Category Saved Successfully!')]]);
        }catch(Exception $e) {
            dd($e);
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $target = $request->target;
        $category = Category::where('id',$target)->first();
        $basic_field_name = [
            'name_edit'          => "required|string|max:150",
        ];
        $language_wise_data = $this->contentValidate($request,$basic_field_name,"category-update");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $data['language']  = $language_wise_data;
        $slugData = Str::slug($data['language']['en']['name']);
        $validated['slug']   = $slugData;
        $validated['data']       = $data;
        try{
            $category->fill($validated)->save();
            return back()->with(['success' => [__('Category Updated Successfully!')]]);
        }catch(Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }


    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'target' => 'required|string',
        ]);
        $validated = $validator->validate();
        $category = Category::where("id",$validated['target'])->first();
        try{
            $category->delete();
        }catch(Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }
        return back()->with(['success' => [__('Category deleted successfully!')]]);
    }



    public function statusUpdate(Request $request) {
        $validator = Validator::make($request->all(),[
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error,null,400);
        }
        $validated = $validator->safe()->all();
        $id = $validated['data_target'];
        $plan = Category::findOrFail($id);
        if(!$plan) {
            $error = ['error' => [__('Page plan not found in our system')]];
            return Response::error($error,null,404);
        }
        try{
            $plan->update([
                'status' => ($validated['status'] == true) ? false : true,
            ]);
        }catch(Exception $e) {
            $error = ['error' => [__('Something went wrong! Please try again')]];
            return Response::error($error,null,500);
        }
        $success = ['success' => [__('Category status updated successfully')]];
        return Response::success($success,null,200);
    }

       /**
     * Method for get languages form record with little modification for using only this class
     * @return array $languages
     */
    public function languages()
    {
        $languages = Language::whereNot('code', LanguageConst::NOT_REMOVABLE)->select("code", "name")->get()->toArray();
        $languages[] = [
            'name'      => LanguageConst::NOT_REMOVABLE_CODE,
            'code'      => LanguageConst::NOT_REMOVABLE,
        ];
        return $languages;
    }



    public function contentValidate($request,$basic_field_name,$modal = null) {
        $languages = $this->languages();

        $current_local = get_default_language_code();
        $validation_rules = [];
        $language_wise_data = [];
        foreach($request->all() as $input_name => $input_value) {
            foreach($languages as $language) {
                $input_name_check = explode("_",$input_name);
                $input_lang_code = array_shift($input_name_check);
                $input_name_check = implode("_",$input_name_check);
                if($input_lang_code == $language['code']) {
                    if(array_key_exists($input_name_check,$basic_field_name)) {
                        $langCode = $language['code'];
                        if($current_local == $langCode) {
                            $validation_rules[$input_name] = $basic_field_name[$input_name_check];
                        }else {
                            $validation_rules[$input_name] = str_replace("required","nullable",$basic_field_name[$input_name_check]);
                        }
                        $language_wise_data[$langCode][$input_name_check] = $input_value;
                    }
                    break;
                }
            }
        }
        if($modal == null) {
            $validated = Validator::make($request->all(),$validation_rules)->validate();
        }else {
            $validator = Validator::make($request->all(),$validation_rules);
            if($validator->fails()) {
                return back()->withErrors($validator)->withInput()->with("modal",$modal);
            }
            $validated = $validator->validate();
        }

        return $language_wise_data;
    }



}
