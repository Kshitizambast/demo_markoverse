<div class="row m-0 p-0" style="margin-top: 5% !important;">
    <div class="category-browser-section p-0">
        <div class="category-browser-section-title px-3">
            <h1 class="mt-2"><b>A look inside</b></h1>
        </div>
        <div class="pills-scroll px-3">
            <ul class="nav nav-pills nav-pills-homePage d-flex justify-content-center mt-3 pb-3" id="pills-tab" role="tablist">
                <li class="nav-item m-3" role="presentation">
                    <a class="nav-link sub-category-tab-header-food active" id="pills-food-tab" data-bs-toggle="pill" href="#pills-food" role="tab" aria-controls="pills-food" aria-selected="true">
                        <div class="sub-category-tab-header sub-category-tab-header-food">
                            <span class="p-2">Food & Drinks</span>
                            <span class="tab-header-thumb tab-thumb-food"></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item m-3" role="presentation">
                    <a class="nav-link sub-category-tab-header-fashion" id="pills-fashion-tab" data-bs-toggle="pill" href="#pills-fashion" role="tab" aria-controls="pills-fashion" aria-selected="false">
                        <div class="sub-category-tab-header sub-category-tab-header-fashion">
                            <span class="p-2">Fashion</span>
                            <span class="tab-header-thumb tab-thumb-fashion"></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item m-3" role="presentation">
                    <a class="nav-link sub-category-tab-header-service" id="pills-service-tab" data-bs-toggle="pill" href="#pills-service" role="tab" aria-controls="pills-service" aria-selected="false">
                        <div class="sub-category-tab-header sub-category-tab-header-service">
                            <span class="p-2">Service</span>
                            <span class="tab-header-thumb tab-thumb-service"></span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            
             <!-- Food & Drinks section tab starts -->
            
            <div class="tab-pane food-bg pt-2 pb-2 fade show active" id="pills-food" role="tabpanel" aria-labelledby="pills-food-tab">
                <!-- Shops poster below -->
                <div class="row shop-poster-section d-none m-0 p-1 pb-3">
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-1"></div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-2"></div>
                    </div>
                    <div class="col-xl-4 col-sm-12 mt-3">
                        <div class=" shop-poster shop-poster-3"></div>
                    </div>
                </div>
                <!-- Products of respective category below -->
                <div class="product-slider-section">
                    <h2 class="mt-3 px-3"><b>Featured products</b></h2>
                    <!-- Slider main container -->
                    <div class="swiper-container pt-1">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($shops as $shop)
                            @if(App\Category::find($shop->category_id)->super_categories_id == 2)
                            <? $count = 0 ?>
                            @foreach($shop->products as $product)
                            <? $count += 1 ?>
                            @if ($product->disscount_price > 0 and $count < 5) <div class="swiper-slide">
                                <a @if(\Auth::check()) href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}" @else href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}" @endif style="text-decoration: none; color:inherit;">
                                <div class="product-card">
                                    <span class="product-card-badge">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% off</span>
                                    <div class="lazy product-card-img" @foreach($images as $image) @if($image->product_id == $product->id)
                                            style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"
                                            @break
                                            @endif
                                            @endforeach></div>
                                    <div class="product-card-info">
                                        <span class="product-card-name">{{$product->product_name}}</span>
                                        <span class="product-card-shop">{{App\MyShop::find($product->my_shop_id)->shop_name}}</span>
                                        <span class="product-card-price"><del>₹{{$product->regular_price}}</del></span>
                                        <span class="product-card-discount-price">₹{{$product->disscount_price}}</span>
                                        <button class="btn btn-sm btn-outline-light">Grab Deal</button>
                                    </div>
                                </div>
                                </a>
                        </div>
                        @else
                        @break
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
            <!-- Markoverse card for respective category -->
            <div class="marko-card-section">

                <!-- Slider main container -->
                <div class="swiper-food-section">
                    <div class="swiper-container card-swiper card-swiper-food pt-1">
                        <div class="swiper-section-text">
                            <h3 class="text-gradient-2">Join and become member of this card!</h3>
                            <h5 class="text-info">- Get discount on transaction with markoverse merchants.</h5>
                        </div>
            
                <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            
                                @foreach($all_cards as $card)
                                @if($card->super_category_id == 2 and $card->open_for_voting)
                                
                                <?php $card_theme = 'food';  $card_category_name = 'Food & Drinks'; ?>
                                @include('components.markoCard')
        
                                @endif
                                @endforeach
                                
                                
                        </div>
                        
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                            
                    </div>
                </div>
            </div>
            
            <!-- Food & Drinks section tab ends -->
            
        </div>
        
        <!-- Fashion section tabs starts -->
        
        <div class="tab-pane lazy fashion-bg pt-2 pb-2 fade" id="pills-fashion" role="tabpanel" aria-labelledby="pills-fashion-tab">
            <!-- Shops poster below -->
                <div class="row shop-poster-section d-none m-0 p-1 pb-3">
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-1"></div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-2"></div>
                    </div>
                    <div class="col-xl-4 col-sm-12 mt-3">
                        <div class=" shop-poster shop-poster-3"></div>
                    </div>
                </div>
                <!-- Products of respective category below -->
                <div class="lazy product-slider-section">
                    <h2 class="mt-3 px-3"><b>Featured products</b></h2>
                    <!-- Slider main container -->
                    <div class="swiper-container pt-1">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($shops as $shop)
                            @if(App\Category::find($shop->category_id)->super_categories_id == 1)
                            <? $count = 0 ?>
                            @foreach($shop->products as $product)
                            <? $count += 1 ?>
                            @if ($product->disscount_price > 0 and $count < 5) <div class="swiper-slide">
                            <a @if(\Auth::check()) href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}" @else href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}" @endif style="text-decoration: none; color:inherit;">
                                <div class="product-card">
                                    <span class="product-card-badge">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% off</span>
                                    <div class="lazy product-card-img" @foreach($images as $image) @if($image->product_id == $product->id)
                                            style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"
                                            @break
                                            @endif
                                            @endforeach></div>
                                    <div class="product-card-info">
                                        <span class="product-card-name">{{$product->product_name}}</span>
                                        <span class="product-card-shop">{{App\MyShop::find($product->my_shop_id)->shop_name}}</span>
                                        <span class="product-card-price"><del>₹{{$product->regular_price}}</del></span>
                                        <span class="product-card-discount-price">₹{{$product->disscount_price}}</span>
                                        <button class="btn btn-sm btn-outline-light">Grab Deal</button>
                                    </div>
                                </div>
                                </a>
                        </div>
                        @else
                        @break
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
            <!-- Markoverse card for respective category -->
            <div class="marko-card-section">

                <!-- Slider main container -->
            <div class="swiper-fashion-section">
                <div class="swiper-container card-swiper card-swiper-fashion pt-1">
                    <div class="swiper-section-text">
                        <h3 class="text-gradient-3">Become markoverse merchant and connect with huge customers directly!</h3>
                        <h5 class="text-warning">- Sell products, merchandise or event tickets on markoverse.</h5>
                    </div>
        
            <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        
                            @foreach($all_cards as $card)
                            @if($card->super_category_id == 2 and $card->open_for_voting)
                            
                            <?php $card_theme = 'fashion';  $card_category_name = 'Fashion'; ?>
                            @include('components.markoCard')
    
                            @endif
                            @endforeach
                            
                            
                    </div>
                    
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                        
                </div>
            </div>
            </div>
            
        </div>
        
        <!-- Fashion section tabs ends -->
        
        <!-- Service section tabs starts -->
        
        <div class="lazy tab-pane service-bg pt-2 pb-2 fade" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
            
            <!-- Shops poster below -->
                <div class="row shop-poster-section d-none m-0 p-1 pb-3">
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-1"></div>
                    </div>
                    <div class="col-xl-4 col-sm-6 mt-3">
                        <div class=" shop-poster shop-poster-2"></div>
                    </div>
                    <div class="col-xl-4 col-sm-12 mt-3">
                        <div class=" shop-poster shop-poster-3"></div>
                    </div>
                </div>
                <!-- Products of respective category below -->
                <div class="lazy product-slider-section">
                    <h2 class="mt-3 px-3"><b>Featured products</b></h2>
                    <!-- Slider main container -->
                    <div class="swiper-container pt-1">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($shops as $shop)
                            @if(App\Category::find($shop->category_id)->super_categories_id == 3)
                            <? $count = 0 ?>
                            @foreach($shop->products as $product)
                            <? $count += 1 ?>
                            @if ($product->disscount_price > 0 and $count < 10) <div class="swiper-slide">
                                <a @if(\Auth::check()) href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}" @else href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}" @endif style="text-decoration: none; color:inherit;">
                                <div class="product-card">
                                    <span class="product-card-badge">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% off</span>
                                   <div class="lazy product-card-img" @foreach($images as $image) @if($image->product_id == $product->id)
                                            style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"
                                            @break
                                            @endif
                                            @endforeach></div>
                                    <div class="product-card-info">
                                        <span class="product-card-name">{{$product->product_name}}</span>
                                        <span class="product-card-shop">{{App\MyShop::find($product->my_shop_id)->shop_name}}</span>
                                        <span class="product-card-price"><del>₹{{$product->regular_price}}</del></span>
                                        <span class="product-card-discount-price">₹{{$product->disscount_price}}</span>
                                        <button class="btn btn-sm btn-outline-light">Grab Deal</button>
                                    </div>
                                </div>
                                </a>
                        </div>
                        @else
                        @break
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>
            <!-- Markoverse card for respective category -->
            <div class="marko-card-section">

                <!-- Slider main container -->
                <div class="swiper-service-section">
                    <div class="swiper-container card-swiper card-swiper-service pt-1">
                        <div class="swiper-section-text">
                           <h3 class="text-gradient-4">Perform transaction and unlock rewards!</h3>
                            <h5 class="text-gradient-2">- Get rewards and much more from participating in events and activities.</h5>
                        </div>
            
                <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            
                                @foreach($all_cards as $card)
                                @if($card->super_category_id == 2 and $card->open_for_voting)
                                
                                <?php $card_theme = 'service';  $card_category_name = 'Service'; ?>
                                @include('components.markoCard')
        
                                @endif
                                @endforeach
                                
                                
                        </div>
                        
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                            
                    </div>
                </div>
            </div>
            
            
        </div>
        
        <!-- Service section tabs ends -->
        
    </div>
</div>
</div>

