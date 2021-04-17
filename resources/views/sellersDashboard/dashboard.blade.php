@extends('layouts.shop_admin')
@section('content') 
<!-- Page Heading -->
       @if($flash = session('message'))
         <div id="session-info" class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif
      @if($flash = session('message_danger'))
         <div id="session-info" class="alert alert-danger" role="alert">
          {{$flash}}
        </div>
    @endif
       
        @if(auth()->user()->can_buy_cards == 0 )
         <div class="alert alert-success"  id="success-messages">
           <h5><strong>Welcome To Markoverse. Your Shop Is Up And Running</strong></h5>
         </div>
         @endif
         



          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#photo-modal"><i class="fas fa-download fa-sm text-white-50"></i> Add Shop Images.</a>
          </div>

          <!-- Shop activate/deactivate switch box below-->
        <div class="alert alert-danger d-flex col-md-6 ml-auto mr-auto" role="alert">
          <span><h4 class="m-0 p-1">Is your shop open now?</h4></span>
            <span class="custom-control custom-switch ml-auto" id="shop-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch{{4545+auth()->user()->id}}" <?php if(auth()->user()->is_open_now == 1) echo "checked";?>>
              <label class="custom-control-label" for="customSwitch{{4545+auth()->user()->id}}"></label>
            </span>

            <script type="text/javascript">
             $(document).ready(function(){

                   $('#customSwitch{{4545+auth()->user()->id}}').change(()=>{
                        axios.post('dashboard/switch', {
                            id: '{{Crypt::encrypt(auth()->user()->id)}}'
                        })
                        .then((res)=>{
                            console.log(res);
                            //window.location.reload();
                            return false;
                        })
                        .catch((err)=>{
                            console.log(err)
                        });
                    });

             });
         </script>
        </div>

          <!-- Modal -->
            <div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="photo-Title" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose the photos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('shop.shop-image')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <label for="Product Name">Shop Photos(can attach more than one):</label>
                      <br>
                      <input type="hidden" name="my_shop_id" value="{{auth()->user()->id}}">
                      <input type="file" class="form-control" name="shop_photos[]" id="imgInp" multiple="">
                      
                      <br><br>
                      <input type="submit" class="btn btn-primary" value="Upload">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
        
      
            
        

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Revenue (Weekly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{-- <i class="fas fa-rupee-sign mr-2"></i> --}}
                        <p>Keep Selling. We are preparing your data</p>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Customers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <p>Keep Selling. We are preparing your data</p>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Orders</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><p>Keep Selling. We are preparing your data</p></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Growth</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><p>Keep Selling. We are preparing your data</p></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <p>Keep Selling. We are preparing your data</p>
                  <br>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                   {{--  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> --}}
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <br>
                  <p>Keep Selling. We are preparing your data</p>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div> --}}
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">

                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> New Customers
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Repetive Customers
                    </span>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Best Products Analysis.</h6>
                </div>
                <div class="card-body">

                  @if(count($shop->products) > 0 and count($analyzeProducts) > 0)
                    @foreach($analyzeProducts as $product_id=>$sell_percentage)
                      <h4 class="small font-weight-bold">{{App\Product::findOrFail($product_id)->product_name}}<span class="float-right">{{$sell_percentage}}%</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$sell_percentage}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    @endforeach

                  @else

                    <h4>Keep Selling We Will Analyze Once We Have Some Data.</h4>

                  @endif

                </div>
              </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; markoverse 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
@endsection 