<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowtobyController extends Controller
{
    public function index(){
        $locale = app()->getLocale();

        if ($locale == 'en') {
            return view('user.howtobyen');
        }
        if ($locale == 'ar') {
            return view('user.howtoby');
        }
    }
}
