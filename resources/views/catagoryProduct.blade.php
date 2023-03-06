@extends('masterUser')
@section('catagoryProducts')


<!--Body Content-->
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"><img height="100" width="100" style="object-fit: cover;" class="blur-up lazyload" data-src="assets/images/slideshow-banners/home5-banner1.jpg" src="assets/images/slideshow-banners/home5-banner1.jpg" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper">
                <h1 class="collection-hero__title page-width">Shop </h1>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->

    <div class="container  mt-5">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    <!--Categories-->
                    <div class="sidebar_widget categories filter-widget">
                        <div class="widget-title">
                            <h2>Categories</h2>
                        </div>
                        <div class="widget-content">
                            <ul class="sidebar_categories">
                                @php
                                $navItems = App\Models\Catagory::all();
                                @endphp
                                @foreach($catagories as $catagory)
                                @if($catagory->status == "enable")
                                <li class="lvl-1"><a href="{{'/catagory/'.$catagory->id}}" class="site-nav">{{$catagory->catagoryName}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Categories-->
                </div>
            </div>
            <!--End Sidebar-->
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                <!-- <div class="category-description">
                            <h3>Category Description</h3>

                        </div>
                        <hr> -->
                <div class="productList product-load-more">
                    <!--Toolbar-->
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-6 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: 22</span>
                                </div>
                                <div class="col-6 col-md-4 col-lg-6 text-right">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort</label>
                                        <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                            <option value="title-ascending" selected="selected">Sort</option>
                                            <option>Price, low to high</option>
                                            <option>Price, high to low</option>

                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->
                    <div class="grid-products grid--view-items">
                        <div class="row">
                            @foreach($catagoryProducts as $item)
                            @php
                            $stocksOfProduct = App\Models\Stock::where('product_id',$item->id)->get();
                            @endphp
                            @foreach($stocksOfProduct as $stock)
                            @if($stock->status == "enable")

                            <div class="col-12 col-md-3 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="{{'/product/details/' . $item->id. '/' . $stock->sku}}" class="grid-view-item__link">
                                        <!-- image -->
                                        <img src="{{url('photos/'. $item['image1'])}}" alt="image" title="product">
                                        <!-- End image -->
                                    </a>
                                    <!-- end product image -->
                                    <!-- Start product button -->
                                    <div class="variants add">
                                        <form action="">
                                            <input type="hidden" class="pro-id" value="{{$item->id}}" />
                                            <input type="hidden" class="pro-sku" value="{{$stock->sku}}" />
                                            <button class="btn btn-addto-cart cart-btn-alert btn-submit " type="button" tabindex="0">Add To Cart</button>
                                        </form>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="{{'/product/details/' . $item->id. '/' . $stock->sku}}">{{$item->productName}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">{{"BDT ".$stock->unitPrice}}</span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                           
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="infinitpaginOuter">
                    <div class="infinitpagin">
                        {{$catagoryProducts->links()}}
                    </div>
                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>

</div>
<!--End Body Content-->







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
<!---- toastr message ajax ------>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>


<script type="text/javascript">
        $(".btn-submit").click(function(e) {
            e.preventDefault();

            var $button = $(this);
            var productId = $button.parent().find("input:even").val();
            var productSku = $button.parent().find("input:odd").val();
            console.log(productId, productSku);
            var quantity = 1;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('addToCart') }}",
                data: {
                    productId: productId,
                    productSku: productSku,
                    quantity: quantity
                },
                success: function(data) {
                    toastr.success(data.success); 
                }
            });

        });
    </script>


@endsection