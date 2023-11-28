<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="HexaBit Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, www.thememakker.com">

    <link rel="icon" href="{{configByKeyHelper('LOGO')->value }}" type="image/x-icon">
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
                    <a class="navbar-brand" href="javascript:void(0);"><img src="{{configByKeyHelper('LOGO')->value }}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">{{ configByKeyHelper('NAME_WEB')->value ?? ''}}</a>
                    {{-- <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Documentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="page-register.html">Sign Up</a></li>
                    </ul> --}}
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
            @yield('content')
        </div>
    </div>
</div>
<!-- END WRAPPER -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('error'))
    <script>
        swal("Thất bại", " {!! session('error') !!}", "error", {
            button: "OK",
        })
    </script>
@endif
@if(session('message'))
    <script>
        swal("Hành động", " {!! session('message') !!}", "error", {
            button: "OK",
        })
    </script>
@endif
<script src="./assets/bundles/libscripts.bundle.js"></script>
<script src="./assets/bundles/vendorscripts.bundle.js"></script>
<script src="./assets/bundles/mainscripts.bundle.js"></script>
</body>

</html>
