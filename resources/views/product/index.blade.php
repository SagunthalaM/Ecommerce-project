<?php 
use App\Http\Controllers\ProductController;
$total = ProductController::cartItem();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home page</title>
      <!-- Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>  
     <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  


<h1 class="text-center mt-2"> Welcome! {{ Auth()->user()->username }}  </h1>
<hr>
<br>
@if($errors->any())
<ul>
    {!! implode('',$errors->all('<li>
        <span class="text-danger">:message</span></li>')) !!}
</ul>

@endif
<div class="container" style="margin-left:120px;margin-right:100px;">
  @if(session('success'))
      
  <div class="alert alert-success  alert-dismissible  show" role="alert" style="margin-right: 50px">
   {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @endif
</div>

<div class="container">
  <div class="container">
    <!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<body>

<h2 style="text-align:center ">Welcome To LensKart</h2>

<div class="container">
  <div class="mySlides">
    <div class="numbertext">1 / 3</div>
    <img src="images/banner-2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="images/banner-3.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="images/banner-1.jpg" style="width:100%">
  </div>
 
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    
</body>
</html>
  </div>
    <div class="row ">
        <div class=" row ms-5 " style="">
            @foreach ($products as $product)
            <div class="col-2 m-2 p-2"
             style="width:15rem;margin-right:0;
             border:1px solid rgb(243, 223, 223);border-radius:5px;">
                <img src="{{ $product->picture }}" class="card-img-top"
                style="object-fit: contain;width:200px;min-width:30vh;height:150px;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary"> Detail</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
   <div>
  <div class="dropdown ms-5" style="position:absolute;top:10px;right:20px;">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      {{Auth()->user()->username}}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="logout">Logout</a></li>
    </ul>
  </div>
      <div style="position:absolute;top:10px;right:180px;">
     <a href="/cartlist" class="text-white text-decoration-none">
         <button class="btn btn-primary">
          Cart({{ $total }})
      
      </button>
    </a>
      </div>
    </div>
    <div style="position:absolute;top:10px;right:270px;">
    <a href="/myorders" class="text-white text-decoration-none">
      <button class="btn btn-primary">
        My Orders
  
    </button>
  </a>
    </div>
  </div>
  
</div>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>