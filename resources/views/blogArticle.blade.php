@extends('masterUser')
@section('blogArticle')
       

        <!--Body Content-->
        <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center mb-0">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Blog Article</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="bredcrumbWrap">
                <div class="container breadcrumbs">
                    <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                    <a href="blog-left-sidebar.html" title="Back to News">News</a><span aria-hidden="true">›</span><span>Blog Article</span>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!--Main Content-->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                        <div class="blog--list-view">
                           @if($blog)
                           <div class="article">
                                <!-- Article Image -->
                                <a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="{{url('photos/' . $blog->image)}}" src="{{url('photos/' . $blog->image)}}" alt="It's all about how you wear"></a>
                                <h1><a href="blog-left-sidebar.html">{{$blog->title}}</a></h1>
                                <ul class="publish-detail">
                                    <li><i class="anm anm-user-al" aria-hidden="true"></i> User</li>
                                    <li><i class="icon anm anm-clock-r"></i> <time datetime="2017-05-02">{{$blog->created_at->format('d M Y')}}</time></li>
                                    <li>
                                        
                                    </li>
                                </ul>
                                <div class="rte">
                                <?php
                                $blogDesc = html_entity_decode($blog['description']);
                                echo $blogDesc;
                                ?>
                                </div>
                                <hr/>
                                
                                
                            </div>
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