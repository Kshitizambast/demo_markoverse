@extends('layouts.shop_admin')
@section('content')
<h5 class="mt-3">Add Products</h5>
<hr />
@include('inc.messages')
<form method="post" action="{{route('shop.addproduct')}}"> 
     {{csrf_field()}}
<div class="row">
	 <div class="col-8">
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
			
				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Title</label>
				        <input type="text" id="simpleinput" name="product_name" class="form-control" required>
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Description</label>
				        <textarea class="form-control" name="article-ckeditor" rows="5" required></textarea>
				    </div>

				    {{-- <div class="form-group mb-3">
				        <label for="example-fileinput">Product Image</label>
				        <input type="file" id="example-fileinput" class="form-control-file">
				    </div> --}}

                    <input type="hidden" name="shop_id" value="1">


				
			</div> <!-- end col -->

			

			</div>
	 		</div>
	 	</div>
	 </div>
	 <div class="col-4">
	 	<div class="card">
	 		<div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-2">Recent Activity</h4>
                    <div class="timeline-alt pb-0">
                        <div class="timeline-item">
                            <i class="fas fa-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="fas fa-plane-departure bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="font-weight-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">30 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="fas fa-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="font-weight-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="fas fa-upload bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Audrey Tobey</a>
                                <small>Uploaded a photo
                                    <span class="font-weight-bold">"Error.jpg"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">14 hours ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline -->
            </div>
	 	</div>
	 </div>
</div>
<hr />
<div class="row">
	 <div class="col-8">
	 	<h3>Pricing</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
				
				    <div class="form-group mb-3">
				        <label for="simpleinput">Current Price</label>
				        <input type="text" id="simpleinput" name="regular_price" class="form-control" required>
				    </div>

                    <div class="form-group mb-3">
                        <label for="simpleinput">Disscount Price</label>
                        <input type="text" placeholder="Same as Current Price" id="simpleinput" name="disscount_price" class="form-control" required>
                    </div>

				    <div class="form-group mb-3">
				        <label for="simpleinput">Profit Margin You Look For</label>
                        <input type="text" id="simpleinput" name="margin_of_profit" placeholder="in Percentage (%)" class="form-control">
				    </div>
				
			</div> <!-- end col -->
			</div>
	 		</div>
	 	</div>
	 </div>
	 
	 <div class="col-4 mt-4">
	 		<div class="card">
	 		<div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-2">Recent Activity</h4>
                    <div class="timeline-alt pb-0">
                        <div class="timeline-item">
                            <i class="fas fa-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <i class="fas fa-upload bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Audrey Tobey</a>
                                <small>Uploaded a photo
                                    <span class="font-weight-bold">"Error.jpg"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">14 hours ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline -->
            </div>
	 	</div>
	 </div>
</div>

<hr />
<div class="row mb-2">
	 <div class="col-8">
	 	<h3>SEOs</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
                     <div class="form-group mb-3">
                        <label for="simpleinput">Category</label>
                        <input type="text" id="simpleinput" name="category" class="form-control">
                    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Tags</label>
                        <select data-placeholder="Begin typing a name to filter..." multiple   id="chosen-select" class="form-control" name="test">
                            <option value=""></option>
                            <option>Women</option>
                            <option>Ethnic</option>
                            <option>Red</option>
                            <option>Sari</option>
                            <option>Silk</option>
                            <option>Silk Sari</option>
                        </select>
				    </div>
				
			</div> <!-- end col -->
			</div>
	 		</div>
	 	</div>
	 </div>
     <script type="text/javascript">
         $("#chosen-select").chosen({
          no_results_text: "Oops, nothing found!"
        })
     </script>
	 
	 <div class="col-4 mt-4">
	 		<div class="card">
	 		<div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-2">Recent Activity</h4>
                    <div class="timeline-alt pb-0">
                
                        <div class="timeline-item">
                            <i class="fas fa-plane-departure bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="font-weight-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">30 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="fas fa-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="font-weight-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 hours ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline -->
            </div>
	 	</div>
	 </div>
</div>
<hr>
<div class="row mt-3">
    <div class="col-md-12">
        <a href="#" class="btn btn-md btn-my-danger float-right ml-3"><span class="text-white" style="font-size: 15px">Cancle</span> </a>
        <button type="submit" id="formSubmit" class="btn btn-md bg-my-dark float-right mr-3"><span class="text-white" style="font-size: 15px">Submit</span> </button>
    </div>
</div>
</form>

@endsection