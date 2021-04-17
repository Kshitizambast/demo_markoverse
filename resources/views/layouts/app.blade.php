<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.header')
<body style="background-color: #fcedb6;">     
              <header class="header-transparent" id="header-main">
                @include('inc.navbar')
              </header>

              <div class="container-fluid p-0" id="app">
                   @yield('content')
    
              </div>          
    <!-- SCRIPTS -->
    <!-- Optional JavaScript -->
    
    <!-- Option 1: Bootstrap 5.0 Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!--Datatable--->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    

     <!--Social Buttons-->
      


      

    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

    
    
    
    
<!-- swipper js below -->
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    
    
    <!-- Dropzone script below -->
    <script src="{{asset('vendor/dropzoneJS/dist/dropzone.js')}}"></script>
    <!-- Cropper js script link below -->
    <script type="module" src="{{asset('vendor/cropperjs-master/docs/js/cropper.js')}}"></script>

    <script type="text/javascript" src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!---app.js from resources-->
    
        <script type="text/javascript" src="{{asset('js/app.js?rnd=84')}}"></script>
    <script type="text/javascript" src="{{asset('js/navbar/navbar.js?rnd=4578')}}"></script>
    <script type="text/javascript" src="{{asset('js/homepage/homepage.js?rnd=17')}}"></script>
    <script type="text/javascript" src="{{asset('js/cart/cart.js?rnd=456')}}"></script>
    <script type="text/javascript" src="{{asset('js/product/productPage.js?rnd=231')}}"></script>
    <script type="text/javascript" src="{{asset('js/users/userAccount.js?rnd=12')}}"></script>
     <script type="text/javascript" src="{{asset('js/investment/investment.js?rnd=45')}}"></script>
      <script type="text/javascript" src="{{asset('js/coupons/coupons.js?rnd=75')}}"></script>


      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5de8f42a56106a18"></script>
     
     
     <!-- Lazy load elements -->
     
     
     
      </body>
    <!-- Footer -->
    <footer class=lazy "page-footer bg-dark font-small blue">

      <!-- Copyright -->
      
      <div class="footer w-100 bg-dark text-light flex-column justify-content-center navbar text-center" style="background-size: contain;
    background-attachment: fixed; background-position: top;">
    <span class="navbar-brand">
        <img src="{{asset('img/markoLogoLabel.png')}}" alt="Markoverse" width="auto" class="d-inline-block align-top">
    </span>
    <h5 style="font-family:Redressed;"><b>© 2020 Copyright:

        <a href="https://markoverse.com" class="text-white"> markoverse.com</a></b></h5>
    <h4 style="font-family:Redressed;"><p>A trademark of <strong>Tavisi Technologies</strong> (kshitizambast@markoverse.com)</p></h4>
</div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
    </html>



  