@extends('masterUser')
@section('userDashboard')
<!--Body Content-->
<div id="page-content" style="width: 80%;margin: 50px auto;">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Settings</a>
        </li>
        <li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-white btn-dim btn-outline-danger">Logout</button>

            </form>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <h2>Profile Informations</h2>

            <form method="POST" action="{{route('accountDetails')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="first-name">First Name <span class="required-f">*</span></label>
                        <input id="first-name" name="first-name" value="{{Auth::guard('web')->user()->name}}" type="text">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="last-name">Last Name <span class="required-f">*</span></label>
                        <input id="last-name" name="last-name" value="{{Auth::guard('web')->user()->lastname}}" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="email">Email <span class="required-f">*</span></label>
                        <input id="email" name="email" value="{{Auth::guard('web')->user()->email}}" type="email">
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="phone">Phone Number <span class="required-f">*</span></label>
                        <input name="phone" value="{{Auth::guard('web')->user()->phone}}" id="phone" type="text">
                    </div>
                </div>
                <button class="btn" type="submit">Save Change</button>
            </form>

            <br><br>
            <h2>Change Password</h2>
            <hr>
            <form method="POST" action="{{route('changePassword')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="input-pass">Current Password <span class="required-f">*</span></label>
                        <input name="password" id="input-pass" type="password" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                        <label for="input-newpass">New Password <span class="required-f">*</span></label>
                        <input name="new-password" id="input-newpass" type="password" required>
                    </div>

                </div>
                <button class="btn" type="submit">Save Change</button>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <h3>Orders</h3>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="product-name alt-font">Product</th>
                        <th class="product-price text-center alt-font">Unit Price</th>
                        <th class="stock-status text-center alt-font">Status</th>
                        <th class="product-subtotal text-center alt-font">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($multipleOrders))
                    <?php $index = 0; 
                    ?>
                    @foreach($multipleOrders as $singleOrder)
                    @if(count($singleOrder)>0)
                    <tr>
                        <td class="product-name">
                            @foreach($singleOrder as $product)
                            <h4 class="no-margin"><a href="#">{{$product->name}}</a></h4></br>
                            @endforeach
                        </td>
                        <td class="product-price text-center">
                            @foreach($singleOrder as $product)
                            <span class="amount">{{$product->price}}</span></br>
                            @endforeach

                        </td>
                        <td class="stock text-center">
                            <span class="in-stock">
                                
                                {{$singleOrder[0]->status}}
                                
                            </span>
                        </td>
                        <td class="product-subtotal text-center">
                            <button type="button" class="btn btn-small">
                                <a class=" mx-1px text-95" href="{{url('/view/invoice/'.$singleOrder[0]->id)}}" target="_blank" data-title="Print">
                                    
                                    Invoice
                                </a>
                            </button>
                            <button type="button" class="btn btn-small">
                                <a class="mx-1px text-95" href="{{url('/invoice/'.$singleOrder[0]->id.'/generate')}}" data-title="PDF">
                                    
                                    Download
                                </a>
                            </button>
                        </td>
                       
                    </tr>
                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Settings</div>
    </div>
</div>

<!--End Body Content-->

@endsection