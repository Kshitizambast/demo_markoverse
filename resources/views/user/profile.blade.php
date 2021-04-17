@extends('layouts.app')
@section('content')

<div class="conatiner-fluid p-0">

    <div class="row m-0 p-0">
        <div class="col-12 col-md-4 order-md-1 order-2 profile-navigation d-flex justify-content-center align-items-center">
            <ul class="nav nav-pills flex-md-column mb-3" id="pills-tab" role="tablist">
                <li class="nav-item m-md-3" role="presentation">
                    <a class="nav-link active" id="pills-orders-tab" data-bs-toggle="pill" href="#pills-orders" role="tab" aria-controls="pills-orders" aria-selected="true">Order history</a>
                </li>
                <li class="nav-item m-md-3" role="presentation">
                    <a class="nav-link" id="pills-myMarkoverse-tab" data-bs-toggle="pill" href="#pills-myMarkoverse" role="tab" aria-controls="pills-myMarkoverse" aria-selected="false">My markoverse</a>
                </li>
                <li class="nav-item m-md-3" role="presentation">
                    <a class="nav-link" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting" role="tab" aria-controls="pills-setting" aria-selected="false">Account setting</a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-8 order-md-2 order-1 profile-user-info-section">
            <div class="row m-0 p-0 profile-top-header align-items-center">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <div class="user-avatar-profile">
                        @if(App\User::image(auth()->user()->id))
                        <div class="user-avatar-img" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{App\User::image(auth()->user()->id)}}');">

                        </div>
                        @else
                        <div class="user-avatar-img" style="background: url('');">

                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-6 p-3">
                    <div class="profile-user-detail">
                        <h3 class="name-user">{{auth()->user()->name}}</h3>
                        <small class="joined-date">Joined on: {{date("F jS, Y", strtotime(auth()->user()->created_at))}}</small>
                        <p class="user-username">Username: {{auth()->user()->username}}</p>
                    </div>
                </div>
            </div>
            <div class="profile-top-footer m-3 mt-md-5">
                <h4 class="border-bottom border-warning p-3">My activity</h4>
                <div class="profile-activity-counter d-flex justify-content-around">
                    <span class="customer-card-activity-counter-tab text-center shadow-inset">
                        <h3><?php
                            $order = new App\Http\Controllers\UserOrderController();
                            $kk = $order->orderCheck(auth()->user()->id);
                            echo count($kk);

                            ?></h3>
                        <p class="mb-1 text-success">Purchases</p>
                    </span>
                    <span class="customer-card-activity-counter-tab text-center shadow-inset">
                        <h3>{{count(App\DailySells::where('customer_id', auth()->user()->id)->where('fullfilled', 1)->get())}}</h3>
                        <p class="mb-1 text-success">Shops visit</p>
                    </span>
                    <span class="customer-card-activity-counter-tab text-center shadow-inset">
                        <h3>{{$total}}</h3>
                        <p class="mb-1 text-success">Points</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">
            <div class="order-grid-box">
                <h4 class="product-grid-title-food p-3">My order history</h4>
                <div class="product-grid row m-0 p-0">
                    @if(count($orders))
                    @foreach($orders as $order)
                    <div class="col col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-0 d-flex justify-content-center">
                        <div class="product-card">
                            @foreach(App\Product::find($order->product_id)->product_images as $image)
                            <div class="product-card-img" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"></div>
                            @break
                            @endforeach
                            <div class="product-card-info">
                                <span class="product-card-name">{{App\Product::find($order->product_id)->product_name}}</span>
                                <span class="product-card-shop">Quantity: {{$order->quantity}}</span>
                                <span class="product-card-price"><del>{{$order->price}}</del></span>
                                <span class="product-card-discount-price">s.{{$order->total}}</span>
                                <small class="m-2">Purchased on: {{date($order->created_at ,strtotime('+330 minutes', 0))}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h2>Waiting for you to buy something</h2>
                    @endif

                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-myMarkoverse" role="tabpanel" aria-labelledby="pills-myMarkoverse-tab">
            <div class="row m-0 p-0">
                <div class="col-sm-12 point-section">
                    <div class="point-table">
                        <h2>Point Table</h2>
                        <p>Earn points to become customer of the month and win exciting prizes.</p>

                        <table class="shop-point d-flex justify-content-center">
                            <tr>
                                <th>Shop name</th>
                                <th>Current point</th>
                                <th>Progress</th>
                            </tr>

                            @if(count($customer_connections) > 0)
                            @foreach($customer_connections as $connection)
                            <tr>
                                <td><span class="point-shop-name p-2">{{App\MyShop::findOrNew($connection
                                ->my_shop_id)->shop_name}}</span></td>
                                <td>{{$connection->store_points}}</td>
                                <td>
                                    <div class="progress m-3">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$connection->store_points}}%" aria-valuenow="{{$connection->store_points}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>Working On It</p>
                            @endif


                        </table>
                    </div>
                </div>
                <div class="col-sm-12 p-0">
                    <div class="marko-card-section food-bg">

                        <!-- Modal -->

                        <div class="modal exploreCouponModal fade" id="exploreCouponModal" tabindex="-1" role="dialog" aria-labelledby="exploreCouponModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content couponModal-content rounded-circle">
                                    <div class="modal-header couponModalHeader p-2">
                                        <h3 class="modal-title" id="exampleModalLongTitle">Coupon deals and offers</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body couponModalOffers">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-title">
                                                <h5>Customer of the day</h5>
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Dapibus ac facilisis in</li>
                                            <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Morbi leo risus</li>
                                            <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Porta ac consectetur ac</li>
                                            <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-title">
                                                <h5>Extra off on us</h5>
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Dapibus ac facilisis in</li>
                                            <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Morbi leo risus</li>
                                            <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Porta ac consectetur ac</li>
                                            <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                        </ul>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-title">
                                                <h5>Money to invest</h5>
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Dapibus ac facilisis in</li>
                                            <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Morbi leo risus</li>
                                            <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Porta ac consectetur ac</li>
                                            <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal ends  -->

                        <h2 class="mt-2 pt-3 px-3 pb-0 mb-0 border-top border-dark"><b>Your boosted deals</b></h2>
                        <p class="text-dark px-3"><b>Tap boost, & get your friends & groups help to make the deals active.</b></p>
                        <!-- Slider main container -->
                        <div class="swiper-container coupon-swiper pt-1">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="markoCards markoCards-food m-2">
                                        <div class="markoInit">
                                            Initiated by <span class="markoInitName">Username</span>
                                        </div>
                                        <div class="markoOffer">
                                            <span class="markoOfferPercent">30% off</span>
                                            <span class="markoRange d-flex flex-column"> ₹ 100 to ₹ 400 <small>On purchase of</small></span>
                                        </div>
                                        <div class="markoStats">
                                            <div class="statsSection">
                                                <span class="markoCounter">0</span>
                                                <a class="btn btn-sm text-light markoBoost ml-2 mb-2"><i class="fas fa-rocket"></i> Boost</a>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="categoryName">
                                                <a class="categoryLink">Food & drinks</a>
                                                <a class="sub-categoryLink">Best for: Restaurants</a>
                                            </div>
                                        </div>
                                        <div class="markoRewards">
                                            <ul>
                                                <li>Increase customer of the day point.</li>
                                            </ul>
                                            <a class="btn btn-light text-dark markoExplore" data-toggle="modal" data-target="#exploreCouponModal">Explore</a>
                                        </div>
                                        <div class="markoFoooter">
                                            <div class="socialBtnBox"><span class="p-2"><i class="fab fa-facebook-f"></i></span><span class="p-2"><i class="fab fa-whatsapp"></i></span></div>
                                            <a class="btn btn-sm markoShare w-50"><i class="fas fa-share"></i> Share</a>
                                            <a class="btn btn-sm markoDetails w-50"><i class="fas fa-info"></i> Details</a>
                                        </div>
                                        <div class="Ccoupon-extraOffer">
                                            <div class="flexRow w-100">
                                                <div class="Ccoupon-extraOffer-tab">
                                                    Activation chances : 80%
                                                </div>
                                                <div class="Ccoupon-extraOffer-tab">
                                                    Save upto : Rs.420
                                                </div>
                                            </div>
                                            <div class="Ccoupon-extraOffer-lvlPanel">
                                                <h5>Increment in level</h5>
                                                <ul class="Ccoupon-extraOffer-lvlLists">
                                                    <li>Shop one : <p class="mb-0 float-right">Lvl+x</p>
                                                    </li>
                                                    <li>Shop two : <p class="mb-0 float-right">Lvl+y</p>
                                                    </li>
                                                    <li>Shop three : <p class="mb-0 float-right">Lvl+z</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="Ccoupon-extraOfferHide text-center"><button class="btn btn-sm btn-light"><i class="fas fa-times"></i></button></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="markoCards markoCards-food m-2">
                                        <div class="markoInit">
                                            Initiated by <span class="markoInitName">Username</span>
                                        </div>
                                        <div class="markoOffer">
                                            <span class="markoOfferPercent">30% off</span>
                                            <span class="markoRange d-flex flex-column"> ₹ 100 to ₹ 400 <small>On purchase of</small></span>
                                        </div>
                                        <div class="markoStats">
                                            <div class="statsSection">
                                                <span class="markoCounter">0</span>
                                                <a class="btn btn-sm text-light markoBoost ml-2 mb-2"><i class="fas fa-rocket"></i> Boost</a>
                                                <div class="progress mb-2">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="categoryName">
                                                <a class="categoryLink">Food & drinks</a>
                                                <a class="sub-categoryLink">Best for: Restaurants</a>
                                            </div>
                                        </div>
                                        <div class="markoRewards">
                                            <ul>
                                                <li>Increase customer of the day point.</li>
                                            </ul>
                                            <a class="btn btn-light text-dark markoExplore" data-toggle="modal" data-target="#exploreCouponModal">Explore</a>
                                        </div>
                                        <div class="markoFoooter">
                                            <div class="socialBtnBox"><span class="p-2"><i class="fab fa-facebook-f"></i></span><span class="p-2"><i class="fab fa-whatsapp"></i></span></div>
                                            <a class="btn btn-sm markoShare w-50"><i class="fas fa-share"></i> Share</a>
                                            <a class="btn btn-sm markoDetails w-50"><i class="fas fa-info"></i> Details</a>
                                        </div>
                                        <div class="Ccoupon-extraOffer">
                                            <div class="flexRow w-100">
                                                <div class="Ccoupon-extraOffer-tab">
                                                    Activation chances : 80%
                                                </div>
                                                <div class="Ccoupon-extraOffer-tab">
                                                    Save upto : Rs.420
                                                </div>
                                            </div>
                                            <div class="Ccoupon-extraOffer-lvlPanel">
                                                <h5>Increment in level</h5>
                                                <ul class="Ccoupon-extraOffer-lvlLists">
                                                    <li>Shop one : <p class="mb-0 float-right">Lvl+x</p>
                                                    </li>
                                                    <li>Shop two : <p class="mb-0 float-right">Lvl+y</p>
                                                    </li>
                                                    <li>Shop three : <p class="mb-0 float-right">Lvl+z</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p class="Ccoupon-extraOfferHide text-center"><button class="btn btn-sm btn-light"><i class="fas fa-times"></i></button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
            <div class="userAccountSetting">
                <h4 class="p-3 border-bottom border-info"> User account setting </h4>
                <div class="row m-0 p-1">

                    <div class="col-lg-4 p-2 d-flex justify-content-center align-items-center">

                        <div class="userProfileImg-preview">
                            <div id="userImgDropzone" class="dropzone bg-dark text-light newUserProfileImg-dropzone mt-3 ml-auto mr-auto p-2">

                            </div>
                            <div class="userProfileImg-circle" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{App\User::image(auth()->user()->id)}}');">

                                <button class="btn btn-sm btn-dark text-light changeImgBtn-user w-100 ml-auto mr-auto">
                                    <h4 class="mb-0"><i class="fas fa-camera"></i></h4>
                                </button>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 p-2">
                        @if($flash = session('message'))
                        <div id="session-info" class="alert alert-success" role="alert">
                            {{$flash}}
                        </div>
                        @endif
                        <form class="needs-validation" method="POST" action="/user/{{Crypt::encrypt(auth()->user()->id)}}/edit-details" novalidate>
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fullname">Full Name</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} height-50" name="name" value="{{auth()->user()->name}}" placeholder="Name" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Email address</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} height-50" name="email" value="{{auth()->user()->email }}" placeholder="e-mail" required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="emailaddress">Username(letters and numbers)</label>
                                    <input id="email" name="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} height-50" value="{{auth()->user()->username}}" placeholder="usrename06" required>
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group w-100">
                                    <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i>Save Changes</button>
                                </div>
                            </div>
                        </form>

                        <h3>Change password</h3>
                        @if($flash = session('password_message'))
                        <div id="session-info" class="alert alert-success" role="alert">
                            {{$flash}}
                        </div>
                        @endif
                        <form method="POST" action="/user/{{Crypt::encrypt(auth()->user()->id)}}/change-password">
                            @csrf
                            <div class="form row bg-light text-dark p-3">
                                <div class="form-group col-md-4">

                                    <label for="password">Please Enter Your Current Password</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }} height-50" name="current_password" placeholder="Current Password" required>
                                    @if ($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <div class="form-group col-md-4">
                                    <label>New Password</label>
                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }} height-50" name="new_password" placeholder="New Password" required>
                                    @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="form-group col-md-4">
                                    <label>Confrim Password</label>
                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }} height-50" name="new_password_confirmation" placeholder="Repeat Password" required>
                                    @if ($errors->has('new_password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group w-100">
                                    <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Change password </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        if (location.hash) {
            $("a[href='" + location.hash + "']").tab("show");
        } else {
            var lastTab = localStorage.getItem('lastTab');
            $('a[href="' + lastTab + '"]').tab('show');
        }
    });

    $(document.body).on("click", "a[data-toggle='pill']", function(event) {
        location.hash = this.getAttribute("href");

        localStorage.setItem('lastTab', location.hash);
    });
    $(window).on("popstate", function() {
        var anchor = location.hash || $("a[data-toggle='pill']").first().attr("href");
        $("a[href='" + anchor + "']").tab("show");
    });
</script>


@endsection