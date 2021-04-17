@extends('layouts.covalentadmin')
@section('content')
<h5 class="mt-3 text-muted">Shops</h5>
<hr>
<div class="row mt-1 px-0">
    <div class="col-xl-12 px-0" style="min-width: 1000px;">
        <div class="card" style="min-width: 1100px">
            <div class="card-body">
                <div class="row mb-2">
                <div class="col-sm-4">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2">Refresh All</a>
                </div>
                <div class="col-sm-8">
                    <div class="text-sm-right">
                        <button type="button" class="btn btn-warning mb-2 mr-1">Send Warning</button>
                    </div>
                </div><!-- end col-->
            </div>
                <table id="customerDetails" class="table table-borderd table-hover" style="width:100%; font-size: 19px;">
                    <thead>
                        <tr>
                            <th>Shop Name</th>
                            <th>Seller Name</th>
                            <th>Products</th>
                            <th>Active Card</th>
                            <th>Last Payment</th>
                            <th>Current Week Revenue</th>
                            <th>Total Revenue</th>
                            <th>Catgeory</th>
                            <th>Shop is</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shops as $shop)
                            <tr>
                                <td>{{$shop->shop_name}}</td>
                                <td>{{App\User::findOrNew($shop->owner_id)->name}}</td>
                                <td>{{$shop->products->count()}}</td>
                                <td><span class="badge badge-danger">No Card</span></td>
                                <td><span class="badge badge-warning">Done </span></td>
                                <td>500</td>
                                <td>300</td>
                                <td><span class="badge badge-info mr-2">{{App\Category::findOrNew($shop->category_id)->subcategory_name}}</span></td>
                                <td><span class="badge badge-info">active</span></td>
                                <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
 {{-- @include('datamining.area') --}}
 <script>
    $(document).ready(function(){
        "use strict";
       $('#customerDetails').DataTable(); 
});
</script>
@endsection