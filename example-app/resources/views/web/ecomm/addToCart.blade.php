{{-- @include("web.layout.nav") --}}
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:35:35 GMT -->
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>ShopGrids - Bootstrap 5 eCommerce HTML Template.</title>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" type="image/x-icon" href="{{ asset("web") }}/images/favicon.svg" />

<link rel="stylesheet" href="{{ asset("web") }}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset("web") }}/css/LineIcons.3.0.css" />
<link rel="stylesheet" href="{{ asset("web") }}/css/tiny-slider.css" />
<link rel="stylesheet" href="{{ asset("web") }}/css/glightbox.min.css" />
<link rel="stylesheet" href="{{ asset("web") }}/css/main.css" />
</head>
<body>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

<div class="preloader">
<div class="preloader-inner">
<div class="preloader-icon">
<span></span>
<span></span>
</div>
</div>
</div>


<header class="header navbar-area">

<div class="topbar">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="top-left">
<ul class="menu-top-link">
<li>
<div class="select-position">
<select id="select4">
<option value="0" selected>$ USD</option>
<option value="1">€ EURO</option>
<option value="2">$ CAD</option>
<option value="3">₹ INR</option>
<option value="4">¥ CNY</option>
<option value="5">৳ BDT</option>
</select>
</div>
</li>
<li>
<div class="select-position">
<select id="select5">
<option value="0" selected>English</option>
<option value="1">Español</option>
<option value="2">Filipino</option>
<option value="3">Français</option>
<option value="4">العربية</option>
<option value="5">हिन्दी</option>
<option value="6">বাংলা</option>
</select>
</div>
</li>
</ul>
</div>
</div>
<div class="shopping-cart section">
    <div class="container">
    <div class="cart-list-head">

    <div class="cart-list-title">
    <div class="row">
    <div class="col-lg-1 col-md-1 col-12">
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <p>Product Name</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Quantity</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Subtotal</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>Discount</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <p>Remove</p>
    </div>
    </div>
    </div>


    <div class="cart-single-list">
    <div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-12">
    <img src="{{asset("storage/images/".$img[0]->image)}}" alt="#">
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <h5 class="product-name"> {{$name[0]->name}} </h5>
    <p class="product-des">
    <span><em>Type:</em> Mirrorless</span>
    <span><em>Color:</em> Black</span>
    </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
    <select class="form-control">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    </select>
    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>${{$price[0]->price}}</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>${{$sale[0]->sale}}</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
    </div>
    </div>
    </div>



    <!-- <div class="cart-single-list">
    <div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-12">
    <a href="product-details.html"><img src="assets/images/cart/02.jpg" alt="#"></a>
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <h5 class="product-name"><a href="product-details.html">
    Apple iPhone X 256 GB Space Gray</a></h5>
    <p class="product-des">
    <span><em>Memory:</em> 256 GB</span>
    <span><em>Color:</em> Space Gray</span>
    </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
    <select class="form-control">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    </select>
    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>$1100.00</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>—</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
    </div>
    </div>
    </div>


    <div class="cart-single-list">
    <div class="row align-items-center">
    <div class="col-lg-1 col-md-1 col-12">
    <a href="product-details.html"><img src="assets/images/cart/03.jpg" alt="#"></a>
    </div>
    <div class="col-lg-4 col-md-3 col-12">
    <h5 class="product-name"><a href="product-details.html">HP LaserJet Pro Laser Printer</a></h5>
    <p class="product-des">
    <span><em>Type:</em> Laser</span>
    <span><em>Color:</em> White</span>
    </p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <div class="count-input">
    <select class="form-control">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    </select>
    </div>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>$550.00</p>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
    <p>—</p>
    </div>
    <div class="col-lg-1 col-md-2 col-12">
    <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
    </div>
    </div>
    </div> -->

    </div>
    <div class="row">
    <div class="col-12">

    <div class="total-amount">
    <div class="row">
    <div class="col-lg-8 col-md-6 col-12">
    <div class="left">
    <div class="coupon">
     <form action="#" target="_blank">
    <input name="Coupon" placeholder="Enter Your Coupon">
    <div class="button">
    <button class="btn">Apply Coupon</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
    <div class="right">
    <ul>
    <li>Cart Subtotal<span>$2560.00</span></li>
    <li>Shipping<span>Free</span></li>
    <li>You Save<span>$29.00</span></li>
    <li class="last">You Pay<span>$2531.00</span></li>
    </ul>
    <div class="button">
        <form action="{{route("cart.update",11)}}" method="POST">

            @csrf
            @method("PUT")
            <input type="hidden" name="products_id" value="{{$id}}">
            <button type="submit" href="" class="btn">Add To Cart</button>
        </form>
    <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
    </div>
    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
@include("web.layout.footer")
