<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RakitPC | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="text/css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" type="text/css">
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap') }}" rel="stylesheet" type="text/css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">

    <style>
        /* .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link.active {
            color: grey;
        }

        .navbar-light .navbar-nav .nav-link{
            color: white;
        } */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="shop.html" class="nav-item nav-link">Shop</a>
                <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                        <a href="checkout.html" class="dropdown-item">Checkout</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto py-0">
                <a href="" class="nav-item nav-link">Login</a>
                <a href="" class="nav-item nav-link">Register</a>
            </div>
        </div>
    </nav>
    @yield('container')
</body>
</html>
