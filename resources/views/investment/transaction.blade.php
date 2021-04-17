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
            <h3>Transactions</h3>
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
    <h3>Transactions</h3>
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
   {{--  @include('investment.portfolio') --}}
</div>

<script>
   var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
            datasets: [{
                label:"Earning Per Day",
                data: [12, 19, 3, 7 ,8],
                backgroundColor: 'rgba(164, 87, 191, 1)',
                borderColor: 'rgba(164, 87, 191, 1)',
                borderWidth: 2
            },{
                label:"Depsit",
                data: [10, 20, 15, 6, 9],
                backgroundColor: 'rgba(2, 218, 197, 1)',
                borderColor:'rgba(2, 218, 197, 1)',
                borderWidth: 2

            },{
              label:"Invested",
                data: [10, 15, 30, 8, 5],
                backgroundColor:'rgba(207, 102, 122, 1)',
                borderColor: 'rgba(207, 102, 122, 1)',
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











































