@extends('masterAdmin')
@section('contactView')

<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">

                            </div>
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">All Messages</h5>
                                </div>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th> -->
                                                <th class="pro-id">Id</th>
                                                <th class="pro-name">Name</th>
                                                <th class="pro-name">Email</th>
                                                <th class="pro-remove">Phone</th>
                                                <th class="pro-status">Subject</th>
                                                <th class="pro-status">Message</th>
                                                <th class="pro-status">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($allMessage)
                                            @foreach($allMessage as $message)
                                            <tr>
                                                <td>{{$message->id}}</td>
                                                <td>{{$message->name}}</td>
                                                <td>{{$message->email}}</td>
                                                <td>{{$message->phone}}</td>
                                                <td>{{$message->subject}}</td>
                                                <td>{{$message->message}}</td>
                                                <td>
                                                    <form action="{{route('deleteMessage')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$message->id}}" name="message_id" id="message_id">
                                                        <button type="submit" class="btn btn-danger btn-delete-catagory">Delete</button>
                                                    </form>
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
<!-- content @e -->

<!----Jquery----->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<!--=====popper js=====-->
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<!--=====bootstrap=====-->
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<!--=====Owl carousel=====-->
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<!--=====header script=====-->
<script src="{{ asset('assets/js/script.js')}}"></script>
<!--=====header script=====-->
<script src="{{ asset('assets/js/main.js')}}"></script>
<!--=====CKeditor=====-->
<script src="{{asset('adminFrontend/assets/js/ckeditor/ckeditor.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    CKEDITOR.replace('description');
</script>


<script type="text/Javascript">
    $(".status").on("change", function() {
        var $select = $(this);
        var id = $select.parent().prev().find("input#catagory_id").val();
        var status = $select.val();
        console.log(id,status);
        $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   $.ajax({
            type:'POST',
            url:"{{ route('updateCatagoryStatus') }}",
            data: {id:id,status:status},
            success:function(data){
                console.log('hiiiiiiiiiiiiiiiiii');
          }
       });
        

    });
</script>


@endsection


<!-- 
<form method="POST" action="{{ route('createCatagory') }}">
            @csrf
  <label for="catagoryName">Category name</label><br>
  <input type="text" id="catagoryName" name="catagoryName" value=""><br>
  <input type="submit" value="Submit">

        </form> -->