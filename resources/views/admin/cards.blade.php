@extends('layouts.covalentadmin')
@section('content')
<h5 class="mt-3 text-muted">Cards</h5>
<hr>
<div class="row mt-1 px-0">
    <div class="col-xl-12 px-0" style="min-width: 1000px;">
        <div class="card" style="min-width: 1100px">
            <div class="card-body">
                <div class="row mb-2">
                <div class="col-sm-4">
                    <a href="{{asset('/admin/createcard')}}" class="btn btn-danger mb-2" >Create Card</a>
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
                            <th>Card Name</th>
                            <th>To Shop</th>
                            <th>Weight This Week</th>
                            <th>Shop Review</th>
                            <th>Price</th>
                            <th>Disscount Price</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                            <tr>
                                <td>{{$card->card_title}}</td>
                                <td>Shop Name</td>
                                <td>408</td>
                                <td><span class="badge badge-info">4/5</span></td>
                                <td><span class="badge badge-danger">6000</span></td>
                                <td><span class="badge badge-warning">3000</span></td>
                                <td>${{$card->price}}</td>
                                <td><span class="badge badge-info mr-2">${{$card->price / 2}}</span></td>
                                <td><span class="badge badge-info">40 times</span></td>
                                <td><button class="btn btn-sm btn-info mt-0" id="rankcard{{$card->id}}">Refresh</button></td>
                            </tr> 
                         @endforeach 
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
 @include('datamining.lastThing')
 <script>
    $(document).ready(function(){
        "use strict";
       $('#customerDetails').DataTable(); 
});
</script>
@endsection