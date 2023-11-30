<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data['products'] = Product::active()->featured()->get();

        $data['categories'] = Category::parents()->active()->get();

        return view('user.layouts.main',$data);
    }
}
