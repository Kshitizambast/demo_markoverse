@extends('layouts.shop_admin')
@section('content')
<div class="row mt-4 px-2">
    <div class="col">
        <h3>My Customers</h3>
        <hr>
        <div class="card">
            <div class="card-body table-responsive">
                
                <table id="customerDetails" class="table table-border" style="width:100%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>E-Mail</th>
                            <th>Username</th>
                            <th>Toal Paid</th>
                            <th>Total Carts</th>
                            <th>Is Follower</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($myBags as $myBag)
                            <tr>
                                <td>{{App\User::find($myBag->customer_id)->name}}</td>
                                <td>{{App\User::find($myBag->customer_id)->email}}</td>
                                <td>{{App\User::find($myBag->customer_id)->username}}</td>
                                <td>{{App\DailySells::totalPaid($myBag->customer_id, auth()->user()->id)}}</td>
                                <td>{{App\DailySells::countCustomerOrders($myBag->customer_id, auth()->user()->id)}}</td>
                                @if(App\FollowShop::alreadySubscribed($myBag->customer_id, auth()->user()->id))
                                    <td><span class="badge badge-success">Yes</span></td>
                                @else
                                 <td><span class="badge badge-danger">No</span></td>
                                @endif
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
<script>
    $(document).ready(function(){
        "use strict";
       $('#customerDetails').DataTable(); 
});
</script>

@endsection