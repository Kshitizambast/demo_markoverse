
		<div class="row" id="offers">
		 @foreach($products as $product)
			<div class="col-lg-4 col-sm-6 mb-5">
				<div class="card shop-product-card">	
					<div class="card-body shop-card-body pntr-crsr">
						@if(\Auth::check())
							<a href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}">
								@foreach($images as $image)
									@if($image->product_id == $product->id)
									<img src="https://markoversepublic.s3.ap-south-1.amazonaws.com/{{$image->filename}}" {{-- height="250px" --}} style="width: 100%; height: 220px; object-fit: contain;">
									@break
									@endif
								@endforeach
						    </a> 

						@else
							<a href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}">
								@foreach($images as $image)
									@if($image->product_id == $product->id)
									<img src="https://markoversepublic.s3.ap-south-1.amazonaws.com/{{$image->filename}}" {{-- height="250px" --}} style="width: 100%; height: 220px; object-fit: contain;">
									@break
									@endif
								@endforeach
							</a>

						@endif
				</div>

				<!--Card Body end-->
					<div class="card-footer card-to-shop-footer">
						<div class="row mr-0 ml-0 shop-info  ">
							<div class="col-6 p-1 text-center">
								<h5 style="margin-bottom: -1px">{{$product->product_name}}</h5>
							<p class="text-muted" style="margin-bottom: 1px">By:{{App\Product::shopName($product->my_shop_id)}}</p>
							{{-- <p class="mt-2 text-warning">
								<i class="fas fa-star" style="font-size: 10px;"></i>
								<i class="fas fa-star" style="font-size: 10px;"></i>
								<i class="fas fa-star" style="font-size: 10px;"></i>
								<i class="fas fa-star" style="font-size: 10px;"></i>
								<i class="fas fa-star-half-alt" style="font-size: 10px;"></i>
								<span class="text-muted" style="font-size: 10px;"> (6000)review</span>	
							</p> --}}
							</div>
							<div class="col-6 p-1 text-center">
								<h4 class="ml-1">
									<strike class="text-muted mr-1"><i class="fas fa-rupee-sign mr-1"></i>{{$product->regular_price}}</strike>
									<br>
									<span class="text-my-info "><i class="fas fa-rupee-sign mr-1"></i>{{ceil($product->disscount_price)}}
									</span>
								</h4>
								<div class="badge bg-my-dark text-center px-2 py-2">
								 <span class="text-white">{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}% OFF</span>
							    </div>
							</div>

							
						</div>
						
					</div>

					<!--Card Footer end-->
				</div>
				<!--Card End-->	
			</div>
			 @endforeach
			
		</div>