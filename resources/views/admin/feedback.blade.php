@extends('layouts.covalentadmin')
@section('content')
<h1>Orders</h1>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow:hidden;">
                <div class="row mb-2">
                <div class="col-sm-4">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i>Refresh</a>
                </div>
                <div class="col-sm-8">
                    <div class="text-sm-right">
                        <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                        <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                        <button type="button" class="btn btn-light mb-2">Export</button>
                    </div>
                </div><!-- end col-->
                <div class="table-responsive">
                <table class="table table-centered mb-0" id="customerDetails">
                    <thead class="thead-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Shop Name</th>
                            <th>Customer Name</th>
                            <th>Payment Status</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th style="width: 125px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($orders) > 0)
                            @foreach($orders as $order)

                                <tr id="orderrow{{$order->id}}">
                                    <td>{{$order->id}}</td>
                                    <td>{{App\Product::find($order->product_id)->product_name}}</td>
                                    <td>{{$order->quantity}}</td>

                                    <td>
                                        {{date("F j, Y, g:i a",strtotime($order->bill_date))}}
                                    </td>
                                    <td>
                                      {{App\MyShop::findOrFail($order->my_shop_id)->shop_name}}
                                    </td>
                                    <td>
                                        {{App\User::getName($order->customer_id)}}
                                    </td>
                                    <td>
                                        @if($order->payment_id != 0)
                                        <h5><span class="badge badge-success-lighten"><i class="mdi mdi-coin"></i> Paid</span></h5>
                                        @else
                                        <h5><span class="badge badge-danger-lighten"><i class="mdi mdi-coin"></i>caceled</span></h5>
                                        @endif
                                    </td>
                                    <td>
                                        {{$order->paid}}
                                    </td>
                                    <td>
                                        @if($order->fullfilled == 1)
                                            <h5><span class="badge badge-info-lighten">Deal Done</span></h5>
                                        @else
                                            <h5><span class="badge badge-danger-lighten">Not Done Yet</span></h5>
                                        @endif
                                    </td>
                                   
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<script>
    $(document).ready(function(){
        "use strict";
       var table = $('#customerDetails').DataTable();
        $('#myInput').on( 'keyup', function () {
            table.search( this.value ).draw();
    });
});
</script>
@endsection