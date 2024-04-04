<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ComplaintController extends Controller
{
    public function index(){
        $user = Auth::user('web');

        $complaints = $user->complaints()->paginate();

        return view('user.dashboard.complaint.index',compact('complaints'));
    }



    public function create(){

        return view('user.dashboard.complaint.create');
    }



    public function store(Request $request){

        $request->validate([
            'type' => ['nullable','in:product,request,other'],
            'product_code' => ['required_if:type,product', 'exists:products,code'],
            'request' => ['required_if:type,request','int', 'exists:requests,id'],
            'other' => ['required_if:type,other'],
            'description' => ['required','min:10'],
        ]);


        if ($request->input('product_code')) {
            $product = Product::where('code',$request->product_code)->firstOrFail();

            $complaint = Complaint::create([
                'user_id' => Auth::user('web')->id,
                'product_id' => $product->id,
                'text' => $request->description,
            ]);
        }

        if ($request->input('request')) {
            $modelrequest = ModelsRequest::where('user_id',Auth::user('web')->id)->where('id',$request->request)->firstOrFail();

            $complaint = Complaint::create([
                'user_id' => Auth::user('web')->id,
                'request_id' => $modelrequest->id,
                'text' => $request->description,
            ]);
        }

        if ($request->input('title')) {
            $complaint = Complaint::create([
                'user_id' => Auth::user('web')->id,
                'title' => $request->title,
                'text' => $request->description,
            ]);
        }

        toastr()->success('Created successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();

    }

    public function show($id){
        $complaint = Complaint::where('user_id','=',Auth::user('web')->id)->findOrFail($id);

        return view('user.dashboard.complaint.show',compact('complaint'));
    }
}
