@extends('admin.pages.auth.layout')
@section('title', 'Login')
@section('content')
    <div class="col-lg-4">
        <div class="card">
            <div class="header">
                <p class="lead">Login to your account</p>
            </div>
            <div class="body">
                <form class="form-auth-small" action="{{ route('loginStore') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="signin-email"  class="control-label sr-only">Email</label>
                        <input type="email" name="email" required="" class="form-control" id="signin-email" value="user@domain.com" placeholder="Email">
                        @error('email') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" required="" class="form-control" id="signin-password" value="thisisthepassword" placeholder="Password">
                        @error('password') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i><a href="{{ route('forGotPassword') }}">Forgot password?</a></span>
                        {{--                                <span>Don't have an account? <a href="page-register.html">Register</a></span>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
