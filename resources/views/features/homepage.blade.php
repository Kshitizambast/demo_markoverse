<div class="col-12 p-0">
                    
                    <div id="carouselExampleControls" class="carousel slide mb-1" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item carousel-item-home active">
                            <img src="{{asset('img/homepage_carousel_img_1.jpg') }}">
                            <div class="carousel-caption carousel-caption-home d-block">
                                <h3>Markoverse is coming soon...</h3>
                                <p>Get best deals in your local shop.</p>
                            </div>
                            </div>
                            <div class="carousel-item carousel-item-home">
                            <img src="{{asset('img/homepage_carousel_img_2.webp') }}" alt="Fashion">
                            <div class="carousel-caption carousel-caption-home d-block">
                                <h3>Clothing, Footwear, and all fashion product.</h3>
                                <p>Get best fashion deals with the assurity of getting original product.</p>
                            </div>
                            </div>
                            <div class="carousel-item carousel-item-home">
                            <img src="{{asset('img/homepage_carousel_img_3.jpg') }}">
                            <div class="carousel-caption carousel-caption-home d-block">
                                <h3>Food, Beverages and drinks</h3>
                                <p>Get best deals in your local Rstaurants, Cafe and Hotels.</p>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                </div>
                
                <div class="col-12 p-0 pt-2">
                    
                    <div class="row w-100 mb-2 m-0 banner-container">
                                                
                        <div class="markoverse-bannerInfo-section">    

                            <h4 class="pl-2 text-background"><b>Deal of the day :</b> Sign up to earn free credit for investment.</h4>
                            
                        </div>
                        <div class="homepage-banner">

                        </div>
                    
                    </div>                    
                    
                </div>
                
                <div class="col-12 p-1">
                    <div class="item-list-box">
                        <div class="bg-my-dark text-light p-1">
                            <span class="h4">Best Deal of Today!</span>
                            <a type="link" class="h6 float-right pt-1 mb-0 mr-1" href="#">View All</a>
                        </div>
                        <div class="card-body p-2">
                            <!-- Id will change if the category is changed, and only part before '_'(underscore) can be changed -->
                            <div class="slide_container" id="electronics_slide">
                                {{-- @foreach($shops as $shop)
                                @if($shop->can_buy_cards == 0) --}}
                                    @foreach($products as $product)
                                    @if(count($product->product_images) > 0)                            
                                <div class="col shop-card-home-container">
                                    <div class="card shop-card-home">	
                                        <div class="card-body shop-card-body pntr-crsr">
                                            {{-- @if(\Auth::check()) --}}
                                                <a 
                                                @if(\Auth::check())
                                                    href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}"
                                                @else
                                                    href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}"
                                                @endif
                                                >
                                                    @foreach($images as $image)
                                                        @if($image->product_id == $product->id)
                                                        <img src="https://markoversepublic.s3.ap-south-1.amazonaws.com/{{$image->filename}}">
                                                        @break
                                                        @endif
                                                    @endforeach
                                                </a>
                                        </div>

                                        <!--Card Body end-->
                                        <div class="card-footer card-to-shop-footer">
                                            <div class="row mr-0 ml-0 shop-info  ">
                                            <div class="col-6 p-1 text-center">
                                                    <h5 style="margin-bottom: -1px; color: white">{{$product->product_name}}</h5>
                                                <p class="text-muted mt-2" style="margin-bottom: 1px">By:<a href="#" style="text-decoration: none">{{App\Product::shopName($product->my_shop_id)}}</a></p>
                                                <!--<p class="mt-2 text-warning">-->
                                                <!--	<i class="fas fa-star" style="font-size: 10px;"></i>-->
                                                <!--	<i class="fas fa-star" style="font-size: 10px;"></i>-->
                                                <!--	<i class="fas fa-star" style="font-size: 10px;"></i>-->
                                                <!--	<i class="fas fa-star" style="font-size: 10px;"></i>-->
                                                <!--	<i class="fas fa-star-half-alt" style="font-size: 10px;"></i>-->
                                                <!--	<span class="text-muted" style="font-size: 10px;"> (6000)review</span>	-->
                                                <!--</p>-->
                                                </div>
                                                <div class="col-6 p-1 text-center">
                                                    <h4 class="ml-1">
                                                        <strike class="text-muted mr-1"><i class="fas fa-rupee-sign mr-1"></i>{{$product->regular_price}}</strike>
                                                        <br>
                                                        <span class="text-my-info "><i class="fas fa-rupee-sign mr-1"></i>{{ceil($product->disscount_price)}}
                                                        </span>
                                                    </h4>
                                                    <div class="badge bg-my-info text-center px-2 py-2">
                                                    <span class="text-white">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% OFF</span>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                            @continue
                                        @endif
                                        @endforeach

                                {{-- @else
                                    <h3>We Are Preparing for the products</h3>
                                @endif
                                @endforeach --}}

                            </div>                                       
                               
                        </div>   
                            <!-- Button id for slide will change if the category is changed, and only part after '-'(hyphen) can be changed and will be similar to slide id name-->
                                <div class="slide_control-left">                                   
                                    <button class="btn slide_control-btn-left" id="Lctrl-electronics"><h1><i class="fas fa-chevron-left"></i></h1></button>
                                </div>
                                <div class="slide_control-right">
                                <button class="btn slide_control-btn-right" id="Rctrl-electronics"><h1><i class="fas fa-chevron-right"></i></h1></button>
                                </div> 
                        </div>      
                                  
                </div>
                

                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0">
                            <div class="row m-1 p-2" id="deal-card-1">
                            <div class="deal-card-info col-7">
                                <h3>Get best deals on your familiar local shop.</h3>
                                <p>Discount is on us!</p>
                            </div>
                            <div class="deal-card-img-1 col-5">                                
                            </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0">
                            <div class="row m-1 p-2"  id="deal-card-2">
                            <div class="deal-card-info col-7 pt-3">
                                <h3>Refer & Earn*</h3>
                                <p>Refer Markoverse to your friend and earn free credit for investment.</p>
                            </div>
                            <div class="deal-card-img-2 col-5">                                
                            </div>
                            </div>
                        </div>
                        
                
                </div>
     <script type="text/javascript">
    

        $(".slide_control-btn-right").click(function () {
            var ctrl_id = $(this).attr('id');
            var control = ctrl_id.slice(6);
            var slide_id = control + "_slide";            
            document.getElementById(slide_id).scrollLeft += 250;
        });
        
        $(".slide_control-btn-left").click(function () {
            var ctrl_id = $(this).attr('id');
            var control = ctrl_id.slice(6);
            var slide_id = control + "_slide";            
            document.getElementById(slide_id).scrollLeft -= 250;
        });
     
    
</script>