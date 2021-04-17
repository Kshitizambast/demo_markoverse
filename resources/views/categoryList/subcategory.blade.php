@extends('layouts.app')
@section('content')
	<div class="row m-0 p-0 mt-2 mb-5">
		@foreach($show_subcategories as $show_subcategory)
			<div class="col-md-4 mt-5" style="height: 100%">
				<a href="subcategory/{{$show_subcategory->id}}" style="text-decoration: none">
					<div class="card sub-category-card text-white mb-3" style="height: 135px; background: url('{{asset('img/sub-category-Imgs/'.$show_subcategory->colour_code)}}')">
					  <div class="card-body">
					    <h5 class="card-title">{{$show_subcategory->subcategory_name}}</h5>
					    <p class="card-text text-white">{{$show_subcategory->description}}</p>
					  </div>
					</div>
				</a>
			</div>
     	@endforeach
</div>
@endsection