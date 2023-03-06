@extends('masterUser')
@section('shopping_cart')

<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Your cart</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col cart-detail-row">
                <form action="#" method="post" class="cart style2">
                    <table>
                        <thead class="cart__row cart__header">
                            <tr class="text-center">
                                <th colspan="2">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody id="CartBody">
                            @if(Session::get('cart'))
                            @foreach( Session::get('cart') as $product)
                            <tr style="text-align: center;">
                                <td colspan="2"><img src="{{url('photos/'. $product->thumbnail) }}" alt="" style="width:100px;height:100px;"> {{' '.$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td class="pro-quantity">
                                    <form action="#" class="display-flex">
                                        <input type="hidden" value="{{$product->sku}}" id="prod-sku">
                                        <div class="d-flex flex-row justify-content-between">
                                            <button class="button-qty inc" type="button">
                                                <i class="fa fa-plus"></i></button>
                                             <input type="text" value="{{$product->qty}}" readonly id="prod-qty">
                                            <input type="hidden" value="{{$product->id}}" id="prod-id">
                                            
                                            <button class="button-qty dec" type="button">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td>{{$product->price * $product->qty}}</td>
                                <td>
                                    <form action="{{route('removeCartProduct')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" value="{{$product->sku}}" name="product_sku" id="product_sku">
                                        <button type="submit" class="remove">remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-left"><a href="{{route('welcome')}}" class="btn  cart-continue"><i class="icon icon-arrow-circle-left"></i> Continue shopping</a></td>
                                <td colspan="3" class="text-right"><button type="submit" name="update" class="btn  cart-update"><i class="fa fa-refresh"></i> Update</button></td>
                            </tr>
                        </tfoot>
                    </table>


                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">

                <div class="solid-border">
                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money" id="Subtotal">{{$subTotal}}</span></span>
                    </div>

                    <a style="margin-top: 20px;" href="{{route('checkoutPage')}}" class="btn btn--small-wide checkout">Go for checkout</a>

                </div>

            </div>
        </div>
    </div>

</div>
<!--End Body Content-->



<script type="text/Javascript">

        $(".button-qty").click(function(e){
        e.preventDefault();

        var $button = $(this);
        var oldQuantity = $button.parent().find("input:even").val();
        var productId = $button.parent().find("input:odd").val();
        var productSku = $button.parent().prev().val();
        console.log(oldQuantity,productId,productSku);
        var newQuantity;
        $button.blur();
        if ($button.hasClass("inc")) {
            newQuantity = parseFloat(oldQuantity) + 1;
        } 
        else {
        if (oldQuantity > 1) {
            newQuantity = parseFloat(oldQuantity) - 1;
        } else {
            newQuantity = 1;
        }
        }
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type:'POST',
            url:"{{ route('updateShoppingCart') }}",
            data:{productId:productId, newQuantity:newQuantity, productSku:productSku},
            success:function(data){
                var productPrice = $button.parents(".pro-quantity").prev().text();
                $button.parent().find("input:even").val(newQuantity);
                $button.parents(".pro-quantity").next().text(newQuantity * productPrice);

                var cart = JSON.parse(data.cart);
                var subTotal = cart.reduce(function(accumulator,currentItem){
                    return accumulator + (currentItem.qty * currentItem.price);
                },0);
                var grandTotal = subTotal ;
                //console.log(grandTotal);
                $button.parents(".cart-detail-row").next().find("span.money").text(subTotal);
                //$button.parents(".cart-detail-row").next().find("td.grand-total").text(grandTotal);
                
            }
        });

    
    });
      </script>


@endsection