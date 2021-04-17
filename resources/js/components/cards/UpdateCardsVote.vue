<template>
	
	 <div class="row m-0 p-0">
        <div class="flexRow trendingCoupon-titlebar">
            <h4 class="m-0 p-1">Cards by markoverse for Category</h4>
            <a class="text-right ml-auto p-2" href="#">view all</a>
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
        <div class="trendingCoupon-scroll scrollHandle" id="fashion_slide">

             <div class="trendingCoupon_slide_control-left fashion_slide_control-left">                                   
                <button class="btn slide_control-overlaybtn-left" id="Lctrl-fashion"><h5 class="m-0"><i class="fas fa-chevron-left"></i></h5></button>
            </div>

            <div class="trendingCoupon_slide_control-right fashion_slide_control-right">
                <button class="btn slide_control-overlaybtn-right" id="Rctrl-fashion"><h5 class="m-0"><i class="fas fa-chevron-right"></i></h5></button>
            </div>

            <div class="trendingCoupon-content flexRow m-3"> 
                     <div class="markoCards markoCards-fashion shadow">
                    <div class="markoInit">
                       Initiated by <span class="markoInitName">Username</span>
                    </div>
                        <div class="markoOffer">
                            <span class="markoOfferPercent"> 20% off</span><span class="markoRange d-flex flex-column"> ₹ 500 to ₹ 1000 <small>On purchase of</small></span>
                        </div>
                        <div class="markoStats">                        
                            <div class="statsSection">
                                <span class="markoCounter">50</span>
                                     <a class="btn btn-sm markoBoost ml-2 mb-2" id="likecard{{$card->id}}"><i class="fas fa-rocket"></i> Boost</a>
               
                                    <div class="progress mb-2">
                                    <div class="progress-bar" role="progressbar" style="width: 30%;" aria-valuenow="30%" aria-valuemin="0" aria-valuemax="100">30%</div>
                                    </div>
                 
                               
                            </div>
                            <div class="categoryName">
                                <a class="categoryLink">Fashion</a>
                                <a class="sub-categoryLink">Best for: Men Fashion</a>
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
                                        <li>Shop one : <p class="mb-0 float-right">+40</p></li>
                                        <li>Shop two : <p class="mb-0 float-right">+20</p></li>
                                        <li>Shop three : <p class="mb-0 float-right">+30</p></li>
                                    </ul>
                                </div>
                            <p class="Ccoupon-extraOfferHide text-center"><button class="btn btn-sm btn-light"><i class="fas fa-times"></i></button></p>
                        </div>
                    </div>
              
                @endif
                @endforeach
               

            </div>


        </div>

</template>
<script>
	
	export default {

		props: [''];

		data () {

			'id' 
		}
	}
</script>