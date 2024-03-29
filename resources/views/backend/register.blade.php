@extends('backend.layouts.app.app')
@section('backend-content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ URL::to('backend/assets/img/logo-white.png') }}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"  >
                            @csrf
                            <div class="form-group">
                                <input  name="name" class="form-control" type="text" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <input  name="uname" class="form-control" type="text" placeholder="User Name">
                            </div>

                            <div class="form-group">
                                <input  name="cell" class="form-control" type="text" placeholder="Cell">
                            </div>
                            <div class="form-group">
                                <input  name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input name="password_confirmation" class="form-control" type="text" placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Already have an account? <a href="{{ route('showlogin') }}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
