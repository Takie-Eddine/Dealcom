<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index(){

        $suppliers = Supplier::when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);

        return view('admin.supplier.index', compact('suppliers'));
    }







    public function create(){

        return view('admin.supplier.create',[
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
            'categories' => Category::active()->get(),
        ]);
    }


    public function store(Request $request){
        //return $request ;
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'] ,
            'code' => ['required',  'string', 'min:2', 'max:7', Rule::unique('suppliers','code')] ,
            'description' => ['nullable', 'string', 'min:2'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','mobile_phone')] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','office_phone')] ,
            'email' => ['required', 'string', 'email', Rule::unique('suppliers','email')] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
            'category' => ['required','array','min:1',Rule::exists('categories','id')],
        ]);

        $file_name = null ;

        if ($photo = $request->file('avatar')) {
            $file_name = uploadImage($photo, 'supplier_images', $request->name);
        }

        $supplier = Supplier::create([
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
        $supplier->categories()->sync($request->category);
        // if ($photo = $request->file('avatar')) {
        //     $supplier->addMediaFromRequest('avatar')->toMediaCollection('suppliers');
        // }

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }




    public function edit($id){
        $supplier = Supplier::findOrFail($id);


        return view('admin.supplier.edit',[
            'supplier' => $supplier,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
            'categories' => Category::active()->get(),
        ]);
    }




    public function update(Request $request, $id){

        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'] ,
            'code' => ['required',  'string', 'min:2', 'max:7', Rule::unique('suppliers','code')->ignore($id)] ,
            'description' => ['nullable', 'string', 'min:2'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','mobile_phone')->ignore($id)] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','office_phone')->ignore($id)] ,
            'email' => ['required', 'string', 'email', Rule::unique('suppliers','email')->ignore($id)] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
            'category' => ['required','array','min:1',Rule::exists('categories','id')],
        ]);

        if ($photo = $request->file('avatar')) {
            UnlinkImage('supplier_images',$supplier->image,$supplier);
            $file_name = uploadImage($photo,'supplier_images',$request->name);

            $supplier->update([
                'image' => $file_name,
            ]);
        }

        $supplier->update([
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
        $supplier->categories()->sync($request->category);
        // if ($photo = $request->file('avatar')) {
        //     $supplier->addMediaFromRequest('avatar')->toMediaCollection('suppliers');
        // }

        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }



    public function delete($id){
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();


        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);

        return redirect()->back();


    }


    public function activate($id){
        $supplier = Supplier::findOrFail($id);

        if ($supplier->status == 'active') {
            $supplier->update([
                'status' => 'inactive',
            ]);
        } else {
            $supplier->update([
                'status' => 'active',
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }



    public function archived($id){
        $supplier = Supplier::findOrFail($id);

        if ($supplier->status == 'archived') {
            $supplier->update([
                'status' => 'active',
            ]);
        } else {
            $supplier->update([
                'status' => 'archived',
            ]);
        }
        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function show(Supplier $supplier){

        return view('admin.supplier.view',compact('supplier'));
    }


    public function products(Supplier $supplier){

        return view('admin.supplier.product',compact('supplier'));
    }


    public function pricelist(Supplier $supplier){

        $files = $supplier->pricelists()->get();

        return view('admin.supplier.file',compact('files','supplier'));

    }

}
