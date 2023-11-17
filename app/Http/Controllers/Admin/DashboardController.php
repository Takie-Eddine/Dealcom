<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $data['products'] = Product::all();
        $data['users'] = User::all();
        $data['suppliers'] = Supplier::all();
        return view('admin.admin',$data);
    }

}
