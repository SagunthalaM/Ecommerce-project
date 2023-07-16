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
use Yajra\DataTables\Facades\DataTables;
use Session;

class AdminController extends Controller
{
    public $admin;
    //here did a huge mistake as contruct spelling is wrong.
    public function __construct(IAdminRepository $admin){
        $this->admin = $admin;
    }

   /*
     public function adminGetAllProducts(){
        $products =$this->admin->adminGetAllProducts();
        return view('admin.products')->with('products',$products);
    }
     */ 
    public function adminGetAllProducts(Request $request){
        if($request->ajax()){
            $product = Product::latest()->get();
            return DataTables::of($product)
           // ->addIndexColumn()
       //    ->addColumn('image',function($image){
       //       return '<img src="'.$picture->url.'" width="100" height="100"  ';
         //  })->rawColumn(['image'])
            ->addColumn('actions',function($edit){
               return '
               <img src="'.$edit->picture.'" width="50" height="50" > 
               <head>
               <!-- Bootstrap-->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
 
               <!-- Font awesome -->
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
           
           </head>
                
               <a href="'.route('products.show',$edit->id).'" class="text-decoration-none text-dark ">
               <i class="fa-solid fa-eye fs-5"></i>
               </a>
               <a href="'.route('products.edit',$edit->id).'" class="text-decoration-none text-dark" >
               <i class="fa-solid fa-pen-to-square fs-5"></i> 
               </a>
                <form action="'.route('admin.products.delete',$edit->id).'" method="post" style="display:inline">
                '.csrf_field().'
                '.method_field('DELETE').'
                <button type="submit" class="btn py-0 px-0" onclick="return confirm(\'are you sure to delete?\')">
                <i class="fa-solid fa-trash fs-5 "></i>
                </button>
                </form>
               '
               ;
            })->rawColumns(['actions'])
            ->make(true);
            
        }
        return view('admin.products');
    }

    //delete a single product
    public function adminDeleteProduct($id){
        try {
            
           $this->admin->adminDeleteProduct($id);
            Session::flash('danger', 'Product deleted successfully!');
            return back();
            //return redirect('admin/products');//->with('success','Product Deleted Successfully!');
        } catch (ModelNotFoundException $exception) {
            return response()->view('errors.product_not_found', [], 404);
        }

        //$this->admin->adminDeleteProduct($id);
        //return redirect('/admin/products')->with('success','Product Deleted Successfully!');
    }
    public function totalOrders(){
        $users = User::all();
        //$users = User::query()->paginate(10);
        //$users = User::paginate(10);
        //$users = User::orderBy('id','desc')->paginate(3);
        $totalOrders =DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->join('users','orders.user_id','=','users.id')
      //  ->get();
         ->paginate(10);
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
