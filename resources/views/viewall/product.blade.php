 @extends('layouts.app')
 
 @section('content')
 
    <div class="productGrid pt-3">

    <h3 class="text-center">All products in <b>Men's Fashion</b></h3>
    
    <div class="row m-0 p-0">
        
        
        
        <div class="col col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 p-0 p-1">
            <div class="grid-product-card w-100">
                <div class="product-cardImg" style="background: url('../homePage/homepageImg/mensShirt.webp');">
                    <span class="badge badge-pill badge-danger">-30%</span>
                </div>
                <div class="product-cardInfo bg-dark text-light">
                    <p class="text-center"><i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="fas text-warning fa-star-half-alt"></i>&nbsp;4.5</p>
                    <h5 class="productBrand">Arrow</h5>
                    <p class="productDescr">Grey casual shirt with white color shade collor</p>
                    <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                </div>
            </div>
        </div>
        
        
        
    </div>

    </div>
 
 @endsection