@extends('layouts.app')

@section('content')
	<h4>MarkoVerse And {{auth()->user()->shop_name}}</h4>
	@include('datamining.cardsforcommerce')
	<div class="row mt-3">
	    <div class="col-12">
	        <div class="card">
	            <div class="card-body">
	                <div class="row mb-2">
	                    <div class="col-sm-4">
	                        <a href="{{asset('dashboard/addproducts')}}" class="btn btn-danger mb-2"><span style="font-size: 15px"> Add Products</span></a>
	                    </div>
	                    <div class="col-sm-8">
	                        <div class="text-sm-right">
	                            {{-- <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button> --}}
	                            <button type="button" class="btn btn-secondary mb-2 mr-1">Import</button>
	                            <button type="button" class="btn btn-secondary mb-2">Export</button>
	                        </div>
	                    </div><!-- end col-->
	                </div>

	              <table id="productDetails" class="table table-border" style="width:100%; font-size: 19px;">
                    <thead>
                        <tr>
                            <th>Week Number</th>
                            <th>Total Revenue</th>
                            <th>Avg. Margin Per Product</th>
                            <th>Margin After Cut</th>
                            <th>Expected Profit</th>
                            <th>Recovered Ammount</th>
                            <th>Ammount To Us</th>
                            <th>Paid</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        <tr>
                            <td>One</td>
                            <td>10,000</td>
                            <td>12%</td>
                            <td>6%</td>
                            <td>1000</td>
                            <td>100</td>
                            <td>900</td>
                            <td><span class="badge badge-danger">No</span></td>
                            <td><button class="btn btn-success btn-sm mt-0"><span style="font-size: 15px">Pay</span></button></td>
                        </tr>
                    </tbody>
                </table>
	               
	    </div> <!-- end col -->
	</div>
</div>
</div>
<script>
    $(document).ready(function(){
        "use strict";
       $('#productDetails').DataTable(); 
});
</script>
@endsection