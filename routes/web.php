<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

//use App\Mail\WelcomeMail;
//use Illuminate\Support\Facades\Mail;
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

/* Route::get('/', function () {
    return view('welcome');
});
*/
//Route::redirect('/','/en');
//Route::group(['prefix'=>'{language}'], function(){
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){  
Route::get('/products',[AdminController::class, 'adminGetAllProducts'])->name('admin.products');
Route::delete('/products/delete/{edit}',[AdminController::class,'adminDeleteProduct'])->name('admin.products.delete');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/edit/{edit}',[ProductController::class,'edit'])->name('products.edit');
Route::post('/products/update/{edit}',[ProductController::class,'update'])->name('products.update');
Route::get('/users',[UserController::class,'index'])->name('admin.user.index');
Route::get('/add-user',[App\Http\Controllers\Admin\UserController::class,'AddUserIndex'])->name('admin.user.add');
Route::post('/insert-user',[App\Http\Controllers\Admin\UserController::class,'InsertUser']);
Route::get('/users/{id}',[UserController::class,'getUser'])->name('admin.user.get_user');
Route::get('/edit-user/{user}',[App\Http\Controllers\Admin\UserController::class,'EditUser'])->name('admin.user.edit');
//Route::get('/edit-user/{id}',[App\Http\Controllers\Admin\UserController::class,'EditUser'])->name('Edituser');

Route::post('/update-user/{id}',[App\Http\Controllers\Admin\UserController::class,'UpdateUser']);
Route::delete('/users/delete/{user}',[App\Http\Controllers\Admin\UserController::class,'DeleteUser'])->name('admin.user.delete');
});

Route::get('/products',[ProductController::class,'index'])->name('products.index')->middleware('auth');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show')->middleware('auth');

//Authentication for login and register

Route::view('/','index')->middleware('guest')->name('index');
//Route::view('index','index')->middleware('guest')->name('index');


Route::post('store',[RegisterController::class,'store'])->middleware('guest');

Route::view('home','home')->name('home')->middleware(['auth','isAdmin']);
Route::view('login','Auth.login')->middleware('guest')->name('login');

Route::post('authenticate',[LoginController::class,'authenticate'])->middleware('guest');

Route::get('logout',[LoginController::class,'logout']);

//Product and order details
Route::post('/add_to_cart',[ProductController::class,'addToCart'])->middleware('auth');
Route::get('/cartlist',[ProductController::class,'cartList'])->middleware('auth');
Route::get('removecart/{id}',[ProductController::class,'removeCart'])->middleware('auth');
Route::get('ordernow',[ProductController::class,'orderNow'])->middleware('auth');
Route::post('orderplace',[ProductController::class,'orderPlace'])->middleware('auth');
Route::get('myorders',[ProductController::class,'myOrders'])->middleware('auth');
Route::get('totalorders',[AdminController::class,'totalOrders'])->name('admin.totalorders')->middleware(['auth','isAdmin']);
Route::view('noitem','product.noitem')->middleware('auth');



//});

//admin/users details
/*
Route::get('admin/users',[UserController::class,'index']);


Route::get('admin/add-user',[App\Http\Controllers\Admin\UserController::class,'AddUserIndex'])->name('AddUserIndex');

Route::post('admininsert-user',[App\Http\Controllers\Admin\UserController::class,'InsertUser'])->name('InsertUser');

Route::get('admin/edit-user/{id}',[App\Http\Controllers\Admin\UserController::class,'EditUser'])->name('Edituser');

Route::post('admin/update-user/{id}',[App\Http\Controllers\Admin\UserController::class,'UpdateUser'])->name('UpdateUser');

Route::get('admin/delete-user/{id}',[App\Http\Controllers\Admin\UserController::class,'DeleteUser'])->name('Deleteuser');
//admin
//Route::get('/admin/products',[AdminController::class, 'adminGetAllProducts'])->name('admin.products');
//Route::delete('/admin/products/{id}',[AdminController::class,'adminDeleteProduct'])->name('admin.products.delete');

*/
/*
    Route::get('/test',function(){
        \App::setLocale('fr');
        if (App::isLocale('fr')) {
            # code...
            
        dd(App::getLocale());
        }
    });

*/

