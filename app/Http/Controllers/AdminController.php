<?php

namespace App\Http\Controllers;

use App\Repository\IAdminRepository;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $admin;
    //here did a huge mistake as contruct spelling is wrong.
    public function __construct(IAdminRepository $admin){
        $this->admin = $admin;
    }

    public function adminGetAllProducts(){
        $products =$this->admin->adminGetAllProducts();
        return view('admin.products')->with('products',$products);
    }

    //delete a single product
    public function adminDeleteProduct($id){
        $this->admin->adminDeleteProduct($id);
        return redirect('/admin/products');
    }
    public function totalOrders(){
        $users = User::all();
        //$users = User::query()->paginate(10);
        //$users = User::paginate(10);
        //$users = User::orderBy('id','desc')->paginate(3);
        $totalOrders =DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
         ->get();
        /*
        $totalOrders = Order::orderBy('id')->paginate(5)
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
         ->get();
         */
        // $customers = Customer::orderBy('id','desc')->paginate(3);
        return view('admin.totalorders',compact('totalOrders'));
    }

}
