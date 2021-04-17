<ul class="list-group card p-0 list-group-flush"> 
	@if(count(\Auth::user()->notifications) > 0)
		@foreach(\Auth::user()->notifications as $notification)
		   <li><a class="dropdown-item text-secondary d-flex row m-0 p-0" href="/shops/{{Crypt::encrypt($notification->data['shop_id'])}}">
                                        <span class="col-auto notification-thumbnail d-flex justify-content-center align-items-center">
                                            <h2><i class="bi bi-exclamation-circle"></i></h2>
                                        </span>
                                        <span class="col notification-text d-flex justify-content-around">
                                            <p class="mb-1">{{App\Card::findOrFail($notification->data['card_id'])->disscount}}% off on {{
		            	   App\Category::find(App\MyShop::find($notification->data['shop_id'])->category_id)->subcategory_name 
		            	  }}  (
		            	  on minimum purchse of {{App\Card::findOrFail($notification->data['card_id'])->min_range}}<br>Shop: {{App\MyShop::findOrFail( $notification->data['shop_id'])->shop_name }}, Bidhannagar</p>
		            	  <p class="card-text text-right"><small class="text-muted"><b>valid for {{App\Card::findOrFail($notification->data['card_id'])->days_left_to_active}} days</b></small></p>
                                        </span>
                                    </a>
                                </li>
		 {{$notification->markAsRead()}}
	    @endforeach
    @else
    	<li class="list-group-item p-1"> 
    	  <div class="notification-container">
    	  	<span class="notification-text"><h6>No New Notifications.</h6></span>
    	  </div>
       </li>
    @endif
</ul>


                                