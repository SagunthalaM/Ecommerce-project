
<div class="content-wrapper">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
     <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <h1 class="  text-center  py-2  ">  Login Page </h1>

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
      
             <label for="" class="form-label">Email</label>
             <input type="text" class="form-control mb-3" name="email"
              placeholder="xyz@gmail.com" value="{{ old('email') }}" >
 
             <label for="" class="form-label">Password</label>
             <input type="password" class="form-control mb-5" name="password" 
             placeholder="password" >
             <button type="submit" class="form-control bg-primary mb-3
             text-white fs-5">Login</button>
             <div class="container">
                <a href="{{ URL::to('register') }}" style="margin-left:17%;">No Account?Register </a>
             </div>

@csrf
        </form>
    </div>
    <button class="btn btn-dark" style="position: absolute;bottom:100px;right:100px;">
        <a href="{{ route('index') }}" class="text-decoration-none text-white">Back</a>
       </button>
</body>
</html>
</div>