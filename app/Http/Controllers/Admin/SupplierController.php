<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        ]);
    }


    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'] ,
            'code' => ['required',  'string', 'min:2', 'max:7'] ,
            'description' => ['nullable', 'string', 'min:30'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','mobile_phone')] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','office_phone')] ,
            'email' => ['required', 'string', 'email', Rule::unique('suppliers','email')] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:10', 'max:255'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
        ]);

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
        ]);

        if ($photo = $request->file('avatar')) {
            $supplier->addMediaFromRequest('avatar')->toMediaCollection('suppliers');
        }

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }




    public function edit($id){
        $supplier = Supplier::findOrFail($id);


        return view('admin.supplier.edit',[
            'supplier' => $supplier,
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
    }




    public function update(Request $request, $id){

        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'] ,
            'code' => ['required',  'string', 'min:2', 'max:7'] ,
            'description' => ['nullable', 'string', 'min:30'] ,
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','mobile_phone')->ignore($id)] ,
            'office_phone' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique('suppliers','office_phone')->ignore($id)] ,
            'email' => ['required', 'string', 'email', Rule::unique('suppliers','email')->ignore($id)] ,
            'country' => ['required' ,'string' , 'size:2'],
            'city' => ['nullable' ,'string'],
            'address' => ['required', 'string', 'min:10', 'max:255'],
            'postal_code' => ['nullable' , 'integer' ],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
        ]);

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

        if ($photo = $request->file('avatar')) {
            $supplier->addMediaFromRequest('avatar')->toMediaCollection('suppliers');
        }

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





}
