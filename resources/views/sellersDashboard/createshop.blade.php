@extends('layouts.app')

@section('content')
	
	<div class="row mt-3">
		<div class="col p-5">
			<h1 class="text-center"><span class="font-weight-light font-italic">Covalent And You</span></h1>
			<br />
			<h3 class="text-center grey-text ml-5 font-weight-light font-italic">We Help You to Grow Your Bussiness. Just Buy The Cards And Sit Back For Flood Of Customers</h3>
		</div>
	</div>

	<div class="row mt-2 pt-3">
		<div class="col-md-8 py-3" >
			<div class="card cta-box bg-my-dark text-white">
				<div class="card-body">
								<form class="text-center p-5 font-weight-light font-italic" method="post" action="dashboard/owner/{{auth()->user()->id}}/shop">

					    {{csrf_field()}}

					    <div class="form-row mb-4">
					        <div class="col">
					            <!-- Shop name -->
					            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Shop Name" name="shop_name">
					        </div>
					        <div class="col">
					            <!-- Shop Phone -->
					            <input type="text" id="defaultRegisterForm" class="form-control" placeholder="Shop Phone" name="shop_phone">
					        </div>
					    </div>

					    <div class="form-row mb-4">
					        <div class="col">
					           <!-- Password -->
								    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterForm" name="password">
								    
					        </div>
					        <div class="col">
					           <!-- Confirm Password -->
								    <input type="password" id="defaultRegisterForm" class="form-control" placeholder="Confirm Password"   name="password_confirmation" required>
								
					        </div>
					        
					    </div>

					    <div class="form-row mb-4">
					        <div class="col">
					           <!-- Profit -->
								    <input type="text" id="defaultRegisterForm" class="form-control" placeholder="Current Profit" aria-describedby="defaultRegisterForm" name="current_profit">
								    
					        </div>
					        <div class="col">
					           <!-- Min_range_goods -->
								    <input type="text" id="defaultRegisterForm" class="form-control" placeholder="Min Range Of Goods"  name="min_price_range_of_goods">
								
					        </div>

					        <div class="col">
					           <!-- Max_range_goods -->
								    <input type="text" id="defaultRegisterForm" class="form-control" placeholder="Max Range Of Goods" name="max_price_range_of_goods" >
								
					        </div>
					        
					    </div>

					     <div class="form-row mb-4">
					        <div class="col">
					        	 <input type="text" id="defaultRegisterForm" class="form-control" placeholder="Street Address" name="address">
					        </div>
					    </div>

					    <div class="form-row mb-4">
					        <div class="col">
					          
								    <!-- Disscount by Seller -->
								    <input type="text" id="defaultRegisterForm" class="form-control mb-4" placeholder="Affordable Disscount" name="affordable_disscount">

					        </div>
					        <div class="col">
					        	<input type="text" id="defaultRegisterForm" class="form-control mb-4" placeholder="Number Of Shops" name="number_of_shops">

					        </div>
					    </div>

					    <div class="form-row mb-4">
					        <div class="col">
					          
								    <!-- Landmark -->
								    <input type="text" id="defaultRegisterForm" class="form-control mb-4" placeholder="About The Shop" name="description">

					        </div>
					        <div class="col">

							    <div class="custom-control custom-checkbox">
								    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="can_you_deliver">
								    <label class="custom-control-label" for="defaultUnchecked">Can You Deliver</label>
								</div>
							      
					        </div>
					        
					    </div>

					
					    <!-- Newsletter -->
					    <div class="custom-control custom-checkbox">
					        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter" name="ecommerce_need">
					        <label class="custom-control-label" for="defaultRegisterForm">Tell Us If You Want Our E-commerce to help you.</label>
					    </div>

					    <!-- Sign up button -->
					    <button class="btn btn-lg btn-purple my-4 float-left" type="submit">Open Shop</button>
					    <hr >
					    <!-- Terms of service -->
					    <p>By clicking
					        <em>Sign up</em> you agree to our
					        <a href="" target="_blank">terms of service</a>

					</form>
				</div>
			</div>
						<!-- Default form register -->
		
		<!-- Default form register -->
		</div>

		<div class="col-md-4 text-center p-5">
			<div class="feature-lists">
				<h4 class="font-weight-light font-italic">We Help You To..</h4>
				<ul class="list-group list-group-flush">
				  <li class="list-group-item grey-text font-weight-light font-italic">Understand the market. And Give you the Investors To
				  Spread the words</li>
				  <!-- <li class="list-group-item">Dapibus ac facilisis in</li>
				 
				  <li class="list-group-item">Porta ac consectetur ac</li>
				  <li class="list-group-item">Vestibulum at eros</li> -->
				   <li class="list-group-item font-weight-light font-italic">Buy Cards..The best You get is our priority</li>
				    <li class="list-group-item font-weight-light font-italic">The Shop Is 90% Yours And 10% belongs To Investors<a href="#">More....</a></li>
				</ul>
			</div>
		</div>
	</div>


	   
@endsection