@extends('masterUser')
@section('services')
        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">FAQs</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                       
                        <div id="accordionExample">
                           
                            @if($faqs)
                        @foreach($faqs as $faq)
                            <div class="faq-body">
                                <h4 class="panel-title" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">{{$faq->question}}</h4>
                                <div id="collapseOne" class="collapse panel-content" data-parent="#accordionExample">{{$faq->answer}}</div>
                                @endforeach
                        @endif
                          
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
        <!--End Body Content-->

      

        <!-- Including Jquery -->
        <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="assets/js/vendor/jquery.cookie.js"></script>
        <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
        <script src="assets/js/vendor/wow.min.js"></script>
        <!-- Including Javascript -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/lazysizes.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/cart.js"></script>
@endsection