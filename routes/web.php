<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\UserController;


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
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){  
Route::get('/products',[AdminController::class, 'adminGetAllProducts'])->name('admin.products');
Route::delete('/products/{id}',[AdminController::class,'adminDeleteProduct'])->name('admin.products.delete');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::post('/products/update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/users',[UserController::class,'index']);
Route::get('/add-user',[App\Http\Controllers\Admin\UserController::class,'AddUserIndex'])->name('AddUserIndex');
Route::post('/insert-user',[App\Http\Controllers\Admin\UserController::class,'InsertUser'])->name('InsertUser');
Route::get('/edit-user/{id}',[App\Http\Controllers\Admin\UserController::class,'EditUser'])->name('Edituser');
Route::post('/update-user/{id}',[App\Http\Controllers\Admin\UserController::class,'UpdateUser'])->name('UpdateUser');
Route::get('/delete-user/{id}',[App\Http\Controllers\Admin\UserController::class,'DeleteUser'])->name('Deleteuser');
});

Route::get('/products',[ProductController::class,'index'])->name('products.index')->middleware('auth');
Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');

//Authentication for login and register

Route::view('','index')->middleware('guest')->name('index');


Route::view('register','Auth.register')->middleware('guest');

Route::post('store',[RegisterController::class,'store']);

Route::view('home','home')->middleware('auth');

Route::view('login','Auth.login')->middleware('guest')->name('login');

Route::post('authenticate',[LoginController::class,'authenticate']);

Route::get('logout',[LoginController::class,'logout']);

//Product and order details
Route::post('/add_to_cart',[ProductController::class,'addToCart']);
Route::get('/cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[ProductController::class,'myOrders']);
Route::get('totalorders',[AdminController::class,'totalOrders']);



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





