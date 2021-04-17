
@if(count($adminProducts) > 0)
@foreach($adminProducts as $product)

    @if($category->id == $product->category_id)
    	@if(count($product->product_images) > 0) 
    		
    	<a 

    		 @if(\Auth::check())
                    href="{{asset('/product_details/login/'.Crypt::encrypt($product->id).'')}}"
                @else
                    href="{{asset('/product_details/'.Crypt::encrypt($product->id).'')}}"
             @endif

             style="text-decoration: none;" 
         >

    		<div class="product-card">
                <div class="product-cardImg" 

                @foreach($images as $image)
    	            @if($image->product_id == $product->id)
    	              style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');"
    	            @break
    	            @endif
                @endforeach
                >
                    <span class="badge badge-pill badge-danger">-{{100 - ceil((($product->disscount_price/$product->regular_price) * 100))}}%</span>
                </div>
                <div class="product-cardInfo bg-dark text-light">
                    <p class="text-center"><i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="text-warning fas fa-star"></i>
                    <i class="fas text-warning fa-star-half-alt"></i>&nbsp;4.5</p>
                    <h5 class="productBrand">{{$product->product_name}}</h5>
                    <p class="productDescr">BY:-{{App\Product::shopName($product->my_shop_id)}}</p>
                    <span><b>₹{{ceil($product->disscount_price)}}</b>&nbsp;<del>₹{{$product->regular_price}}</del></span>
                </div>
            </div>
        </a>
    	@endif
    @endif
@endforeach
@else
<h4>Waiting for you to vote the cards.</h4>
@endif