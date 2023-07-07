<?php 
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product Details</title>
      <!-- Bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
  

<h1 class="text-center mt-2">{{ $product->title }} | Detail</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col ms-5 me-5" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/{{ $product->picture }}" height="150px" alt="...">
                <div class="container m-2 p-2">
                  <h2>{{ $product->title }}</h2>
                  <h3>Price: ${{ $product->price }}</h3>
                  <hr>
                  <p>{{ $product->description }}</p>
                </div>
              </div>
        </div>
        <div class="col mt-5 mb-5"> 

          <form action="{{ URL::to('add_to_cart') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
          <button class="btn btn-primary">Add to Cart</button>
          </form>
              <br>
          <br><br>
          <a href="{{ route('products.index') }}" class="btn btn-warning">Go Home</a>
          
        </div>
    </div>
   
    <div class="dropdown" style="position:absolute;top:10px;right:10px;">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        {{Auth()->user()->username}}
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="logout">Logout</a></li>
      </ul>
    </div>
    <div style="position :absolute;top:10px;right:130px;">
      <button class="btn btn-primary" > <a href="{{ route('products.index') }}" class="text-decoration-none text-white ">
       Home
       </a>
     </button>
     </div>

    <div style="position :absolute;top:10px;right:210px;">
     <button class="btn btn-primary" > <a href="/cartlist" class="text-decoration-none text-white ">
         Cart({{ $total }})
      </a>
    </button>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
