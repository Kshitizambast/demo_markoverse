@extends('layouts.shop_admin')

@section('content')
<h4>Cards Details</h4>

    @if($flash = session('message'))
         <div id="session-info" class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="overflow:hidden;">
                <div class="row mb-2">
                <div class="col-sm-4">
                    <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2" onclick="this.load()"></i>Refresh</a>
                </div>
                <div class="col-sm-8">
                    <div class="text-sm-right">
                        <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button>
                        <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                        <button type="button" class="btn btn-light mb-2">Export</button>
                    </div>
                </div><!-- end col-->
                <div class="table-responsive">
                <table id="customerDetails" class="table table-border" style="width:100%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Disscount</th>
                            <th>Customer Likes</th>
                            <th>Min Range</th>
                            <th>Max Range</th>
                            <th>Customer Growth</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($cards as $card)
                         @if(auth()->user()->category_id == $card->category_id)
                                <tr>
                                    <td>{{$card->card_title}}</td>
                                    <td>{{$card->disscount}}%</td>
                                    <td>{{App\LikesOfCustomers::countLikes($card->id)}}</td>
                                    <td>{{$card->min_range}}</td>
                                    <td>{{$card->max_range}}</td>
                                    <td>{{ceil(App\LikesOfCustomers::countLikes($card->id) / 2)}} %</td>
                                    <td>
                                        @if($card->activated == 0)
                                         <span class="badge badge-success">Can Buy!</span>
                                        @else
                                         <span class="badge badge-danger">{{$card->days_left_to_active}} Days left</span>
                                        @endif
                                    </td>
                                    <td>@if($card->price != 0)
                                            <span class="badge badge-info">{{$card->price}}</span>
                                        @else
                                            <span class="badge badge-success">Free!!</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->can_buy_cards == 1 and $card->activated == 0)
                                            
                                            <form action="{{route('shop.buycard')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="card_id" value="{{$card->card_id}}">
                                                <button type="submit" class="btn btn-primary btn-sm">Buy Now</button>
                                            </form>
                                        @elseif(count(App\Card::getCard(auth()->user()->id)) != 0 and App\Card::getCard(auth()->user()->id)[0]->id == $card->id)
                                            <button  class="btn btn-info btn-sm dissable">Activated</button>
                                        @else
                                           <button  class="btn btn-danger btn-sm dissable">Can't Buy</button>
                                       @endif
                                   </td>
                                </tr>
                            @endif
                        @endforeach
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
       $('#customerDetails').DataTable(); 
});
</script>
@endsection