<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::parents()->active()->when(request()->keyword != null,function ($query){
            $query->search(request()->keyword);
        })
        ->when(\request()->status != null, function ($query) {
            $query->whereStatus(\request()->status);
        })
        ->select('id','name', 'slug','image')->with(['children' => function ($q) {
            $q->select('id','name', 'parent_id', 'slug','image');
            $q->with(['children' => function ($qq) {
                $qq->select('id','name', 'parent_id', 'slug','image');
                $qq->with(['children' => function ($qqq) {
                    $qqq->select('id','name', 'parent_id', 'slug','image');
                }]);
            }]);
        }])
        ->paginate(\request()->limit_by ?? 15);

        //return $categories ;
        return view('user.categories',compact('categories'));
    }
}
