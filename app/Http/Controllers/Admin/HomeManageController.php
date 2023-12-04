<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Us;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeManageController extends Controller
{
    public function index(){
        $contents = Content::when(request()->keyword != null,function ($query){
                                $query->search(request()->keyword);
                            })
                            ->when(\request()->status != null, function ($query) {
                                $query->whereStatus(\request()->status);
                            })
                            ->paginate(\request()->limit_by ?? 15);

        return view('admin.home.index',compact('contents'));
    }


    public function create(){

        return view('admin.home.create');
    }


    public function store(Request $request){

        //return $request;

        $request->validate([
            'title_en' => ['required'],
            'sub_title_en' => ['required'],
            'title_ar' => ['required'],
            'sub_title_ar' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'position' => ['required','in:top,center,bottom'],
            'status' => ['required','in:active,draft'],
            //'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);

        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("title_".$localeCode)] );
        }

        $translation1 = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation1  =  array_merge ($translation1, [$localeCode => $request->input("sub_title_".$localeCode)] );
        }

        $slidername = uploadSlider($request->image, 'content_images', $request->title_en);

        $content = Content::create([
            'title' => $translation,
            'sub_title' => $translation1,
            'image' => $slidername,
            'position' => $request->position,
            'status' => $request->status,
            //'locale' => $request->locale,
            'page' => $request->page,
        ]);
        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function edit($id){
        $content = Content::findOrFail($id);
        return view('admin.home.edit',compact('content'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'title_en' => ['required'],
            'sub_title_en' => ['required'],
            'title_ar' => ['required'],
            'sub_title_ar' => ['required'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'position' => ['required','in:top,center,bottom'],
            'status' => ['required','in:active,draft'],
            //'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);
        $content = Content::findOrFail($id);
        if ($request->image) {

            UnlinkImage('content_images',$content->image,$content);
            $slidername = uploadSlider($request->image, 'content_images', $request->title_en);

            $content->update([
                'image' => $slidername,
            ]);
        }


        $content->update($request->except('_token','image'));

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }



    public function destroy($id){
        $content = Content::findOrFail($id);

        $content->update([
            'status' => 'draft',
        ]);

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }
}
