@extends('layouts.app')
@section('content')

<div class="product-grid-box bg-light text-dark">
    <h4 class="product-grid-title-food p-3">All shops on <b>Markoverse</b></b></h4>
    <div class="product-grid row m-0 p-0">
        @foreach($shops as $shop)

        @if($shop->open_for_investment == 1)
        <a class="lazy col col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-0 d-flex justify-content-center" href="shops/{{Crypt::encrypt($shop->id)}}" style="text-decoration: none; color:inherit;">
            <div class="product-card">
                <?php

                date_default_timezone_set('Asia/Kolkata');
                $t = strtotime(date('H:i:s', time()));

                $opening_time = $shop->opening_time;
                $opening_time =  strtotime($opening_time);

                $closing_time = $shop->closing_time;
                $closing_time =  strtotime($closing_time);

                ?>

                @if(($shop->is_open_now == 1) && ((($opening_time<=$t)&&($t<=$closing_time))==1)) 
                <span class="product-card-badge bg-success text-light">Open</span>
                    @elseif($shop->is_open_now == 0 || (($opening_time<=$t)&&($t<=$closing_time))==0) 
                    <span class="product-card-badge bg-danger text-light">Closed</span>
                        @endif

                        <div class="product-card-img" @foreach($shop_images as $shop_image) @if($shop_image->my_shop_id == $shop->id)
                            style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$shop_image->filename}}');"
                            @break
                            @endif
                            @endforeach
                            ></div>
                        <div class="product-card-info">
                            <span class="product-card-name">{{$shop->shop_name}}</span>
                            <span class="product-card-shop" style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">{{$shop->address}}</span>
                            <button class="btn btn-sm btn-outline-dark">Shop page</button>
                        </div>
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>


@endsection