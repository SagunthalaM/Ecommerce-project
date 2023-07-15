@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper" style="background-color: white">
<div class="container mt-5 mb-5">

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Create Product</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    </head>
    <body>
      
    </body>
    </html>  
    <h2>Create Product</h2>
    @if(Session::has('success'))
    <div class="alert alert-success ">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
 @endif
    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title <span style="color:red;">*</span></label>
            <input type="text" class="form-control @error('title')
              is-invalid
            @enderror" name="title"
             id="title" placeholder="Enter title">
             <div class="text-danger">
              @error('title')
                {{ $message }}
              @enderror
             </div>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Price <span style="color:red;">*</span></label>
            <input type="text" class="form-control @error('price')
              is-invalid
            @enderror
            " name="price" 
            id="price" placeholder="Enter price">
            <div class="text-danger">
              @error('price')
                {{ $message }}
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description
              <span style="color:red;">*</span>
            </label>
            <textarea class="form-control
            @error('description')
              is-invalid
            @enderror" name="description" id="description" 
            placeholder="Enter Description"></textarea>
            <div class="text-danger">
              @error('description')
                {{ $message }}
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="picture" class="form-label">Choose Picture
              <span style="color:red;">*</span>
            </label>
            <input class="form-control @error('picture')
              is-invalid
            @enderror
            " type="file" name="picture" id="picture">
            <div class="text-danger">
              @error('picture')
                {{ $message }}
              @enderror
            </div>
          </div>


          <div>
            
          <button type="submit" class="btn btn-primary">Create Product</button>
          <a href="{{ URL::to('admin/products') }}" class="btn btn-dark ms-3">Back</a>
          </div>

    </form>

</div>
</div>
@endsection
