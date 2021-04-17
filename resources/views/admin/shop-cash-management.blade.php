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
                            <th>Payble Ammount</th>
                            <th>status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $req)
                            <tr>
                                <td>{{$req->shop_name}}</td>
                                <td>{{App\ShopDataPerWeek::paybleToCovalent($req->id)}}</td>
                                <td><button class="btn btn-sm btn-success"></button></td>
                                <td>{{date("F jS, Y", strtotime($req->created_at))}}</td>
                                <td>
                                    <form method="post" action="{{route('shop.confirm-payment')}}">
                                        {{csrf_field()}}
                                    <input type="hidden" name="shop_id" value="{{$req->id}}">
                                <button class="btn btn-sm btn-success mt-0">Confirm Payment</button>
                                </form>
                                </td>
                                
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