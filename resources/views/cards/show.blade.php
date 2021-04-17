@extends('layouts.app')
@section('content')
<h4>Product Details</h4>
<div class="row px-5">
    <!--Images and Thumbnails--->
    <div class="col-7 py-4" style="border-right:1px solid #e6e7e8">
        <div class="card">
            <div class="card-header bg-my-dark">
                <h5 class="text-white font-weight-normal text-center mt-2 mb-0" title="Number of Customers">Card Title</h5>
            </div>
            <div class="card-body">
                <h3 class="mt-3 mb-2 text-center">30% on 200-300</h3><br>
                 <!---<h3 class="mt-3 mb-3">40% on 200-400</h3>-->
                <p class=" text-muted">
                   + Buy 3 products charged with this card to get additonal 5%.<br></p>
                   <p class="text-muted">+ A Gift Card From Covalent</p>
                   <hr>
                <p class="text-muted" style="font-size: 18px;">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
                <hr/>
                <p class="mt-2 mb-0 text-muted">
                       <span class="text-danger mr-2 mt-1"><i class="fas fa-arrow-down" style="font-size: 15px;"></i> 5.27%</span>
                        <span class="text-nowrap mt-1">Since last month</span> 
                </p>
            </div>
        </div>
        <br>
        <div class="mt-3">
         <span class="" style="font-size: 25px;">Some Of The Review:</span>
                <p class="text-muted" style="font-size: 18px;">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
        </div>

         <br>
        <div class="mt-3">
         <span class="" style="font-size: 20px;">What You Will Get:</span>
                <p class="text-muted">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
        </div>
          <br>
        <div class="mt-3">
         <span class="" style="font-size: 20px;">About Shop:</span>
                <p class="text-muted" style="font-size: 15px;">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
        </div>
    </div> 

    <!--Pricing And Details--->
    <div class="col-5">
        <!--Product Name and Details--->
        <div class="mt-2" style="border-bottom: 1px #d5d8db solid; line-height: 1">
            <h5>Ranked 25 This Week</h5>
            <p class="text-my-info">Active For 2 Weeks</p>
            <p class="text-muted text-warning">
                <i class="fas fa-star" style="font-size: 20px;"></i>
                <i class="fas fa-star" style="font-size: 20px;"></i>
                <i class="fas fa-star" style="font-size: 20px;"></i>
                <i class="fas fa-star" style="font-size: 20px;"></i>
                <i class="fas fa-star-half-alt" style="font-size: 20px;"></i>
                <span class="text-my-info pl-3" style="font-size: 15px; pl-3"> 4.5/5 | 6k/1k customer/investor  review</span>  
            </p>
        </div>

        <!--Product Pricing--->
        <div class="mt-4 py-2" style="border-bottom: 1px #d5d8db solid;">
            <h5 class="text-danger">M.R.P: $100</h5>
            <span class="badge bg-my-dark px-2 py-2">avialable</span>
            <h5 class="text-muted mt-3">Buy:</h5>
            <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-my-danger ml-4 mt-0" style="font-size: 14px;">Buy Now
                    </button>
                    <span class="text-muted font-weight-bold mt-1 ml-2" style="font-size: 18px">OR:</span>
                    <button type="button" class="btn btn-sm bg-my-warning ml-4 mt-0" style="font-size: 14px;"><i class="fas fa-shopping-cart mr-1" aria-hidden="true"></i>Add to cart
                    </button>
                
            </div>
                                
        </div>
 
        <!--Product Sharing--->
        <div class="mt-3">
            <h5>Social Media</h5>       
            <div class="d-flex" >
                <a href="#" class="ml-3"><i class="fab fa-facebook-f text-dark" style="font-size: 15px"></i></a>
                <a href=#  class="ml-3"><i class="fab fa-whatsapp text-dark" style="font-size: 15px"></i></a>
                <a href="#"  class="ml-3"><i class="fab fa-twitter text-dark" style="font-size: 15px"></i></a>
                <a href="#"  class="ml-3"><i class="fab fa-google text-dark" style="font-size: 15px"></i></a>
                <a href="#" class="ml-3"><i class="fab fa-instagram text-dark" style="font-size: 15px"></i> </a>  
            </div>
             <div class="mt-3">
                 <span class="" style="font-size: 25px;">Details:</span>
                <p class="text-muted" style="font-size: 18px;">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                </p>
             </div>
 
               
        </div>

    </div>
</div>
<hr>
<h5>Recently Charged Product</h5>
@include('features.recommendation')


@endsection