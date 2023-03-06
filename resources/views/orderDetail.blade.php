<!DOCTYPE html>
<html lang="en">

<head>
<base href="./">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('adminFrontend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>DashLite Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('adminFrontend/assets/css/dashlite.css?ver=3.1.1')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('adminFrontend/assets/css/theme.css?ver=3.1.1')}}">


    
    <!--======== Bootstrap 4.6===-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!--======== font awesome===-->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <!---======= owl carousel======-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    <!---======= Header css-->
    <link rel="stylesheet" href="{{asset('assets/css/header-css/reset.min.css')}}">
    <!---==========zoom css=========-->
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/easyzoom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <style>
        body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}


        </style>
</head>
<body>
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #{{$data[0]}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="{{url('/admin/view/invoice/'.$data[0])}}" target="_blank" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    view invoice
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="{{url('/admin/invoice/'.$data[0].'/generate')}}"  data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    download
                </a>
            </div>
            <div class="my-5">
                        <level for="status">Status</level>
                        <form enctype="multipart/form-data" method="POST" action="">
                            @csrf
                            <input type="hidden" value="{{$data[0]}}" id="order_id" name="order_id" class="order_id">
                        <select name="status" id="status" >
                           <option data-display="{{$data[1]->status}}">{{$data[1]->status}}</option>
                            <option value="pending">pending</option>
                            <option value="processing">processing</option>
                            <option value="complete">complete</option>
                        </select>
                        <input type="submit" value="Submit" />
                        </form>
                    </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Maknoon Lifestyle</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$data[3]}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                               Address:
                            </div>
                            <div class="my-1"><b class="text-600">{{$data[1]->address}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$data[0]}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span>{{$data[1]->created_at}}</div>

                            
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                
                        <div class="col-9 col-sm-5">Product id</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        <div class="col-2">Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        
                   @foreach($data[2] as $order)
                   <div class="row mb-2 mb-sm-0 py-25">
                          
                          <div class="col-9 col-sm-5">{{$order->product_id}}</div>
                          <div class="d-none d-sm-block col-2">{{$order->quantity}}</div>
                          <div class="d-none d-sm-block col-2 text-95">{{$order->singlePrice}}</div>
                          <div class="col-2 text-secondary-d2">{{$order->quantity * $order->singlePrice}}</div>
                      </div>
                   @endforeach

                       
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">{{$data[5]}}</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Shipping
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">150</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">{{$data[5]+150}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>





 <!---=====jquery====-->
 <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--=====popper js=====-->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!--=====bootstrap=====-->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!--=====Owl carousel=====-->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--=====header script=====-->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!--=====header script=====-->
    <script src="{{asset('assets/js/main.js')}}"></script>
   <script type="text/Javascript">



</body>
</html>