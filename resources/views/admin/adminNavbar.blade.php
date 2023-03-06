                

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{route('admin.dashboard')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                            <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                              
                                <li class="nk-menu-item">
                                    <a href="{{ route('logo') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Logo</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('navbar') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Navbar</span>
                                    </a>
                                </li><!-- .nk-menu-item -->

                                <li class="nk-menu-item">
                                    <a href="{{ route('slider') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                        <span class="nk-menu-text">Slider</span><span class="nk-menu-badge">new</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('socialMedia') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                        <span class="nk-menu-text">Social Media</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                

                             
                                
                                <!----<li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                        <span class="nk-menu-text">Products</span>
                                    </a>---->
                                   
                                        <li class="nk-menu-item">
                                            <a href="{{ route('catagory') }}" class="nk-menu-link"><span class="nk-menu-text">Add Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('product') }}" class="nk-menu-link"><span class="nk-menu-text">Add Product</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('stock') }}" class="nk-menu-link"><span class="nk-menu-text">Update Stock</span></a>
                                        </li>
                                  
                 <!---               </li> -->

                                <li class="nk-menu-item">
                                    <a href="{{ route('order') }}" class="nk-menu-link ">
                                        <span class="nk-menu-text">Orders</span>
                                    </a>
                                </li>    
                                
                               <!--- <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                        <span class="nk-menu-text">Blog</span>
                                    </a> ---->
                                  
                                        <li class="nk-menu-item">
                                            <a href="{{ route('blog') }}" class="nk-menu-link"><span class="nk-menu-text">Blog</span></a>
                                        </li>
                                      
                                 <!-- .nk-menu-sub -->
                              <!---  </li> -->
                              <li class="nk-menu-item">
                              <a href="{{ route('viewContact') }}" class="nk-menu-link"><span class="nk-menu-text">Contact us message</span></a>
                              </li>
                              <li class="nk-menu-item">
                              <a href="{{ route('viewFaq') }}" class="nk-menu-link"><span class="nk-menu-text">Question and Answer</span></a>
                              </li>
                              <li class="nk-menu-item">
                              <a href="{{ route('photos') }}" class="nk-menu-link"><span class="nk-menu-text">Gallery</span></a>
                              </li>
                              


                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">

            




                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Admin Name</div>
                                                    <div class="user-name dropdown-indicator">{{ Auth::guard('admin')->user()->name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AD</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::guard('admin')->user()->name }}</span>
                                                        <span class="sub-text">({{ Auth::guard('admin')->user()->email }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">

                                                    <form method="POST" action="{{ route('admin.logout') }}">
                                                    @csrf      
                                                    <button type="submit" class="btn btn-white btn-dim btn-outline-danger">Logout</button>
                                              
                                                    </form>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->

                <!----------------------------------------------- Body Part Start ---------------------------------------------->