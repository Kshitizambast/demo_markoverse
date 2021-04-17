@extends('layouts.shop_admin')
@section('content')

<div class="row">
            <div class="col-12 bg-light">
                <h3>Product preview</h3>
            </div>
 </div>

  @if($flash = session('message'))
         <div id="session-info" class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            
                            <div class="col-lg-5"> <!-- Iamge PREVIEW section-->

                                <div class="img-preview">
                                    <img style=" float:left; width:100%; height: 350px; object-fit:contain" src="" href="#" alt="preview">
                                </div>
                                
                                <div class="thumbnail-panel justify-content-center mt-2 d-flex float-left"> <!-- Thumbnail display section -->
                                    @foreach($images as $image)
                                    	 <div class="col-lg-3 col-md-2 col-sm-3 col-xs-4">
                                    	    <img class="img-thumbnail active-img" style=" float:left; width:100%; height: 60px; object-fit:contain" src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}" href="#" alt="thumbnail" id="thumbnail-image{{$image->id}}">
                                         </div>
                                         
                                    
                                    @endforeach
                                   

                                </div>

                            </div>
                            
                            <div class="col-lg-7">

                                <div class="justify-content-left">

                                	@foreach($product as $value)
		                                	
		                                    <h4 class="PName mt-4"> <!-- PRODUCT Name -->
		                                        {{$value->product_name}}
		                                    </h4>
		                                    <p class="text-muted">
		                                       {{$value->created_at}} <!-- DATE of RELEASE -->
		                                    </p>
		                                    @if($value->is_available == 1)
		                                    <button type="button" class="btn btn-success btn-sm mb-4 mt-2">Available</button> <!-- AVAILABILITY -->
		                                    @else
		                                    	<button type="button" class="btn btn-danger btn-sm mb-4 mt-2">Not Available</button> <!-- AVAILABILITY -->
		                                    @endif
		                                    
		                                    <h5>
		                                       <b> Price</b> <small class="text-muted">(Sometime varies with size*)</small>:                                    
		                                    </h5>
		                                    <div class="btn-group" role="group" aria-label="Basic example"> <!-- PRICE Button Group -->
		                                      
		                                        <button type="button" class="btn btn-light"><i class="fas fa-rupee-sign"></i> {{$value->regular_price}}</button>
		                                    </div>
		                                    <h5 class="mt-3"> <!-- PRODUCT DESCRIPTION -->
		                                        Description:
		                                    </h5>
		                                  		<?php
		                                  			echo $value->description;
		                                  		?>
		                                </div>
                              
		                                <div class="text-right">
		                                	
		                                
			                                	<button type="button" class="btn btn-danger" id="delete">Delete</button> 
			                               
		                                	
		                                <!-- SAVE button -->
		                                <a href="{{route('editproduct',['id'=>$value->id])}}">
		                                	<button type="button" class="btn btn-primary">
			                                	<i class="fas fa-pen"></i> Edit
			                                </button> <!-- EDIT button -->
		                                </a>
                                  @endforeach
                                </div> 
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">


		</script>
    </div>
<hr>	
	<h4>Remove Images.</h4>

	<div class="my-3 p-3 bg-white rounded shadow-sm">
	    <h6 class="border-bottom border-gray pb-2 mb-0">Images</h6>
	    @if(count($images) >0  )
		    @foreach($images as $image)
			    <div class="media text-muted pt-3" id="container{{$image->id}}">
			      <img src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}" height="80" width="80">
			      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="height: 80px !important;">
			        <div class="d-flex justify-content-between align-items-center w-100">
			          <strong class="text-gray-dark p-3">{{date("F jS, Y", strtotime($image->updated_at))}}</strong>
			          <a href="#" id="delete-image{{$image->id}}"><i class="fas fa-times"></i></a>
			        </div>
			      </div>
			    </div>
			    <script type="text/javascript">
			    	$(document).ready(()=>{
			    		"use strict";
			    		$('#delete-image{{$image->id}}').click(()=>{
				    		axios.post('{{ route('admin.remove_product_image') }}', {
				    			image_id : {{$image->id}}
				    		})
				    		.then((res)=>{
				    			console.log(res);
				    			 $('#container{{$image->id}}').remove();

				    			 $('#thumbnail-image{{$image->id}}').remove();
				    			
				    		})
				    		.catch((err)=>{
				    			console.log(err);
				    		});
				    	});

			    	});
			    </script>
		    @endforeach
	    @else
	    	<h4>Upload Some Images.</h4>
	    @endif
  </div>
<hr>
<div class="row px-3 mb-3 ">
	 <div class="col">
	 	<h3>Add More Images</h3>
	 	    <br>
	 	<div class="card">
	 		<div class="card-body" id="cardBody">
                
	                
	                <form  action="{{ route('shop.addproductimages', Crypt::encrypt($product[0]->id)) }}" id="productDropzone" method="post" class="dropzone">
	                	<div class="fallback">
					      <input name="file" type="file" multiple />
					    </div>
	              
	                		@csrf
	             {{--   <div id="productDropzone" class="dropzone newUserProfileImg-dropzone mt-3 ml-auto mr-auto p-2">  --}}
	                <div class="dz-message needsclick">
			      		<h5 class="text-muted">Drag & Drop Images Of Products.</h5> <br>
		      			<br>
			      		<svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-card-image text-muted" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9c0 .013 0 .027.002.04V12l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15 9.499V3.5a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm4.502 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
						</svg>
			      	</div>
			      	 
		         {{--  </div>  --}}

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
 		
 		 <button class="btn btn-block btn-success mt-3" id="shop-pics" type="submit">Submit</button>
 		 
 		</form>
 
	 	</div>
	 </div>
	 <script type="text/javascript">





			    $(document).ready(function() {
			    	"use strict";
		              $.ajaxSetup({
		                  headers: {
		                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		                          }
		                  });

			    	$('#delete').click(()=>{
			    	    $('#loader-wrapper').css("display","block");
			    		axios.post('{{ route('delete') }}', {
			    			product_id : {{$value->id}}
			    		})
			    		.then((res)=>{
			    			setTimeout(function(){
                        		$('body').addClass('loaded');
                        		$('h1').css('color','#222222');
                        	}, 1000);
	
			    			 window.location.replace("{{ route('shop.showproduct') }}");
			    			 return false;
			    		})
			    		.catch((err)=>{
			    			console.log(err);
			    		});
			    	});


			    	


			        // This will fire when document is ready:
			        $(window).resize(function() {
			            // This will fire each time the window is resized:
			            if($(window).width() >= 993) {
			                // if larger or equal                    
			                $('.user-panel').show();
			                $('.user-panel-collapse').hide();
			               
			            } else {
			                // if smaller
			                $('.user-panel').hide();
			                $('.user-panel-collapse').show();
			            }
			        }).resize(); // This will simulate a resize to trigger the initial run.


			        // Setting DEAFULT img to the slide
			        var img = $(".active-img").attr("src");

			        var preview = $(".img-preview").find("img");

			        var previewImg = preview.attr("src",img);

			    });

			  

			    $(".img-thumbnail").click(function(){
			        
			        var img = $(this).attr("src");

			        var preview = $(".img-preview").find("img");

			        var previewImg = preview.attr("src",img);
			    });



	   Dropzone.options.productDropzone = {
	 		url: "{{ route('shop.addproductimages', Crypt::encrypt($product[0]->id))  }}",
	 		previewTemplate : document.querySelector('#uploadPreviewTemplate').innerHTML,
	 		resizeWidth: 600, resizeHeight: 600,
            resizeMethod: 'contain', resizeQuality: 1.0,
	 		thumbnailWidth: 80,
	 		thumbnailHeight: 80,
	 		autoProcessQueue:false,
	 		uploadMultiple:true,
	 		parallelUploads:5,
	 		addRemovalLink: true,
	 		accept: function(file, done) {
	            console.log("uploaded");
	            console.log(file);
	            done();
	        },
	        error: function(file, msg){
	            console.log(msg);
	        },
	        success:function(file, response){
				console.log(response.status);
				location.reload();
					
            	setTimeout(function(){
            		$('body').addClass('loaded');
            		$('h1').css('color','#222222');
            	}, 1000);
	
			}
	 	
		 	}
		 	$('#shop-pics').click(function(e) {
		 		e.preventDefault();
			    var myDropzone = Dropzone.forElement(".dropzone");
			    myDropzone.processQueue();

                $('#loader-wrapper').css("display","block");
			});
	 </script>
</div>
<div>
	
</div>

@endsection