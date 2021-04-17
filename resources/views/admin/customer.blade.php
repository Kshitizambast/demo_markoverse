@extends('layouts.covalentadmin')
@section('content')
<h5 class="mt-3 text-muted">Users</h5>
<hr>
<div class="row mt-1 px-0">
    <div class="col-xl-12 px-0" style="min-width: 1000px;">
        <div class="card" style="min-width: 1100px">
            <div class="card-body">
                <div class="row mb-2">
                <div class="col-sm-4">
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
                            <th>Serial #</th>
                            <th>Customer Name</th>
                            <th>E-mail</th>
                            <th>Username</th>
                        
                            <th>Is Investor</th>
                            <th>Is Customer</th>
                            <th>Is Owner</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->username}}</td>

                                <td><span class="badge badge-danger">{{$user->is_investor}}</span></td>
                                <td><span class="badge badge-warning">{{$user->is_customer}}</span></td>
                                <td><span class="badge badge-info mr-2">{{$user->is_owner}}</span></td>
                                <td><span class="badge badge-info">{{$user->updated_at}}</span></td>
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