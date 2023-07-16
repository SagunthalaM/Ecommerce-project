
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
    @if($errors->any())
    <ul>
        {!! implode('',$errors->all('<li>
            <span class="text-danger">:message</span></li>')) !!}
    </ul>
    
    @endif

    <div class="container  fs-5" style="display: flex;justify-content:center;margin-top:50px">
        <form action="authenticate" method="post" 
        class="form-control-lg py-5"
        style="height:150px;min-height:60vh;width:150px;min-width:60vh;padding:20px 40px;box-shadow:0px 2px 5px lightblue;">
      
             <label for="" class="form-label">{{ __('Email') }}</label>
             <input type="text" class="form-control mb-3" name="email"
              placeholder="xyz@gmail.com" value="{{ old('email') }}" >
 
             <label for="" class="form-label">{{ __('Password') }}</label>
             <input type="password" class="form-control mb-5" name="password" 
             placeholder="........." >
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
</body>
</html>
</div>