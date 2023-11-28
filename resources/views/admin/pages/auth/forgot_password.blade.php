@extends('admin.pages.auth.layout')
@section('title', 'Recover my password')
@section('content')
    <div class="col-lg-4">
        <div class="card">
            <div class="header">
                <p class="lead">Recover my password</p>
            </div>
            <div class="body">
                <p>Please enter your email address below to receive instructions for resetting password.</p>
                <form class="form-auth-small" action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control"
                               id="signup-password" placeholder="email">
                        @error('email')
                        <span class="text-danger">{{$message}} </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">RESET PASSWORD</button>
                    <div class="bottom">
                        <span class="helper-text">Know your password? <a href="{{ route('login') }}">Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
