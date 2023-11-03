<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


        $request->validate([
            'name' => ['required', 'string' ,'min:4', 'unique:categories,name'] ,
            'category' => ['nullable' , 'int' , 'exists:categories,id'] ,
            'description' => ['nullable','string' , 'min:5'] ,
            'status' => ['required' , 'in:active,archived'] ,
        ]);

        $category1 = Category::whereSlug(Str::slug($request->name))->first();
        if($category1){
            toastr()->error('This category exists. please change !', 'Opps', ['timeOut' => 8000]);
            return redirect()->back();
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->category,
            'description' => $request->description,
            'status' =>$request->status,
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
            'name' => ['required', 'string' ,'min:4', 'unique:categories,name'] ,
            'category' => ['nullable' , 'int' , 'exists:categories,id'] ,
            'description' => ['nullable','string' , 'min:5'] ,
            'status' => ['required' , 'in:active,archived'] ,
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->category,
            'description' => $request->description,
            'status' =>$request->status,
        ]);

        if ($photo = $request->file('avatar')) {
            $category->addMediaFromRequest('avatar')->toMediaCollection('categories');
        }

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
