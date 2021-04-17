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
                            <a href="index.html">
                                <span><img src="{{asset('img/auth/markoverseLogo.png')}}" alt="" height="18"></span>
                            </a>                            
                        </div>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <!-- title-->
                        <h4 class="mt-0">Recover Password</h4>
                        <p class="text-muted mb-4">Enter your email account.</p>

                        <!-- form -->
                        <form method="POST" action="{{ route('password.email') }}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                 <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i>Send Password Reset Link</button>
                            </div>                            
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Remember Your Passowrd. Try <a class="form-switch text-muted ml-1"><b>Login</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->

                </div>
            </div>
            <!-- end auth-fluid-form-box-->

    </div>

 


@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
