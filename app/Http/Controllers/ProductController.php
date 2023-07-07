<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Repository\IProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Session;

class ProductController extends Controller
{
    public $product;

    public function __construct(IProductRepository $product)
    {
       $this->product = $product; 
    }
    public function index()
    {
      $products = $this->product->getAllProducts();

      return view('product.index')->with('products',$products);
    }

    public function create(){
        return view('product.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'picture'=> 'required',
            'title'=>'required',
            'price'=>'required|integer'
        ]);

        $data = $request->all();
         
        //picture upload 
        if($image = $request->file('picture')){
            $name = 'images/'.$image->getClientOriginalName();
            $image->move(public_path('images'),$name);
            $data['picture']="$name";
        }

        $this->product->createProduct($data);
        //return dd($request->all());
       return redirect('/admin/products');

    }

    public function show($id){
        $product =  $this->product->getSingleProduct($id);
        return view('product.show')->with('product',$product);
    }
    
    public function edit($id){
        $product =  $this->product->editProduct($id);
        return view('product.edit')->with('product',$product);
    }
    
    public function update(Request $request, $id)
    {
        // validate and store data
        $request->validate([
        //    'picture' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        
        $data = $request->all();
        
        $this->product->updateProduct($id, $data);
       // return dd($request->all());
        return redirect('admin/products');

    }
    function addToCart(Request $request){
        //return "hello";
        $cart = new Cart;
        $cart->user_id=Auth::id();
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect('/products');
    }

    static function cartItem()
    {
        $userId = Auth::id();
        return Cart::where('user_id',$userId)->count();
    }
    function cartList(){
        $product = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cartId')->get();
        return view('product/cartlist',['product' => $product]);
      
    }
    public  function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow(){
        $userId = Auth::id();
        $totalAmount =  $product = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cartId')
        ->sum('products.price');
        return view('product/ordernow',['totalAmount' => $totalAmount]);
    }
    public function orderPlace(Request $request)
    {

        $request->validate([
            'address'=>'required',
            'payment'=>'required'
        ]);
        $userId = Auth::id();
         $allCart = Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order ->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
            
        }
         $request->input();
         return redirect('/products');
    }
    public function  myOrders(){
         $userId = Auth::id();
         $orders =DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('product/myorders',['orders'=> $orders]);
    
    }
}
