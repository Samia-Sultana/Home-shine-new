<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/home8-jewellery.html   11 Nov 2019 12:30:11 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Shine Interiors Design & Decoration</title>
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png' )}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png' )}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png' )}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="manifest" href="/{{ asset('assets/images/favicon/site.webmanifest') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css ' )}}">
    <!-- Bootstap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css' )}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/alertify.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('assets/alertifyjs/css/themes/default.min.css' )}}">


    <!---------toaster message -------------->
    <link media="screen" rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

 

    <style>
        body {
            background-color: #f5f5f5;
        }
        .grid-item {
             width: 25%; 
            }
    </style>
</head>

@include('user.userNavbar')


@yield('userWelcome')
@yield('productDetail')
@yield('catagoryProducts')
@yield('shopping_cart')
@yield('checkout')
@yield('userDashboard')
@yield('allProducts')
@yield('wishlist')
@yield('register')
@yield('login')
@yield('blogGrid')
@yield('blogArticle')
@yield('contact')
@yield('services')
@yield('about')
@yield('gallery')







@include('user.userFooter')

<!-- Including Jquery -->
<script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js' )}}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js' )}}"></script>
<script src="{{ asset('assets/js/vendor/jquery.cookie.js' )}}"></script>
<script src="{{ asset('assets/js/vendor/wow.min.js' )}}"></script>
<script src="{{ asset('assets/js/vendor/instagram-feed.js' )}}"></script>
<!-- Including Javascript -->
<script src="{{ asset('assets/js/bootstrap.min.js' )}}"></script>
<script src="{{ asset('assets/js/plugins.js' )}}"></script>
<script src="{{ asset('assets/js/popper.min.js' )}}"></script>
<script src="{{ asset('assets/js/lazysizes.js' )}}"></script>
<script src="{{ asset('assets/js/main.js' )}}"></script>

<script src="{{ asset('assets/alertifyjs/alertify.min.js' )}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>


<!--End Instagram Js-->
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

</html>