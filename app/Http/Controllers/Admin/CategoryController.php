<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::with('parent')->when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);

        return view('admin.category.index',compact('categories'));
    }



    public function create(){
        $categories = Category::active()->get();

        return view('admin.category.create',compact('categories'));
    }



    public function store(Request $request){

        //return $request ;
        $request->validate([
            'name_en' => ['required', 'string' ,'min:4', 'max:190', 'unique:categories,name'] ,
            'name_ar' => ['required', 'string' ,'min:4', 'max:190', 'unique:categories,name'] ,
            'category' => ['nullable' , 'int' , 'exists:categories,id'] ,
            'description_en' => ['nullable','string' , 'min:5'] ,
            'description_ar' => ['nullable','string' , 'min:5'] ,
            'status' => ['required' , 'in:active,archived'] ,
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png']
        ]);

        $category1 = Category::whereSlug(Str::slug($request->name))->first();
        if($category1){
            toastr()->error('This category exists. please change !', 'Opps', ['timeOut' => 8000]);
            return redirect()->back();
        }
        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("name_".$localeCode)] );
        }

        $translation1 = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation1  =  array_merge ($translation1, [$localeCode => $request->input("description_".$localeCode)] );
        }

        $file_name = null ;

        if ($photo = $request->file('avatar')) {
            $file_name = uploadImage($photo, 'category_images', $request->name_en);
        }
        $category = Category::create([
            'name' => $translation,
            'slug' => Str::slug($request->name_en),
            'parent_id' => $request->category,
            'description' => $translation1,
            'status' =>$request->status,
            'image' => $file_name,
        ]);

        if ($photo = $request->file('avatar')) {
            $category->addMediaFromRequest('avatar')->toMediaCollection('categories');
        }

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }

    public function edit($id){

        $category = Category::findOrFail($id);

        $categories = Category::active()->get();

        return view('admin.category.edit',compact('category','categories'));
    }


    public function update(Request $request, $id){

        $request->validate([
            'name_en' => ['required', 'string' ,'min:4', 'max:190', 'unique:categories,name'] ,
            'name_ar' => ['required', 'string' ,'min:4', 'max:190', 'unique:categories,name'] ,
            'category' => ['nullable' , 'int' , 'exists:categories,id'] ,
            'description_en' => ['nullable','string' , 'min:5'] ,
            'description_ar' => ['nullable','string' , 'min:5'] ,
            'status' => ['required' , 'in:active,archived'] ,
            'avatar' => ['nullable','mimes:jpg,jpeg,png'],
        ]);

        $category = Category::findOrFail($id);

        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("name_".$localeCode)] );
        }

        $translation1 = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation1  =  array_merge ($translation1, [$localeCode => $request->input("description_".$localeCode)] );
        }

        if ($photo = $request->file('avatar')) {
            UnlinkImage('category_images',$category->image,$category);
            $file_name = uploadImage($photo,'category_images',$request->name_en);
            $category->update([
                'image' => $file_name,
            ]);
        }

        $category->update([
            'name' => $translation,
            'slug' => Str::slug($request->name_en),
            'parent_id' => $request->category,
            'description' => $translation1,
            'status' =>$request->status,
        ]);

        // if ($photo = $request->file('avatar')) {
        //     $category->addMediaFromRequest('avatar')->toMediaCollection('categories');
        // }

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }

    public function delete($id){
        $category = Category::findOrFail($id);

        $category->delete();


        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);

        return redirect()->back();


    }


    public function activate($id){
        $category = Category::findOrFail($id);

        if ($category->status == 'active') {
            $category->update([
                'status' => 'archived',
            ]);
        } else {
            $category->update([
                'status' => 'active',
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }
}
