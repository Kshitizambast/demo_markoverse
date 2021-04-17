


<div class="swiper-slide">
<div class="marko-card marko-card-<?php echo($card_theme); ?>">
    <div class="marko-card-inner">
        <div class="marko-card-front row m-0 p-3 pb-0">
            <div class="col-9 d-flex flex-column justify-content-between">
                <div class="card-category text-light"><?php echo($card_category_name); ?></div>
                <div class="card-deal">
                    Upto <b class="deal-off">{{$card->disscount}}% off</b>
                    <br />on transaction of ₹ {{$card->min_range}} to ₹ {{$card->max_range}}
                </div>
                <div class="card-member">
                    <span class="markoCounter">{{App\LikesOfCustomers::countLikes($card->id)}}</span>
                    <span class="markoTarget">/ 100 <small class="text-light">members</small></span>
                    <div class="marko-card-progress d-flex align-items-end">
                        <div class="progress shadow-inset">
                            <div role="progressbar" aria-valuenow="{{($card->weight_this_week / 10.0) * 100}}%" aria-valuemin="0" aria-valuemax="100" class="progress-bar" style="width: {{($card->weight_this_week / 10.0) * 100}}%;">{{($card->weight_this_week / 10.0) * 100}}%</div>
                        </div>
                        @if(Auth::check())
                        @if(App\LikesOfCustomers::alreadyLikedByCustomer(auth()->user()->id, $card->id))
                        <a type="button" id="likecard{{$card->id}}" class="btn btn-sm btn-dark text-light marko-join joined">Joined</a>
                        @else
                        <a type="button" id="likecard{{$card->id}}" class="btn btn-sm btn-light marko-join">Join</a>
                        @endif
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
                        <button type="button" class="btn btn-sm ml-2 join-warn" data-toggle="tooltip" data-placement="top" data-bs-original-title="You must login first!">Join</button>
                        @endif
                    </div>
                </div>
                <div class="card-steps text-light mt-1">Click join to become member of this card!</div>
                <small class="card-expiry">will expire on 11th March, 21</small>
            </div>
            <div class="col-3">
                <div class="marko-card-logo">
                    <img src="img/markoLogoMini2.png" class="card-logo-img">
                    <small class="marko-slogan">Making saving easy</small>
                </div>
                <div class="marko-card-pattern"></div>
            </div>
        </div>
        <div class="marko-card-back row m-0 p-0">
            <div class="col-6 m-0 pt-2 marko-what">
                <div class="flexRow w-100">
                    <b>
                    <div class="col-12">
                        Activation chances : {{($card->weight_this_week / 10.0) * 100}}%
                    </div>
                    <div class="col-12">
                        Save upto : ₹{{ceil((($card->max_range * $card->disscount)/100))}}
                    </div>
                    </b>
                </div>
                <div class="Ccoupon-extraOffer-lvlPanel bg-dark text-light">
                    <h5>Your increment in points</h5>
                    <ul class="Ccoupon-extraOffer-lvlLists">
                        @if(count(App\MyShop::where('category_id', $card->category_id)->get()) > 0)
                        @foreach($shops as $shop)
                        @if($shop->category_id == $card->category_id)
                        <li>{{$shop->shop_name}} : <p class="mb-0 float-right">+{{$card->last_point_booster}}</p>
                        </li>
                        @endif
                        @endforeach
                        @else
                        <p>Coming Soon..</p>
                        @endif
                    </ul>
                </div>
            </div>
            <ul class="col-6 m-0 pt-2 marko-how">
                <h6>How it works?</h6>
                <li>Click join button and become member.</li>
                <li>Cards will be validated if achieved certain number of members.</li>
                <li>Merchants in your area will activate the card.</li>
                <li>Pay through us, and save your money.</li>
            </ul>
        </div>
    </div>
    <div class="marko-card-footer d-flex position-relative">
        <div class="marko-share-box">
            <span class="p-2">
                <div class="addthis_inline_share_toolbox mt-1"></div>
            </span>
        </div>
        <button href="#" type="button" class="btn marko-details">Details</button>
        <button href="#" type="button" class="btn marko-share">Share</button>
    </div>
</div>
</div>

