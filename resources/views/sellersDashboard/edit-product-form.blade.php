@extends('layouts.shop_admin')
@section('content')
	<h1>Edit {{$product->product_name}}</h1>
	<hr>
	@include('inc.messages')
<form method="post" action="{{route('shop.updateproduct' ,['id'=>$product->id])}}" enctype="multipart/form-data"> 
     {{csrf_field()}}
<div class="row">
	 <div class="col">
	 	<h3>Product Details</h3>
	 	<div class="card">
	 		<div class="card-body">
	 			<div class="row">
			       <div class="col-lg-12">
			
				    <div class="form-group mb-3">
				        <label for="simpleinput">Product Title</label>
				        <input type="text" id="simpleinput" name="product_name" class="form-control" value="{{$product->product_name}}" required>
				    </div>

				    <div class="form-group mb-3">
				        <label for="example-textarea">Description</label>
				        <textarea class="ckeditor form-control" name="description" id="article-ckeditor" rows="5" required>
				        	{{$product->description}} 
				        </textarea>
				    </div>

				    {{-- <div class="form-group mb-3">
				        <label for="example-fileinput">Product Image</label>
				        <input type="file" id="example-fileinput" class="form-control-file">
				    </div> --}}

                    <input type="hidden" name="my_shop_id" value="{{auth()->user()->id}}">
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
				        <label for="simpleinput">Quantity Unit For Pricing</label>
				        <select class="form-control" id="exampleFormControlSelect1" name="si_unit">
				        	@foreach($si_units as $si_unit)
				        		<option>{{$si_unit->si_unit}}</option>
				        	@endforeach
					    </select>
				    </div>
				    <div class="form-group mb-3">
				        <label for="simpleinput">Current Price</label>
				        <input type="text" id="simpleinput" name="regular_price" class="form-control" value="{{$product->regular_price}}" required>
				    </div>
				    <div class="form-group mb-3">
				        <label for="simpleinput">How Much It Cost You</label>
                        <input type="text" id="simpleinput" name="cost_price" placeholder="Cost Price" class="form-control">
				    </div>
				
			</div> <!-- end col -->
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
				        <select class="form-control" id="exampleFormControlSelect1" name="categories">
				          @foreach( $product_categories as $product_category)
				          	<option>{{$product_category->product_categories}}</option>
				          @endforeach
					    </select>
                    </div>

				    <div class="form-group mb-3">
				    	 <label for="simpleinput">Tags</label>
						<select data-placeholder="Choose The Tags To Search"  class="chosen-select" name="tags[]" multiple>
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
        <a href="#" class="btn btn-md btn-danger float-right ml-3"><span class="text-white" style="font-size: 15px">Cancle</span> </a>
        <button type="submit" id="formSubmit" class="btn btn-md btn-primary float-right mr-3"><span class="text-white" style="font-size: 15px">Submit</span> </button>
    </div>
</div>
<hr>
</form>
@endsection