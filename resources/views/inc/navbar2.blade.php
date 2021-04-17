<div class="row dashboard-nav py-2" >
  <div class="col-md-4">
    <form class="mt-1">
        <div class="input-group">
            <input type="text" style="height: 35px" class="form-control" placeholder="Search...">
            <div class="input-group-append">
                <button class="btn mt-0 ml-0 btn-my-primary btn-my-sm"  type="submit"><i class="fas fa-search default-search" style="font-size: 25px"></i></button>
            </div>
        </div>
    </form>
  </div>
  <div class="col-md-8 justify-content-between pl-5">
    <i class="fas fa-bell text-my-primary  mt-1" style="margin-left: 450px; font-size: 35px"></i>
    <div class="dashboard-info float-right" data-toggle="dropdown">
      <img src="{{asset('img/women.jpg')}}" alt="Avatar" class="avatar">
      <span class="text-muted" style="font-size: 20px">Hello Name</span>
    </div>
    <div class="dropdown-menu mt-2">
      <h5 class="dropdown-header">Dropdown header</h5>
      <a class="dropdown-item" href="#">Link 1</a>
      <a class="dropdown-item" href="#">Link 2</a>
      <a class="dropdown-item" href="#">Link 3</a>
      <h5 class="dropdown-header">Dropdown header</h5>
      <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">Sign Out
                                                    </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>

<!---Horizontal End--->

<!---The Side Bar-->

	<div class="row mt-3">
    <nav class="col-md-2 d-none d-md-block pl-3 sidebar"
         style="background:linear-gradient(135deg,#8f75da 0,#727cf5 60%);">
      <div style="margin-top: -30px;">
         <span class="text-white" style="font-size: 20px">Welcome!</span>
         <br>
        <span class="text-white h5">{{auth()->user()->shop_name}}</span>
      </div>
      <div class="sidebar-sticky mt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{asset('/dashboard')}}">
             <i class="fas fa-house-damage mr-2" style="font-size: 15px"></i>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{asset('/dashboard/orders')}}">
              <i class="fas fa-file mr-2" style="font-size: 15px"></i>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"href="{{asset('/dashboard/products')}}">
              <i class="fas fa-shopping-cart mr-2" style="font-size: 15px"></i>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"   href="{{asset('/dashboard/customers')}}">
              <i class="fas fa-user-friends mr-2" style="font-size: 15px;"></i>
              Customers
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link text-white" href="{{asset('/dashboard/cards')}}">
             <i class="fas fa-copyright mr-2" style="font-size: 15px;"></i>
              Cards
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{asset('/dashboard')}}">
              <i class="far fa-chart-bar mr-2" style="font-size: 15px;" ></i>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{asset('/dashboard/investors')}}">
             <i class="fas fa-rupee-sign mr-2" style="font-size: 15px;"></i></i>  
              Investors
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{asset('/dashboard/commerce')}}">
             <i class="fas fa-layer-group mr-2" style="font-size: 15px;"></i>  
              Covalentz & You
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-white" href="#">
            <i class="fas fa-plus-circle" style="font-size: 15px;"></i> 
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class="fas fa-file-alt mr-2" style="font-size: 15px;"></i>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
             <i class="fas fa-file-alt mr-2" style="font-size: 15px;"></i>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
             <i class="fas fa-file-alt mr-2" style="font-size: 15px;"></i>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
             <i class="fas fa-file-alt mr-2" style="font-size: 15px;"></i>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>
</div>

