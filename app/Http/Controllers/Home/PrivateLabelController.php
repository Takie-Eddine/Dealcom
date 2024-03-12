<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\RequestDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as ModelsRequest;
use App\Notifications\ProductRequestNotification;

class PrivateLabelController extends Controller
{

    public function store(Request $request){

        $request->validate([
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
        ]);


        $modelrequest = ModelsRequest::create([
            'user_id' => Auth::user()->id,
            'status' => 'pending',
        ]);

        RequestDetail::create([
            'request_id' =>$modelrequest->id ,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'country' => $request->country,
            'shipping_type' => $request->shipping_method,
            'description' => $request->description,
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new ProductRequestNotification($modelrequest));
        }

        toastr()->success(' Your Request Had Been Submited !', 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('request');

    }
}
