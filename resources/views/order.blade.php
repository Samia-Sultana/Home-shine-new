@extends('masterAdmin')
@section('adminOrder')

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


                        <div class="nk-content ">
                            <div class="container-fluid">
                                <div class="nk-content-inner">
                                    <div class="nk-content-body">
                                        <div class="components-preview wide-md mx-auto">


                                            <div class="nk-block nk-block-lg">
                                                <div class="nk-block-head">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="title nk-block-title">order Section</h4>
                                                        <div class="nk-block-des">
                                                            <p>You can make style out your setting related form as per below example.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Cart Table Area -->
                                                <div class="cart-table table-responsive">
                                                    <div style="overflow-x: auto;">
                                                        <table class="table table-bordered display" id="example" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="pro-thumbnail">Order id</th>

                                                                    <th class="pro-remove">Status</th>
                                                                    <th class="pro-remove">Details</th>
                                                                    <th>Change status</th>
                                                                </tr>
                                                            </thead>
                                                            @if($orders)
                                                            <tbody>
                                                                @foreach($orders as $order)
                                                                <tr>
                                                                    <td class="pro-size">{{$order->id}}</td>

                                                                    <td class="pro-subtotal tk-part">{{$order->status}}</td>
                                                                    <td class="pro-remove">

                                                                        <a class="btn bg-white btn-light mx-1px text-95" href="{{url('/admin/view/invoice/'.$order->id)}}" target="_blank" data-title="Print">
                                                                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                                                                            view invoice
                                                                        </a>
                                                                        <a class="btn bg-white btn-light mx-1px text-95" href="{{url('/admin/invoice/'.$order->id.'/generate')}}" data-title="PDF">
                                                                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                                                            download
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <form enctype="multipart/form-data" action="">
                                                                            @csrf
                                                                            <input type="hidden" value="{{$order->id}}" id="order_id" name="order_id" class="order_id">
                                                                            <select name="status" id="status">
                                                                                <option data-display="{{$order->status}}">{{$order->status}}</option>
                                                                                <option value="pending">pending</option>
                                                                                <option value="processing">processing</option>
                                                                                <option value="complete">complete</option>
                                                                            </select>
                                                                            <button type="button" class="btn btn-success button-status">Submit</button>
                                                                        </form>
                                                                    </td>

                                                                </tr>
                                                                @endforeach

                                                            </tbody>
                                                            @endif
                                                            <tfoot>
                                                            <tr>
                                                                    <th class="pro-thumbnail">Order id</th>

                                                                    <th class="pro-remove">Status</th>
                                                                    <th class="pro-remove">Details</th>
                                                                    <th>Change status</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- JavaScript -->
                            <script src="{{ asset('adminFrontend/assets/js/bundle.js?ver=3.1.1')}}"></script>
                            <script src="{{ asset('adminFrontend/assets/js/scripts.js?ver=3.1.1')}}"></script>

                            <!-- Including Jquery -->
                            <script src="{{ asset('assets/js/jquery-3.6.0.min.js')}}"></script>
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
                                <!------data tables --------------->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


<script type="text/Javascript">

$(document).ready(function () {

// Setup - add a text input to each footer cell
$('#example thead tr')
.clone(true)
.addClass('filters')
.appendTo('#example thead');

var table = $('#example').DataTable({
orderCellsTop: true,
fixedHeader: true,
initComplete: function () {
var api = this.api();

// For each column
api
.columns()
.eq(0)
.each(function (colIdx) {
// Set the header cell to contain the input element
var cell = $('.filters th').eq(
$(api.column(colIdx).header()).index()
);
var title = $(cell).text();
$(cell).html('<input type="text" placeholder="' + title + '" />');

// On every keypress in this input
$(
'input',
$('.filters th').eq($(api.column(colIdx).header()).index())
)
.off('keyup change')
.on('change', function (e) {
// Get the search value
$(this).attr('title', $(this).val());
var regexr = '({search})'; //$(this).parents('th').find('select').val();

var cursorPosition = this.selectionStart;
// Search the column for that value
api
.column(colIdx)
.search(
    this.value != ''
        ? regexr.replace('{search}', '(((' + this.value + ')))')
        : '',
    this.value != '',
    this.value == ''
)
.draw();
})
.on('keyup', function (e) {
e.stopPropagation();

$(this).trigger('change');
$(this)
.focus()[0]
.setSelectionRange(cursorPosition, cursorPosition);
});
});
},
});
});

</script>
                            <script type="text/Javascript">
                                $(".button-status").click(function(e){
e.preventDefault();

var $button = $(this);
var status = $button.parent().find("select").val();
var order_id = $button.parent().find("input.order_id").val();
console.log(status,order_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.ajax({
            type:'POST',
            url:"{{ route('orderStatus') }}",
            data:{order_id:order_id, status:status},
            success:function(data){
                
                toastr.success(data.success);
            }
        });


});
</script>


                    
                            @endsection