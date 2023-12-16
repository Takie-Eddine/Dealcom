<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $locale = app()->getLocale();

        if ($locale == 'en') {
            return view('user.abouten');
        }
        if ($locale == 'ar') {
            return view('user.about');
        }

    }
}
