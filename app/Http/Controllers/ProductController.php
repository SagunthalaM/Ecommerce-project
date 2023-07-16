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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Session;

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
            'picture'=> 'required|image|mimes:png,jpg,jpeg,svg,webp|',
            'title'=>'required|regex:/^[^\d]+$/|string|',
            'price'=>'required|integer',
            'description' =>'required|'
        ]);

        $data = $request->all();
         
        //picture upload 
        if($image = $request->file('picture')){
            $name = 'images/'.$image->getClientOriginalName();
            $image->move(public_path('images-1'),$name);
            $data['picture']="$name";
        }

        $this->product->createProduct($data);
        //return dd($request->all());
         Session::flash('success', 'Product Created successfully!');
            //Session::flash('class','success');
       return back();

    }

    public function show($id){
        $product = Product::find($id);

        if (!$product) {
            return response()->view('errors.product_not_found', [], 404);
        }
        
    
        // Access the product properties and perform further actions
        $title = $product->title;
        $product =  $this->product->getSingleProduct($id);
        return view('product.show')->with('product',$product);
    }
    
    public function edit($id){
        $product =  $this->product->editProduct($id);
        if(!$product){
            return response()->view('errors.product_not_found',[],404);
        }
        $id = $product->id;

        return view('product.edit')->with('product',$product);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'picture'=> '|image|mimes:png,jpg,svg,webp,jpef',
            'title' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required',
        ]);
        //here I made a huge mistake like  instead of this $product->picture 
        // I put $product->image unknown field 
        //and also gived path for $destination like 'images-1'.$product->picture
        //but I already add the path in the default ,so don't do this again
            $product = Product::findOrFail($id);
            $product->title = $request->input('title');
            $product->price = $request->input('price');
            $product->description = $request->input('description');

                if ($request->hasFile('picture')) {
                $destination = $product->picture;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $image = $request->file('picture');
                $name = 'images-1/' . $image->getClientOriginalName();
                $image->move(public_path('images-1'), $name);
                $product->picture = $name;
            }

            $product->update();
              return redirect()->back()->with('success','Product Updated Successfully');
            //  return redirect('admin/products')->with('success','Product Updated Successfully');

            }
    function addToCart(Request $request){
        //return "hello";
        $cart = new Cart;
        $cart->user_id=Auth::id();
        $cart->product_id = $request->product_id;
        $cart->save();
        return redirect('/products')->with('success','Product added to your cartlist ');
    }

    static function cartItem()
    {
        $userId = Auth::id();
        return Cart::where('user_id',$userId)->count();
    }
    function cartList(){
        $product = Cart::join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cartId')->paginate(2);
        return view('product/cartlist',['product' => $product]);
      
    }
    public  function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow(){
        $userId = Auth::id();
        $product = Cart::join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cartId ')
        ->first();
        if($product){
            
        $userId = Auth::id();
        $totalAmount =  $product = DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cartId')
        ->sum('products.price');
        return view('product/ordernow',['totalAmount' => $totalAmount]);
        }else{
            return redirect('noitem')->with('success',"No item avaiable in Your cart");
        ;
        }
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
           // Session::flash('success', 'Order placed successfully!');
            //Session::flash('class','success');
       
            return redirect('/products')->with('success','Order Placed Successfully');
    }
    public function  myOrders(){
         $userId = Auth::id();
         $orders =Order::join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$userId)
        ->paginate(2);
        return view('product/myorders',['orders'=> $orders]);
    
    }

    static function cartTotal()
    {
        $userId = Auth::id();
        return Cart::all()->count();
    }
    static function productTotal()
    {
        $userId = Auth::id();
        return Product::all()->count();
    }
    static function orderTotal()
    {
        $userId = Auth::id();
        return Order::all()->count();
    }
    static function userTotal()
    {
        $userId = Auth::id();
        return User::all()->count();
    }
}
