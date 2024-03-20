<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AttributeController extends Controller
{
    public function index(){

        $attributes = Attribute::when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->paginate(\request()->limit_by ?? 15);

        return view('admin.attribute.index',compact('attributes'));
    }



    public function create(){

        return view('admin.attribute.create');
    }


    public function store(Request $request){

        $request->validate([
            'name_en' => ['required', 'string', Rule::unique('attributes','name')],
            'name_ar' => ['required', 'string', Rule::unique('attributes','name')],
        ]);

        Attribute::create([
            'name' => [
                        'en' => $request->name_en,
                        'ar' => $request->name_ar,
                    ],
        ]);


        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }


    public function edit($id){

        $attribute = Attribute::findOrFail($id);

        return view('admin.attribute.edit',compact('attribute'));
    }


    public function update(Request $request, $id){

        $request->validate([
            'name_en' => ['required', 'string', Rule::unique('attributes','name')->ignore($id)],
            'name_ar' => ['required', 'string', Rule::unique('attributes','name')->ignore($id)],
        ]);


        $attribute = Attribute::findOrFail($id);

        $translation = [] ;

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties) {
            $translation  =  array_merge ($translation, [$localeCode => $request->input("name_".$localeCode)] );
        }


        $attribute->update([
            'name' => $translation,
        ]);


        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }



    public function destroy($id){

        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }

}
