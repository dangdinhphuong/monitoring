<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="HexaBit Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, www.thememakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.9.0/sweetalert2.min.css" integrity="sha512-IScV5kvJo+TIPbxENerxZcEpu9VrLUGh1qYWv6Z9aylhxWE4k4Fch3CHl0IYYmN+jrnWQBPlpoTVoWfSMakoKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/color_skins.css">
</head>

<body class="theme-orange">
<!-- WRAPPER -->
<div id="wrapper" class="auth-main">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="javascript:void(0);"><img src="https://wrraptheme.com/templates/hexabit/html/assets/images/icon-light.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">HexaBit</a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Documentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="page-register.html">Sign Up</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-8">
                <div class="auth_detail">
                    <h2 class="text-monospace">
                        Everything<br> you need for
                        <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="1500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">your Admin</div>
                                <div class="carousel-item">your Project</div>
                                <div class="carousel-item">your Dashboard</div>
                                <div class="carousel-item">your Application</div>
                                <div class="carousel-item">your Client</div>
                            </div>
                        </div>
                    </h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <ul class="social-links list-unstyled">
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="btn btn-default" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="instagram"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
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
                                <span class="helper-text m-b-10"><i class="fa fa-lock"></i><a href="page-forgot-password.html">Forgot password?</a></span>
                                <span>Don't have an account? <a href="page-register.html">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('retriesLeft')&& (int)session('retriesLeft') > 0)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Đăng nhập sai...',
            text: 'Bạn còn {!! session('retriesLeft') !!} lượt đăng nhập tài khoản (*)!',
            footer: ''
        })
    </script>
@endif
<script src="./assets/bundles/libscripts.bundle.js"></script>
<script src="./assets/bundles/vendorscripts.bundle.js"></script>
<script src="./assets/bundles/mainscripts.bundle.js"></script>
</body>

</html>
