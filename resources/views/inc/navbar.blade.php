<!--///////////////////////////////////// Side Navigation bar code below //////////////////////////////////////////////-->

<div id="mySidenav" class="sidenav">
    <span class="sidenav-header w-100 d-flex justify-content-between">
        @if(Auth::check())
        @if(App\User::image(auth()->user()->id))
        <span class="sidenav-avatar" style="background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{App\User::image(auth()->user()->id)}}'); background-size: cover; background-position: center;"></span>
        @else
        <span class="sidenav-avatar"></span>
        @endif
        <a href="/profile/{{Crypt::encrypt(auth()->user()->id)}}" class="nav-link w-100">
            <h3>Hello {{auth()->user()->name}}</h3>
        </a>
        @else
        <h3 class="m-2">Hello Guest</h3>
        @endif
        <a class="nav-link" onclick="closeNav()"><i class="bi bi-arrow-left"></i></a>
    </span>
    <span class="sidenav-web-links w-100">
        <a class="nav-link">
            <h4 class="m-0">Explore markoverse!</h4>
        </a>
        <hr class="m-1" />
        <div class="site-nav mx-3">
            <a class="nav-link" href="/cards"><i class="bi bi-percent"></i>&nbsp;Top Deals</a>
            <a class="nav-link" href="#categorySection" onclick="closeNav()"><i class="bi bi-diagram-2"></i>&nbsp;Shop by Category</a>
            <a class="nav-link" href="/shops"><i class="bi bi-calendar2-event"></i>&nbsp;Celebrate</a>
            <a class="nav-link"  href="/shops"><i class="bi bi-lightbulb"></i>&nbsp;What is markoverse?</a>
        </div>
    </span>
    @if(Auth::check())
    <span class="sidenav-user-links w-100">
        <a class="nav-link">
            <h4 class="m-0">Quick Links</h4>
        </a>
        <hr class="m-1" />
        <div class="site-nav mx-3 p-1">
            <a class="nav-link" href="/profile/{{Crypt::encrypt(auth()->user()->id)}}"><i class="bi bi-clock-history"></i>&nbsp;Your orders</a>
            <a class="nav-link" href="{{route('show.order')}}"><i class="bi bi-cart3"></i>&nbsp;Cart</a>
            @if(Auth::check() and auth()->user()->is_admin == 1)
            <a class="nav-link" href="/invest"><i class="bi bi-graph-up"></i>&nbsp;Investvent dashboard</a>
            @endif
            <a class="nav-link" href="/profile/{{Crypt::encrypt(auth()->user()->id)}}"><i class="bi bi-gear"></i>&nbsp;Account setting</a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left"></i>&nbsp;Sign out</a>
        </div>
    </span>
    @endif
    <span class="sidenav-support-links w-100">
        <a class="nav-link">
            <h4 class="m-0">Help & Support</h4>
        </a>
        <hr class="m-1" />
        <div class="site-nav mx-3">
            <a class="nav-link"><i class="bi bi-lightbulb"></i>&nbsp;Help me</a>
            <a class="nav-link"><i class="bi bi-rss"></i>&nbsp;Give feedback</a>
            <a class="nav-link"><i class="bi bi-file-check"></i>&nbsp;Terms & Conditions</a>
            <a class="nav-link"><i class="bi bi-people"></i>&nbsp;Customer Service</a>
        </div>
    </span>
</div>

<div id="overlay" onclick="closeNav()"></div>

<!--///////////////////////////////////// Search field area with components //////////////////////////////////////////////-->

<div class="search-field-area">
    <span class="search-dismiss">
        <h1 class="text-danger"><i class="bi bi-x"></i></h1>
    </span>
    <div class="container mt-5">
        <div id="search">
            <form id="search-form" class="d-flex justify-content-center" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group w-75">
                    <input class="form-control bg-dark text-light border-dark" type="text" placeholder="Search" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-outline-dark text-warning"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <div id="filter">
            <form class="row mt-5">
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="make" class="filter-make filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Category</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="model" class="filter-model filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Sub-category</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="type" class="filter-type filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Shop</option>
                        <option value="">Show All</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select data-filter="price" class="filter-price filter bg-dark border-secondary text-secondary form-control">
                        <option value="">Select Price Range</option>
                        <option value="">Show All</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="row mt-5" id="products">

        </div>
    </div>
</div>

<!-- ///////////////////////////////////// Navigation-bar below ///////////////////////////////////////////////// -->

<nav class="navbar navbar-light p-2">
    <div class="top-nav row m-0 w-100 px-2 justify-content-between">
        <a class="nav-link w-auto text-nowrap p-1" href="#"><i class="bi bi-compass"></i>&nbsp;<small class="p-1" style="font-size: smaller;">Durgapur</small></a>
        @if(!Auth::check() or (Auth::check() and auth()->user()->is_owner == 1))
        <a class="nav-link w-auto text-nowrap p-1" href="/shoplogin"><i class="bi bi-shop-window"></i>&nbsp;<small class="p-1" style="font-size: smaller;">Shop LogIn</small></a>
        @endif
    </div>
    <div class="container-fluid p-0">
        <div class="row w-100 m-0 p-0">
            <div class="col-auto logo-box d-flex order-sm-1 order-1 m-0 p-0 px-2">
                <span class="side-nav" onclick="openNav()"><i class="bi bi-list"></i></span>
                <a class="navbar-brand m-0" href="{{route('index')}}">
                    <img src="{{asset('img/markoLogoLabel.png')}}" alt="Markoverse" width="auto" class="d-inline-block align-top">
                </a>
            </div>
            <div class="col-auto nav-item d-none d-sm-block order-sm-2 order-2 m-0 p-0">
                <a class="nav-link border-right border-light" href="#categorySection" id="navbarDropdown" role="button" ">
                    All Categories
                </a>

            </div>
            <div class="col-auto marko-links-box mx-auto order-sm-4 order-xl-3 order-4 m-0 p-0">
                <ul class="marko-links navbar-nav me-auto mb-lg-0 flex-row justify-content-between px-3">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/shops">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cards">Discounts</a>
                    </li>
                    @if(Auth::check() and auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="#">Earn</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('firststage')}}">Sell</a>
                    </li>
                </ul>
            </div>
            <div class="col-auto user-panel order-sm-3 order-xl-4 order-3 d-flex p-0">
                <ul class="navbar-nav user-links me-auto mb-lg-0 flex-row justify-content-between">
                    <li class="nav-item mx-2">
                        <a class="nav-link search-nav"><i class="bi bi-search"></i></a>
                    </li>
                    @if(\Auth::check())
                    <li class="nav-item mx-1 notification-dropdown">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell"></i>
                                @if(count(\Auth::user()->unreadNotifications) > 0)
                                <span class="badge bg-dark">{{count(\Auth::user()->unreadNotifications)}}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu p-0 bg-dark" id="notification-menu" aria-labelledby="dropdownMenuLink">
                                <div class="fixed-top notification-dropdown-header d-flex p-2">
                                    <span class="mr-auto">
                                        <h5 class="text-light mb-0 p-1">Notifications</h5>
                                    </span>
                                    <span class="w-100 text-end">
                                        <small class="text-light mb-0 p-1 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">close</small>
                                    </span>
                                </div>
                                <hr class="text-light p-0 m-0 mt-5" />

                               
                                @include('notification-features.notification')
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{route('show.order')}}"><i class="bi bi-cart3"></i>
                            @if(App\OrderDetails::totalOrder(auth()->user()->id, 0) > 0)
                            <span class="badge bg-dark">{{App\OrderDetails::totalOrder(auth()->user()->id, 0)}}</span>
                            @endif
                        </a>

                    </li>
                    <li class="nav-item dropdown d-none d-sm-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <span class="hideText"> Hello {{auth()->user()->name}}!</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="/profile/{{Crypt::encrypt(auth()->user()->id)}}" style="text-decoration: none;">
                                    <i class="fas fa-user-circle"></i> My profile
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="text-decoration: none;"> <i class="fas fa-sign-out-alt"></i> Sign out
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" href="/login">
                            <p class="mb-0"><i class="bi bi-box-arrow-in-right"></i>&nbsp;<small>LogIn</small></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-nowrap" href="/register">
                            <p class="mb-0"><i class="bi bi-box-arrow-in-right"></i>&nbsp;<small>SignUp</small></p>
                        </a>
                    </li>
                    @endif

                </ul>

            </div>
        </div>
    </div>
    </div>
</nav>