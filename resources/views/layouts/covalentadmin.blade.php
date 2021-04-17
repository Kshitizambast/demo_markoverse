
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Markoverse Admin</title>

      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157887760-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-157887760-1');
    </script>


  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/shop-admin.css')}}"> -->
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
  <link href="{{asset('css/upload_btn.css')}}" rel="stylesheet">
   <link href="{{asset('vendor/dropzoneJS/dist/dropzone.css')}}">

    <!-- Dropzone Js plugin -->
  <script src="{{asset('vendor/dropzoneJS/dist/dropzone.js')}}"></script>

    

    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="{{asset('vendor/TagsInput/src/jquery.tagsinput-revisited.css')}}">
  
  <!-- Loader css -->
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/loader/loader.css')}}">


  
    <!--AXios-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"></script>

 <style type="text/css">
    .dropzone{ 
    border: 2px dashed #dee2e6;
    background: #fff;
    border-radius: 6px;
    justify-content: center;
    cursor: pointer;
    min-height: 150px;
    padding: 20px; 
    }

    .dropzone .dz-message {
    text-align: center;
    margin: 2rem 0;
  }
    html, body {
      height: 100%;
    }
    #actions {
      margin: 2em 0;
    }

    /* Mimic table appearance */
    div.table {
      display: table;
    }
    div.table .file-row {
      display: table-row;
    }
    div.table .file-row > div {
      display: table-cell;
      vertical-align: top;
      border-top: 1px solid #ddd;
      padding: 8px;
    }
    div.table .file-row:nth-child(odd) {
      background: #f9f9f9;
    }



    /* The total progress gets shown by event listeners */
    #total-progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the progress bar when finished */
    #previews .file-row.dz-success .progress {
      opacity: 0;
      transition: opacity 0.3s linear;
    }

    /* Hide the delete button initially */
    #previews .file-row .delete {
      display: none;
    }

    /* Hide the start and cancel buttons and show the delete button */

    #previews .file-row.dz-success .start,
    #previews .file-row.dz-success .cancel {
      display: none;
    }
    #previews .file-row.dz-success .delete {
      display: block;
    }

    .rounded{
      border-radius: .25rem!important;
    }


    
  </style>

</head>
<body id="page-top">
    
  <div id="wrapper">
    @include('inc.adminnav')
    <div class="container-fluid p-2">
      @yield('content')
    </div>
  </div>

   <div id="loader-wrapper">
      <div id="loader"></div>
            <h3 class="text-light" style="position: relative;
                color: wheat;
                width: 100%;
                text-align: center;
                top: 50%;
                z-index: 1002;">Processing your request...</h3>
      <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        
  </div>
 
    <!--DropZone JavaScript-->
  
  

  <!-- Bootstrap core JavaScript-->
  
      
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
 <!--  <script src="{{asset('js/sb-admin-2.js')}}"></script> -->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('js/styvalent.js')}}"></script>


  <!-- Page level plugins -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>


 {{--  <!-- Dropzone Js plugin -->
  <script src="{{asset('vendor/dropzoneJS/dist/dropzone.js')}}"></script> --}}

  <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
 

  <!----- Page level custom scripts -->
  <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>


  <script src="{{asset('vendor/TagsInput/src/jquery.tagsinput-revisited.js')}}"></script>
  <script src="../js/app.js"></script>

   <!---CKEditor-->
      <script src="https://markoverse.com/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      

</body>
</html>