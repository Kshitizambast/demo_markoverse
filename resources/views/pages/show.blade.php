@extends('layouts.app')
@section('content')
@include('inc.messages')

<div class="container-fluid p-0">

    <div class="show-product-info-section">
        <div class="row m-0 p-0">
            <div class="col-lg-6 col-sm-12 order-lg-1 order-2 product-purchase-section">
                <div class="show-details">
                    <h1 class="show-product-name">{{$product[0]->product_name}}</h1>
                    <h3 class="show-shop-name"><a class="nav-link text-warning" href="/shops/{{Crypt::encrypt($product[0]->my_shop_id)}}">By: {{App\Product::shopName($product[0]->my_shop_id)}}</a></h3>
                    <p class="show-shop-address">{{App\MyShop::find($product[0]->my_shop_id)->address}}</p>
                    <h3 class="show-product-price"><del>Rs.{{$product[0]->regular_price}}</del></h3>
                    <h4 class="show-discounted-price">Rs.{{ceil($product[0]->disscount_price)}}</h4>
                    <span class="show-offer-percent px-3 bg-dark text-light">-{{100 - ceil((($product[0]->disscount_price/$product[0]->regular_price) * 100))}}% &nbsp;You save: Rs.{{ceil($product[0]->regular_price) - ceil($product[0]->disscount_price)}}</span>

                    @if($product[0]->is_available == 1)
                    <h4 class="text-dark mb-0">In stock</h4>
                    @else
                    <h4 class="text-danger">Out of stock</h4>
                    @endif

                    <div class="flexRow align-items-center">
                        @if(Auth::check() and $fullfilled == 0)

                        <form method="POST" action="{{Crypt::encrypt($product[0]->product_id)}}/addtobag/{{Crypt::encrypt(auth()->user()->id)}}">
                            @csrf
                            <div class="text-info">Quantity</div>
                            <div class="noWrap">
                                <div class="d-flex align-items-center">
                                    <div class="btn btn-items btn-items-decrease">-</div>

                                    <input type="text" min="1" value="1" class="form-control text-center border-md input-items" id="quantity" style="width:100px;">
                                    <div class="btn btn-items btn-items-increase">+</div>
                                </div>
                            </div>
                        </form>
                        @elseif(Auth::check() and $fullfilled == 1)
                        <form method="POST" action="{{Crypt::encrypt($product[0]->id)}}/addtobag/{{Crypt::encrypt(auth()->user()->id)}}">
                            @csrf
                            <div class="text-info">Quantity</div>
                            <div class="noWrap">
                                <div class="d-flex align-items-center">
                                    <div class="btn btn-items btn-items-decrease">-</div>

                                    <input type="text" min="1" value="1" class="form-control text-center border-md input-items" id="quantity" style="width:100px;">
                                    <div class="btn btn-items btn-items-increase">+</div>
                                </div>
                            </div>
                        </form>
                        @else

                        <div class="text-info">Quantity</div>
                        <div class="noWrap">
                            <div class="d-flex align-items-center">
                                <div class="btn btn-items btn-items-decrease">-</div>

                                <input type="text" min="1" value="1" class="form-control text-center border-md input-items" id="quantity" style="width:100px;">
                                <div class="btn btn-items btn-items-increase">+</div>
                            </div>
                        </div>

                        @endif
                    </div>
                    <div class="mt-2"><button type="button" class="btn btn-outline-light btn-sm" id="addToCart"> <i class="fas fa-shopping-cart"></i> Add to cart</button></div>

                    @if(Auth::check() and $fullfilled == 0)
                    <script type="text/javascript">
                        $(document).ready(function() {
                            "use strict";
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $('#addToCart').click(function(event) {

                                event.preventDefault();
                                console.log('Hello');
                                var quantity = $('#quantity').val();

                                axios.post('{{Crypt::encrypt($product[0]->product_id)}}/addtobag/{{Crypt::encrypt(auth()->user()->id)}}', {
                                        quantity: parseInt(quantity),
                                    })
                                    .then(function(res) {
                                        console.log('Hey');


                                    })
                                    .catch(function(err) {
                                        console.log(err);
                                    });
                                location.reload();
                            });


                        });
                    </script>
                    @elseif(Auth::check() and $fullfilled == 1)
                    <script type="text/javascript">
                        $(document).ready(function() {
                            "use strict";
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $('#addToCart').click(function(event) {

                                event.preventDefault();
                                var quantity = $('#quantity').val();

                                axios.post('{{Crypt::encrypt($product[0]->id)}}/addtobag/{{Crypt::encrypt(auth()->user()->id)}}', {
                                        quantity: parseInt(quantity),
                                    })
                                    .then(function(res) {
                                        console.log('Hey');


                                    })
                                    .catch(function(err) {
                                        console.log(err);
                                    });

                                location.reload();

                            });


                        });
                    </script>
                    @else
                    @endif


                    <div class="show-product-description mt-3">
                        <h4>Product Description</h4>
                        <div class="w-100"><?php echo $product[0]->description ?></div>
                    </div>
                </div>

                @if($product_theme == 1)
                <div class="show-product-category-theme fashion-bg"></div>

                @elseif($product_theme == 2)
                <div class="show-product-category-theme food-bg"></div>

                @else
                <div class="show-product-category-theme service-bg"></div>
                @endif
            </div>
            <div class="col-lg-6 col-sm-12 order-lg-2 order-1 position-relative d-flex justify-content-center align-items-center">
                <!-- Slider main container -->
                <div class="show-product-container position-relative">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->

                        @foreach($images as $image)
                        <div class="swiper-slide slide-product-img slide-product-img-1">
                            <div class="slider-show-img" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}');">

                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>

        </div>
    </div>

    <div class="show-deals-section mt-3">
        <div class="row m-0 p-0">
            <div class="col-lg-6 col-sm-12  point-section">
                <div class="point-table">
                    <h2>Point Table</h2>
                    <p>Earn points to become customer of the month and win exciting prizes.</p>


                    <table class="shop-point d-flex justify-content-between">
                        <tr>
                            <th>Shop name</th>
                            <th>Progress</th>
                            <th>Earn point</th>
                        </tr>
                        @foreach($connections as $connection)
                        <tr>
                            <td><span class="point-shop-name p-2"><a class="nav-link text-dark" href="https://markoverse.com/shops/{{Crypt::encrypt($connection->connected_shop_id)}}">{{App\MyShop::findOrNew($connection->connected_shop_id)->shop_name}}</a></span></td>
                            <td>
                                <div class="progress m-3">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="50"></div>
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="50"></div>
                                </div>
                            </td>
                            <td>10</td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12  show-shop-poster">
                <h3>Explore the shop further</h3>
                <p>Keep shoping and keep vibing!</p>
                <div class="shop-poster-img markoverse-deal-home-poster"></div>
            </div>
        </div>
    </div>
</div>

    @endsection