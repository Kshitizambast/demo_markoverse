@extends('layouts.app')
@section('content')
@include('inc.messages')

     <div class="cart-body">
        <div>
            <!-- Header items (shop name) -->
              @if(Auth::check() and auth()->user()->is_admin == 1)
                    <deal-done customer_id="{{auth()->user()->id}}"></deal-done>
             @endif
            <section class="hero py-6">
                <div class="container">
                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb pl-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shopping cart </li>
                    </ol>
                    <!-- Shop name section-->
                    <div class="shop-switch">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php $count = 0?>
                            @foreach($ordersPerShop as $shop_id => $order_id)
                                @if(count($order_id) > 0)
                                 <li class="nav-item">
                                    <a class="nav-link <?php
                                     if($count == 0) echo 'active';
                                     else echo ' ';
                                     $count++;
                                     ?>" id="pills-Shop{{4545 + $shop_id}}-tab" data-toggle="pill" href="#pills-Shop{{4545 + $shop_id}}" role="tab" aria-controls="pills-Shop{{4545 + $shop_id}}" aria-selected="true">
                                        {{App\MyShop::findOrFail($shop_id)->shop_name}}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                           
                        </ul>
                        
                        <div class="cart-content tab-content" id="pills-tabContent">
                            <?php $count =0;?>
                            @foreach($ordersPerShop as $shop_id => $order_id)
                                @if(count($order_id) > 0)
                                    <div class="tab-pane fade show
                                     <?php 

                                        
                                        if($count == 0) echo 'active';
                                        else echo ' ';
                                        $count++;

                                    ?>" 
                                    id="pills-Shop{{4545 + $shop_id}}" role="tabpanel" aria-labelledby="pills-Shop1-tab">
                                        <div class="row p-0 m-0">
                                            <div class="col-lg-8">
                                                <h1 class="cart-shop-name">{{App\MyShop::findOrFail($shop_id)->shop_name}}</h1>
                                                <div>
                                                    <p><b>Username : {{auth()->user()->username}}</b>&nbsp;<small>(tell this to shop)</small></p>
                                                    <p class="lead text-muted">You have {{count($order_id)}} items in your cart.</p></div>
                                            </div>
                                           
                                        </div>
                                       
                                         <!-- Cart-items and Chechout panel -->
                                        <section class="mt-3">
                                                <div class="container">
                                                    <div class="row mb-5"> 
                                                    <div class="col-lg-8 pr-xl-5">
                                                        <div class="cart mb-5">
                                                        <div class="cart-body">
                                                            <!-- Product-->
                                                            @for($i=0; $i < count($order_id); $i++)
                                                                <div class="cart-item">
                                                                <div class="row d-flex align-items-center text-left text-md-center">
                                                                    <div class="col-12 col-md-5">
                                                                       
                                                                    <div class="d-flex align-items-center">
                                                                        <a href="detail-1.html">

                                                                            <img src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{App\Product::getFirstImage(App\OrderDetails::find($order_id[$i])->product_id)}}" alt="..." class="cart-item-img">


                                                                        </a>
                                                                        <div class="cart-title text-left">
                                                                            <a href="{{asset('/product_details/login/'.Crypt::encrypt(App\OrderDetails::find($order_id[$i])->product_id).'')}}" class="itemInfo-line1 link-animated">
                                                                                <strong>{{App\Product::findOrFail(App\OrderDetails::find($order_id[$i])->product_id)->product_name}}</strong>
                                                                            </a>
                                                                            <br>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-7 mt-4 mt-md-0">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3">
                                                                        <div class="row">
                                                                            <div class="col-6 d-md-none text-muted">Price per item</div>
                                                                            <div class="col-6 col-md-12 text-right text-md-center">
                                                                                ₹<span id="itemPrice{{4545+$order_id[$i]}}">
                                                                                    {{ceil(App\OrderDetails::findOrFail($order_id[$i])->disscount)}}</span>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                        <div class="row align-items-center">
                                                                            <div class="d-md-none col-7 col-sm-9 text-muted">Quantity</div>
                                                                            <div class="col-5 col-sm-3 col-md-12">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="btn text-light btn-items btn-items-decrease increment-decrement{{4545+$order_id[$i]}}">-</div>

                                                                            
                                                                                <input type="text" readonly="readonly" id="quantity{{4545+$order_id[$i]}}" min="1" value="{{App\OrderDetails::findOrFail($order_id[$i])->quantity}}" class="form-control text-center border-md input-items">

                                                                                <div class="btn text-light btn-items btn-items-increase increment-decrement{{4545 + $order_id[$i]}}">+</div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-md-3"> 
                                                                        <div class="row">
                                                                            <div class="col-6 d-md-none text-muted">Total price </div>
                                                                            <div class="col-6 col-md-12 text-right text-md-center">₹
                                                                                <span id="totalItemPrice{{4545+$order_id[$i]}}">
                                                                                    {{ ceil(App\OrderDetails::findOrFail($order_id[$i])->total)}}
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="col-2 cart-remove text-center">
                                                                            <a href="#" class="text-muted" id="removeOrder{{4545+$order_id[$i]}}"> 
                                                                              <i class="fas fa-times"></i>
                                                                            </a>
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            $(document).ready(function(){


                                                                                "use strict";
                                                                                  $.ajaxSetup({
                                                                                      headers: {
                                                                                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                                              }
                                                                                      });

                                                        


                                                                               $('.increment-decrement{{4545+$order_id[$i]}}').click((event) => {

                                                                                var itemPrice = $('#itemPrice{{4545+$order_id[$i]}}').html();
                                                                                    var quantity = parseInt($('#quantity{{4545+$order_id[$i]}}').val(), 10);
                                                                                    var itemTotal =  $('#totalItemPrice{{4545+$order_id[$i]}}').html();
                                                                                    var newItemTotal = itemPrice * quantity;

                                                                                    $('#totalItemPrice{{4545+$order_id[$i]}}').html(newItemTotal);

                                                                                    var subtotal = parseInt($('#subtotal{{4545+$shop_id}}').html());
                                                                                    //var total = parseInt($('#total$shop_id').html());

                                                                                    var  newSubtotal = subtotal + (newItemTotal - itemTotal);

                                                                                    $('#subtotal{{4545+$shop_id}}').html(newSubtotal);
                                                                                    $('#total{{4545+$shop_id}}').html(newSubtotal);
                                                                    
                                                                                axios.post('{{ route('edit_my_bag') }}',{
                                                                                    order_details_id : "{{Crypt::encrypt($order_id[$i])}}",
                                                                                    quantity : parseInt($('#quantity{{4545+$order_id[$i]}}').val())
                                                                                })
                                                                                .then((res) => {

                                                                                    //$quantity * $('#itemPrice').html();
                                                                                    console.log(res);
                                                                                })
                                                                                .catch((err) => {
                                                                                    console.log(err);
                                                                                });

                                                                               });

                                                                                $('#removeOrder{{4545+$order_id[$i]}}').click(() => {
                                                                                    axios.post( '{{ route('delete_my_product') }}', {
                                                                                    order_id: '{{Crypt::encrypt($order_id[$i])}}'
                                                                                    })
                                                                                    .then((res) => {
                                                                                        console.log(res);
                                                                                    })
                                                                                    .catch((err) => {
                                                                                        console.log(err)
                                                                                    });


                                                                                });
                                                                                

                                                                          });

                                                                        </script>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                           @endfor
                                                           <!----END for loop-->
                                                        </div>
                                                        </div>          
                                                        
                                                        
            <div class="w-100  point-section">
                <div class="point-table">
                    <h2>Point Table</h2>
                    <p>Earn points to become customer of the month and win exciting prizes.</p>


                    <table class="shop-point d-flex justify-content-center">
                        <tr>
                            <th>Shop name</th>
                            <th>Progress</th>
                            <th>Reward point</th>
                        </tr>
                       {{--@foreach($shopNetworks as $shop => $points)
                        <tr>
                            <td><span class="point-shop-name p-2">{{App\MyShop::find($shop)->shop_name}}</span></td>
                            <td>
                                <div class="progress m-3">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$points}}%" aria-valuenow="{{$points}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>{{$points}}</td>
                        </tr>
                        @endforeach--}}

                    </table>
                </div>
                                                        
                                                        
                                   </div>                                                 
                                                    </div>

                                                            <div class="col-lg-4 checkout-box bg-dark text-light">
                                                                <h4>Order Summary</h4>
                                                                <p class="text-muted text-sm">Shipping and additional costs are calculated based on values you have entered.</p>
                                                                <table class="table text-light">
                                                                <tbody><tr>
                                                                    <th class="py-4">Order Subtotal </th>
                                                                    <td class="py-4 text-right text-muted" >
                                                                        ₹<span id="subtotal{{4545+$shop_id}}" >{{ceil($totalPerBag[$shop_id])}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="py-4">Shipping and handling</th>
                                                                    <td class="py-4 text-right text-muted">₹00.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="py-4">Tax</th>
                                                                    <td class="py-4 text-right text-muted">Included In M.R.P</td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="py-4">Total</th>
                                                                    <td class="py-4 text-right h3 font-weight-normal" id="total">
                                                                        ₹<span id="total{{4545+$shop_id}}">{{ceil($totalPerBag[$shop_id])}}</span>
                                                                    </td>
                                                                </tr>
                                                                </tbody></table>
                                                                <a class="btn btn-dark text-light btn-block btn-lg">Visit Shop </a>
                                                            </div>
                                                                   
                                                        </div>
                                                    </div>
                                            </section>
                                </div>
                                @else
                                   
                              @endif
                            @endforeach
                           <!--  <div class="tab-pane fade" id="pills-Shop2" role="tabpanel" aria-labelledby="pills-Shop2-tab">
                                2
                            </div>
                            <div class="tab-pane fade" id="pills-Shop3" role="tabpanel" aria-labelledby="pills-Shop3-tab">
                                3
                            </div> -->
                        </div>
                        <br/> 
                        <div class="d-flex justify-content-between flex-column flex-lg-row mb-5 mb-lg-0">
                            <a href="#" class="btn btn-link text-muted  mr-auto"><i class="fa fa-chevron-left"></i> Continue Shopping</a>
                            <a href="#" class="btn btn-link text-primary"><i class="fa fa-sync"></i> Update cart</a>
                        </div>                                                   
                    </div>
                </div>
            </section>
           
            
        </div>
         <div class="ml-auto mr-auto col-md-6 bg-dark text-dark mt-3 p-0">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><h4>Steps to purchase!</h4></li>
                  <li class="list-group-item">1. Add item to the cart</li>
                  <li class="list-group-item">2. Visit the shop</li>
                  <li class="list-group-item">3. Tell your username</li>
                  <li class="list-group-item">4. Pay through cash, paytm, or any payment method.</li>
                </ul>
        </div>
    </div>



@endsection
