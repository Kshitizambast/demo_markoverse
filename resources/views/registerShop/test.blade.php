@extends('layouts.app')
@include('inc.messages')
@section('content')
    <div class="auth-fluid" style=" background: url({{asset('img/auth/localStreet2.jpg')}}) center;">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box" style="max-width: fit-content; padding: 0px;">
                <div class="auth-form-box-border" style=" background: url({{asset('img/auth/border-img.png')}}); position: relative;">    

                <div class="align-items-center d-flex h-100">
                    <div class="card-body" id="loginCard" style="margin: 3rem 2rem;">
                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="/">
                                <span><img src="{{asset('img/auth/markoverseLogo.png')}}" alt="" height="18"></span>
                            </a>                            
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Shop Register</h4>
                        <p class="text-muted mb-4">Enter Details Of Shop.</p>

                        <!-- form -->
                        <form id="regForm" method="POST" action="{{route('shop.register')}}" class="needs-validation">
                                 {{csrf_field()}}

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                     <input type="hidden" name="category_id" value="{{$subcategory->id}}">
                                     <input type="hidden" name="owner_id" value="{{auth()->user()->id}}">
                                    <label for="validationCustom01">Shop Name</label>
                                    <input class="form-control"   id="validationCustom01" name="shop_name" required autofocus>
                                    @if ($errors->has('shop_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shop_name') }}</strong>
                                            </span>
                                        @endif                   
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Shop Phone</label>
                                    <input class="form-control"   name="shop_phone" required>
                                     @if ($errors->has('shop_phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('shop_phone') }}</strong>
                                            </span>
                                        @endif   
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                <label for="validationCustom23">Shop Email</label>
                                <input class="form-control"   id="validationCustom23" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif  
                                </div>
                            </div>

                            <div class="form-row">
                                
                             <div class="form-group col-md-6">
                                <label for="inputPassword4">Choose Password</label>
                                <input type="password"   class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif  
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword5">Confirm Password</label>
                                <input type="password"   class="form-control" name="password_confirmation" id="inputPassword5" placeholder="Password" required>
                                <div class="invalid-feedback">
                                    Password did not match.
                                </div>
                            </div>
                            </div>


                            <div class="form-row">                    
                                
                            <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <select id="state" name="state_name" class="form-control" required>
                            <option value="">Choose...</option>
                                     @foreach($states as $state)
                                        <option>{{$state->state_name}}</option>
                                     @endforeach
                            </select>
                            @if ($errors->has('state_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>                    
                            <select class="form-control" id="city" name="city" required>
                                <option value="">Choose...</option>
                                @foreach($cities as $city)
                                    <option>{{$city->city}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zip">Pin</label>
                            <input type="text" class="form-control"   id="zip" name="zip_or_pin" required>
                            @if ($errors->has('zip_or_pin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('zip_or_pin') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>


                       <div class="form-row">
                        <div class="form-group col">
                          <label>Full Address:</label>
                          <input placeholder="Address"    id="primaryAddress" class="form-control" name="address" type="text">
                           @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>


                      <div class="form-row">                    
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="opening_time">Opening Time</label>
                            <input type="time" id="opening_time"   name="opening_time" class="form-control" required>
                             @if ($errors->has('opening_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('opening_time') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="closing_time">Closing Time</label>
                            <input type="time" id="closing_time"   name="closing_time" class="form-control" required>
                            @if ($errors->has('closing_time'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('closing_time') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="close_on_day">Closing Day</label>
                            <select class="custom-select d-block w-100" id="close_on_day" name="close_on" required>
                            <option value="">Choose...</option>
                            <option>Sunday</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                            <option>Never</option>
                            </select>
                            @if ($errors->has('close_on_day'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('close_on_day') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>                                        
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                   
                                </div>
                            </div>
                            <div class="form-group w-100 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i>Register</button>
                            </div>                            
                        </form>
                        <!-- end form-->
                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Already have an account? <a href='/shoplogin' class="form-switch text-muted ml-1"><b>Log In</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->

                </div>
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Boost Your Business With Markoverse!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i>World's First Market Operating System(MOS).<i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        Engage With Customers.Grow With Us!
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
    </div>

@endsection

































