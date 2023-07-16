
<div class="content-wrapper">

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
<body>
   
    <h1 class="  text-center ">  {{ __("Login Page") }} </h1>
    <div class="dropdown" style="position:absolute;top:10px;right:50px;">
        <button type="button " class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
            <a href="{{ route(Route::currentRouteName(),'en') }}" class="text-decoration-none text-white" >English</a>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),'en') }}"class="text-decoration-none text-white">
                English</a></li>
       
          <li><a class="dropdown-item" href="{{ route(Route::currentRouteName(),'fr') }}"
            class="text-decoration-none text-white">{{ __("Français") }}</a></li>
        </ul>
      </div>
<hr>
   <div class="container">
    @if(session('success'))
      
    <div class="alert alert-success  alert-dismissible fade show" role="alert" style="margin-right: 50px">
     {{ session('success') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
   </div>

    <div class="container  fs-5" style="display: flex;justify-content:center;margin-top:50px">
        <form action="authenticate" class="" method="post" novalidate
        class="form-control-lg py-5"
        style="height:150px;min-height:65vh;width:150px;min-width:60vh;padding:20px 40px;box-shadow:0px 2px 5px lightblue;">
       
            @if($errors->any())
      
            {!! implode('',$errors->all('<p class=" form-control  btn btn-danger text-white " >
               :message</p >')) !!}
        
        @endif
             <label for="email" class="form-label">Email <span style="color:red;">*</span>

             </label>
             <input type="email" class="form-control @error('email') is-invalid
              @enderror mb-3" name="email" id="email"
              placeholder="xyz@gmail.com" value="{{ old('email') }}" >
           
 
             <label for="password" class="form-label">Password <span style="color:red;">*</span></label>
             <input type="password" class="form-control @error('password')
                is-invalid @enderror mb-3" name="password" id="password"
             placeholder="........" >
       
             <button type="submit" class="form-control bg-primary mb-3
             text-white fs-5">{{ __('Login') }}</button>
             <div class="container">
                <a href="{{ URL::to('register',app()->getLocale()) }}" style="margin-left:17%;">
                    {{ __("No Account?Register") }}</a>
             </div>

@csrf
        </form>
    </div>
    <button class="btn btn-dark" style="position: absolute;bottom:100px;right:100px;">
        <a href="{{ route('index',app()->getLocale()) }}" class="text-decoration-none text-white">
            {{ __("Back") }}</a>
       </button>

       <!-- boostrap script for js -->
       <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

       
</body>
</html>
</div>