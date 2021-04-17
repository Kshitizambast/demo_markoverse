
{{-- <form ">
     <a href="">
                                    {{ __('Forgot Your Password?') }}
                                </a> --}}



@extends('layouts.app')
@section('content')
    <div class="auth-fluid" style=" background: url({{asset('img/auth/localStreet2.jpg')}}) center;">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="auth-form-box-border" style=" background: url({{asset('img/auth/border-img.png')}});">    

                <div class="align-items-center d-flex h-100">
                    <div class="card-body" id="loginCard">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-left">
                            <a href="/">
                                <span><img src="{{asset('img/auth/markoverseLogo.png')}}" alt="" height="18"></span>
                            </a>                            
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">Shop Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                        <!-- form -->
                        <form method="POST" action="{{ route('shop.login') }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="emailaddress">Shop Email address</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="e-mail" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <a href="{{ route('shop.password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Shop Password</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                                <input type="checkbox" onclick="showPassword()"> <small>Show Password</small>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>                            
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a class="form-switch text-muted ml-1"><b>Sign Up</b></a></p>
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

































