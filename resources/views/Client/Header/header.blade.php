<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link
href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic'
rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
<link href="https://cdn.rawgit.com/h-ibaldo/Raleway_Fixed_Numerals/master/css/rawline.css" rel="stylesheet">
<link
href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
rel='stylesheet' type='text/css'>

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="stylesheet" href="{{asset("client/css/font-awesome.min.css")}}">
<link rel="stylesheet" href="{{asset("client/css/normalize.css")}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<link rel="stylesheet" href="{{asset("client/css/main.css")}}">
<link rel="stylesheet" href="{{asset("client/style.css")}}">
<link rel="stylesheet" href="{{asset("client/responsive.css")}}">
<link rel="stylesheet" href="{{asset("client/css/cart.css")}}">
<link rel="stylesheet" href="{{asset("client/css/custom_slider.css")}}">
 
<!-- Bootstrap core CSS -->
<link href="{{asset("client/assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset("client/assets/css/shop-item.css")}}" rel="stylesheet">

<script src="{{asset("client/assets/vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!--owl carousel-->
<link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">

<link rel="stylesheet" href="{{asset('client/css/cart/custom.css')}}">	
<script src="{{asset('client/js/vendor/modernizr-2.6.2.min.js')}}"></script>
<style>
.navbar .dropdown-menu {
border:none;
/*background-color:#0060c8!important;*/
}

/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 992px) {

/* remove the padding from the navbar so the dropdown hover state is not broken */
.navbar {
padding-top:0px;
padding-bottom:0px;
}

/* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
.navbar .nav-item {
padding:.5rem .5rem;
margin:0 .25rem;
}

/* makes the dropdown full width  */
.navbar .dropdown {position:static;}

.navbar .dropdown-menu {
width:100%;
left:0;
right:0;
/*  height of nav-item  */
top:45px;
}

/* shows the dropdown menu on hover */
.navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
display:block!important;
}

.navbar .dropdown-menu {
border: 1px solid rgba(0,0,0,.15);
background-color: #fff;
}

}

</style>

</head>

<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->


<!-- Preloader -->
<!-- <div id="preloader"></div> -->
<!-- /Preloader -->
<audio src="intro.mp3" autoplay="autoplay"></audio>

<div class="header">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="logo">
    <a href=""><img src="client/img/logo.png"></a>
</div>
</div>
<div class="col-md-8">
<div class="cart-links">
    @if(Session::get('client_id'))
    <a href="{{route('client-logout')}}">Logout</a>
    <a href="">{{Session::get('client_name')}}</a>
    @else
    <a href="#" data-toggle="modal" data-target="#loginModal">Sign In</a>
    <a href="#" data-toggle="modal" data-target="#registrationModal">Signup</a>
    @endif
    
    <a onclick="cart_data_display()" style="cursor:pointer"><i class="fa fa-shopping-cart text-white"></i> <span id="total-cart-item" class="text-white"></span></a>
</div>

<!-- Shopping cart Modal -->
<div class="modal fade" id="shoppingcart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Shopping Cart</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <!-- Items table -->
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="ttttt">
                    
                        <!-- <tr>
                            <td><a href="single-item.html">HTC One</a></td>
                            <td>2</td>
                            <td>$250</td>
                        </tr>
                        <tr>
                            <td><a href="single-item.html">Apple iPhone</a></td>
                            <td>1</td>
                            <td>$502</td>
                        </tr>
                        <tr>
                            <td><a href="single-item.html">Galaxy Note</a></td>
                            <td>4</td>
                            <td>$1303</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>$2405</th>
                        </tr> -->
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Continue
                    Shopping</button>
                <a href="client_controllers/cart/placeOrder" class="btn btn-info">Checkout</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
</div>
</div>

<div class="container">
<!--<nav class="navbar navbar-inverse custom-nav navbar-expand-lg">-->
<!--<nav class="navbar navbar-inverse custom-nav">-->
<div class="container">
<div class="row">
<div class="col-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" style="background-color:#FDCE06 !important">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbar">
<a class="nav-item" href="{{URL::to('/')}}">Home</a>
<ul class="navbar-nav">
<li class="nav-item dropdown megamenu-li">

</li>


</ul>
<a class="nav-item" href="">About Us</a>
<a class="nav-item" href="{{route('contact-us')}}">Contact Us</a>
</div>
</nav>
</div>
</div>
</div>
</div>
</div>

<button id="cart-box-btn" class="cart-open-btn" style="margin-top:40px"><div class="cart-btn-content"><i class='fa fa-shopping-cart'></i><br><strong id="total-item"></strong></div><div class="cart-taka"><strong id="total-amount"></strong></div></button>
<div id="toggle">
<h4 class="text-center">Your Cart</h4>
<div class="cart-table-content">
<a href="{{route('place-order')}}" class="order-btn"><i class="fa fa-shopping-cart"></i> Place order  &nbsp;&nbsp;&nbsp;<span id="discounted_amount" class="text-danger"></span></a>
<table class="table cart-table">
<tbody class="cart-data">

</tbody>
</table>

</div>

<div class="cart-footer">
<p class="text-center" style="font-size: 12px;">@Cursor </p>
</div>
</div>
<h4 style="color:red" align="center">{{Session::get('message')}}</h4>

<!-- modal for login start here -->
<div id="loginModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
    <h2>Sign In</h2>
    <form class="form-horizontal" action="{{route('client-login')}}" method="post">
        @csrf
        <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="user_name"><p>email</p></label>  
            <div class="col-md-10">
            <input id="user_name" name="email" type="text" placeholder="email" class="form-control input-md" required="">
            
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="password"><p>Password</p></label>
            <div class="col-md-10">
            <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
            
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-3 control-label" for="singlebutton"></label>
            <div class="col-md-10">
            <button id="singlebutton" name="singlebutton" class="btn btn-success cl-btn">Sign in</button>
            </div>
        </div>

        </fieldset>
    </form>
</div>
</div>
</div>

</div>

</div>
</div>
<!-- modal for login end here -->


<!-- modal for registration start here -->
<div id="registrationModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="row">
    <div class="col-md-12">
<h2>Sign Up</h2><hr>
<h3>Personal Details</h3>
<p>Enter your username and password to create your account.</p>

<form class="form-horizontal" action="{{route('client-signup')}}" method="post">
    @csrf
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 col-lg-3 control-label float-left" for="user_name"><p>Username</p></label>
            <div class="col-md-12">
                <input id="user_name" name="user_name" type="text" class="form-control input-md" required="">

            </div>
        </div>
        

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="password"><p>Password</p></label>
            <div class="col-md-12">
                <input id="password" name="password" type="password" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Password input-->
        <!--   <div class="form-group">
            <label class="col-md-3 control-label" for="c_password"><p>Confirm Password</p></label>
            <div class="col-md-12">
                <input id="c_password" name="c_password" type="password" class="form-control input-md" required="">

            </div>
        </div> -->
        <hr>
        <hr>
        <h3>Shipping Details</h3>
        <p>Enter the name and address you'd like us to ship your order to.</p>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="full_name"><p>Full Name</p></label>
            <div class="col-md-12">
                <input id="full_name" name="full_name" type="text" class="form-control input-md" >

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="email"><p>Email Address</p></label>
            <div class="col-md-12">
                <input id="email" name="email" type="email" class="form-control input-md" >

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="contact_no"><p>Contact No</p></label>
            <div class="col-md-12">
                <input id="contact_no" name="contact_no" type="text" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="national_id"><p>National ID</p></label>
            <div class="col-md-12">
                <input id="national_id" name="national_id" type="text" class="form-control input-md" >

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="present_address"><p>Present Address</p></label>
            <div class="col-md-12">
                <input id="present_address" name="present_address" type="text" class="form-control input-md" >

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="permanent_address"><p>Permanent Address</p></label>
            <div class="col-md-12">
                <input id="permanent_address" name="permanent_address" type="text" class="form-control input-md" >

            </div>
        </div>

        <!-- Text input-->
        <!--<div class="form-group">-->
        <!--    <label class="col-md-3 control-label" for="holding_no"><p>Holding_no</p></label>-->
        <!--    <div class="col-md-7">-->
        <!--        <input id="holding_no" name="holding_no" type="text" class="form-control input-md" >-->

        <!--    </div>-->
        <!--</div>-->

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-2 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" class="btn btn-success cl-btn">Create Account</button>
            </div>
        </div>

    </fieldset>
</form>

</div>
</div>
</div>

</div>

</div>
</div>
<!-- modal for registration end here -->



