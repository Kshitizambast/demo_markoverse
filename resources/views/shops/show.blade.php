@extends('layouts.app')
@section('content')

<div class="container-fluid p-0">
    <div class="row m-0 p-0 show-shop-overview">
        <div class="col-lg-6 col-sm-12 show-shop-img-section p-0">
            <div class="show-shop-img" style=" background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$shop_images[0]->filename}}');"></div>
        </div>
        <div class="col-lg-6 col-sm-12 show-shop-info-section">
            <h1 class="show-shop-name"><b>{{$shop->shop_name}}</b></h1>
            <h4 class="show-shop-address">Address: {{$shop->address}}</h4>
            <p class="lead">
                <a class="btn btn-light btn-sm" href="#" role="button">{{App\Category::findOrFail($shop->category_id)->subcategory_name}}</a>
            </p>
            <p class="show-shop-time">Open: {{ date('g:ia', strtotime($shop->opening_time))}}</p>
            <p class="show-shop-time">Close: {{ date('g:ia', strtotime($shop->closing_time))}}</p>
            <?php

            date_default_timezone_set('Asia/Kolkata');
            $t = strtotime(date('H:i:s', time()));

            $opening_time = $shop->opening_time;
            $opening_time =  strtotime($opening_time);

            $closing_time = $shop->closing_time;
            $closing_time =  strtotime($closing_time);

            ?>
            @if(($shop->is_open_now == 1) && ((($opening_time<=$t)&&($t<=$closing_time))==1)) <button class="btn btn-sm btn-outline-success mb-3">Open</button>
                @elseif($shop->is_open_now == 0 || (($opening_time<=$t)&&($t<=$closing_time))==0) <button class="btn btn-sm btn-outline-danger mb-3">Closed</button>
                    @endif

                    <div class="show-shop-achievement">
                        <h4 class="border-bottom border-light text-warning">Achievements</h4>
                        <h4><i class="bi bi-trophy"></i></h4>
                    </div>
        </div>
    </div>

    <div class="row m-0 p-0 show-shop-deals">
        <div class="col-lg-6 col-sm-12 show-active-card">

            <!-- Modal -->

            <div class="modal exploreCouponModal fade" id="exploreCouponModal" tabindex="-1" role="dialog" aria-labelledby="exploreCouponModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content couponModal-content rounded-circle">
                        <div class="modal-header couponModalHeader p-2">
                            <h3 class="modal-title" id="exampleModalLongTitle">Coupon deals and offers</h3>
                            <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body couponModalOffers">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-title">
                                    <h5>Customer of the day</h5>
                                </li>
                                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Appear all day on Markoverse</li>
                                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Pin your products.</li>
                                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Review will be pinned</li>
                                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-title">
                                    <h5>Extra discount on us</h5>
                                </li>
                                <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Get extra discount on us</li>
                                <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Only for repeated customers</li>
                                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-title">
                                    <h5>Money to invest</h5>
                                </li>
                                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;You can earn money on Markoverse</li>
                                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Help shops to become famous</li>
                                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Make money using your social influence</li>
                                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal ends  -->

            <h3>Currently active card</h3>
            <p>Will expire in 5 days</p>
            @if(count($applied_card) > 0)

            <div class="markoCards markoCards-{{App\SuperCategory::find($applied_card[0]->super_category_id)->category_name}} shadow">
                <div class="markoInit">
                    Special thanks to: <span class="markoInitName">{{App\LikesOfCustomers::firstUserToLike($applied_card[0]->id)}}</span>
                </div>
                <div class="markoOffer">
                    <span class="markoOfferPercent"> {{$applied_card[0]->disscount}}% off</span><span class="markoRange d-flex flex-column"> ₹ {{$applied_card[0]->min_range}} to ₹ {{$applied_card[0]->max_range}} <small>On purchase of</small></span>
                </div>
                <div class="markoStats">
                    <div class="statsSection text-center" style="min-width: 35%">
                        <span class="markoCounter">{{App\LikesOfCustomers::countLikes($applied_card[0]->id)}}</span>

                        <div class="progress mb-2">
                            <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="100%" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>


                    </div>
                    <div class="categoryName">
                        <a class="categoryLink">{{App\SuperCategory::find($applied_card[0]->super_category_id)->category_name}}</a>
                        <a class="sub-categoryLink">Best for: {{App\Category::find($applied_card[0]->category_id)->subcategory_name}}</a>
                    </div>
                </div>
                <div class="markoRewards">
                    <ul>
                        <li>Win customer of the day point & more.</li>
                    </ul>
                    <a class="btn btn-light text-dark markoExplore" data-toggle="modal" data-target="#exploreCouponModal">Explore</a>
                </div>
                <div class="markoFoooter">
                    <div class="socialBtnBox">
                        <span class="p-2">
                            <div class="addthis_inline_share_toolbox mt-1"></div>
                        </span>
                    </div>
                    <a class="btn btn-sm markoShare w-50"><i class="fas fa-share"></i> Share</a>
                </div>
            </div>
            @else
            <h5>Applied Card Will Be Shown Here</h5>
            @endif

            <table class="shop-point d-flex justify-content-between">
                <tr>
                    <th>Your point</th>
                    <th>Progress</th>
                    <th>Earn point</th>
                </tr>
                <tr>
                    <td>60</td>
                    <td>
                        <div class="progress m-3">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td>20</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-6 col-sm-12  show-shop-poster">
            <h3>Best deals offered by us.</h3>
            <p>Keep shoping and keep vibing!</p>
            <div class="shop-poster-img markoverse-deal-home-poster"></div>
        </div>
    </div>

    <div class="shop-explore-section mt-5">
        <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-products-tab" data-bs-toggle="pill" href="#pills-products" role="tab" aria-controls="pills-products" aria-selected="true">Products</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-suggest-card-tab" data-bs-toggle="pill" href="#pills-suggest-card" role="tab" aria-controls="pills-suggest-card" aria-selected="false">Suggest Cards</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-gallery-tab" data-bs-toggle="pill" href="#pills-gallery" role="tab" aria-controls="pills-gallery" aria-selected="false">Photo Gallery</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="pills-products-tab">
                <div class="product-grid-box">
                    <h4 class="product-grid-title-food p-3">Our proud collection</h4>
                    <div class="product-grid row m-0 p-0">
                        @if(count($products) > 0)
                        @foreach($products as $product)
                        <a class="lazy col col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-0 d-flex justify-content-center" @if(\Auth::check()) href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}" @else href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}" @endif style="text-decoration: none; color:inherit;">
                            <div class="">
                                <div class="product-card">
                                    @if($product->disscount_price != 0)
                                    <span class="product-card-badge bg-light text-dark">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% off</span>
                                    @endif
                                    @foreach($images as $image)
                                    @if($product->id == $image->product_id )
                                    <div class="lazy product-card-img" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"></div>
                                    @break
                                    @endif
                                    @endforeach
                                    <div class="product-card-info">
                                        <span class="product-card-name">{{$product->product_name}}</span>
                                        @if($product->disscount_price !=0)
                                        <span class="product-card-price"><del>₹{{ceil($product->regular_price)}}</del></span>
                                        <span class="product-card-discount-price">₹{{ceil($product->disscount_price)}}</span>
                                        @else
                                        <span class="product-card-price">₹{{ceil($product->regular_price)}}</span>
                                        @endif
                                        <button class="btn btn-sm btn-outline-light">Grab Deal</button>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @else

                        <div class="col col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-0 d-flex justify-content-center" role="alert">
                            <h4 class="alert-heading">Welcome!</h4>
                            <p>Shop is uploading the product. Have patience and till then choose some point booster cards for shops.</p>
                            <hr>
                            <p class="mb-0">Markoverse brings new shopping experience to you.<a href="#"> Learn about Markoverse</a></p>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-suggest-card" role="tabpanel" aria-labelledby="pills-suggest-card-tab">

                <!-- Markoverse card for respective category -->
                <div class="marko-card-section food-bg">

                    <!-- Modal -->

                    <div class="modal exploreCouponModal fade" id="exploreCouponModal" tabindex="-1" role="dialog" aria-labelledby="exploreCouponModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content couponModal-content rounded-circle">
                                <div class="modal-header couponModalHeader p-2">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Coupon deals and offers</h3>
                                    <button type="button" class="close position-relative" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body couponModalOffers">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-title">
                                            <h5>Customer of the day</h5>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Appear all day on Markoverse</li>
                                        <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Pin your products.</li>
                                        <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Review will be pinned</li>
                                        <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                    </ul>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-title">
                                            <h5>Extra discount on us</h5>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Get extra discount on us</li>
                                        <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Only for repeated customers</li>
                                        <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                    </ul>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-title">
                                            <h5>Money to invest</h5>
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;You can earn money on Markoverse</li>
                                        <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Help shops to become famous</li>
                                        <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Make money using your social influence</li>
                                        <li class="list-group-item list-footer"><small>Coming soon...</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal ends  -->

                    <h2 class="mt-2 pt-3 px-3 pb-0 mb-0 border-top border-dark"><b>Suggest deals to shop</b></h2>
                    <p class="text-dark px-3"><b>Tap boost, & get your friends & groups help to make the deals active.</b></p>
                    <!-- Slider main container -->
                    <div class="swiper-container coupon-swiper pt-1">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($cards as $card)
                            @if($card->category_id == $shop->category_id and $card->open_for_voting == 1)

                            <div class="swiper-slide">

                                <div class="markoCards markoCards-{{App\SuperCategory::find($card->super_category_id)->category_name}} shadow">
                                    <div class="markoInit">
                                        Initiated by <span class="markoInitName">{{App\LikesOfCustomers::firstUserToLike($card->id)}}</span>
                                    </div>
                                    <div class="markoOffer">
                                        <span class="markoOfferPercent"> {{$card->disscount}}% off</span><span class="markoRange d-flex flex-column"> ₹ {{$card->min_range}} to ₹ {{$card->max_range}} <small>On purchase of</small></span>
                                    </div>
                                    <div class="markoStats">
                                        <div class="statsSection">
                                            <span class="markoCounter">{{App\LikesOfCustomers::countLikes($card->id)}}</span>
                                            @if(Auth::check())
                                            @if(App\LikesOfCustomers::alreadyLikedByCustomer(auth()->user()->id, $card->id))
                                            <a class="btn btn-sm markoBoost ml-2 mb-2 toggled" id="likecard{{$card->id}}"><i class="fas fa-rocket"></i> Boosted</a>
                                            @else
                                            <a class="btn btn-sm markoBoost ml-2 mb-2" id="likecard{{$card->id}}"><i class="fas fa-rocket"></i> Boost</a>
                                            @endif
                                            <div class="progress mb-2">
                                                <div class="progress-bar" role="progressbar" style="width: {{($card->weight_this_week / 5.0) * 100}}%;" aria-valuenow="{{($card->weight_this_week / 5.0) * 100}}%" aria-valuemin="0" aria-valuemax="100">{{($card->weight_this_week / 5.0) * 100}}%</div>
                                            </div>
                                            <script type="text/javascript">
                                                $(document).ready(function() {

                                                    "use strict";

                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });

                                                    $('#likecard{{$card->id}}').click(function(event) {

                                                        axios.post('/card/add', {
                                                            'card_id': '{{Crypt::encrypt($card->id)}}',
                                                            'customer_id': '{{Crypt::encrypt(auth()->user()->id)}}'
                                                        }).
                                                        then(function(response) {
                                                            console.log(response.status);
                                                        }).
                                                        catch(function(error) {
                                                            console.log(error);
                                                        });
                                                    });

                                                });
                                            </script>
                                            @else
                                            <button class="btn btn-sm ml-2 mb-2" data-toggle="tooltip" data-placement="top" title="You must login first!"><i class="fas fa-rocket"></i> Boost</button>
                                            <div class="progress mb-2">
                                                <div class="progress-bar" role="progressbar" style="width: {{($card->weight_this_week / 5.0) * 100}}%;" aria-valuenow="{{($card->weight_this_week / 5.0) * 100}}%" aria-valuemin="0" aria-valuemax="100">{{($card->weight_this_week / 5.0) * 100}}%</div>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="categoryName">
                                            <a class="categoryLink">{{App\SuperCategory::find($card->super_category_id)->category_name}}</a>
                                            <a class="sub-categoryLink">Best for: {{App\Category::find($card->category_id)->subcategory_name}}</a>
                                        </div>
                                    </div>
                                    <div class="markoRewards">
                                        <ul>
                                            <li>Win customer of the day point & more.</li>
                                        </ul>
                                        <a class="btn btn-light text-dark markoExplore" data-toggle="modal" data-target="#exploreCouponModal">Explore</a>
                                    </div>
                                    <div class="markoFoooter">
                                        <div class="socialBtnBox">
                                            <span class="p-2">
                                                <div class="addthis_inline_share_toolbox mt-1"></div>
                                            </span>
                                        </div>
                                        <a class="btn btn-sm markoShare w-50"><i class="fas fa-share"></i> Share</a>
                                        <a class="btn btn-sm markoDetails w-50"><i class="fas fa-info"></i> Details</a>
                                    </div>
                                    <div class="Ccoupon-extraOffer">
                                        <div class="flexRow w-100">
                                            <div class="Ccoupon-extraOffer-tab">
                                                Activation chances : {{($card->weight_this_week / 5.0) * 100}}%
                                            </div>
                                            <div class="Ccoupon-extraOffer-tab">
                                                Save upto : ₹{{ceil((($card->max_range * $card->disscount)/100))}}
                                            </div>
                                        </div>
                                        <div class="Ccoupon-extraOffer-lvlPanel">
                                            <h5>Your increment in points</h5>
                                            <ul class="Ccoupon-extraOffer-lvlLists">
                                                @if(count(App\MyShop::where('category_id', $card->category_id)->get()) > 0)
                                                @foreach($allShops as $_shop)
                                                @if($_shop->category_id == $card->category_id)
                                                <li>{{$_shop->shop_name}} : <p class="mb-0 float-right">+{{$card->last_point_booster}}</p>
                                                </li>
                                                @endif
                                                @endforeach
                                                @else
                                                <p>Coming Soon..</p>
                                                @endif
                                            </ul>
                                        </div>
                                        <p class="Ccoupon-extraOfferHide text-center"><button class="btn btn-sm btn-light"><i class="fas fa-times"></i></button></p>
                                    </div>
                                </div>

                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab">
                <div class="row p-0 m-0">
                    @foreach($shop_images as $image)
                    <img src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}" class="img-thumbnail col p-0 p-1" alt="...">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection