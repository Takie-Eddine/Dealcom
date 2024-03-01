<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;

class RequestController extends Controller
{
    public function index(){

        $requests = ModelsRequest::with(['details','product'])
                    ->when(request()->keyword != null,function ($query){
                        $query->search(request()->keyword);
                    })
                    ->when(\request()->status != null, function ($query) {
                        $query->whereStatus(\request()->status);
                    })
                    ->paginate(\request()->limit_by ?? 15);


        return view('admin.request.index',compact('requests'));
    }


    public function edit($id){

        $request = ModelsRequest::findOrFail($id);
        $countries = Countries::getNames();

        return view('admin.request.edit',compact('request','countries'));
    }


    public function update(Request $request,$id){

        $request->validate([
            'product_id' => ['required',Rule::exists('requests','product_id')],
            'name' => ['required', 'min:3'],
            'category' => ['nullable','min:3'],
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
            'status' => ['required','in:pending,approved,canceled,ordered'],
        ]);


        $modelrequest = ModelsRequest::findOrFail($id);

        $modelrequest->update([
            'admin_id' => Auth::user()->id,
            'status' => $request->status
        ]);

        $modelrequest->details()->update([
            'request_id' =>$modelrequest->id ,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'country' => $request->country,
            'shipping_type' => $request->shipping_method,
            'description' => $request->description,
        ]);
        toastr()->success('Updated successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }


    public function send($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return view('');

    }


    public function show($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return view('admin.request.show', compact('modelrequest'));
    }






}
