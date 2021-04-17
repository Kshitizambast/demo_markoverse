
        <div class="flexRow trendingCoupon-titlebar">
            <h4 class="m-0 p-1">Trending Cards On Markoverse</h4>
            <a class="text-right ml-auto p-2" href="/cards">view all</a>
        </div>
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
                <li class="list-group-item list-title"><h5>Customer of the day</h5></li>
                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Appear all day on Markoverse</li>
                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Pin your products.</li>
                <li class="list-group-item"><i class="fas fa-gift"></i>&nbsp;Review will be pinned</li>
                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-title"><h5>Extra discount on us</h5></li>
                <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Get extra discount on us</li>
                <li class="list-group-item"><i class="fas fa-tag"></i>&nbsp;Only for repeated customers</li>
                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-title"><h5>Money to invest</h5></li>
                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;You can earn money on Markoverse</li>
                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Help shops to become famous</li>
                <li class="list-group-item"><i class="fas fa-coins"></i>&nbsp;Make money using your social influence</li>
                <li class="list-group-item list-footer"><small>Coming soon...</small></li>
            </ul>
        </div>        
        </div>
    </div>
    </div>
        <div class="trendingCoupon-scroll scrollHandle" id="trending-cards_slide">

             <div class="trendingCoupon_slide_control-left slide_control_left">                                   
                <button class="btn slide_control-overlaybtn-left" id="Lctrl-trending-cards"><h5 class="m-0"><i class="fas fa-chevron-left"></i></h5></button>
            </div>

            <div class="trendingCoupon_slide_control-right slide_control_right">
                <button class="btn slide_control-overlaybtn-right" id="Rctrl-trending-cards"><h5 class="m-0"><i class="fas fa-chevron-right"></i></h5></button>
            </div>

            <div class="trendingCoupon-content flexRow m-3"> 
            
        @foreach($trending_cards->chunk(10) as $chunk)   
            @foreach($chunk as $card)
                    @if($card->open_for_voting ==  1)
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
                                            
                                            $(document).ready(function(){

                                                "use strict";

                                                    $.ajaxSetup({
                                                    headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                });

                                                $('#likecard{{$card->id}}').click(function(event){
                                                
                                                    axios.post('/card/add', {
                                                        'card_id' : '{{Crypt::encrypt($card->id)}}',
                                                        'customer_id': '{{Crypt::encrypt(auth()->user()->id)}}'
                                                    }).
                                                    then(function(response){
                                                        console.log(response.status);
                                                    }).
                                                    catch(function(error){
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
                                        @foreach($shops as $shop)
                                            @if($shop->category_id == $card->category_id)
                                                <li>{{$shop->shop_name}} : <p class="mb-0 float-right">+{{$card->last_point_booster}}</p></li>
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
                    @endif
                @endforeach
               
            @endforeach
            
            <div class="markoCards bg-light text-dark p-2 mt-auto mb-auto text-center shadow">
                <h4>The power in your hand !</h4>
                <p>On markoverse, customer gets the power to apply the best deals in their favourite shops. Just tap boost and increase the ranking of your preferred deals. And that's not all, we give you extra deals, offers and popularity in your area. <br/> To find more click explore!</p>
            </div>
            
            </div>


        </div>
                            
