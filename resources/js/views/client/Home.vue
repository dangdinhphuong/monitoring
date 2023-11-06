<template>
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-9">
                                    <h5 class="m-t-0">Total number of stations: </h5>
                                </div>
                                <div class="col-3 text-right">
                                    <h2 class="m-b-0">11</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar" role="progressbar"
                                             aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-7">
                                    <h5 class="m-t-0">Operation</h5>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="m-b-0">10</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-7">
                                    <h5 class="m-t-0">Disconect </h5>
                                </div>
                                <div class="col-5 text-right">
                                    <h2 class="m-b-0">1</h2>
                                </div>
                                <div class="col-12">
                                    <div class="progress m-t-20">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                             aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 1%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card weather2">
                        <div class="body city-selected">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="night">VIET NAM</div>
                                </div>
                                <div class="info">
                                    <div class="temp"><b style="font-size: 50px">{{ formattedTime }}</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix" style="height: 59vh; overflow-y: scroll;">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-success " style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-danger " style="width:15px; height:15px"></div></li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-success " style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-danger " style="width:15px; height:15px"></div></li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-success " style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-danger " style="width:15px; height:15px"></div></li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-success " style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-danger " style="width:15px; height:15px"></div></li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-success " style="width:15px; height:15px"></div>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card"
                                         style="border: 2px solid #d8dcdf">
                                        <div class="header">
                                            <h2>Trạm 1 </h2>
                                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                                <li><div class="border rounded-circle bg-danger " style="width:15px; height:15px"></div></li>
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle"
                                                       data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       aria-expanded="false"></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                                        <li><a href="javascript:void(0);">Something else</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body" style="padding: 0px">
                                            <ul class="feeds_widget list-unstyled">
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-success">Potenz Hydrogen:</h4>
                                                        </div>
                                                        <div class="title text-success">50 pH</div>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Turbidity :</h4>
                                                        </div>
                                                        <div class="title text-muted">50 NTU</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-warning">Temperature :</h4>
                                                        </div>
                                                        <div class="title text-warning">50 °C</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-danger">DO :</h4>
                                                        </div>
                                                        <div class="title text-danger">50 mg/L</div>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Latitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">37° N</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                       class="d-flex justify-content-between">
                                                        <div class="feeds-body">
                                                            <h4 class="title text-muted">Longitude:</h4>
                                                        </div>
                                                        <div class="title text-muted">122° W</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {
            formattedTime: ''
        };
    },
    mounted() {
        this.displayCurrentTime(); // Gọi lần đầu khi component được tạo
        setInterval(this.displayCurrentTime, 1000); // Cập nhật thời gian mỗi giây
    },
    methods: {
        displayCurrentTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';

            if (hours < 10) {
                hours = '0' + hours;
            }

            if (minutes < 10) {
                minutes = '0' + minutes;
            }

            this.formattedTime = hours + ':' + minutes + ' ' + ampm;
        }
    }
}
</script>

<style scoped>

</style>
