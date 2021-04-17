@extends('layouts.app')
@section('content')
    <div class="auth-fluid" style=" background: url({{asset('img/auth/localStreet2.jpg')}}) center;">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box bg-dark">
                <div class="auth-form-box-border" style=" background: url({{asset('img/auth/border-img.png')}});">    

                <div class="align-items-center d-flex h-100">
                    <div class="card-body" id="loginCard">


                        <!-- title-->
                        <h4 class="mt-0">Sign In</h4>
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                        <!-- form -->
                        <form action="{{route('login')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                                <label for="password">Password</label>
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" onclick="showPassword()"> <small>Show Password</small>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Log In </button>
                            </div>                            
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a class="form-switch text-muted ml-1" href="/register"><b>Sign Up</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
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

 


@endsection
































