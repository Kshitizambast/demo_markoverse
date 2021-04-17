@extends('layouts.app')
@section('content')
	<h2 class="categoryPage-header">Categories across Markoverse</h2>
{{-- 	<hr>
	<div class="row mt-2 px-5 mb-5">
		@foreach($super_categories as $s_cat)
			<div class="col-md-4 mt-5">
				<a href="supercategory/{{$s_cat->id}}" style="text-decoration: none">
					<div class="card text-white bg-{{$s_cat->colour_code}} mb-3">
					  <div class="card-body">
					    <h5 class="card-title">{{$s_cat->category_name}}</h5>
					    <p class="card-text text-white">{{$s_cat->descriptions}}</p>
					  </div>
					</div>
				</a>
			</div>
     	@endforeach
</div> --}}


<div class="row m-0 p-0 pb-3">
	@foreach($super_categories as $s_cat)
	    @if($s_cat->id < 5)
	    <div class="col-lg-6">
	    	<a href="supercategory/{{$s_cat->id}}" style="text-decoration: none">
		        <div class="category-poster" style="background-image: url('{{asset($s_cat->url)}}');">
		        </div>
	        </a>
	    </div>
	    @endif
    @endforeach
</div>

@endsection