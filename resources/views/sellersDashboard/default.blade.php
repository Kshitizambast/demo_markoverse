@extends('layouts.shop_admin')
@section('content')
	<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome To Markoverse</h1>
          </div>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="d-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#photo-modal"><i class="fas fa-download fa-sm text-white-50"></i>Add Shop Images.</a>
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
                      <input type="file" class="form-control" name="shop_photos[]" multiple>
                      
                      <br><br>
                      <input type="submit" class="btn btn-primary" value="Upload">
                    </form>
                  </div>
                </div>
              </div>
            </div>


          <div class="row">
            <div class="col-lg-6">

              <!-- Default Card Example -->
              <div class="card mb-4">
                <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                </div>
                <div class="card-body">
                  Upload some products with good images and be honest about
                  pricing. Remove background If You Can. Use <a href="https://www.remove.bg/"> Remove.bg</a> website to get the white background. 
                </div>
                <div class="card-footer">
                	<a href="{{asset('dashboard/addproducts')}}"  style="text-decoration: none;"><button type="button" class="btn btn-primary btn-lg btn-block"> Add Product</button></a>
                </div>
              </div>

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Cards</h6>
                </div>
                <div class="card-body">
                  Cards are the offers coupons + gifts. cards are voted by the customers nearby. Customer choose them and show you what kind of offer they are looking for. Your job is to apply the coupon in your shop.
                  Customers will get notification and you can sell to your customers. 
                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">What is Markoverse</h6>
                </div>
                <div class="card-body">
                 Markoverse is the platform where we connect shops and customers in very unique way. We are building a network of retail market. A network which knows the needs of every customers nearby. Markoverse provide a platform where you can be the next solution for that need. Markoverse can help you to increase your business significantly. We don't demand any margin from you. Markoverse sells the cards. You apply it and wait for the flood of customers. 
                </div>
              </div>
				 <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
                </div>
                <div class="card-body">
                Consider the dashboard as your online shop management tool. You get useful insights that can help you to grow your business. You communicate with us through dashboard. You upload the products, buy the cards and sell your products using dashboard. Keep selling and once we will have data you would see the graphs and other insights in your dashboard.
                </div>
              </div>

            </div>

             
            </div>
           
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection