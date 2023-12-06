<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Vedio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){

        $sliders = Slider::paginate();

        return view('admin.slider.index',compact('sliders'));
    }


    public function create(){

        return view('admin.slider.create');
    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required'],
            'position' => ['required','in:top,center,bottom'],
            'image' => ['required', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'link' => ['nullable','url'],
            'status' => ['required','in:active,draft'],
            'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);

        $slidername = uploadSlider($request->image, 'slider_images', $request->name);

        $slider = Slider::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $slidername,
            'link' => $request->link,
            'status' => $request->status,
            'locale' => $request->locale,
            'page' => $request->page,
        ]);

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }



    public function Update(Request $request, $id){

        $request->validate([
            'name' => ['required'],
            'position' => ['required','in:top,center,bottom'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'link' => ['nullable','url'],
            'status' => ['required','in:active,draft'],
            'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->image) {

            UnlinkImage('slider_images',$slider->image,$slider);
            $slidername = uploadSlider($request->image, 'slider_images', $request->name);

            $slider->update([
                'image' => $slidername,
            ]);
        }


        $slider->update($request->except('_token','image'));

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function destroy($id){

        $slider = Slider::findOrFail($id);
        $slider->update([
            'status' => 'draft',
        ]);

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function vedio(){
        $vedios = Vedio::paginate();

        return view('admin.vedio.index',compact('vedios'));
    }


    public function createvedio(){

        return view('admin.vedio.create');
    }

    public function storevedio(Request $request){

        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'image' => ['required', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'link' => ['required','url'],
            'status' => ['required','in:active,draft'],
            'position' => ['required','in:top,center,bottom'],
            'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);
        $slidernam = null;
        if ($request->has('image')) {
            $slidername = uploadSlider($request->image, 'video_images', $request->title);
        }

        $vedio = Vedio::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $slidername,
            'link' => $request->link,
            'status' => $request->status,
            'position' => $request->position,
            'locale' => $request->locale,
            'page' => $request->page,
        ]);

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }


    public function editvedio($id){

        $video = Vedio::findOrFail($id);
        return view('admin.vedio.edit',compact('video'));
    }



    public function updatevedio(Request $request, $id){
        $video = Vedio::findOrFail($id);
        $request->validate([
            'title' => ['required'],
            'sub_title' => ['required'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'],
            'link' => ['required','url'],
            'status' => ['required','in:active,draft'],
            'position' => ['required','in:top,center,bottom'],
            'locale' => ['required','in:en,ar'],
            'page' => ['required','in:home,product,category'],
        ]);

        if ($request->image) {
            UnlinkImage('video_images',$video->image,$video);
            $slidername = uploadSlider($request->image, 'video_images', $request->name);

            $video->update([
                'image' => $slidername,
            ]);
        }


        $video->update($request->except('_token','image'));
        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function deletevedio($id){
        $slider = Vedio::findOrFail($id);
        $slider->update([
            'status' => 'draft',
        ]);

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }
}
