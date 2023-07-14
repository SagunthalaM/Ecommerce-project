

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
   
    <div class="container  fs-5" 
    style="width:400px;justify-content:center;margin-top:20px">
        <form action="/store" class="" method="POST" novalidate>
            @csrf
                   
            <div class="mb-3">
                <label for="name" class="form-label">Name<span style="color:red;">*</span></label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="name"
                 name="username" value="{{ old('username') }}"
                 placeholder="Albert" required>
                @error('username')
                   <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="email" class="form-label">Email<span style="color:red;">*</span></label>
                <input type="email" placeholder="xyz@gmail.com"
                 class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                  value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="password" class="form-label">Password<span style="color:red;">*</span></label>
                <input type="password"
                placeholder="enter atleast 8 characters"
                class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password<span style="color:red;">*</span></label>
                <input type="password" placeholder="........"
                class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <div class="container">
            <a href="{{ URL::to('login') }}" style="">Already Have an Account </a>
         </div>
    </div>
    <button class="btn btn-dark" style="position: absolute;bottom:100px;right:100px;">
        <a href="{{ route('index') }}" class="text-decoration-none text-white">Back</a>
       </button>
       <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
</div>
