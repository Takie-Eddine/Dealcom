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
        if (!$data['products']) {
            $data['products'] = Product::orderBy("name","DESC")->take(8)->get();
        }

        $data['categories'] = Category::parents()->active()->get();

        $data['sliders'] = Slider::active()->home()->get();

        $data['vedio'] = Vedio::active()->first();
        $data['content'] = Content::active()->home()->bottom()->first();

        //return $data ;

        return view('user.layouts.main',$data);
    }
}
