<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PricelistController extends Controller
{
    public function index(){
        $pricelists = PriceList::when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);
        return view('admin.pricelist.index',compact('pricelists'));
    }



    public function create(){

        $suppliers = Supplier::all();
        return view('admin.pricelist.create',compact('suppliers'));
    }



    public function store(Request $request){

        $request->validate([
            'file' => ['required','mimes:doc,docx,pdf,xls,xlsx,csv,tsv,ppt,pptx,pages,odt,rtf'],
            'supplier' => ['required',Rule::exists('suppliers','id')],
        ]);

        $supplier = Supplier::findOrFail($request->supplier);
        if ($file =  $request->file('file')) {
            $file_name = $supplier->name.'-'.$file->getClientOriginalName();
            $file->move(public_path('assets/files/'),$file_name);
        }

        $file = PriceList::create([
            'supplier_id' => $request->supplier,
            'name'=> $file_name,
            'status' => 'active',
        ]);


        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function delete($id){

        $file = PriceList::findOrFail($id);

        $file->delete();

        toastr()->success('Deleted successfully!', 'Congrats', ['timeOut' => 6000]);

        return redirect()->back();
    }


    public function download($id){

        $file = PriceList::findOrFail($id);

        return response()->download(public_path('assets/files/'.$file->name));
    }


    public function activate($id){
        $file = PriceList::findOrFail($id);

        if ($file->status == 'active') {
            $file->update([
                'status' => 'archived',
            ]);
        } else {
            $file->update([
                'status' => 'active',
            ]);
        }

        toastr()->success('Changed successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }
}
