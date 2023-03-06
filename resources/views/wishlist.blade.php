@extends('masterUser')
@section('wishlist')


<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Wish List</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <form action="#">
                    <div class="wishlist-table table-content table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name text-center alt-font">Remove</th>
                                    <th class="product-price text-center alt-font">Images</th>
                                    <th class="product-name alt-font">Product</th>
                                    <th class="product-price text-center alt-font">Unit Price</th>
                                    <th class="stock-status text-center alt-font">Stock Status</th>
                                    <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if(Session::has('wishlist'))
                                @foreach( Session::get('wishlist') as $product)
                                <tr>
                                    <td class="text-center" valign="middle">
                                        <form action="">

                                            <input type="hidden" class="pro-id" value="{{$product->id}}" />
                                            <input type="hidden" class="pro-sku" value="{{$product->sku}}" />

                                            <button class="btn btn-remove" type="button" tabindex="0"><i class="icon icon anm anm-times-l"></i></button>
                                        </form>
                                    </td>
                                    <td class="product-thumbnail text-center">
                                        <a href=""><img src="{{url('photos/'. $product->thumbnail) }}" alt="" title="" /></a>
                                    </td>
                                    <td class="product-name">
                                        <h4 class="no-margin"><a href="#">{{$product->name}}</a></h4>
                                    </td>
                                    <td class="product-price text-center"><span class="amount">{{$product->price}}</span></td>
                                    <td class="stock text-center">
                                        <span class="in-stock">in stock</span>
                                    </td>
                                    <td class="product-subtotal text-center">
                                        <form action="">

                                            <input type="hidden" class="pro-id" value="{{$product->id}}" />
                                            <input type="hidden" class="pro-sku" value="{{$product->sku}}" />

                                            <button class="btn btn-small btn-submit" type="button" tabindex="0">Add To Cart</button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--End Body Content-->


<!---Toastr message ajax---------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>




<script type="text/javascript">
    $(".btn-submit").click(function(e) {
        e.preventDefault();

        var $button = $(this);
        var productId = $button.parent().find("input:even").val();
        var productSku = $button.parent().find("input:odd").val();
        //console.log(productId, productSku);
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
<script>

$(".btn-remove").click(function(e) {
        e.preventDefault();

        var $button = $(this);
        var productId = $button.parent().find("input:even").val();
        var productSku = $button.parent().find("input:odd").val();
        console.log(productId, productSku);
     

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('removeWishlistProduct') }}",
            data: {
                productId: productId,
                productSku: productSku,
              
            },
            success: function(data) {
                toastr.success(data.success);
            }
        });

    });

</script>



@endsection