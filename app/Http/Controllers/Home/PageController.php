<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $locale = app()->getLocale();

        if ($locale == 'en') {
            return view('user.whydealcomen');
        }
        if ($locale == 'ar') {
            return view('user.whydealcom');
        }
    }
}
