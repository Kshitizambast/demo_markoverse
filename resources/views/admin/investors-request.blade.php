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
                            <th>Customer Name</th>
                            <th>Points</th>
                            <th>email</th>
                            <th>gender</th>
                            <th>Birthday</th>
                            <th>Joined On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pointsPerCustomers as $customer_id => $points)
                            <tr>
                                <td>{{App\User::find($customer_id)->name}}</td>
                                <td>{{$points}}</td>
                                <td>{{App\User::find($customer_id)->email}}</td>
                                <td>{{App\User::find($customer_id)->gender}}</td>

                                <td>{{App\User::find($customer_id)->birthday}}</td>

                                <td>{{App\User::find($customer_id)->created_at}}</td>
                              
                                </form>
                                
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