@foreach($shops as $shop)
 @if($shop->open_for_investment == 1)
  <a href="/shops/{{Crypt::encrypt($shop->id)}}" style="text-decoration: none">
    <div class="shop-card">
        <div class="shop-card-img"

        @foreach($shop_images as $shop_image)
	        @if($shop_image->my_shop_id == $shop->id)
	         style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$shop_image->filename}}');"
	        @break
	        @endif
   		 @endforeach

        >
        
         <?php
        
        date_default_timezone_set('Asia/Kolkata');
        $t = strtotime(date('H:i:s', time()));
        
        $opening_time = $shop->opening_time;
        $opening_time =  strtotime($opening_time);
        
        $closing_time = $shop->closing_time;
        $closing_time =  strtotime($closing_time);
        
        ?>
        
            @if(($shop->is_open_now == 1) && ((($opening_time<=$t)&&($t<=$closing_time))==1))
            <span class="badge badge-pill badge-success text-light"><p class="m-0"><i class="fas fa-toggle-on"></i>&nbsp;Open</p></span>
             @elseif($shop->is_open_now == 0 || (($opening_time<=$t)&&($t<=$closing_time))==0)
            <span class="badge badge-pill badge-danger"><p class="m-0"><i class="fas fa-toggle-off"></i>&nbsp;Closed</p></span> 
            
            @endif
        </div>
        <div class="shop-card-info p-2">

            <h5 class="shop-name text-center">{{$shop->shop_name}}</h5>

            <span class="shop-address flexRow ml-1"><i class="fas fa-map-marked-alt"></i>&nbsp;<p>{{$shop->address}}</p></span>
            
            <div class="shop-featuredItem">
                <h6>Popular items :</h6>
                <div class="flexRow">
                    <tt class="text-sm">Feature to be added soon</tt>
                    <!--<span class="featured-item-img" style="background: url('img/homepageImg/ovenImg2.jpg');"></span>-->
                    <!--<span class="featured-item-img" style="background: url('img/homepageImg/washingMachine.jpg');"></span>-->
                    <!--<span class="featured-item-img" style="background: url('img/homepageImg/refrigerator.webp');"></span>-->
                </div>
            </div>
        </div>
    </div>
 </a>
 @endif
@endforeach