@extends('masterAdmin')
@section('adminProduct')

<!-- content @s -->
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">stock update Section</h4>
                                                <div class="nk-block-des">
                                                    <p>You can make style out your setting related form as per below example.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">Product Setting</h5>
                                                </div>
                                                <form enctype="multipart/form-data" method="POST" action="{{ route('updateStock') }}">
            @csrf
<label for="product_id">Choose a product:</label>
    <select name="product_id" id="product_id" >
        @foreach($products as $product )
        <option value="{{$product->id}}">{{$product->productName}}</option>
        @endforeach
    </select></br></br>

  <label for="sku">sku</label><br>
  <input type="text" id="sku" name="sku" value=""></br></br>

  <label for="price"> Unit Price</label><br>
  <input type="text" id="price" name="price" value=""><br><br>

  <label for="quantity"> Total quantity</label></br>
    <input type="text" id="quantity" name="quantity" value="">

    <input type="submit" value="Submit">
        </form>
                                              
                                            </div>

                                        </div><!-- card -->

                                    </div><!-- .nk-block -->

                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

                @endsection


                
<!--  --->