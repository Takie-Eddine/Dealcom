<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::with(['tags','attributes','category'])->when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->paginate(\request()->limit_by ?? 15);
        return view('admin.product.index',compact('products'));
    }


    public function create(){
        $data['tags'] = Tag::all();
        $data['attributes'] = Attribute::all();
        $data['categories'] = Category::active()->get();
        $data['suppliers'] = Supplier::active()->get();
        $data['brands'] = Brand::active()->get();

        return view('admin.product.create',$data);

    }



    public function store(Request $request){

        return $request ;
    }
}
