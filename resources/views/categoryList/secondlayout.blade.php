<div class="row mt-3 px-5">
		@foreach($super_categories as $s_cat)
			<div class="col">
				<a href="#">
					 <div class="card bg-dark text-white">
					  <img src="{{asset('img/img_bg_1.jpg')}}" class="card-img" alt="..." style="filter: blur(2px); height: 200px">
					  <div class="card-img-overlay">
					    <h3 class="card-title mt-5 pl-3">{{$s_cat->category_name}}</h3>
					    <p class="card-text pl-3">{{$s_cat->descriptions}}</p>
					  </div>
					</div>
				</a>
			</div>
     	@endforeach
</div>
