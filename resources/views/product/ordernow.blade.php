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
    <title>Order now</title>
       <!-- Bootstrap-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
       <!-- Font awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>
    <div class="custom-product ms-5 " style="margin-top:80px">
       @if(session('success'))
      
       <div class="alert alert-success  alert-dismissible fade show" role="alert" style="margin-right: 50px">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <table class="table table-hover mt-5" style="width:1100px">
           
            <tbody class=" " style="">
              <tr>
                <td>Amout</td>
                <td>$ {{ $totalAmount }}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>$ 0</td>
              </tr>
              <tr>
                <td>Delivery</td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total Amount</td>
                <td>$ {{ $totalAmount+10 }}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="orderplace" method="post" class="me-5">
                @csrf
                <div class="mb-3 mt-3">
                  <label for="address" class="form-label">
                    Address
                    <span style="color:red;">*</span>
                  </label> <br>
                <textarea name="address" id="address" 
                class="form-control @error('address') is-invalid @enderror me-5" 
                value="{{ old('address') }}" placeholder="address"></textarea>
                @error('address')
                  <div class="invalid-feedback"><span class="btn btn-danger">{{ $message }}</span></div>
                @enderror
                </div>
                <div class="mb-3">
                  <label for="payment" 
                   class="form-label @error('payment') is-invalid  
                  @enderror" >
                    Payment Method <span style="color:red;">*</span>
                  </label><br>
                  @error('payment')
                  <div class="invalid-feedback"><span class="btn btn-danger">{{ $message }}</span></div>
                  @enderror
                  <br>
                <input type="radio" value="cash" id="payment" name="payment"><span> Online payment</span><br><br>
                <input type="radio"  value="cash" id="payment" name="payment"><span> EMI payment</span><br><br>
                <input type="radio" value="cash" id="payment" name="payment"><span> Cash On Delivery</span>
             
                </div>
               
                <button type="submit" class="btn btn-primary mb-5">Place Your Order</button>
               <a href="cartlist" class="btn btn-dark ms-2" style="margin-bottom:3rem">Back</a>
              </form>
          </div>

        <!-- home, username,cart -->
       <div class="container ">
        <div class="dropdown" style="position:absolute;top:10px;right:10px;">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
              {{Auth()->user()->username}}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
          </div>
          <div style="position :absolute;top:10px;right:180px;">
            
              <a href="{{ route('products.index') }}" class="text-decoration-none text-white ">
                <button class="btn btn-primary" >
             Home
             
           </button>
          </a>
           </div>
      
          <div style="position :absolute;top:10px;right:280px;">
            <a href="/cartlist" 
            class="text-decoration-none text-white ">
            <button class="btn btn-primary" >    Cart({{ $total }})
           </button>
           </a>
          </div>
       </div>
    </div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>