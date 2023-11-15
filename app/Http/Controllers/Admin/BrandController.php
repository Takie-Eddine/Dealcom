<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index(){

        $brands = Brand::when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);

        return view('admin.brand.index',compact('brands'));

    }



    // public function getSuppliersDatatable(){
    //     $data = Brand::select('*');
    //     return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->make(true);
    // }



    public function create(){

        return view('admin.brand.create',[
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:190'] ,
            'code' => ['required',  'string', 'min:2', 'max:7', Rule::unique('brands','code')] ,
            'description' => ['nullable', 'string', 'min:2'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('brands','mobile_phone')] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('brands','office_phone')] ,
            'email' => ['required', 'string', 'email', Rule::unique('brands','email')] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:2', 'max:253'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
        ]);

        $file_name = null ;

        if ($photo = $request->file('avatar')) {
            $file_name = uploadImage($photo, 'brand_images', $request->name);
        }

        $brand = Brand::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'mobile_phone' => $request->phone,
            'office_phone' => $request->office_phone,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'image' => $file_name,
        ]);

        // if ($photo = $request->file('avatar')) {
        //     $brand->addMediaFromRequest('avatar')->toMediaCollection('brands');
        // }

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }




    public function edit($id){
        $brand = Brand::findOrFail($id);


        return view('admin.brand.edit',[
            'brand' => $brand,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
    }




    public function update(Request $request, $id){

        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:190'] ,
            'code' => ['required',  'string', 'min:2', 'max:7', Rule::unique('brands','code')->ignore($id)] ,
            'description' => ['nullable', 'string', 'min:2'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('brands','mobile_phone')->ignore($id)] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('brands','office_phone')->ignore($id)] ,
            'email' => ['required', 'string', 'email', Rule::unique('brands','email')->ignore($id)] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:2', 'max:253'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
        ]);

        if ($photo = $request->file('avatar')) {
            UnlinkImage('brand_images',$brand->image,$brand);
            $file_name = uploadImage($photo,'brand_images',$request->name);
            $brand->update([
                'image' => $file_name,
            ]);
        }

        $brand->update([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'mobile_phone' => $request->phone,
            'office_phone' => $request->office_phone,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        // if ($photo = $request->file('avatar')) {
        //     $brand->addMediaFromRequest('avatar')->toMediaCollection('brands');
        // }

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function delete($id){
        $brand = Brand::findOrFail($id);

        $brand->delete();


        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);

        return redirect()->back();


    }


    public function activate($id){
        $brand = Brand::findOrFail($id);

        if ($brand->status == 'active') {
            $brand->update([
                'status' => 'inactive',
            ]);
        } else {
            $brand->update([
                'status' => 'active',
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }



    public function archived($id){
        $brand = Brand::findOrFail($id);

        if ($brand->status == 'archived') {
            $brand->update([
                'status' => 'active',
            ]);
        } else {
            $brand->update([
                'status' => 'archived',
            ]);
        }
        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function show(Brand $brand){

        return view('admin.brand.view',compact('brand'));
    }


    public function products(Brand $brand){

        return view('admin.brand.product',compact('brand'));
    }
}
