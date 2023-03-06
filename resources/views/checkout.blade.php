<!DOCTYPE html>
<html lang="en">

@extends('masterUser')
@section('checkout')

<div class="container">
    <!--Body Content-->
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper">
                    <h1 class="page-width">Checkout</h1>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">


            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom billing">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                    <form  method="POST" action="{{route('checkout')}}" enctype="multipart/form-data">
                        @csrf
                            <fieldset>
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="name">First Name <span class="required-f">*</span></label>
                                        <input name="name" id="name" value="" type="text" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="lastname">Last Name <span class="required-f">*</span></label>
                                        <input value="" id="lastName" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="email">E-Mail <span class="required-f">*</span></label>
                                        <input name="email" value="" id="email" type="email" required>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="phone">Telephone <span class="required-f">*</span></label>
                                        <input name="phone" value="" id="phone" type="text" required>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="company">Company</label>
                                        <input name="company" value="" id="company" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="address">Address </label>
                                        <input name="address" value="" id="address" type="text" required >
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="city">Choose City </label>

                                        <select name="city" id="city" required>
                                            <option value="">Choose..</option>
                                            <option>Dhaka</option>
                                            <option>Rajshahi</option>
                                            <option>Barishal</option>
                                            <option>Sylhet</option>
                                            <option>Kushtia</option>
                                            <option>Chittagong</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                        <label for="zip">Postcode </label>
                                        <input type="text" name="zip" id="zip" required>
                                    </div>
                                </div>
                            </fieldset>
                            

                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-md-12 col-lg-12 col-xl-12 required">
                                        <label for="note">Order Notes <span class="required-f">*</span></label>
                                        <textarea class="form-control resize-both" id="note" name="note" rows="3" required></textarea>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="order-button-payment">
                                <button class="btn btn-primary btn-lg btn-block checkout-btn" type="submit"> PLACE ORDER </button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table">
                                <h3 style="text-align: center;color:red; font-size:larger">Shipping cost will be added</h3>
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>

                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($cart)
                                        @foreach($cart as $item)
                                        <tr>
                                            <td class="text-left">{{$item->name}}</td>
                                            <td>{{$item->price}}</td>

                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->qty * $item->price }}</td>
                                        </tr>
                                        @endforeach
                                        @endif

                                    </tbody>
                                    <tfoot class="font-weight-600">
                                        <input type="hidden" value="{{$subTotal}}" class="subTotal">
                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td class="grandTotal">{{$subTotal}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr />


                        <div class="your-payment">
                            <!---------      <h2 class="payment-title mb-3">payment method</h2> ---------->
                            <div class="payment-method">
                                <!--------------payment
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">Direct Bank Transfer </a>
                                            </div>
                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">Cheque Payment</a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card margin-15px-bottom border-radius-none">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> PayPal </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="no-margin font-15">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-2">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour"> Payment Information </a>
                                            </div>
                                            <div id="collapseFour" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <fieldset>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardname">Name on Card <span class="required-f">*</span></label>
                                                                <input name="cardname" value="" placeholder="Card Name" id="input-cardname" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-country">Credit Card Type <span class="required-f">*</span></label>
                                                                <select name="country_id" class="form-control">
                                                                    <option value=""> --- Please Select --- </option>
                                                                    <option value="1">American Express</option>
                                                                    <option value="2">Visa Card</option>
                                                                    <option value="3">Master Card</option>
                                                                    <option value="4">Discover Card</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cardno">Credit Card Number <span class="required-f">*</span></label>
                                                                <input name="cardno" value="" placeholder="Credit Card Number" id="input-cardno" class="form-control" type="text">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label for="input-cvv">CVV Code <span class="required-f">*</span></label>
                                                                <input name="cvv" value="" placeholder="Card Verification Number" id="input-cvv" class="form-control" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <label>Expiration Date <span class="required-f">*</span></label>
                                                                <input type="date" name="exdate" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                                <img class="padding-25px-top xs-padding-5px-top" src="assets/images/payment-img.jpg" alt="card" title="card" />
                                                            </div>
                                                        </div>
                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ------------>

                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Body Content-->


   
</div>






<script type="text/Javascript">
    $(".location").on("change", function() {

        var $select = $(this);
        var value = $select.val();
        console.log(value);
        
        if(value == 1){
            var locationTd = $select.parents(".billing").next().find("td.location").text("80");
            let subTotal = parseInt($select.parents(".billing").next().find("input.subTotal").val());
            let grandTotal = subTotal + 80;
            $select.parents(".billing").next().find("td.grandTotal").text(grandTotal);
        }
        else{
            var locationTd = $select.parents(".billing").next().find("td.location").text("150");
            let subTotal = parseInt($select.parents(".billing").next().find("input.subTotal").val());
            let grandTotal = subTotal + 150;
            $select.parents(".billing").next().find("td.grandTotal").text(grandTotal);
        }

        

    });

    </script>

<script>
    /* Set the width of the side navigation to 250px */
    function openNav() {
        if ($(window).width() > 600) {
            document.getElementById("mySidenav").style.width = "23vw";

        } else {
            document.getElementById("mySidenav").style.width = "90vw";
        }
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";

    }
</script>

@endsection