@extends('layouts.app')
@section('content')
         <div class="row">
            <div class="col-lg-4 col-md-5 p-1">
                <ul class="list-group">
                    <!-- User profile image and information-->
                    <li class="list-group-item user-info p-0">
                        <div class="user-img-container">
                            <img class="profile-img" src="https://i.pinimg.com/736x/6d/35/d8/6d35d834fe1b42b4d85c91e4ddea52ff.jpg" alt="user image">
                            
                        </div>
                        <div class="user-personal-info p-2 text-center">
                            <h3>{{auth()->user()->name}}</h3>                            
                            <h6 class="text-muted">Joined: {{date("F jS, Y", strtotime(auth()->user()->created_at))}}</h6>
                            <button type="button" class="btn btn-primary btn-sm">Edit Profile</button>
                        </div>
                    </li>
                    
                    <!-- User activity counter -->
                    <li class="list-group-item activity-counter p-0 mt-2">
                        
                            <div class="card p-1 purchase-counter bg-info col-sm-4">
                                <h5><i class="fas fa-shopping-bag"></i></h5>
                                <h4>32</h4>
                                <h6>Purchases</h6>
                            </div>
                            <div class="card p-1 investment-counter bg-warning col-sm-4">
                                <h5><i class="fas fa-rupee-sign"></i></h5>
                                <h4>6</h4>
                                <h6>Investments</h6>
                            </div>
                            <div class="card p-1 card-like-counter bg-danger col-sm-4">
                                <h5><i class="fas fa-heart"></i></h5>
                                <h4>13</h4>
                                <h6>likes</h6>
                            </div>
                        
                    </li>
                    
                    <!-- Currently invested in card -->
                    <li class="list-group-item active-card p-0 mt-2">
                        <div class="card p-1">
                            <h4 class="card-header text-center"><i class="fas fa-toggle-on"></i> Your active card</h4>
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                                                                                    
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleInvestorLike(this)" class="investors-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Investor's-like"><i class="fas fa-heart fa-lg"></i></button> 11
                                                            </span>
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                        </div>
                    </li>

                    <!-- User cards history as investor and as customer in a card with multiple tabs and each tab contain seperate carousal of investor cards and discount card-->
                    <li class="list-group-item p-0 mt-2">
                        <div class="card p-1">
                            <h4 class="card-header text-center"><i class="fas fa-history"></i> Cards history</h4>
                            <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link nav-CustomerCard active" id="nav-CustomerCard-tab" data-toggle="tab" href="#nav-CustomerCard" role="tab" aria-controls="nav-CustomerCard" aria-selected="true">As customer</a>
                                <a class="nav-item nav-link nav-investorCard" id="nav-investorCard-tab" data-toggle="tab" href="#nav-investorCard" role="tab" aria-controls="nav-investorCard" aria-selected="false">As investor</a>                                
                            </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <!-- Carousal with customer card -->
                                <div class="tab-pane nav-CustomerCard-tab-pane fade show active" id="nav-CustomerCard" role="tabpanel" aria-labelledby="nav-CustomerCard-tab">
                                    <div id="carouselExampleControls" class="carousel slide mb-0" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                        
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleCustomerLike(this)" class="customers-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Customer's-like"><i class="fas fa-heart fa-lg"></i></button> 70
                                                            </span>
                                                           
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                            <div class="carousel-item">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                        
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleCustomerLike(this)" class="customers-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Customer's-like"><i class="fas fa-heart fa-lg"></i></button> 70
                                                            </span>
                                                            
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                            <div class="carousel-item">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                        
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleCustomerLike(this)" class="customers-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Customer's-like"><i class="fas fa-heart fa-lg"></i></button> 70
                                                            </span>
                                                        
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon text-black" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon text-black" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card with investor card -->
                                <div class="tab-pane nav-investorCard-tab-pane fade" id="nav-investorCard" role="tabpanel" aria-labelledby="nav-investorCard-tab">
                                    <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                                                                                    
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleInvestorLike(this)" class="investors-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Investor's-like"><i class="fas fa-heart fa-lg"></i></button> 11
                                                            </span>
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                            <div class="carousel-item">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                                                                                    
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleInvestorLike(this)" class="investors-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Investor's-like"><i class="fas fa-heart fa-lg"></i></button> 11
                                                            </span>
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                            <div class="carousel-item">
                                            <div class="d-block w-100">
                                                <div class="card mr-auto" style="width: 100%;">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                                                                                    
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleInvestorLike(this)" class="investors-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Investor's-like"><i class="fas fa-heart fa-lg"></i></button> 11
                                                            </span>
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 col-md-7 p-1">
                <ul class="list-group">
                    <li class="list-group-item p-0">

                        <div class="card timeline-content">
                            <h4 class="card-header bg-info text-light"><i class="fas fa-shopping-bag"></i> Your purchased item</h4>
                            <div class="card-body">
                                <div class="card shop-card-home mr-auto ml-auto">	
                                    <div class="card-body shop-card-body p-0 pntr-crsr">
                                        <img class="product-image" src="https://ae01.alicdn.com/kf/HTB1FfzFX5DxK1Rjy1zcq6yGeXXao/Cotton-Solid-Denim-Jacket-Mens-2020-Spring-Autumn-Casual-Slim-Fit-Bomber-Jackets-Men-Jean-Jacket.jpg">						 			
                                    </div>

                                    <!--Card Body end-->
                                    <div class="card-footer card-to-shop-footer">
                                        <div class="row shop-info  ">
                                            <div class="col">
                                                <h5 style="margin-bottom: -1px">Sari</h5>
                                            <p class="text-muted" style="margin-bottom: 1px">By:New Gen Garment</p>
                                            <p class="mt-2 text-warning">
                                                <i class="fas fa-star" style="font-size: 10px;"></i>
                                                <i class="fas fa-star" style="font-size: 10px;"></i>
                                                <i class="fas fa-star" style="font-size: 10px;"></i>
                                                <i class="fas fa-star" style="font-size: 10px;"></i>
                                                <i class="fas fa-star-half-alt" style="font-size: 10px;"></i>
                                                <span class="text-muted" style="font-size: 10px;"> (6000)review</span>	
                                            </p>
                                            </div>
                                            <div class="col">
                                                <div class="badge btn-info bg-my-dark mx-5 px-2 mb-3 py-2">
                                                    <span class="text-white">16% OFF</span>
                                                </div>
                                                <h4 class="ml-1">
                                                    <strike class="text-muted mr-1"><i class="fas fa-rupee-sign mr-1"></i>1200</strike>
                                                    <span class="text-my-info"><i class="fas fa-rupee-sign mr-1"></i>1000
                                                    </span>
                                                </h4>
                                                
                                            </div>	
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Purchased on 22/01/2020, Durgapur</small>
                            </div>
                        </div>

                    </li>
                    <li class="list-group-item p-0 pt-2">
                        <div class="card timeline-content">
                            <h4 class="card-header bg-warning text-light"><i class="fas fa-rupee-sign"></i> Your invested card</h4>
                            <div class="card-body">
                                                <div class="card shop-card-home mr-auto ml-auto">
                                                    <div class="card-img-top text-center"> <!-- CARD BANNER - OFFER Area -->
                                                        <h5><span class="badge text-right bg-dark"><i class="fas fa-shopping-basket"></i> Grocery</span></h5>
                                                        <h1 class="offer-percent">
                                                            25% off
                                                        </h1>
                                                        <h5 class="offer-terms">
                                                            On spend of $10-$15
                                                        </h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush"> 
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Customer by : <span class="increase-percentage">40%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Profit : <span class="increase-percentage">10%</span></li>
                                                        <li class="list-group-item"><i class="fas fa-long-arrow-alt-up"></i> Increase Investor by : <span class="increase-percentage">20%</span></li>
                                                        
                                                    </ul>
                                                    <div class="card-footer pt-1 pb-1">
                                                                                                                    
                                                            <span class="footer-button">
                                                                <button type="button" onclick="toggleInvestorLike(this)" class="investors-like btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Investor's-like"><i class="fas fa-heart fa-lg"></i></button> 11
                                                            </span>
                                                            <span class="share">
                                                                <button type="button" id="share" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Share"><i class="fas fa-share-alt fa-lg"></i></button>
                                                            </span>
                                                        
                                                    </div>                        
                                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Invested on 18/01/2020, Durgapur</small>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item p-0 pt-2">
                        <div class="card timeline-content">
                            <h4 class="card-header bg-danger text-light"><i class="fas fa-heart"></i> Your liked card</h4>
                            <div class="card-body">
                                <!-- Add card here as a card  -->
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Liked on 18/01/2020, Durgapur</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>   
@endsection