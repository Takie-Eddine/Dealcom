<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use App\Models\RequestDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;

class RequestController extends Controller
{
    public function index(){

        $requests = ModelsRequest::with(['details','product'])
                    ->where('user_id',Auth::user('web')->id)
                    ->when(request()->keyword != null,function ($query){
                        $query->search(request()->keyword);
                    })
                    ->when(\request()->status != null, function ($query) {
                        $query->whereStatus(\request()->status);
                    })
                    ->paginate(\request()->limit_by ?? 15);


        return view('user.dashboard.request.index',compact('requests'));
    }



    public function create(){

        $attributes = Attribute::select('id','name')->get();
        return view('user.dashboard.request.create',[
            'countries' => Countries::getNames(),
            'attributes' => $attributes,
            ]);
    }


    public function store(Request $request){

        $request->validate([
            'code' => ['required',Rule::exists('products','slug')],
            'name' => ['required', 'min:3'],
            'category' => ['nullable','min:3'],
            'quantity' => ['required','numeric','min:1'],
            'unit' => ['required','in:box,piece,container,dozen'],
            'country' => ['required' ,'string' , 'size:2'],
            'shipping_method' => ['required' ,'in:sea freight,air freight,land freight'],
            'description' => ['required', 'min:1' ],
        ]);

        $product = Product::where('slug','=',$request->code)->FirstOrFail();

        $modelrequest = ModelsRequest::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
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

        toastr()->success(' Your Request Had Been Submited !', 'Congrats', ['timeOut' => 8000]);
        return redirect()->route('request');
    }

    public function show($id){

        $modelrequest = ModelsRequest::findOrFail($id);

        return view('user.dashboard.request.show', compact('modelrequest'));
    }




}
