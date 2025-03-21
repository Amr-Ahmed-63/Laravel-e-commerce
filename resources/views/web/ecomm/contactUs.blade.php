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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->


<div class="preloader-inner">
<div class="preloader-icon">
<span></span>
<span></span>
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
<div class="col-lg-4 col-md-4 col-12">
<div class="top-middle">
<ul class="useful-links">
<li><a href="index-2.html">Home</a></li>
<li><a href="about-us.html">About Us</a></li>
<li><a href="contact">Contact Us</a></li>

</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-end">
<div class="user">
<i class="lni lni-user"></i>
Hello
</div>
<ul class="user-login">
<li>
<a href="login">Sign In</a>
</li>
<li>
<a href="register.html">Register</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="header-middle">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-3 col-md-3 col-7">

<a class="navbar-brand" href="index-2.html">
<img src="{{ asset("web") }}/images/logo/logo.svg" alt="Logo">
</a>

</div>
<div class="col-lg-5 col-md-7 d-xs-none">

<div class="main-menu-search">

<div class="navbar-search search-style-5">
<div class="search-select">
<div class="select-position">
<select id="select1">
<option selected>All</option>
<option value="1">option 01</option>
<option value="2">option 02</option>
<option value="3">option 03</option>
<option value="4">option 04</option>
<option value="5">option 05</option>
</select>
</div>
</div>
<div class="search-input">
<input type="text" placeholder="Search">
</div>
<div class="search-btn">
<button><i class="lni lni-search-alt"></i></button>
</div>
</div>
nav
</div>

</div>
<div class="col-lg-4 col-md-2 col-5">
<div class="middle-right-area">
<div class="nav-hotline">
<i class="lni lni-phone"></i>
<h3>Hotline:
<span>(+100) 123 456 7890</span>
</h3>
</div>

    <a href="user" class="btn btn-primary">Login</a>


<a href="logout" class="btn btn-danger">Logout</a>
<div class="navbar-cart">
<div class="wishlist">
<a href="javascript:void(0)">
<i class="lni lni-heart"></i>
<span class="total-items">0</span>
</a>
</div>
<div class="cart-items">
<a href="javascript:void(0)" class="main-btn">
<i class="lni lni-cart"></i>
 <span class="total-items">2</span>
</a>

<div class="shopping-item">
<div class="dropdown-cart-header">
<span>2 Items</span>
@if("" != Session::get("user"))

<a href="/cart">View Cart</a>
@else
<a href="/user">View Cart</a>

@endif
</div>
<ul class="shopping-list">
<li>
<a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
<div class="cart-img-head">
<a class="cart-img" href="product-details.html"><img src="../admin/images/" alt="#"></a>
</div>
<div class="content">
<h4><a href="product-details.html">
cam</a></h4>
<p class="quantity">x - <span class="amount">$999</span></p>
</div>
</li>

<!-- <li>
<a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
<div class="cart-img-head">
<a class="cart-img" href="product-details.html"><img src="/images/header/cart-items/item2.jpg" alt="#"></a>
</div>
<div class="content">
<h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
<p class="quantity">1x - <span class="amount">$35.00</span></p>
</div>
</li> -->
</ul>
<div class="bottom">
<div class="total">
<span>Total</span>
<span class="total-amount">$134.00</span>
</div>
<div class="button">
<a href="checkout.html" class="btn animate">Checkout</a>




</header>

<section class="contact">
    <h2>Contact Us</h2>
    <form action="message" method="POST" class="_form">

@csrf
        <div class="call">

            @if(isset($data))
            <span class=" alert alert-success">{{$data}}</span>
            @endif
        </div>
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="text" name="message" placeholder="Enter your message" required maxlength="255">
        <input type="submit" value="Send" class="btn btn-primary">
    </form>
</section>

   <style>
        .contact{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            justify-content: center;
            width: 30%;
        }
        input{
            width: 100%;
            padding: 10px;
            border-radius: 8px;
        }
    </style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

$(document).ready(function(){

    $("._form").submit(function(e){
        var name = $(".name").val()
        var email = $(".email").val()
        var message = $(".message").val()
        name = $(".name").val("")
        email = $(".email").val("")
        message = $(".message").val("")
    })

    })


</script>
</body>
