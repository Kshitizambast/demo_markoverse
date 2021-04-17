
 @extends('layouts.app')
 @section('content')
 
<div class="jumbotron shadow jumbotron-shopProfile m-2">
    <div class="container jumbotron-shopProfileContent">
        <h1 class="display-4 shop_name">Shop name</h1>
        <p class="lead"><i class="fas fa-map-marker-alt p-1"></i> Address of the shop</p>
        <hr class="my-4">
        <p><i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="fas text-warning fa-star-half-alt"></i>&nbsp;4.5 (888 ratings)</p>
        
        <div class="row p-0 m-0">
            <div class="col-4 p-0">
                <p class="lead">
                    <a class="btn btn-light btn-sm" href="#" role="button">Shop category</a>
                </p>
            </div>
            <div class="col-8 text-right p-0">
                <div class="shop-time">
                <p class="p-1 m-0">Open : 09:00 am</p>
                <p class="p-1 m-0">Close: 09:00 pm</p>
                </div>
            </div>
        </div>
        <div class="achievement-section shadow">
            <span class="badge-header">Achievements</span>
            <br/>
            <div class="badge-box shadow-inset"> 
                <div class="badge-scroll flexRow">               
                    <div class="badge-circle">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>
                    <div class="badge-circle">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>
                    <div class="badge-circle">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>
                    <div class="badge-circle">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>
                    <div class="badge-circle">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shop navigation tabs and switch below -->

<div class="shop-tabs p-1">
    <ul class="nav nav-pills shopProfile-nav-pills mb-3" id="pills-tab-shopProfile" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-shopHere-tab" data-toggle="pill" href="#pills-shopHere" role="tab" aria-controls="pills-shopHere" aria-selected="true"><i class="fas fa-store mr-2"></i> Shop Here</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-suggestCard-tab" data-toggle="pill" href="#pills-suggestCard" role="tab" aria-controls="pills-suggestCard" aria-selected="false"><i class="far fa-grin mr-2"></i> Suggest coupons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-investmentStats-tab" data-toggle="pill" href="#pills-investmentStats" role="tab" aria-controls="pills-investmentStats" aria-selected="false"><i class="fas fa-rupee-sign mr-2"></i> Investment States</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-photos-tab" data-toggle="pill" href="#pills-photos" role="tab" aria-controls="pills-photos" aria-selected="false"><i class="far fa-image"></i> Photos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false"><i class="fas fa-info-circle mr-2"></i> About Shop</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent-shopProfile">
        <div class="tab-pane fade show active" id="pills-shopHere" role="tabpanel" aria-labelledby="pills-shopHere-tab">

            <!-- Applied coupon and best product section below -->

            <div class="row m-0 p-0">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-4 p-1">
                    <div class="ml-auto mr-auto">
                    <div class="appliedCoupon-shop" style="position: relative;">  
                            
                            <div class="Ccoupon Ccoupon-food ml-auto mr-auto">
                            <span class="couponTagImg" style="background-image: url('images/tagCoupon.png');"></span> 
                                <div class="Ccategory">
                                    Food &amp; Drinks
                                </div>
                                

                                <div class="Coffer">
                                    <div class="offer-value">
                                        88% off
                                    </div>

                                    <div class="offer-term">
                                        ** Valid for 10 days
                                    </div>
                                </div>

                                <div class="CofferDetails">
                                    <div class="offer-title">
                                        Get assured 88% off <br>
                                        on minimum order of upto Rs.88888
                                    </div>
                                    <ul class="offer-lists">
                                        <li>Save upto Rs.888 on your purchase.</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Activation Chances: 88%</li>
                                    </ul>
                                    
                                </div>
                                <div class="Cbtn-grp">
                                    <a href="#"></a>
                                    <a href="#"></a>
                                    <a href="#"></a>
                                </div>

                            </div> 
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 col-xl-8 p-1">

                    <div class="bestProductBox p-2 bg-dark text-light">
                        <div class="bestProductBox-header">
                        <h3 class="float-left">Best in the shop</h3>                        
                            <a class="btn btn-light btn-sm float-right" href="#" role="button">view all</a>                
                        </div>
                        <br/>
                        <div class="row w-100 m-0 p-0 mt-3">

                            <div class="product-catalogue-scroll scrollHandle" id="bestproductCatalogue_slide">
                                
                                <div class="bestproductCatalogue_slide_control-left productCatalogue_slide_control-left">                                   
                                    <button class="btn slide_control-overlaybtn-left" id="Lctrl-bestproductCatalogue"><h5 class="m-0"><i class="fas fa-chevron-left"></i></h5></button>
                                </div>

                                <div class="bestproductCatalogue_slide_control-right productCatalogue_slide_control-right">
                                    <button class="btn slide_control-overlaybtn-right" id="Rctrl-bestproductCatalogue"><h5 class="m-0"><i class="fas fa-chevron-right"></i></h5></button>
                                </div>


                                <div class="product-catalogue-content flexRow m-1">
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                                    <div class="product-card">
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
                    </div>

                </div>
            </div>

            <!-- category cards section below -->

            <div class="category-card-section-shopProfile shadow mt-3">
                <h3 class="category-header text-center shadow"> Shop by category </h3>
                <div class="category-card-section">
                    <div class="row p-0">
                        <div class="col">
                            <div class="category-card shadow ml-auto mr-auto">
                                <img class="category-card-backdrop" src="../CssFiles/indieBGpatternCompressed.png">
                                <h5 class="category-card-header">Men's Fashion</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-card shadow ml-auto mr-auto">
                                <img class="category-card-backdrop" src="../CssFiles/indieBGpatternCompressed.png">
                                <h5 class="category-card-header">Women's Fashion</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-card shadow ml-auto mr-auto">
                                <img class="category-card-backdrop" src="../CssFiles/indieBGpatternCompressed.png">
                                <h5 class="category-card-header">Kid's Fashion</h5>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-card shadow ml-auto mr-auto">
                                <img class="category-card-backdrop" src="../CssFiles/indieBGpatternCompressed.png">
                                <h5 class="category-card-header">Fashion Accesories</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- best product in category section -->

            <div class="row m-0 p-0 mt-3">

                <div class="flexRow product-catalogue-titlebar">
                    <h4 class="m-0 p-1">Men's shirt collection</h4>
                    <a class="text-right ml-auto p-2" href="#">view all</a>
                </div>

                <div class="product-catalogue-scroll scrollHandle" id="productCatalogue_slide">
                    
                    <div class="productCatalogue_slide_control-left">                                   
                        <button class="btn slide_control-overlaybtn-left" id="Lctrl-productCatalogue"><h5 class="m-0"><i class="fas fa-chevron-left"></i></h5></button>
                    </div>

                    <div class="productCatalogue_slide_control-right">
                        <button class="btn slide_control-overlaybtn-right" id="Rctrl-productCatalogue"><h5 class="m-0"><i class="fas fa-chevron-right"></i></h5></button>
                    </div>


                    <div class="product-catalogue-content flexRow m-3">
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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
                        <div class="product-card">
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

            <!-- list style with image catalogue section -->

            <div class="list-catalogue1 mt-3 mb-3">
                <div class="list-catalogue1-header">
                    <h4 class="float-left">Items in category name</h4>
                    <a class="btn btn-light btn-sm float-right" href="#" role="button">view all</a>
                </div>
                <div class="list-catalogue1-container">
                    <div class="row p-0">
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="list-catalogue-enclosure flexRow">
                                <div class="list-catalogue1-img" style="background: url('../homePage/homepageImg/mensShirt.webp');"></div>
                                <div class="list-catalogue1-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="list-catalogue-enclosure flexRow">
                                <div class="list-catalogue1-img" style="background: url('../homePage/homepageImg/mensShirt.webp');"></div>
                                <div class="list-catalogue1-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="list-catalogue-enclosure flexRow">
                                <div class="list-catalogue1-img" style="background: url('../homePage/homepageImg/mensShirt.webp');"></div>
                                <div class="list-catalogue1-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="list-catalogue-enclosure flexRow">
                                <div class="list-catalogue1-img" style="background: url('../homePage/homepageImg/mensShirt.webp');"></div>
                                <div class="list-catalogue1-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            </div>
                        </div>                                               
                    </div>
                </div>
                
            </div>

            <!-- list style catalogue without image -->

            <div class="list-catalogue2 mt-3 mb-3">
                <div class="list-catalogue2-header">
                    <h4 class="float-left">Items in category name</h4>
                    <a class="btn btn-light btn-sm float-right" href="#" role="button">view all</a>
                </div>
                <div class="list-catalogue2-container">
                    <div class="row p-0">
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 flexRow">
                                
                                <div class="list-catalogue2-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 flexRow">
                                
                                <div class="list-catalogue2-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 flexRow">
                                
                                <div class="list-catalogue2-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            
                        </div>
                        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 flexRow">
                                
                                <div class="list-catalogue2-info">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Product name</h5>
                                        <span class="badge badge-pill badge-danger">-30%</span>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <span><b>Rs.1199</b>&nbsp;<del>1499</del></span>
                                    </a>
                                </div>
                            
                        </div>
                                                      
                    </div>
                </div>
                
            </div>

        </div>
        <div class="tab-pane fade" id="pills-suggestCard" role="tabpanel" aria-labelledby="pills-suggestCard-tab">...</div>
        <div class="tab-pane fade" id="pills-investmentStats" role="tabpanel" aria-labelledby="pills-investmentStats-tab">...</div>
        <div class="tab-pane fade" id="pills-photos" role="tabpanel" aria-labelledby="pills-photos-tab">...</div>
        <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">...</div>
    </div>    
</div>


 @endsection