<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    // Route::get('/index',  [HomeController::class, 'home'])->name('home');
    Route::get('/',  [HomeController::class, 'index'])->name('index');
    Route::get('/filter/{id}',  [HomeController::class, 'getproduct'])->name('filter');

    Route::group(['prefix'=>'category'  ],function(){
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    });
    Route::group(['prefix'=>'product'  ],function(){
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/show/{slug}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/request', [ProductController::class, 'request'])->name('product.request');
    });
    Route::group(['prefix'=>'about'  ],function(){
        Route::get('/', [AboutController::class, 'index'])->name('about');
    });
    Route::group(['prefix'=>'contact'  ],function(){
        Route::get('/', [ContactController::class, 'index'])->name('contact');
    });


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });


});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
