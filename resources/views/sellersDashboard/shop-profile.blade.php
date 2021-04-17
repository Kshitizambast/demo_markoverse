@extends('layouts.shop_admin')
@section('content')
<!-- shop jumbotron below -->

<div class="jumbotron shadow jumbotron-shopProfile m-2" style=" background: url('https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$shop->images[0]->filename}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container jumbotron-shopProfileContent">
        <h1 class="display-4">{{auth()->user()->shop_name}}</h1>
        <p class="lead"><i class="fas fa-map-marker-alt p-1"></i>{{auth()->user()->address}}</p>
        <hr class="my-4">
        <p><i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="text-warning fas fa-star"></i>
                        <i class="fas text-warning fa-star-half-alt"></i>&nbsp; (No ratings avialable)</p>
        <div class="row p-0 m-0">
            <div class="col-4 p-0">
                <p class="lead">
                    <a class="btn btn-light btn-sm" href="#" role="button">{{App\Category::findOrFail(auth()->user()->category_id)->subcategory_name}}</a>
                </p>
            </div>
            <div class="col-8 text-right p-0">
                <div class="shop-time">
                <p class="p-1 m-0 shop-open">Open : {{ date('g:ia', strtotime(auth()->user()->opening_time))}}</p>
                <p class="p-1 m-0 shop-close">Close:  {{ date('g:ia', strtotime(auth()->user()->closing_time))}}</p>
                </div>
            </div>
        </div>
        <div class="achievement-section shadow">
            <span class="badge-header">Achievements</span>
            <br/>
            <div class="badge-box shadow-inset"> 
                <div class="badge-scroll flexRow">
                 @for($i =0; $i<1; $i++)
                         
                  <div class="badge-circle" style="background: url({{asset('img/shop/trophySVG.png')}}); background-size: contain;background-repeat: no-repeat;">
                        <div class="badge-circle-content"><h3><i class="fas fa-hands-helping"></i></h3></div>
                    </div>

                @endfor  
                </div>
            </div>
        </div>
    </div>
</div>



<div class="p-3 shopAcountForm-scetion bg-light text-dark">
    
    <h4>Change password</h4>
    
        
                @if($flash = session('password_message'))
                     <div id="session-info" class="alert alert-success" role="alert">
                      {{$flash}}
                    </div>
                @endif
                <form method="POST" action="/dashboard/change-password">
                     @csrf 
                    <div class="form-row bg-light text-dark p-3">
                        <div class="form-group col-md-4">

                            <label for="password">Please Enter Your Current Password</label>
                             <input id="password" type="password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }} height-50" name="current_password" placeholder="Current Password"  required>
                               @if ($errors->has('current_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
        
                        </div>
                        <div class="form-group col-md-4">
                                <label>New Password</label>
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }} height-50" name="new_password" placeholder="New Password"  required>
                                 @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group col-md-4">
                                <label>Confrim Password</label>
                                <input id="password-confirm" type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }} height-50" name="new_password_confirmation" placeholder="Repeat Password"  required>
                                 @if ($errors->has('new_password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group w-100">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Change password </button>
                        </div> 
                    </div>
                </form>

    
</div>





@endsection