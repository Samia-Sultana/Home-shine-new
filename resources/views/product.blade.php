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
                                <h4 class="title nk-block-title">Product Input Section</h4>

                            </div>
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Add Product</h5>
                                </div>
                                <form enctype="multipart/form-data" method="POST" action="{{ route('createProduct') }}" class="d-flex">
                                    @csrf
                                    <div class="row">
                                        <div class="">
                                            <label for="productName">Product Name</label><br>
                                            <input type="text" id="productName" name="productName" value=""><br>



                                        </div>

                                        <div class="">
                                            <label for="thumbnail">Thumbnail Image</label><br>
                                            <input type="file" id="thumbnail" name="thumbnail" value=""><br><br>

                                            <label for="image">images</label><br>
                                            <input type="file" id="image" name="images[]" multiple="multiple" /><br><br>


                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="p-2">
                                            <label for="catagory">Choose a catagory:</label>
                                            <select name="catagory" id="catagory">
                                                @foreach($catagories as $catagory )
                                                @if($catagory->status == "enable")
                                                <option value="{{$catagory->catagoryName}}">{{$catagory->catagoryName}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            </br></br>



                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <label for="" description>Description</label>

                                                <textarea class="form-control" type="text" id="description" name="description" value="" cols="70" rows="50"> </textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3" style="text-align:center;">
                                            <input type="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div><!-- card -->
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">All Products</h5>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th class="pro-id">Id</th>
                                                <th class="pro-sku">SKU</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-available">Available</th>
                                                <th class="pro-remove">Delete</th>
                                                <th class="pro-update">Update</th>
                                                <th class="pro-status">status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($allProducts as $product)
                                            <tr>

                                                <td>{{$product->product_id}}</td>
                                                <td>{{$product->sku}}</td>
                                                <td>{{$product->unitPrice}}</td>
                                                <td>{{$product->totalStock}}</td>
                                                <td>
                                                    <form action="{{route('deleteProduct')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$product->product_id}}" name="product_id">
                                                        <input type="hidden" value="{{$product->sku}}" name="sku">
                                                        <button type="submit" class="btn btn-danger btn-delete-product">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <input type="hidden" value="{{$product->product_id}}">
                                                    <button type="button" class="btn btn-primary update-button" data-toggle="modal" data-target="{{'#update_product_'.$product->product_id}}">
                                                        Update
                                                    </button>
                                                    <div class="modal fade" id="{{'update_product_' . $product->product_id}}" tabindex="-1" role="dialog" aria-labelledby="update_product_lebel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="update_product_lebel">Update Product</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" class="d-flex" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="p-1">
                                                                            <input type="hidden" id="update_productId" name="update_productId" value="{{$product->product_id}}">

                                                                            <input type="hidden" id="update_sku" name="update_sku" value="{{$product->sku}}">

                                                                            <label for="update_price"> Unit Price</label><br>
                                                                            <input type="text" id="update_price" name="update_price" value="{{$product->unitPrice}}"><br><br>

                                                                            <label for="update_thumbnail">Thumbnail Image</label><br>

                                                                            <input type="file" id="update_thumbnail" name="update_thumbnail" value=""><br><br>

                                                                            <label for="update_image">images</label><br>
                                                                            <input type="file" id="update_image" name="update_images[]" multiple="multiple" /><br><br>

                                                                            <label for="update_quantity"> Quantity</label><br>
                                                                            <input type="text" id="update_quantity" name="update_quantity" value="{{$product->totalStock}}"><br><br>



                                                                        </div>



                                                                        <div class="row">
                                                                            <?php
                                                                            $productDetail = App\Models\Product::find($product->product_id);

                                                                            ?>
                                                                           
                                                                            <textarea class="form-control" type="text" id="{{'update_description_' . $product->product_id}}" name="{{'update_description_' . $product->product_id}}" cols="30" rows="10">{{ $productDetail->description}} </textarea>

                                                                        </div>

                                                                    </form>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary btn-update-product">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal -->

                                                </td>
                                                <td>
                                                    <select name="status" id="status" class="btn btn-success status">
                                                        <option data-display="{{$product->status}}">{{$product->status}}</option>
                                                        <option value="enable">Enable</option>
                                                        <option value="disable">Disable</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div>
                                    {{$allProducts->links()}}
                                </div>
                            </div>

                        </div>


                    </div><!-- .nk-block -->

                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
<!-- Including Jquery -->
<script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery.cookie.js')}}"></script>
<script src="{{asset('assets/js/vendor/wow.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/instagram-feed.js')}}"></script>
<!-- Including Javascript -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/lazysizes.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/cart.js')}}"></script>
<script src="{{asset('assets/alertifyjs/alertify.min.js')}}"></script>
<!--End Instagram Js-->

<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js')}}"></script>
<script src="{{ asset('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js')}}"> </script>
<script src="{{ asset('http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap-modal.js')}}"></script>
<script src="{{ asset('bootstrap/js/bootstrap-transition.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
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



<!--=====CKeditor=====-->
<script src="{{asset('adminFrontend/assets/js/ckeditor/ckeditor.js')}}"></script>


<script>
    CKEDITOR.replace('description');
</script>
<script type="text/Javascript">
    var editor;
     $(".update-button").click(function(e){
        e.preventDefault();

        var $button = $(this);
        var content = 'update_description_' + $button.prev().val();
       
        editor = CKEDITOR.replace(content);

     });

     $(".btn-update-product").on("click", function() {
    
    var $button = $(this);
    var id = $button.parent().prev().find("input#update_productId").val();
    var sku =$button.parent().prev().find("input#update_sku").val();
    var price = $button.parent().prev().find("input#update_price").val();
    var quantity =$button.parent().prev().find("input#update_quantity").val() ;
   
    var editordata = editor.getData();
    var thumbnail = $button.parent().prev().find("input#update_thumbnail")[0].files;
    var multiImage = $button.parent().prev().find("input#update_image")[0].files;
    var totalImage = $button.parent().prev().find("input#update_image")[0].files.length;
console.log(editordata);
    var fd = new FormData();
    fd.append('id',id);
    fd.append('price',price);
    fd.append('quantity',quantity);
    fd.append('sku',sku);
    fd.append('editordata',editordata);
    fd.append('thumbnail',thumbnail[0]);
    fd.append('totalImage', totalImage);

    let images = $button.parent().prev().find("input#update_image")[0].files;
   
    for (let i = 0; i < totalImage; i++) {
        
        fd.append('images' + i, images[i]);
            }
 
$.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
            type:'POST',
            url:"{{ route('updateProduct') }}",
            data: fd,
            contentType: false,
            processData: false,
            dataType: 'json',
            success:function(data){
                toastr.success(data.success);
          }
       });
  
    });
    
    
</script>


<script type="text/Javascript">

    

    $(".status").on("change", function() {
        var $select = $(this);
        var id = $select.parent().prev().find("input#update_productId").val();
        var sku =$select.parent().prev().find("input#update_sku").val();
        var status = $select.val();

        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
            type:'POST',
            url:"{{ route('updateStatus') }}",
            data: {id:id,sku:sku,status:status},
            success:function(data){
                toastr.success(data.success);
          }
       });
        

    });
    
    
    

</script>
@endsection



<!--  --->