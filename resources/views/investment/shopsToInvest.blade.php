@extends('layouts.app')
@section('content')
@include('inc.messages')
 <div class="mv-wallet-golbal-btn" id="wallet-btn">
        <i class='fas fa-wallet text-center pl-3' style="font-size: 50px; margin-top: 15px"></i>
  </div>
    <div class="wallet-ui" id="mv-wallet-ui" style="display: none;">
        <div style="position: static;">
            <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Earnings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Investment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">History</a>
              </li>
            </ul>
        </div>
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
            <div class="card" >
              <div class="card-body">
                <h5 class="card-title text-center display-4">₹4000</h5>
                <hr>
                <p class="card-text text-muted">
                    Enter the amount and wait for the link to be send in your e-mail.
                </p>
                <hr>
                <input type="text" id="inputEmail" class="form-control mt-5" placeholder="Enter ₹" required="" autofocus="">
               <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Send Money</button>
              </div>
            </div>

          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
                <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title text-center display-4">₹5000</h5>
                    <hr>
                    <p class="card-text text-muted">
                        Card Details
                    </p>
                    <hr>
                    <input type="text" id="inputEmail" class="form-control mt-5" placeholder="Enter ₹" required="" autofocus="">
                   <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Recharge Now</button>
                  </div>
                </div>

          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
         
                <ul class="list-group">
                  <li class="list-group-item">Dapibus ac facilisis in</li>                
                  <li class="list-group-item list-group-item-primary">This is a primary list group item</li>
                  <li class="list-group-item list-group-item-secondary">This is a secondary list group item</li>
                  <li class="list-group-item list-group-item-success">This is a success list group item</li>
                  <li class="list-group-item list-group-item-danger">This is a danger list group item</li>
                  <li class="list-group-item list-group-item-warning">This is a warning list group item</li>
                  <li class="list-group-item list-group-item-info">This is a info list group item</li>
                  <li class="list-group-item list-group-item-light">This is a light list group item</li>
                  <li class="list-group-item list-group-item-dark">This is a dark list group item</li>
                </ul>


          </div>
        </div>
    </div>
  <div id="investmentPage">



    
  </div>

    <div class="row m-0">
        <div class="col mt-3">
            <h3>Invest Now!</h3>
            <div class="card bg-dark">
              <div class="card-body">
                <canvas id="myChart" width="600" height="300"></canvas>
              </div>
            </div>
        </div>

    </div>
    <hr>
        @include('investment.invest-nav')
    <hr>
    <div class="row m-0 mt-3">
      <div class="col-md-4 col-sm-12 col-xs-12 mt-2">
        <div class="card bg-dark dashboard-card">
          <div class="card-body">
            <h5 class="card-title text-white">Credit</h5>
            <p class="card-text text-white display-4 text-center">₹5000</p>
            <a href="#" class="btn btn-danger float-right">Recharge</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 mt-2">
        <div class="card bg-dark dashboard-card">
          <div class="card-body">
            <h5 class="card-title text-white">Total Invested</h5>
            <p class="card-text text-white display-4 text-center">₹4000</p>
            <a href="#" class="btn btn-danger float-right">Show Me</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 mt-2">
        <div class="card bg-dark dashboard-card">
          <div class="card-body">
            <h5 class="card-title text-white">Total Earning</h5>
            <p class="card-text text-white display-4 text-center">₹7000</p>
            <a href="#" class="btn btn-danger float-right">Send To Bank</a>
          </div>
        </div>
      </div>
     
    </div>
    
    <!---Portfolio From Here-->

    <hr>
    <h3>Shops To Invest</h3>
    
<div class="card mx-2" style="background-color: lightgoldenrodyellow">

    <div class="card-body ">
        <div class="m-0">
      <table class="table table-hover table-dark" id="investorTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Shop Name</th>
            <th scope="col">Invested Amount</th>
            <th scope="col">Current Rate</th>
            <th scope="col">Predicted Earning</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-dark">
            <th scope="row">1</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-success">2.6% &uarr;</p></td>
            <td><p class="text-success">+50%</p></td>
          </tr>
          <tr class="bg-dark">
            <th scope="row">2</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-danger">3.6% &darr;</p></td>
            <td><p class="text-danger">+50% &darr;</p></td>
          </tr>
          <tr class="bg-dark">
            <th scope="row">3</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-success">2.6%</p></td>
            <td><p class="text-success">+50%</p></td>
          </tr>
        </tbody>
      </table>
    </div>  
    </div>
    
</div>


</div>

<script>
   var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Shop 1', 'Shop 2', 'Shop 3', 'Shop 4', 'Shop 5', 'Shop 6', 'Shop 7', 'Shop 8', 'Shop 9'],
            datasets: [{
                label: "Predicted Earnings",
                data: [12, 19, 3, 5, 2, 3, 15, 16, 28],
                backgroundColor: [
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)'
                    
                ],
                borderColor: [
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)',
                    'rgba(164, 87, 191, 1)'
                    
        
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            responsive:true,
            maintainAspectRatio:false
            
        }
                
    });

     $(document).ready(function(){
                "use strict";
                 $('#investorTable').DataTable(); 
              });


</script>
@endsection
























































{{-- <h5 class="mt-3 text-muted">Shops</h5>
<hr>
@if(count($shops) > 0)
<div class="row mt-1 px-0">
    <div class="col-xl-12 px-0" >
        <div class="card">
            <div class="card-body table-overflow">
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
                            <th>Seller</th>
                            <th>Products</th>
                            <th>Active Card</th>
                            <th>Can Invest</th>
                            <th>Current Week Revenue</th>
                            <th>Predicted Earning</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shops as $shop)
                            <tr class="investmentshop{{$shop['id']}}">
                                <td>{{$shop['shop_name']}}</td>
                                <td>{{App\MyShop::ownerName($shop['owner_id'])}}</td>
                                <td>408</td>
                                <td><span class="badge badge-info">The Midway</span></td>
                                <td><span style="font-size: 18px;" class="text-grey">Rs. {{App\MyShop::can_invest($shop['id'])}}</span></td>
                                <td>200</td>
                                <td><span style="font-size: 18px;" class="text-grey">Rs. 80</span></td>
                              <td>
                                @if(App\InvestmentWallet::credit(auth()->user()->id) >= App\MyShop::can_invest($shop['id']))
                                     <script type="text/javascript">
                                            $(document).ready(function(){
                                                "use strict";
                                            $.ajaxSetup({
                                                headers: {
                                                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                });

                                                $('#letMeInvest{{$shop['id']}}').click(function(event){
                                                    event.preventDefault();

                                                    $.get("investin/{{auth()->user()->id}}/shop/{{$shop['id']}}/letmeinvest");
                                                    $('.investmentshop{{$shop['id']}}').fadeOut();
                                                            
                                                });
                                          });
                                    </script>
                                    <button class="btn btn-md btn-danger investment mt-0" id="letMeInvest{{$shop['id']}}">
                                      <span style="font-size: 14px"> Invest</span>
                                    </button>
                                  @else
                                    <button class="btn btn-md btn-danger investment mt-0" onclick="alert('Not Enough Balance')">
                                      <span style="font-size: 14px"> Invest</span>
                                    </button>         
                                @endif
                                </td>
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

@else

<div class="alert alert-danger">
    <h5>No More Shops To Invest For You.</h5>
</div>
<div class="jumbotron">
  <h1 class="display-4">Hello, Investor</h1>
  <p class="lead">Higher The Number Of Shops. Higher The Earnings. Invite The Shop Owners And Get The Credit To Invest. Help Us To Reach To The Local Shops</p>
  <hr class="my-4">
  <p>Invite The Shop Owners And Get The  <i class="fas fa-rupee-sign ml-0"></i><strong>100 </strong>Credit To Invest. Thank You!</p>
  <p class="lead">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Share
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a href="#">{{App\Refeeral::myReferUrl(auth()->user()->id)}}</a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Facebook</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Whatsapp</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Gmail</button>
          </div>
        </div>
      </div>
    </div>
  </p>
</div>
@endif
  --}}