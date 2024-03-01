<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Vedio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($slug = null){



        $data['products'] = Product::active()->featured()->take(8)->get();

        // return $data['products'];
        // if (isset($data['products'])) {
        //     $data['products'] = Product::active()->orderBy('updated_at','DESC')->take(8)->get();
        // }

        $data['categories'] = Category::parents()->active()->get();

        $data['sliders'] = Slider::active()->home()->get();

        $data['vedio_top'] = Vedio::active()->home()->top()->get();
        $data['vedio_bottom'] = Vedio::active()->home()->bottom()->get();
        $data['content_top'] = Content::active()->home()->top()->first();
        $data['content_center'] = Content::active()->home()->center()->get();
        $data['content_bottom'] = Content::active()->home()->bottom()->get();

        if ($slug) {

            $category = Category::where('slug', '=', $slug)->firstOrFail();
            $q_categories = tree($category);
            $data['products'] = Product::active()->featured()->whereHas('category',function($query) use($q_categories){
                            $query->whereIn('categories.id',$q_categories);
                        })
                        ->take(8)->get();
        }


        return view('user.layouts.main',$data);
    }



    public function getproduct(Request $request, $id){

        $category = Category::with('children.products')->find($id);

        $data['products'] = $this->extractProducts($category);
        $data['categories'] = Category::parents()->active()->get();

        $data['sliders'] = Slider::active()->home()->get();

        $data['vedio_top'] = Vedio::active()->home()->top()->first();
        $data['vedio_bottom'] = Vedio::active()->home()->bottom()->first();
        $data['content_top'] = Content::active()->home()->top()->first();
        $data['content_center'] = Content::active()->home()->center()->get();
        $data['content_bottom'] = Content::active()->home()->bottom()->get();

        return view('user.layouts.main',$data);
    }


    private function extractProducts($category){
        $products = [];

        if ($category->products->isNotEmpty()) {
            $products = $category->products->toArray();
        }

        foreach ($category->children as $child) {
            $products = array_merge($products, $this->extractProducts($child));
        }

        return $products;
    }
}
