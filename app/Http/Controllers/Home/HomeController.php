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
    public function index(){

        $data['products'] = Product::active()->featured()->take(8)->get();
        $data['categories'] = Category::parents()->active()->get();

        $aparel = tree($data['categories'][0]);
        $data['product_apparel'] = [];
        foreach ($data['products'] as $product) {
            if (in_array($product->category->id,$aparel )) {
                $data['product_apparel'] [] = $product;
            }
        }
        $carpets = tree($data['categories'][1]);
        $data['product_carpets'] = [];
        foreach ($data['products'] as $product) {
            if (in_array($product->category->id,$carpets )) {
                $data['product_carpets'] [] = $product;
            }
        }
        $food = tree($data['categories'][2]);
        $data['product_food'] = [];
        foreach ($data['products'] as $product) {
            if (in_array($product->category->id,$food )) {
                $data['product_food'] [] = $product;
            }
        }

        $machines = tree($data['categories'][3]);
        $data['product_machine'] = [];
        foreach ($data['products'] as $product) {
            if (in_array($product->category->id,$machines )) {
                $data['product_machine'] [] = $product;
            }
        }

        $data['sliders'] = Slider::active()->home()->get();
        $data['vedio_top'] = Vedio::active()->home()->top()->get();
        $data['vedio_bottom'] = Vedio::active()->home()->bottom()->get();
        $data['content_top'] = Content::active()->home()->top()->first();
        $data['content_center'] = Content::active()->home()->center()->get();
        $data['content_bottom'] = Content::active()->home()->bottom()->get();


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
