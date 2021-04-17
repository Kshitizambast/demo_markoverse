<div class="row mt-2 px-5">
		@foreach($super_categories as $s_cat)
			<div class="col">
				<a href="#">
					 <div class="card bg-dark text-white" style="">
					  {{-- <img src="{{asset('img/img_bg_1.jpg')}}" class="card-img img-thumbnail" alt="..." style="filter: blur(2px); height: 200px"> --}}
					  <div class="card-img-overlay">
					    <h3 class="card-title mt-5 pl-3">{{$s_cat->category_name}}</h3>
					    <p class="card-text pl-3">{{$s_cat->descriptions}}</p>
					  </div>
					</div>
				</a>
			</div>
     	@endforeach

</div>



<ul class="list-group pt-2 pb-3">

                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/homepage_carousel_img_2.webp')}}">
                                <div class="tab-icon text-center"><i class="fas fa-tshirt" style="color: white;"></i></div>
                                <div class="h3 tab-caption">Fashion</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Garments <br/>Footwear <br/>Goggles</span></div>
                            </div>
                        </li>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/serviceIMG.jpg')}}">
                                <div class="tab-icon text-center"><i class="fas fa-hands-helping" style="color: white;"></i></div>
                                <div class="h3 tab-caption">Services</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Beauty-Spa <br/>Gym <br/>Mechanic</span></div>
                            </div>
                        </li>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/homepage_carousel_img_3.jpg')}}">
                                <div class="tab-icon text-center"><i class="fas fa-utensils" style="color: white;"></i></div>
                                <div class="h3 tab-caption">Food & Drink</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Restaurant <br/>Cafe <br/>Beverages</span></div>
                            </div>
                        </li>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/travel.webp')}}">
                                <div class="tab-icon text-center"><i class="fas fa-route" style="color: white;"></i></div>
                                <div class="h3 tab-caption">Travelling</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Cab <br/>Taxi <br/>Agents</span></div>
                            </div>
                        </li>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/eventIMG.jpg')}}">
                                <div class="tab-icon text-center"><i class="fas fa-glass-cheers" style="color: white;"></i></div>
                                <div class="h3 tab-caption">Event Management</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Party-Organizer <br/>Wedding <br/>Lodging</span></div>
                            </div>
                        </li>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mt-3">
                        <li class="list-group-item p-0">                                                                
                            <div class="card category-tab">
                                <img src="{{asset('img/homepage_carousel_img_1.jpg')}}">
                                <div class="tab-icon text-center"><i class="fas fa-store" style="color: white;"></i></div>
                                <div class="h3 tab-caption">General Store</div>
                                <div class="caption-info-overlay text-center"><span class="caption-info">Grocery <br/>Stationary <br/>Variety-store</span></div>
                            </div>
                        </li>
                    </div>

                </div>

            </ul>
