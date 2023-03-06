@extends('masterUser')
@section('login')

 <!--Body Content-->
 <div id="page-content">
            <!--Page Title-->
            <div class="page section-header text-center">
                <div class="page-title">
                    <div class="wrapper">
                        <h1 class="page-width">Login</h1>
                    </div>
                </div>
            </div>
            <!--End Page Title-->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                        <div class="mb-4">


                                <form method="POST" action="{{ route('login') }}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                                    @csrf
                                    <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="CustomerEmail">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" id="CustomerEmail" name="email"  required>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="CustomerPassword">Password</label> 
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="CustomerPassword" name="password"  required>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="submit" class="btn mb-3" value="Sign In">
                                        <p class="mb-4">
                                            <a href="#" id="RecoverPassword">Forgot your password?</a> &nbsp; | &nbsp;
                                            <a href="register.html" id="customer_register_link">Create account</a>
                                        </p>
                                    </div>
                                </div>
                                   
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- wrap @e -->
            

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=3.1.1')}}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.1.1')}}"></script>
@endsection