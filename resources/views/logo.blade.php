@extends('masterAdmin')
@section('adminLogo')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">

                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Add Website Logo</h5>
                                </div>

                                <form class="gy-3" enctype="multipart/form-data" method="POST" action="{{ route('createLogo') }}">
                                    @csrf

                                    <div class="row g-3 align-center">

                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div><!-- card -->
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">All Logos</h5>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th> -->
                                                <th class="pro-id">Id</th>
                                                <th class="pro-thumb">Logo</th>
                                                <th class="pro-remove">Delete</th>
                                                <th class="pro-status">status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($logos)
                                            @foreach($logos as $logo)
                                            <tr>

                                                <td>{{$logo->id}}</td>

                                                <td><img src="{{ url('photos/'.$logo->image) }}" width="140" height="150"></td>
                                                <td>
                                                    <form action="{{route('deleteLogo')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$logo->id}}" name="logo_id" id="logo_id">
                                                        <button type="submit" class="btn btn-danger btn-delete-catagory">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <select name="status" id="status" class="btn btn-success status">
                                                        <option data-display="{{$logo->status}}">{{$logo->status}}</option>
                                                        <option value="enable">Enable</option>
                                                        <option value="disable">Disable</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            @endforeach
                                            @endif

                                </div>
                            </div>

                        </div>

                    </div><!-- .nk-block -->

                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/Javascript">
    $(".status").on("change", function() {
        var $select = $(this);
        var id = $select.parent().prev().find("input#logo_id").val();
        var status = $select.val();
        console.log(id,status);
        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
            type:'POST',
            url:"{{ route('updateLogoStatus') }}",
            data: {id:id,status:status},
            success:function(data){
                console.log('hiiiiiiiiiiiiiiiiii');
          }
       });
        

    });
</script>


@endsection