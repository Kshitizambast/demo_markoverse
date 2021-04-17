

 @extends('layouts.app')

 @section('content')


<div class="container-fluid p-0">

    <div class="discountPageCover row m-0 p-3 mt-2">
        <div class="col-12 col-md-6">
            <img src="img/discountBannerImgWText.png" class="discountPageCover-img">
        </div>
        <div class="col-12 col-md-6 discountPageCover-info">
            <h2><span class="text-gradient-1">Local market</span> or <span class="text-gradient-1">Event tickets</span>, we got you covered.</h2>
            <h4><span class="text-gradient-2">Save money</span>, do it now!</h4>
        </div>
    </div>


@foreach($super_categories as $s_cat)
    @if($s_cat->id == 4)
        @break
    @endif
    
    
    @if($s_cat->id == 1)
    <?php $card_theme = 'fashion'; $card_category_name = 'Fashion'; ?>
    @elseif ($s_cat->id == 2)
    <?php $card_theme = 'food';  $card_category_name = 'Food & Drinks'; ?>
    @else
    <?php $card_theme = 'service';  $card_category_name = 'Service'; ?>
    @endif
    
    
<!-- Slider main container -->
    <div class="swiper-<?php echo($card_theme); ?>-section">
        <div class="swiper-container my-5 card-swiper card-swiper-<?php echo($card_theme); ?> pt-1">
            <div class="swiper-section-text">
                @if($s_cat->id == 1)
                <h3 class="text-gradient-2">Join and become member of this card!</h3>
                <h5 class="text-info">- Get discount on transaction with markoverse merchants.</h5>
                @elseif ($s_cat->id == 2)
                <h3 class="text-gradient-3">Become markoverse merchant and connect with huge customers directly!</h3>
                <h5 class="text-warning">- Sell products, merchandise or event tickets on markoverse.</h5>
                @else
                <h3 class="text-gradient-4">Perform transaction and unlock rewards!</h3>
                <h5 class="text-gradient-2">- Get rewards and much more from participating in events and activities.</h5>
                @endif
            </div>
        

    <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                
                
            @foreach($cards as $card)
            @if($s_cat->id == $card->super_category_id and $card->open_for_voting)
                
                @if($s_cat->id == 1)
                <?php $card_theme = 'fashion'; $card_category_name = 'Fashion'; ?>
                @elseif ($s_cat->id == 2)
                <?php $card_theme = 'food';  $card_category_name = 'Food & Drinks'; ?>
                @else
                <?php $card_theme = 'service';  $card_category_name = 'Service'; ?>
                @endif
                
                @include('components.markoCard')
            
        
            @endif
            @endforeach

            </div>
        
               
<!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            </div>
            </div>
        </div>
    </div>
          
 </div>
 @endforeach                            
@endsection