@extends('layouts.shop_admin')

@section('content')
<h4>Customers</h4>

     @if($flash = session('message_warning'))
         <div id="session-info" class="alert alert-warning" role="alert">
          {{$flash}}
        </div>
    @endif
  @if($flash = session('message'))
         <div id="session-info" class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif

     @if($flash = session('message_danger'))
         <div id="session-info" class="alert alert-danger" role="alert">
          {{$flash}}
        </div>
    @endif

<div class="row mt-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Selling Control Pannel</h5>
            </div>
            <div class="card-body">
                <form id="productForm0" method="GET" action="{{route('customer.orders')}}">
                    <div class="form-group mb-3">
                        <label for="simpleinput">Customer's @username</label>
                        <input  type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username06" >
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    {{-- <div class="form-row mb-4">
                            <div class="col">
                               <label for="simpleinput">Product Title</label>
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="e.g. Eggs" name="shop_name">
                            </div>
                            <div class="col ml-5">
                                <label for="simpleinput">Quantity</label>
                               <input type="number" min="1" value="5" class="form-control" placeholder="Qty" style="width: 90px;">
                            </div>
                        </div> --}}
                        <button class="btn btn-sm btn-success" type="submit" >Search</button>
                        @if(isset($_GET['username']))
                         <a href="{{asset('dashboard/customers')}}" class="ml-2"> New Cart</a>
                        @endif
                </form>

                <hr>
                @if(isset($_GET['username']))
                <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Disscount Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($customerOrders as $customerOrder)
                                <tr>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="apps-ecommerce-products-details.html" class="text-body">{{$customerOrder->product_name}}</a>
                                            <br>
                                        </p>
                                    </td>
                                    <td>{{$customerOrder->regular_price}}</td>
                                    <td>{{$customerOrder->disscount}}</td>
                                    <td>{{$customerOrder->quantity}}</td>
                                    <td>{{$customerOrder->disscount * $customerOrder->quantity}}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>

                                 @endforeach
                            </tbody>

                           
                        </table>
                    </div>
                 @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @if(isset($_GET['username']))
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Order Summary</h4>
            </div>
            <div class="card-body">
                <h6 class="text-muted mt-2 ml-3">Customer Name : <strong>{{$user->name}}</strong></h6>
                <hr>
                 <div class="border p-3 mt-4 mt-lg-0 rounded">
                    <div class="table-responsive" style="overflow:auto;">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Total :</td>
                                    <td><i class="fas fa-rupee-sign mr-1"></i>{{$grand_total}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Estimated Tax : </td>
                                    <td>Added In M.R.P</td>
                                </tr>
                                <tr>
                                    <th>Grand Total :</th>
                                    <th><i class="fas fa-rupee-sign mr-1"></i>{{$total}}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>

                <div class="alert alert-warning mt-3" role="alert">
                    Don't Forget To <strong>SHARE</strong> Your Experience.
                </div>
                <form method="post" action="{{route('payment.done')}}">
                    {{csrf_field()}}
                        <input type="hidden" name="customer_id" value="{{$user->id}}">
                        <input type="hidden" name="total" value="{{$total}}">
                        <input type="hidden" name="shop_id" value="{{auth()->user()->id}}">
                        <input type="hidden" name="payment_purpose_id" value="2">
                        <button class="btn btn-success btn-lg btn-block" type="submit"><span class="text-white"></span><strong>Done</strong></button>
                </form>
                </div>
            </div>
            @endif
        </div>
        
    </div>
    
</div>
<hr>
@endsection