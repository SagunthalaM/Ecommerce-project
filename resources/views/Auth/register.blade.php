

<div class="content-wrapper">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
     <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
     <!-- Font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <h1 class="  text-center   py-2  "> Register Page </h1>

    @if($errors->any())
    <ul>
        {!! implode('',$errors->all('<li>
            <span class="text-danger">:message</span></li>')) !!}
    </ul>
    
    @endif
    <div class="container  fs-5" style="display: flex;justify-content:center;margin-top:50px">
        <form action="/store" method="post" 
        class="form-control-lg ps-5 pe-5  "
        style="height:150px;min-height:75vh;width:150px;min-width:70vh;box-shadow:0px 2px 5px lightblue;padding:10px 0">
            <label for="" class="form-label">UserName</label>
            <input type="text" class="form-control mb-3" name="username"
             placeholder="username" value="{{ old('username') }}">

             <label for="" class="form-label">Email</label>
             <input type="text" class="form-control mb-3" name="email"
              placeholder="xyz@gmail.com" value="{{ old('email') }}">

             <label for="" class="form-label">Password</label>
             <input type="password" class="form-control mb-3" name="password" 
             placeholder="password" >
             

             <label for="" class="form-label">Confirm Password</label>
             <input type="password" class="form-control" name="password_confirmation" 
             placeholder="confirm password" >
<br>
             <button type="submit" class="form-control bg-primary
             text-white fs-5">Register</button><br>
             
                <a href="{{ URL::to('login') }}" style="margin-left:17%;">Already have an account</a>
             

@csrf
        </form>
    </div>
</body>
</html>
</div>
