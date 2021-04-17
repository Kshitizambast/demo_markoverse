@extends('layouts.shop_admin')
@section('content') 
<div class="card-group">
 
 @foreach($images as $image)
 @if($image->my_shop_id == auth()->user()->id)
	  <div class="card">
	    <img src="http://localhost/covalent_beta/storage/app/{{$image->filename}}" class="card-img-top" alt="..." >
	    <div class="card-body">
	      <button class="btn btn-danger">Remove</button>
	    </div>
	  </div>
  @endif
@endforeach
</div>
@endsection