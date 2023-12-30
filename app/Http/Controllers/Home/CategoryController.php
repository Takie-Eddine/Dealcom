<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::active()->parents()->with(['children'])->get();

        $category_1 = tree($categories[0]);

        $products_1 = Product::whereHas('category',function($query) use($category_1){
            $query->whereIn('categories.id',$category_1);
        })->take(5)->get();

        $category_2 = tree($categories[1]);

        $products_2 = Product::whereHas('category',function($query) use($category_2){
            $query->whereIn('categories.id',$category_2);
        })->take(4)->get();

        $category_3 = tree($categories[2]);

        $products_3 = Product::whereHas('category',function($query) use($category_3){
            $query->whereIn('categories.id',$category_3);
        })->take(4)->get();

        $category_4 = tree($categories[3]);

        $products_4 = Product::whereHas('category',function($query) use($category_4){
            $query->whereIn('categories.id',$category_4);
        })->take(4)->get();


        return view('user.categories',compact('categories','products_1','products_2','products_3','products_4'));
    }



    public function get($slug){

        Session::put('category',$slug);
        $categories = Category::parents()->active()->orderBy("name","ASC")->get();
        return view('user.products',compact('categories'));

    }
}
