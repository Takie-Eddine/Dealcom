<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\ChatController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\HowtobyController;
use App\Http\Controllers\Home\PageController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\RequestController;
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
        Route::get('/{slug}', [CategoryController::class, 'get'])->name('category.get');
    });
    Route::group(['prefix'=>'product'  ],function(){
        Route::get('/{slug}', [ProductController::class, 'index'])->name('product');
        Route::get('/show/{slug}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/request/{slug}', [ProductController::class, 'request'])->name('product.request');
        Route::get('/wishlist/{slug}', [ProductController::class, 'request'])->name('product.wishlist');
    });
    Route::group(['prefix'=>'about'  ],function(){
        Route::get('/', [AboutController::class, 'index'])->name('about');
    });
    Route::group(['prefix'=>'contact'  ],function(){
        Route::get('/', [ContactController::class, 'index'])->name('contact');
    });

    Route::get('/how-to-by', [HowtobyController::class, 'index'])->name('howtoby');
    Route::get('/commercial-brand',[PageController::class, 'index']  )->name('commercial');

    Route::group(['prefix'=>'profile','middleware' => ['auth:web','verified'] ],function(){
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/update', [ProfileController::class, 'update_email'])->name('profile.update_email');
        Route::put('/update', [ProfileController::class, 'update_password'])->name('profile.update_password');
    });

    Route::group(['prefix'=>'request','middleware' => ['auth:web','verified'] ],function(){
        Route::get('/', [RequestController::class, 'index'])->name('request');
        Route::get('/show/{id}', [RequestController::class, 'show'])->name('request.show');
        Route::get('/create', [RequestController::class, 'create'])->name('request.create');
        Route::post('/store', [RequestController::class, 'store'])->name('request.store');
        Route::get('/edit/{id}', [RequestController::class, 'edit'])->name('request.edit');
        Route::patch('/update', [RequestController::class, 'update'])->name('request.update');
    });

    Route::group(['prefix'=>'chat'],function(){
        Route::get('/{id?}', [ChatController::class, 'index'])->name('chat');
    });



        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified'])->name('dashboard');

        // Route::middleware('auth')->group(function () {
        //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // });


});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
