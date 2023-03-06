<body class="template-index home8-jewellery belle">
    <div class="pageWrapper">

        <!--Search Form Drawer-->
        <div class="search">
            <div class="search__form">
                <form class="search-bar__form" action="#">
                    <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                    <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
                </form>
                <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
            </div>
        </div>
        <!--End Search Form Drawer-->
        <!--Top Header-->
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 col-sm-8 col-md-5 col-lg-4">
                        <p class="phone-no"><i class="anm anm-phone-s"></i> +440 0(111) 044 833</p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                        <div class="text-center">
                            <!-- <p class="top-header_middle-text"> Worldwide Express Shipping</p> -->
                        </div>
                    </div>
                    <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                        <span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                        <ul class="customer-links list-inline">
                            <li><a href="{{route('dashboard')}}">Account</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('register')}}">Create Account</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Top Header-->
        <!--Header-->
        <div class="header-wrap animated d-flex">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!--Desktop Logo-->
                    <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                        @php
                        $logo = App\Models\Logo::get()->last();
                        @endphp
                        <a href="{{route('welcome')}}">
                            <img src="{{url('photos/'.$logo->image)}}" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                        </a>
                    </div>
                    <!--End Desktop Logo-->
                    <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                        <div class="d-block d-lg-none">
                            <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                                <i class="icon anm anm-times-l"></i>
                                <i class="anm anm-bars-r"></i>
                            </button>
                        </div>
                        <!--Desktop Menu-->
                        <nav class="grid__item" id="AccessibleNav">
                            <!-- for mobile -->

                            <ul id="siteNav" class="site-nav medium center hidearrow">
                                <li class="lvl1 parent dropdown"><a href="#">Home Furniture <i class="anm anm-angle-down-l"></i></a>
                                    @php
                                    $catagories = App\Models\Catagory::where('nav',"=",'Home Furniture')->get();
                                    @endphp
                                    <ul class="dropdown">
                                        @foreach($catagories as $catagory)
                                        @if($catagory->status == "enable")
                                        <li><a href="{{'/catagory/'.$catagory->id}}" class="site-nav">{{$catagory->catagoryName}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="lvl1 parent dropdown"><a href="#">Office Furniture <i class="anm anm-angle-down-l"></i></a>
                                    @php
                                    $catagories = App\Models\Catagory::where('nav',"=",'Office Furniture')->get();
                                    @endphp
                                    <ul class="dropdown">
                                        @foreach($catagories as $catagory)
                                        @if($catagory->status == "enable")
                                        <li><a href="{{'/catagory/'.$catagory->id}}" class="site-nav">{{$catagory->catagoryName}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="lvl1 parent dropdown"><a href="#">Interrior <i class="anm anm-angle-down-l"></i></a>
                                    @php
                                    $catagories = App\Models\Catagory::where('nav',"=",'Interior')->get();
                                    @endphp
                                    <ul class="dropdown">
                                        @foreach($catagories as $catagory)
                                        @if($catagory->status == "enable")
                                        <li><a href="{{'/catagory/'.$catagory->id}}" class="site-nav">{{$catagory->catagoryName}}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>




                                @php
                                $navItems = App\Models\Navbar::all();
                                @endphp
                                @foreach($navItems as $nav)
                                @if($nav->status == "enable")
                                <li class="lvl1 parent megamenu"><a href="{{$nav->url}}"> {{$nav->title}}<i class="anm anm-angle-down-l"></i></a>
                                </li>
                                @endif
                                @endforeach
                                <li><a href="{{ route('gallery') }}">Gallery</a></li>

                            </ul>
                        </nav>
                        <!--End Desktop Menu-->
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                        <div class="logo">
                            @php
                            $logo = App\Models\Logo::get()->last();
                            @endphp
                            <a href="{{route('welcome')}}">
                                <img src="{{url('photos/'.$logo->image)}}" alt="Belle Multipurpose Html Template" title="Belle Multipurpose Html Template" />
                            </a>

                        </div>
                    </div>
                    <div class="col-4 col-sm-3 col-md-3 col-lg-2">

                        <div class="site-cart">
                            <a href="{{route('shoppingCart')}}" title="Cart" style="font-size: large;">
                                <i class="icon anm anm-bag-l"></i>

                            </a>
                        </div>
                        <div>
                            <a href="{{url('/view-wishlist')}}" class="site-cart" style="font-size: large; margin-right:15px;"> <i class="icon anm anm-heart-l" aria-hidden="true"></i></a>
                        </div>
                        <!----   <div id="header-cart" class="block block-cart" >
                            <ul class="mini-products-list"></ul>
                            <div class="total">
                                <div class="total-in">
                                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money" id="cartTotal">$0.00</span></span>
                                </div>
                                <div class="buttonSet text-center">
                                    <a href="{{route('shoppingCart')}}" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="checkout.html" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div> ---->
                        <div class="site-header__search">
                            <button type="button" class="search-trigger"><i class="icon anm anm-search-l"></i></button>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End Header-->

    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
        <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
            <li class="lvl1 parent megamenu"><a href="index.html">Home </a>
            </li>
            <li class="lvl1 parent dropdown"><a href="#">Home Furniture <i class="anm anm-plus-l"></i></a>
                <ul>


                </ul>
            </li>
            <li class="lvl1 parent dropdown"><a href="#">Office Furniture <i class="anm anm-plus-l"></i></a>
                <ul>


                </ul>
            </li>
            <li class="lvl1 parent dropdown"><a href="#">Interrior<i class="anm anm-plus-l"></i></a>
                <ul>


                </ul>
            </li>
            @php
            $navItems = App\Models\Navbar::all();
            @endphp
            @foreach($navItems as $nav)
            @if($nav->status == "enable")
            <li class="lvl1 parent megamenu"><a href="{{$nav->url}}"> {{$nav->title}}<i class="anm anm-angle-down-l"></i></a>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <!--End Mobile Menu-->
    <!----------------------------------------------- Page content Start ---------------------------------------------->


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
    <script src="{{ asset('assets/js/cart.js' )}}"></script>
    <script src="{{ asset('assets/alertifyjs/alertify.min.js' )}}"></script>
    <!--End Instagram Js-->