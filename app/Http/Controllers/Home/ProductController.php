<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request){

        $page = $request->query("page");
        $size = $request->query("size");
        if (!$page) {
            $page = 1;
        }
        if (!$size) {
            $size = 15;
        }
        $order = $request->query("order");
        if (!$order) {
            $order = -1;
        }
        $_column = "";
        $_order = "";
        switch ($order) {
            case 1:
                $_column = "created_at";
                $_order = "DESC";
                break;
            case 2:
                $_column = "created_at";
                $_order = "ASC";
                break;
            case 3:
                $_column = "name";
                $_order = "ASC";
                break;
            default:
                $_column = "id";
                $_order = "DESC";
                break;
        }

        $attributes = Attribute::all();
        // $variants = [];
        // $product_attributes = ProductAttribute::all();
        // foreach ($product_attributes as $variants) {
        //     $slug = Str::slug($variants->value);
        //     foreach ($attributes as $attribute) {

        //     }
        // }

        $categories = Category::parents()->active()->orderBy("name","ASC")->get();
        $q_categories = $request->query("categories");
        $products = Product::where(function($query) use($q_categories){
                                $query->whereIn('category_id',explode(',',$q_categories))->orWhereRaw("'".$q_categories."'=''");
                            })->orderBy($_column,$_order)->paginate($size);


        return view('user.products',[
            'products' => $products,
            'categories' => $categories,
            'size' => $size,
            'page' => $page,
            'order' => $order,
            'q_categories' => $q_categories,
            'attributes' => $attributes,
        ]);
    }



    public function show($slug){

        $product = Product::where('slug','=',$slug)->firstOrFail();

        return view('user.product-details',compact('product'));
    }




    public function request(){
        return view('user.request-product');
    }
}
