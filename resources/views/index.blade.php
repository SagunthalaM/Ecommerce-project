
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
     <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body  class="bg-light" style="margin:100px 50px 0 250px;">
    <div class="dropdown" style="position:absolute;top:10px;right:50px;">
        <button type="button " class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
            <a href="{{ route(Route::currentRouteName(),'en') }}" class="text-decoration-none text-white" >English</a>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),'en') }}"class="text-decoration-none text-white">English</a></li>
       
          <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),'fr') }}"class="text-decoration-none text-white">French</a></li>
        </ul>
      </div>

<div class="container d-flex justify-content-center  " >

<div class="col-6" >
    <div class="row col-sm-6 bg-light" style="box-shadow:0px 4px 3px #ff3300; padding:10px 20px;">
        <h4 class=" text-center">Admin Login here</h4>
        <img src="images/user_logo.jpg" alt="admin-image">
        <button class="btn btn-danger my-4 ">
            <a href="{{ route('login',app()->getLocale()) }}" class=" fs-5 text-white text-decoration-none">{{ __('Admin Login') }} </a>
        </button>
    </div>
    </div>



<div class="col-6" >
    <div class="row col-sm-6 bg-light" style="box-shadow:0px 4px 3px rgb(0, 170, 255); padding:10px 20px;">
        <h4 class=" text-center">User Login here</h4>
        <img src="images/user3.png" alt="admin-image">
       <a href="{{ route('login',app()->getLocale()) }}" class=" fs-5 text-white text-decoration-none">
        <button class="btn btn-info my-4  justify-content-center fs-5 text-white " 
        style="margin-left:20%;">
                     
                User Login
            </button> </a>
       
    </div>
    </div>


</div>
</body>
</html>