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


        $data['products'] = Product::active()->featured()->latest()->take(8)->get();
        if (isset($data['products'])) {
            $data['products'] = Product::active()->latest()->take(8)->get();
        }

        $data['categories'] = Category::parents()->active()->get();

        $data['sliders'] = Slider::active()->home()->get();

        $data['vedio_top'] = Vedio::active()->home()->top()->first();
        $data['vedio_bottom'] = Vedio::active()->home()->bottom()->first();
        $data['content_top'] = Content::active()->home()->top()->first();
        $data['content_center'] = Content::active()->home()->center()->get();
        $data['content_bottom'] = Content::active()->home()->bottom()->get();
        //return $data['sliders'] ;

        return view('user.layouts.main',$data);
    }
}
