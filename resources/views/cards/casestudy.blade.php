  
    
  <div class="template">
        <div class="offer-poster mb-4">
            <div class="row">
                @foreach($cards as $card)
                
                    <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mr-auto mt-4" style="width: 100%;">
                        <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                            <h5><span class="badge text-right bg-dark">{{App\SuperCategory::getCatName($card->super_category_id)}}</span></h5>
                            <h1 class="offer-percent">
                                {{$card->disscount}}% off
                            </h1>
                            <h5 class="offer-terms">
                                On spend of <i class="fas fa-rupee-sign text-md mr-1"></i>{{$card->min_range}}- <i class="fas fa-rupee-sign text-md mr-1"></i>{{$card->max_range}}
                            </h5>
                        </div>
                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">{{$card->expected_customer_growth}}%</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">30%</span>
                            </li>
                            {{-- <li class="list-group-item list-group-item-secondary"> Purchase coupon <span class="increase-percentage">$50</span> </li> --}}
                        </ul>
                        <div class="card-footer pt-1 pb-1">

                            @if(\Auth::check())
                                        <span class="footer-button">
                                            <button type="button" id="customerLikeMe{{$card->id}}" class="customers-like btn <?php if(App\LikesOfCustomers::alreadyLikedByCustomer(auth()->user()->id, $card->id)) echo 'highlight'; ?>" title="Customer's-like">
                                                <i class="fas fa-heart fa-lg"></i>
                                            </button>
                                            @if(App\LikesOfCustomers::countLikes($card->id) > 0)
                                                {{App\LikesOfCustomers::countLikes($card->id)}}
                                            @else
                                                0
                                            @endif 
                                        </span>

                                        <span class="footer-button">
                                            <button type="button" id="investorLike{{$card->id}}" class="investors-like btn <?php if(App\ LikesOfInvestors::alreadyLikedByInvestor(auth()->user()->id, $card->id)) echo 'highlight'; ?> "><i class="fas fa-heart fa-lg"></i></button>
                                             
                                                @if(App\LikesOfInvestors::countLikes($card->id) > 0) 
                                                <span class="investorlikecounter">
                                                    {{App\LikesOfInvestors::countLikes($card->id)}}
                                                </span> 
                                                @else
                                                    <span class="investorlikecounter">
                                                        0
                                                    </span> 
                                                @endif 
                                             
                                        </span>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                "use strict";
                                            $.ajaxSetup({
                                                headers: {
                                                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                });

                                                $('#customerLikeMe{{$card->id}}').click(function(event){
                                                    $(this).toggleClass('highlight'); 
                                                    event.preventDefault();
                                                    $.get("/customer/{{auth()->user()->id}}/card/{{$card->id}}/add");
                                                

                                                });

                                                 $('#investorLike{{$card->id}}').click(function(event){
                                                    $(this).toggleClass('highlight');
                                                    event.preventDefault();
                                                    $.get("/investor/{{auth()->user()->id}}/card/{{$card->id}}/add");
                                                    var likes = $('.investorlikecounter').html();

                                                    var likes_in_int = parseInt(likes);
                                                    console.log(likes_in_int);
                                                });

                                                
                                        });
                                    </script>
                                    @else
                                        <span class="footer-button">
                                            <button type="button"  class="customers-like btn" title="Customer's-like" data-toggle="modal" data-target="#userModal" aria-haspopup="true" aria-expanded="false"><i class="fas fa-heart fa-lg"></i>
                                            </button>  {{App\LikesOfCustomers::countLikes($card->id)}}
                                        </span>

                                        <span class="footer-button">
                                            <button type="button"  class="investors-like btn" data-toggle="modal" data-target="#userModal" aria-haspopup="true" aria-expanded="false"><i class="fas fa-heart fa-lg"></i>
                                            </button> {{App\LikesOfInvestors::countLikes($card->id)}}
                                        </span>
                    
                                @endif
                                <span class="share">
                                    <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg text-primary"></i></button>
                                </span>
                            
                        </div>                        
                    </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
        