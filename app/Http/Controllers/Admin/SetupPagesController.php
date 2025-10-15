<?php

namespace App\Http\Controllers\Admin;

use App\Constants\SiteSectionConst;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\SetupPage;
use App\Models\Admin\SiteSections;
use App\Http\Controllers\Controller;
use App\Models\Admin\SetupPageHasSection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SetupPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Setup Pages";
        $setup_pages = SetupPage::get();
        return view('admin.sections.setup-pages.index',compact(
            'page_title',
            'setup_pages',
        ));
    }
    /**
     * Method for view the setup page details page
     * @return view
     */
    public function details($slug){
        $page_title         = "Setup Page Details";
        $setup_page         = SetupPage::with('sections.section')->where('slug',$slug)->first();
        if(!$setup_page) return back()->with(['error' => ['Sorry ! Page not found.']]);

        if ($setup_page && $setup_page->sections->isNotEmpty()) {
            $ordered_sections = collect();


            foreach ($setup_page->sections as $assigned) {
                if ($assigned->section) {
                    $ordered_sections->push($assigned->section);
                }
            }

            $existing_keys = $ordered_sections->pluck('key')->toArray();
            $remaining_sections = SiteSections::whereNotIn('key', $existing_keys)
                ->where('key', '!=', SiteSectionConst::SITE_COOKIE)
                ->get();

            $site_sections = $ordered_sections->merge($remaining_sections);
        } else {
            $site_sections = SiteSections::where('key', '!=', SiteSectionConst::SITE_COOKIE)->get();
        }

        return view('admin.sections.setup-pages.details',compact(
            'page_title',
            'setup_page',
            'site_sections'
        ));
    }
    /**
     * Method for store section information
     * @param Illuminate\Http\Request $request $slug
     */
    public function updateSection(Request $request,$slug){
        $setup_page = SetupPage::where('slug', $slug)->first();
        if (!$setup_page) {
            return back()->with(['error' => ['Sorry! Setup page not found.']]);
        }

        $validator = Validator::make($request->all(), [
            'sections'   => 'required|array',
            'sections.*' => 'required|string',
            'status'     => 'required|array',
            'status.*'   => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        $validated = $validator->validated();

        foreach ($validated['sections'] ?? [] as $index => $section_key) {
            $section = SiteSections::where('key', $section_key)->first();
            if (!$section) {
                continue;
            }

            $position               = $index + 1;
            $status                 = $validated['status'][$index] ?? 1;

            $existing               = SetupPageHasSection::where([
                'setup_page_id'     => $setup_page->id,
                'site_section_id'   => $section->id,
            ])->first();

            if($existing){
                $existing->update([
                    'position' => $position,
                    'status'   => $status,
                ]);
            }else{
                SetupPageHasSection::create([
                    'setup_page_id'   => $setup_page->id,
                    'site_section_id' => $section->id,
                    'position'        => $position,
                    'status'          => $status,
                ]);
            }
        }

        return back()->with(['success' => ['Sections updated successfully.']]);
    }
    /**
     * Method for status update for setup page
     * @param Illuminate\Http\Request $request
     */
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
        $page_slug = $validated['data_target'];

        $page = SetupPage::where('slug',$page_slug)->first();
        if(!$page) {
            $error = ['error' => ['Page not found!']];
            return Response::error($error,null,404);
        }

        try{
            $page->update([
                'status' => ($validated['status'] == true) ? false : true,
            ]);
        }catch(Exception $e) {
            return $e;
            $error = ['error' => ['Something went worng!. Please try again.']];
            return Response::error($error,null,500);
        }

        $success = ['success' => ['Setup Page status updated successfully!']];
        return Response::success($success,null,200);
    }
}
