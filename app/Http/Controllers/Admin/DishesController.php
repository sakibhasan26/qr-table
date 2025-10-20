<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use App\Models\Admin\Dishes;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Constants\LanguageConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class DishesController extends Controller
{
    protected $languages;

    public function __construct()
    {
        $this->languages = Language::get();
    }



    public function index() {
        $page_title = __('Dishes List');
        $dishes = Dishes::latest()->paginate(15);
        $languages = $this->languages;
        return view('admin.sections.dishes.index',compact('dishes','page_title','languages'));
    }


    public function create() {
        $page_title = __('Add New Dish');
        $languages = $this->languages;
        $categories = Category::where('status',1)->get();
        return view('admin.sections.dishes.create',compact('page_title','categories','languages'));

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
            'dish_name'      => "required|string|max:150",
            'price'          => "required|integer",
            'popular'        => "required|boolean|max:200",
            'details'        => "required|string|max:200",
            'category'       => "required|integer",
        ];

        $data['language']  = $this->contentValidate($request,$basic_field_name);

        $slugData = Str::slug($data['language']['en']['dish_name']);

        $makeUnique = Dishes::where('slug',  $slugData)->first();
        if($makeUnique){
            return back()->with(['error' => [ $data['language']['en']['dish_name'].' '.'Dish Already Exists!']]);
        }

        $validated['slug']     = $slugData;
        $validated['data']     = $data;
        $validated['price']    = $request->price;
        $validated['popular']  = $request->popular;
        $validated['qty']      = $request->qty;
        $validated['category_id'] = $request->category;
        $validated['admin_id'] = auth()->user()->id;
        $validated['status'] = 1;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/dishes'), $imageName);
            $validated['image'] = $imageName;
        }
        try{
            Dishes::create($validated);
            return redirect()->route('admin.dishes.index')->with(['success' => [__('Dish Saved Successfully!')]]);
        }catch(Exception $e) {
            dd($e);
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }
    }


    public function edit($id)
    {

        $page_title = __('Edit Dish');
        $dish = Dishes::where('id',$id)->first();
        $languages = $this->languages;
        $categories = Category::where('status',1)->get();
        return view('admin.sections.dishes.edit',compact('page_title','categories','dish','languages'));
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


        $validator = Validator::make($request->all(), [
            'image' => 'nullable|string',
            'price'      => 'required|string',
            'popular'    => 'required|string',
            'qty'        => 'required|string',
        ]);

        $dishes = Dishes::where('id',$request->target)->first();
        $basic_field_name = [
            'dish_name_edit' => "required|string|max:200",
            'details_edit'   => "required|string|max:200",
        ];
        $language_wise_data = $this->contentValidate($request,$basic_field_name,"category-update");
        if($language_wise_data instanceof RedirectResponse) return $language_wise_data;

        $language_wise_data = array_map(function($language) {
            return replace_array_key($language,"_edit");
        },$language_wise_data);

        $data['language']  = $language_wise_data;
        $slugData = Str::slug($data['language']['en']['dish_name']);
        $validated['slug']    = $slugData;
        $validated['data']    = $data;
        $validated['price']   = $request->price;
        $validated['popular'] = $request->popular;
        $validated['qty']     = $request->qty;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            if ($dishes->image) {
                $oldImagePath = public_path('backend/images/dishes/' . $dishes->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image->move(public_path('backend/images/dishes'), $imageName);
            $validated['image'] = $imageName;
        }


        try{
            $dishes->fill($validated)->save();
            return redirect()->route('admin.dishes.index')->with(['success' => [__('Category Updated Successfully!')]]);
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
    $dish = Dishes::where("id", $validated['target'])->first();
    if (!$dish) {
        return back()->with(['error' => [__('Dish not found!')]]);
    }

    try {
        if ($dish->image) {
            $imagePath = public_path('backend/images/dishes/' . $dish->image);
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        $dish->delete();
    } catch(Exception $e) {
        return back()->with(['error' => [__('Something went wrong! Please try again')]]);
    }

    return back()->with(['success' => [__('Dish deleted successfully!')]]);
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
        $plan = Dishes::findOrFail($id);
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






     public function imageValidate($request,$input_name,$old_image) {
        if($request->hasFile($input_name)) {
            $image_validated = Validator::make($request->only($input_name),[
                $input_name         => "image|mimes:png,jpg,webp,jpeg,svg",
            ])->validate();

            $image = get_files_from_fileholder($request,$input_name);
            $upload = upload_files_from_path_dynamic($image,'dishes',$old_image);
            return $upload;
        }

        return false;
    }







}
