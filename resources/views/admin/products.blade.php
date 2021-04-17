@extends('layouts.covalentadmin')
@section('content')
<h5 class="mt-3 text-dark">Products</h5>
<hr>
<div class="row mt-1 px-0">
    <div class="col-xl-12 px-0" style="min-width: 1000px;">
        <div class="card" style="min-width: 1100px">
            <div class="card-body">
                <div class="row mb-2">
                <div class="col-sm-4">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2">Create Card</a>
                </div>
                <div class="col-sm-8">
                   <div class="text-sm-right">
                        <button type="button" class="btn btn-success mb-2 mr-1">Rank All</button>
                    </div>
                </div><!-- end col-->
            </div>
                <table id="customerDetails" class="table table-borderd table-hover" style="width:100%; font-size: 19px;">
                    <thead>
                        <tr>
                            <th >Product</th>
                            <th class="ml-5">Category</th>
                            <th>Added Date</th>
                            <th>Of Shop</th>
                            <th>Price</th>
                            <th>Disscount Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                        <tr>
                            <td  width="150px">
                                <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
                                <span class="text-muted">Hello Name</span>
                            </td>
                            <td>Shop Name</td>
                            <td>408</td>
                            <td><span class="badge badge-info">4/5</span></td>
                            <td><span class="badge badge-warning">6000</span></td>
                            <td>3000</td>
                            <td>$320</td>
                            <td><span class="badge badge-info mr-2">$200</span></td>
                            <td><button class="btn btn-sm btn-info mt-0">Refresh</button></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
 @include('datamining.area')
 <script>
    $(document).ready(function(){
        "use strict";
       $('#customerDetails').DataTable({
              "columnDefs": [
                { "width": "20%", "targets": 0 }
              ]
            }); 
       //End Datatabel
});
</script>
@endsection