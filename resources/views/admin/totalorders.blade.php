
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order Details</title>
      <!-- Bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
      <!-- Font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
  
    @extends('backend.layouts.app')

@section('content')

<div class="content-wrapper" style="background-color: white">
    <h3 class="text-center">Users Order Details</h3>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex;width:100%">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                    <tr><!-- 
                        <th>Id</th> -->
                        <th scope="col">User Id</th>
                        <th>Product Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Item Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Address</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($totalOrders as $index=>$orders)
                            <tr>
                                <!-- 
                                <th> $index+1 </th>  -->
                                <th scope="row">{{ $orders->user_id }}</th> 
                                <th>{{ $orders->product_id }}</th>
                               <td>{{ $orders->username}}</td>
                               <td>
                                <a href="products/{{ $orders->id }}">
                                    <img src="{{ $orders->picture }}" class="my-0 mx-0"
                                    style="object-fit: contain;width:100px;min-width:5vh;height:30px;"
                                    alt="">
                                </a>
                               </td>   
                                <td>{{ $orders->price }}</td>
                                <td>{{ $orders->payment_method}}</td>
                                <td>{{ $orders->payment_status }}</td>
                                <td>{{ $orders->address }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
            {!! $totalOrders->appends(['sort'=>''])->links() !!} 
            <div>
            </div>
    </div>
</div>


</div>

@endsection


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>