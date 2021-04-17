@extends('layouts.shop_admin')
@section('content')
	<h1>Add Product</h1>
	<hr>
	@include('inc.messages')
<form method="post" action="{{route('shop.addproduct')}}" enctype="multipart/form-data"> 
     @csrf
<div class="row">
	 <div class="col">
	 	<h3>Product Details</h3>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
			
				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Title</label>
				        <input type="text"  id="product_name"  name="product_name" class="form-control" required>
				    </div>

				      <div class="form-group mb-3">
				        <label for="example-textarea">Description</label>
				        <textarea class="ckeditor form-control" name="description" id="article" rows="5"  required>
				        	
				        </textarea>
				    </div>

				    {{-- <div class="form-group mb-3">
				        <label for="example-fileinput">Product Image</label>
				        <input type="file" id="example-fileinput" class="form-control-file">
				    </div> --}}

                    <input type="hidden" id="shop_id" name="my_shop_id" value="{{auth()->user()->id}}">
			</div> <!-- end col -->
		</div>
	 	</div>
	 	</div>
	 </div>
	 
</div>
<hr />
<div class="row">
	 <div class="col">
	 	<h3>Units And Pricing</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
					<div class="form-group mb-3">
				        <label for="simpleinput">Unit To Measure The Product</label>
				        <select class="form-control" id="unit" name="si_unit">
				        	@foreach($si_units as $si_unit)
				        		<option>{{$si_unit->si_unit}}</option>
				        	@endforeach
					    </select>
				    </div>
				    <div class="form-group mb-3">
				        <label for="simpleinput">Price</label>
				        <input type="text"   name="regular_price" class="form-control" placeholder="M.R.P" id="mrp" required>
				    </div>
				    <div class="form-group mb-3">
				        <label for="simpleinput">How Much It Cost You</label>
                        <input type="text"  id="cp" name="cost_price" placeholder="Cost Price" class="form-control">
				    </div>
				
			</div> <!-- end col -->
			</div>
	 		</div>
	 	</div>
	 </div>
</div>
<hr />

<div class="row">
	 <div class="col">
	 	<h3>Image Uploads</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body" id="cardBody">
                <div id="productDropzone" class="dropzone newUserProfileImg-dropzone mt-3 ml-auto mr-auto p-2">
	                
	                <div class="dz-message needsclick">
			      		<h5 class="text-muted">Drop Images Of Products.</h5> <br>
		      			<br>
			      		<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-card-image text-muted" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9c0 .013 0 .027.002.04V12l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15 9.499V3.5a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm4.502 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
						</svg>
			      	</div>
		      	</div>

				      	<!-- file preview template -->
					<div class="d-none" id="uploadPreviewTemplate" style="max-height: 80px">
					    <div class="card mt-1 mb-0 shadow-none border">
					        <div class="p-2">
					            <div class="row align-items-center">
					                <div class="col-auto">
					                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
					                </div>
					                <div class="col pl-0">
					                    <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
					                    <p class="mb-0" data-dz-size></p>
					                </div>
					                <div class="col-auto">
					                    <!-- Button -->
					                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
					                        <i class="fas fa-times"></i>
					                    </a>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
	 		</div>
	 	</div>
	 </div>
	 
</div>

<hr />
<div class="row mb-2">
	 <div class="col">
	 	<h3>SEOs</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
                     <div class="form-group mb-3">
                        <label for="simpleinput">Category</label>
				        <select class="form-control"  name="categories" id="product_categories">
				          @foreach( $product_categories as $product_category)
				          	<option>{{$product_category->product_categories}}</option>
				          @endforeach
					    </select>
                    </div>

				    <div class="form-group mb-3">
				    	 <label for="simpleinput">Tags</label>
						<select data-placeholder="Choose The Tags To Search"  class="chosen-select" name="tags" id="tags" multiple>
							@foreach($tags as $tag)
								<option>{{$tag->tag_name}}</option>
							@endforeach
							
						</select>
						 <code><strong>make it easier to search</strong></code>
				    </div>

				    
				
			</div> <!-- end col -->
			</div>
	 		</div>
	 	</div>
	 </div>
     <script type="text/javascript">
     	$(document).ready(function(){
     		 $(".chosen-select").chosen({
			  no_results_text: "Oops, nothing found!",
			  width: "100%"
			});
		});
     </script>
</div>
<hr>
<div class="row mt-3">
    <div class="col">
        <a href="#" class="btn btn-md btn-danger float-right ml-3">
        	<span class="text-white" style="font-size: 15px">Cancel</span>
        </a>
        <button  id="formSubmit" class="btn btn-md btn-primary float-right mr-3" >
         <span class="text-white" style="font-size: 15px">Submit</span>
        </button>
    </div>
</div>
<hr>
<script type="text/javascript">

			Dropzone.autoDiscover = false;
	 		var myDropzone = new Dropzone("div#productDropzone", { 
	 		url: "{{ route('shop.addproduct')  }}",
	 		previewTemplate : document.querySelector('#uploadPreviewTemplate').innerHTML,
	 		paramName:'file',
	 		resizeWidth: 600, resizeHeight: 600,
            resizeMethod: 'contain', resizeQuality: 1.0,
	 		thumbnailWidth: 80,
	 		thumbnailHeight: 80,
	 		uploadMultiple:true,
	 		parallelUploads:10,
	 		autoProcessQueue: false,
	 		addRemovalLink: true,
	 		accept: function(file, done) {
	            console.log("uploaded");
	            console.log(file);
	            done();
	        },
	        error: function(file, msg){
	            console.log(msg);
	        },
	        init: function(){
	        	var dz = this;
	        	document.getElementById("formSubmit").addEventListener("click", function(e){
	        		            e.preventDefault();
					            e.stopPropagation();
					            $('body').innerHTML = '<div style="z-index:1">Loading</div>'
								//console.log(jQuery('#tags').val()[0]);
					            dz.processQueue();
					            
					           
					            

	        	});

	        	//send all the form data along with the files:
		        this.on("sendingmultiple", function(data, xhr, formData) {
		            formData.append("product_name",  jQuery("#product_name").val());
		            formData.append("description",   CKEDITOR.instances['article'].getData());
		            formData.append("si_unit",       jQuery("#unit").val());
		            formData.append("my_shop_id",    jQuery("#shop_id").val());
		            formData.append("regular_price", jQuery("#mrp").val());
		            formData.append("cost_price",    jQuery("#cp").val());
		            formData.append("_token",        '{{ csrf_token() }}');
		            formData.append("categories",    jQuery("#product_categories").val());
		            formData.append("tags",          jQuery("#tags").val());
		            $('#loader-wrapper').css("display","block");
		        });

		       
		         
			
			},

			success:function(file, response){
				console.log(response.status);
				window.location.replace("{{ route('shop.showproduct') }}");
					
            	setTimeout(function(){
            		$('body').addClass('loaded');
            		$('h1').css('color','#222222');
            	}, 1000);
	
			}

	     });


	 </script>
</form>
@endsection