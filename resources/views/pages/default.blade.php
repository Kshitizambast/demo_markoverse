@extends('layouts.app')
@section('content')
@include('inc.messages')
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('svg/business_shop.svg')}}" style="filter: blur(3); width:100%; height:400px">
        
        <div class="container">
          <div class="carousel-caption text-left text-dark">
            <h1 style="background-color:rgba(255,255,255, 0.6);">Bring Your Shop Online, Now!</h1>
            <p class="text-muted" style="background-color:rgba(255,255,255, 0.7);">Experience A Brand New Way To Do Business, Grow With Us. We
            Give You Better Customer Support And Investors, Dedicated To Boost Your Business.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
       <img src="{{asset('svg/social_expert.svg')}}" style="filter: blur(3); width:100%; height:400px">
        <div class="container">
          <div class="carousel-caption text-left text-dark">
            <h1 style="background-color:rgba(255,255,255, 0.6);">Help The Shops To Grow, And Earn</h1>
            <p style="background-color:rgba(255,255,255, 0.6);">Invest Some Ammount On Your Favorite Local Shops. Choose The Card That Shows Profit. Make Shops Famous And Earn</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
         <img src="{{asset('svg/money.svg')}}" style="filter: blur(3); width:100%; height:400px">
        <div class="container">
          <div class="carousel-caption text-left text-dark">
            <h1 style="background-color:rgba(255,255,255, 0.6);">Your Market, Your Deal</h1>
            <p style="background-color:rgba(255,255,255, 0.6);">As Customer Choose The Card That Shows Good Offers. Hit Like, Rank It Up(Share To Your Friends). Save Money. Get Gifts</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

 
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Your Market<span class="text-muted">Your Offers</span></h2>
        <p class="lead">As Customer Choose The Deal Which Can Save Your Money. Hit Like, Rank It Up(Invite Friends To Like It). Let The Shop Near You Choose The Card. Enjoy The Offer And Get Gifts</p>
        <br>
        <a href="#">Learn More</a>
      </div>
      <div class="col-md-5">
       <img src="{{asset('svg/money.svg')}}" height="auto" width="100%">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Earn Money <span class="text-muted">Just Using Social Media</span></h2>
        <p class="lead">We Encourage You To Try And Understand The Investment On Basic Level. Invest A Little Amount In The Shop Near By. Help Them To Grow, Make Them Famous On Social Media And As They Gain Profit, You Get The Money. Choose The Cards That Shows Profit To Shops. Hit Like, Rank It Up(Invite Friends To Like It) To Attract Shop. Help Us To Reach Your Local Shops. Little Amount In Many Shops Is Good Money.</p>
        <br>
        <a href="#">Learn More</a>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{asset('svg/investing.svg')}}" height="auto" width="100%">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Know Your Customers <span class="text-muted">Grow With Investors</span></h2>
        <p class="lead">Endless Possibilites Are Here. Your Shop, Your Reputation Not Of Someone else. Choose The Correct Card, Let The Investors Invest And Become Famous On Social Media. Raise Your Reputation And 
        We Will Help You To Grow. We Give You A Dashborad And A Very Easy Selling Process. Sign Up Now And Sit Back For Flood Of Customers.</p><br>
        <a href="#">Learn More</a>
      </div>
      <div class="col-md-5">
        <img src="{{asset('svg/business_shop.svg')}}" height="auto" width="100%">
      </div>
    </div>

@endsection