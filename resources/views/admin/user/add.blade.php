@extends('backend.layouts.app')
@section('content')

<div class="wrapper ">
<section class="content-wrapper ">

    <div class="row">
       <div class="col-lg-1">

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
            <form action="{{ URL::to('admin/insert-user') }}" role="form" method="post">
                @csrf

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User name</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Enter email Address" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">User role </label>
                <div class="col-sm-10">
               <select name="role" class="form-control custom-select" id="exampleFormControlSelect" required>
                  <option value="">Select role</option>  
                <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Customer">Customer</option>

               </select>
                </div>
            </div>
            <!-- Card body ends -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
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