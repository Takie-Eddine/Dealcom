<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Notifications\NewEmailNotification;
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
            'product_id' => [ Rule::requiredIf(function() use($request){
                                    return $request->input('name');
                                }),
                                Rule::exists('requests','product_id')
                            ],
            'name' => [Rule::requiredIf(function() use($request){
                                return $request->input('product_id');
                            }),
                        ],
            'category' => ['nullable','min:3'],
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
            'status' => ['required','in:pending,approved,canceled,ordered'],
            'offer' => ['nullable', 'file', 'mimes:doc,docx,pdf,xls,xlsx,csv,tsv,ppt,pptx,pages,odt,rtf','max:8192']
        ]);


        $modelrequest = ModelsRequest::findOrFail($id);

        $file_name = null;
        if ($file =  $request->file('offer')) {
            $file_name = $modelrequest->user->name.'-'.$file->getClientOriginalName();
            $file->move(public_path('assets/files/'),$file_name);
        }
        $modelrequest->update([
            'admin_id' => Auth::user()->id,
            'status' => $request->status,
            'offer' => $file_name,
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

        if ($modelrequest->status == 'approved') {
            $modelrequest->user->notify(new NewEmailNotification($modelrequest,$modelrequest->product));
        }


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

    public function download($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return response()->download(public_path('assets/files/'.$modelrequest->offer));
    }






}
