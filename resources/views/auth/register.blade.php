 @extends('layouts.app')
@section('content')
    <div class="auth-fluid" style=" background: url({{asset('img/auth/localStreet2.jpg')}}) center;">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box bg-dark">
                <div class="auth-form-box-border" style=" background: url({{asset('img/auth/border-img.png')}});">    

                <div class="align-items-center d-flex h-100">
                    <div class="card-body" id="SignupCard">

                        <!-- title-->
                        <h4 class="mt-0">Sign Up</h4>
                        <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

                        <!-- form -->
                        <form class="form-row" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="fullname">Full Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} height-50" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="emailaddress">Email address</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} height-50" name="email" value="{{ old('email') }}" placeholder="e-mail"  required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="username">Username(Use only letters and numbers. No special characters like: @,#,_,-,!,etc.)</label>
                                    <input id="username" name="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} height-50"  value="{{ old('username') }}" placeholder="usrename06"  required>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label for="password">Password</label>
                                 <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} height-50" name="password" placeholder="password"  required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
        
                            </div>
                            <div class="form-group col-md-12">
                                <label>Repeat Password</label>
                                <input id="password-confirm" type="password" class="form-control height-50" name="password_confirmation" placeholder="Repeat Password"  required>
                                <input type="checkbox" onclick="showPassword()"> <small>Show Password</small>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                    <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <input type="hidden" name="ip_address" value="{{\Request::ip()}}">
                            <div class="form-group col-md-12 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Sign Up </button>
                            </div>                            
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Already have account? <a class="form-switch text-muted ml-1" href="/login"><b>Log In</b></a></p>
                        </footer>

                    </div>
                </div> <!-- end .align-items-center.d-flex.h-100-->

                </div>
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Best offer in your locality!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Shop, Earn & Sell through markoverse . <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        New way of marketing experience.
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
    </div>

    <!-- Optional JavaScript -->
@endsection




























