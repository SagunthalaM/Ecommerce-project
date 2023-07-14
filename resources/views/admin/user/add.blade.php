@extends('backend.layouts.app')
@section('content')

<div class="wrapper " style="background-color: white">
<section class="content-wrapper ">
   <head>
      <!-- Bootstrap-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
             
   </head>
    <div class="row">
       <div class="col-lg-1">
        @if(session('success'))
      
        <div class="alert alert-success  alert-dismissible fade show" role="alert" style="margin-right: 50px">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endif
       </div>

       <div class="col-lg-10">
        <!-- Card start -->
      <div class="card  ">
        <div class="card-header">
            <h5 class="card-title">
                Add User
            </h5>
        </div>
        <!-- Card body starts  -->
        <div class="card-body">
            <form action="{{ URL::to('admin/insert-user') }}" role="form" method="post" novalidate>
                @csrf

            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">
                    User name<span style="color:red;">*</span>

                </label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control @error('username')
                        is-invalid
                    @enderror"
                     placeholder="Enter your name" value="{{ old('username') }}"
                     id="username" required>

                </div>
                @error('username')
                    <div class="text-danger" style="margin-left:160px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">User email
                    <span style="color:red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control @error('email')
                        is-invalid
                    @enderror" 
                    placeholder="Enter email Address" value="{{ old('email') }}" required>
                </div>
                
                @error('email')
                    <div class="text-danger" style="margin-left:160px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password
                    <span style="color:red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="password" name="password"
                     class="form-control @error('password')
                         is-invalid
                     @enderror" placeholder="Enter your password"  required>
                </div>
                @error('password')
                    <div class="text-danger" style="margin-left:160px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password
                    <span style="color:red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation"
                     class="form-control @error('password')
                         is-invalid
                     @enderror" placeholder="Enter your password"  required>
                </div>
                @error('password')
                    <div class="text-danger" style="margin-left:160px">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">User role 
                    <span style="color:red;">*</span>
                </label>
                <div class="col-sm-10">
               <select name="role" class="form-control @error('role')
                   is-invalid
               @enderror custom-select" id="exampleFormControlSelect" required>
                  <option value="" >Select role</option>  
                <option value="Admin" name="role">Admin</option>
                    <option value="Customer" name="role">Customer</option>

               </select>
                </div>
            </div>
            <!-- Card body ends -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ URL::to('admin/users') }}" class="ms-2 btn btn-dark">Back</a>
           
            </div>

            </form>
        </div>
      </div>
      <!-- Card End -->
       </div>

       
    </div>
</section>
</div>
@endsection