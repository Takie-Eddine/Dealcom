<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Content;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;

class ProductController extends Controller
{
    public function index(Request $request, $slug){

        $page = $request->query("page");
        $size = $request->query("size");
        $keyword = $request->query("keyword");
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

        $category = Category::where('slug','=',$slug)->firstOrFail();
        $q_categories = tree($category);

        $categories = Category::parents()->active()->orderBy("name","ASC")->get();

        $products = Product::whereHas('category',function($query) use($q_categories){
                                $query->whereIn('categories.id',$q_categories);
                            })->when($keyword != null,function ($query) use($keyword){
                                $query->search($keyword);
                            })
                            ->orderBy($_column,$_order)->paginate($size);


        return view('user.products',[
            'products' => $products,
            'categories' => $categories,
            'size' => $size,
            'page' => $page,
            'order' => $order,
            'keyword' => $keyword,
            'category' => $category,
        ]);
    }



    public function show($slug){

        $product = Product::where('slug','=',$slug)->firstOrFail();

        $category = $product->category;

        $tags = $product->tags->pluck('id') ;

        $product_tags = Product::active()->whereHas('tags',function($query) use($tags){
            $query->whereIn('tags.id',$tags);
        })->get();


        $product_featured = Product::active()->featured()->get();

        $products = Product::where('category_id',$category->id)->get();

        return view('user.product-details',compact('product','products','product_tags','product_featured'));
    }




    public function request($slug){
        $product = Product::where('slug','=',$slug)->FirstOrFail();

        $content_top = Content::active()->request()->top()->first();
        $content_center = Content::active()->request()->center()->first();

        $brands = Brand::all();

        $countries = Countries::getNames();


        return view('user.request-product',compact('product','content_top','content_center','brands','countries'));
    }


    public function wishlist($slug){

        $product = Product::where('slug', '=', $slug)->firstOrFail();

        $user = Auth::user();

        if (!$user) {

        }

        $wishlist = Wishlist::where('product_id', '=', $product->id)->where('user_id', '=', $user->id)->firstOrFail();

        if ($wishlist) {
            toastr()->success('Already exists!', 'Congrats', ['timeOut' => 6000]);
            return redirect()->back();
        }
        Wishlist::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
        ]);
        toastr()->success('Added successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->back();
    }


    public function private(){

        $content_top = Content::active()->request()->top()->first();
        $content_center = Content::active()->request()->center()->first();

        $brands = Brand::all();
        $countries = Countries::getNames();

        return view('user.specialproduct',compact('content_top','content_center','brands','countries'));
    }
}
