@extends('masterUser')
@section('blogGrid')


<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center mb-0">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Blog Gridview</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Blog Gridview</span>
        </div>
    </div>
    <div class="container">
        <div class="row">
           
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                <div class="custom-search">
                    <form action="http://annimexweb.com/search" method="get" class="input-group search-header search" role="search" style="position: relative;">
                        <input class="search-header__input search__input input-group__field" type="search" name="q" placeholder="Search" aria-label="Search" autocomplete="off">
                        <span class="input-group__btn"><button class="btnSearch" type="submit"> <i class="icon anm anm-search-l"></i> </button></span>
                    </form>
                </div>
                <div class="blog--list-view">
                    <div class="row">
                        <!-- Article Image -->
                        @if($blogs)
                        @foreach($blogs as $blog)
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 article">
                            <!-- Article Image -->
                            <a class="article_featured-image" href="{{url('/blog/'.$blog->id.'/view')}}"><img class="blur-up lazyload" data-src="{{url('photos/' . $blog->image)}}" src="{{url('photos/' . $blog->image)}}" alt=""></a>
                            <h2 class="h3"><a href="{{url('/blog/'.$blog->id.'/view')}}">{{$blog->title}}</a></h2>
                            <ul class="publish-detail">
                                <li><i class="anm anm-user-al" aria-hidden="true"></i> User</li>
                                <li><i class="icon anm anm-clock-r"></i> <time datetime="2017-05-02">{{$blog->created_at->format('d M Y')}}</time></li>
                            </ul>
                            <div class="rte">
                                <?php
                                $blogModel = App\Models\Blog::find($blog->id);
                                $blogDesc = html_entity_decode($blogModel['description']);
                                $substringBlog = substr($blogDesc, 0, 200);
                                echo $substringBlog;
                                ?>
                            </div>
                            <p><a href="{{url('/blog/'.$blog->id.'/view')}}" class="btn btn-secondary btn--small">Read more <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <hr />
                    <div class="pagination">
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
            <!--End Main Content-->
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