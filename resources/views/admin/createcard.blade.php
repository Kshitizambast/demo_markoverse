@extends('layouts.covalentadmin')

@section('content')
<h5 class="mt-3">Add Cards</h5>
<hr />
<div class="row">
	 <div class="col-8">
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
				<form>

				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Title</label>
				        <input type="text" id="simpleinput" class="form-control">
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Description</label>
				        <textarea class="form-control" name="article-ckeditor" rows="5"></textarea>
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-fileinput">Product Image</label>
				        <input type="file" id="example-fileinput" class="form-control-file">
				    </div>


				</form>
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
				<form>

				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Category</label>
				        <input type="text" id="simpleinput" class="form-control">
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Tags</label>
				        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
				    </div>
				</form>
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
	 	<h3>Inventory</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
				<form>

				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Category</label>
				        <input type="text" id="simpleinput" class="form-control">
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Tags</label>
				        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
				    </div>
				</form>
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
	 	<h3>SEOs</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
				<form>

				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Category</label>
				        <input type="text" id="simpleinput" class="form-control">
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Tags</label>
				        <textarea class="form-control" id="example-textarea" rows="5"></textarea>
				    </div>
				</form>
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


@endsection