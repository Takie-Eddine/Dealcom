<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\ConversationsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeManageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\PricelistController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\Mime\MessageConverter;

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

    Route::group(['namespace' => 'Admin' ,'middleware' => ['auth:admin','verified'] , 'as'=>'admin.' , 'prefix' => 'admin'],function(){
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');

        Route::group(['prefix'=>'profile'  ],function(){
            Route::get('/', [ProfileController::class, 'index'])->name('profile');
            Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::post('/update', [ProfileController::class, 'update_email'])->name('profile.update_email');
            Route::put('/update', [ProfileController::class, 'update_password'])->name('profile.update_password');
            Route::delete('/deactivate', [ProfileController::class, 'deactivate'])->name('profile.deactivate');

        });


        Route::group(['prefix'=>'supplier'  ],function(){
            Route::get('/', [SupplierController::class, 'index'])->name('supplier');
            Route::get('/all', [SupplierController::class, 'getSuppliersDatatable'])->name('supplier.all');
            Route::get('/create', [SupplierController::class, 'create'])->name('supplier.create');
            Route::post('/store', [SupplierController::class, 'store'])->name('supplier.store');
            Route::get('show/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');
            Route::get('product/{supplier}', [SupplierController::class, 'products'])->name('supplier.product');
            Route::get('price-list/{supplier}', [SupplierController::class, 'pricelist'])->name('supplier.price-list');
            Route::get('/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
            Route::patch('/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
            Route::get('/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');
            Route::get('/activate/{id}', [SupplierController::class, 'activate'])->name('supplier.activate');
            Route::get('/archived/{id}', [SupplierController::class, 'archived'])->name('supplier.archived');
        });



        Route::group(['prefix'=>'brand'  ],function(){
            Route::get('/', [BrandController::class, 'index'])->name('brand');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
            Route::get('show/{brand}', [BrandController::class, 'show'])->name('brand.show');
            Route::get('product/{brand}', [BrandController::class, 'products'])->name('brand.product');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
            Route::patch('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
            Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
            Route::get('/activate/{id}', [BrandController::class, 'activate'])->name('brand.activate');
            Route::get('/archived/{id}', [BrandController::class, 'archived'])->name('brand.archived');

        });


        Route::group(['prefix'=>'category'  ],function(){
            Route::get('/', [CategoryController::class, 'index'])->name('category');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('show/{category}', [CategoryController::class, 'show'])->name('category.show');
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            Route::get('/activate/{id}', [CategoryController::class, 'activate'])->name('category.activate');

        });



        Route::group(['prefix'=>'product'  ],function(){
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::post('/save', [ProductController::class, 'store_image'])->name('product.store_image');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::patch('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('show/{product}', [ProductController::class, 'show'])->name('product.show');
            Route::get('/approve/{id}', [ProductController::class, 'approve'])->name('product.approve');
            Route::get('/feature/{id}', [ProductController::class, 'feature'])->name('product.feature');
            Route::get('/activate/{id}', [ProductController::class, 'activate'])->name('product.activate');
            Route::get('/delete-image/{id}', [ProductController::class, 'delete_image'])->name('product.deleteimage');

        });

        Route::group(['prefix'=>'attribute'  ],function(){
            Route::get('/', [AttributeController::class, 'index'])->name('attribute');
            Route::get('/create', [AttributeController::class, 'create'])->name('attribute.create');
            Route::post('/store', [AttributeController::class, 'store'])->name('attribute.store');
            Route::get('/edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
            Route::patch('/update/{id}', [AttributeController::class, 'update'])->name('attribute.update');
            Route::get('/delete/{id}', [AttributeController::class, 'destroy'])->name('attribute.delete');
        });


        Route::group(['prefix'=>'price-list'  ],function(){
            Route::get('/', [PricelistController::class, 'index'])->name('price-list');
            Route::get('/create', [PricelistController::class, 'create'])->name('price-list.create');
            Route::post('/store', [PricelistController::class, 'store'])->name('price-list.store');
            Route::get('/edit/{id}', [PricelistController::class, 'edit'])->name('price-list.edit');
            Route::patch('/update/{id}', [PricelistController::class, 'update'])->name('price-list.update');
            Route::get('/delete/{id}', [PricelistController::class, 'destroy'])->name('price-list.delete');
            Route::get('/download/{id}', [PricelistController::class, 'download'])->name('price-list.download');
            Route::get('/activate/{id}', [PricelistController::class, 'activate'])->name('price-list.activate');
        });


        Route::group(['prefix'=>'slider'  ],function(){
            Route::get('/', [SliderController::class, 'index'])->name('slider');
            Route::get('/create', [SliderController::class, 'create'])->name('slider.create');
            Route::post('/store', [SliderController::class, 'store'])->name('slider.store');
            Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
            Route::patch('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
            Route::get('/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
        });

        Route::group(['prefix'=>'video'  ],function(){
            Route::get('/', [SliderController::class, 'vedio'])->name('vedio');
            Route::get('/create', [SliderController::class, 'createvedio'])->name('vedio.create');
            Route::post('/store', [SliderController::class, 'storevedio'])->name('vedio.store');
            Route::get('/edit/{id}', [SliderController::class, 'editvedio'])->name('vedio.edit');
            Route::patch('/update/{id}', [SliderController::class, 'updatevedio'])->name('vedio.update');
            Route::get('/delete/{id}', [SliderController::class, 'deletevedio'])->name('vedio.delete');
        });


        Route::group(['prefix'=>'content'  ],function(){
            Route::get('/', [HomeManageController::class, 'index'])->name('content');
            Route::get('/create', [HomeManageController::class, 'create'])->name('content.create');
            Route::post('/store', [HomeManageController::class, 'store'])->name('content.store');
            Route::get('/edit/{id}', [HomeManageController::class, 'edit'])->name('content.edit');
            Route::patch('/update/{id}', [HomeManageController::class, 'update'])->name('content.update');
            Route::get('/delete/{id}', [HomeManageController::class, 'destroy'])->name('content.delete');
        });

        Route::group(['prefix'=>'request'],function(){
            Route::get('/', [RequestController::class, 'index'])->name('request');
            Route::get('/show/{id}', [RequestController::class, 'show'])->name('request.show');
            Route::get('/edit/{id}', [RequestController::class, 'edit'])->name('request.edit');
            Route::patch('/update/{id}', [RequestController::class, 'update'])->name('request.update');
            Route::get('/send-message/{id}', [RequestController::class, 'send'])->name('request.send');
            Route::post('/send-message', [RequestController::class, 'addMessage'])->name('request.send');
            Route::get('/download/{id}', [RequestController::class, 'download'])->name('request.download');
            Route::get('/download-message/{id}', [RequestController::class, 'downloadMessage'])->name('request.download.message');
        });

        Route::group(['prefix'=>'chat'],function(){
            Route::get('/{id?}', [ChatController::class, 'index'])->name('chat');
        });

        Route::group(['prefix'=>'notification'],function(){
            Route::get('/', [NotificationsController::class, 'index'])->name('notifications');
            Route::get('/read/{id}', [NotificationsController::class, 'read'])->name('notification.read');
        });

        Route::group(['prefix'=>'complaint'],function(){
            Route::get('/', [ComplaintController::class, 'index'])->name('complaints');
            Route::get('/show/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
            Route::get('/answer/{id}', [ComplaintController::class, 'answer'])->name('complaints.answer');
            Route::post('/answer/{id}', [ComplaintController::class, 'answerstore'])->name('complaints.answer.post');
        });

        Route::group(['prefix' =>'role'], function () {
            Route::get('/', [RoleController::class, 'rolepermission'])->name('roles');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
            Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete');
            Route::get('/view/{id}', [RoleController::class, 'view'])->name('roles.view');

        });

        Route::group(['prefix'=>'admin'  ],function(){
            Route::get('/', [UserController::class, 'index'])->name('users');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
            Route::get('/view/{id}', [UserController::class, 'view'])->name('users.view');
            Route::post('/status/{id}', [UserController::class, 'status'])->name('users.status');
        });

        Route::group(['prefix' =>'task'], function () {
            Route::get('/', [TaskController::class, 'index'])->name('tasks');
            Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
            Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');
            Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
            Route::post('/update/{id}', [TaskController::class, 'update'])->name('tasks.update');
            Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
            // Route::get('/view/{id}', [TaskController::class, 'view'])->name('tasks.view');
        });

        Route::group(['prefix' =>'users'], function () {
            Route::get('/', [ClientController::class, 'index'])->name('clients');
            Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
            Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
            Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
            Route::post('/update/{id}', [ClientController::class, 'update'])->name('clients.update');
            Route::get('/delete/{id}', [ClientController::class, 'delete'])->name('clients.delete');
            Route::get('/view/{id}', [ClientController::class, 'show'])->name('clients.view');
            Route::get('/wishlist/{id}', [ClientController::class, 'wishlist'])->name('clients.wishlist');
            Route::get('/request/{id}', [ClientController::class, 'request'])->name('clients.request');
            Route::get('/activate/{id}', [ClientController::class, 'active'])->name('clients.activate');
        });

        Route::get('/conversations', [ConversationsController::class, 'index']);
        Route::get('/conversations/{conversation}', [ConversationsController::class, 'show']);
        Route::post('/conversations/{conversation}/participants', [ConversationsController::class, 'addParticipant']);
        Route::delete('/conversations/{conversation}/participants', [ConversationsController::class, 'removeParticipant']);

        Route::get('/conversations/{id}/messages', [MessageController::class, 'index']);
        Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
        route::delete('/messages/{id}', [MessageController::class, 'destroy']);


    });




});

require __DIR__.'/authadmin.php';
