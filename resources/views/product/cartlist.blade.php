<?php 
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart List</title>
       <!-- Bootstrap-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
       <!-- Font awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
    <div class="custom-product mt-5">
     
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4 class="container ms-4 mb-5">Your Cart List</h4>
                <a href="ordernow" class="btn btn-success ms-5 mb-3">Order Now</a><br>
            
                @foreach ($product as $item )
                <div class="row searched-item mt-2 mb-2 ms-5 cart-list-devider"
                
                style="border-bottom:1px solid #ccc;padding-bottom:20px">
                   <div class="col-sm-3">
                    <a href="products/{{ $item->id }}">
                        <img src="{{ $item->picture }}" 
                        style="object-fit: contain;width:200px;min-width:30vh;height:150px;"
                        class="trending-image" alt="">
                      
                        </a>
                   </div>
                   <div class="col-sm-4">
                        <div>
                            <h2>{{ $item->title }}</h2>
                            <h5>{{ $item->description }}</h5>
                        </div>
                        </a>
                   </div>
                   <div class="col-sm-3">
                     <a href="removecart/{{ $item->cartId }}" 
                        class="btn btn-warning text-white">Remove to Cart</a>
                   </div>
                </div>
                @endforeach
            </div>
            <div class="container ms-5">

              {!! $product->appends(['sort'=>''])->links() !!}
            </div>
        </div>

        <div class="dropdown" style="position:absolute;top:10px;right:20px;">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              {{Auth()->user()->username}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
          </div>
          <div style="position :absolute;top:10px;right:180px;">
            @if (auth()->user()->role == 'Admin')
            <a href="{{ route('home') }}" class="btn btn-primary"> Home</a>           
             @else
             <a href="{{ route('products.index') }}" class="btn btn-primary"> Home</a>           
            @endif
           </div>
           </div>
           <div style="position:absolute;top:10px;right:270px;">
            @if (auth()->user()->role == 'Customer')
            <a href="/myorders" class="text-white text-decoration-none">
              <button class="btn btn-primary">
                My Orders
          
            </button>
          </a>
          @endif
            </div>
      
             </div>    
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>