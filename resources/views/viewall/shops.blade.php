 @extends('layouts.app')
 @section('content')

<div class="shopGrid pt-3">

<h3 class="text-center">All shops in <b>Fashion</b></h3>

<div class="row m-0 p-0">
    
    
    
    <div class="col col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0 p-1">
        <div class="grid-shop-card">
            <div class="shop-card-img" style="background: url('homepageImg/electronicsStore.jpg');">
                <span class="badge badge-pill badge-dark"><h3 class="m-0"><i class="fas fa-store"></i></h3></span>
            </div>
            <div class="shop-card-info p-2">

                <h5 class="shop-name text-center">Bijli electronics store</h5>

                <span class="shop-address flexRow ml-1"><i class="fas fa-map-marked-alt"></i>&nbsp;<p>P/69, Near Kona Chowk, Lonerwala gali, Goonpur</p></span>
                
                <div class="shop-featuredItem">
                    <h6>Popular items :</h6>
                    <div class="d-flex justify-content-between">
                        <span class="featured-item-img" style="background: url('homepageImg/ovenImg2.jpg');"></span>
                        <span class="featured-item-img" style="background: url('homepageImg/washingMachine.jpg');"></span>
                        <span class="featured-item-img" style="background: url('homepageImg/refrigerator.webp');"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
</div>

</div>

 @endsection