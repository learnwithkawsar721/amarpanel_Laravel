@extends('layouts.admin')
@section('title')
    Home
@endsection
@section('home')
    active
@endsection
@section('admin')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>E-Commerce</strong> Dashboard</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="#">AdminKit</a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">E-Commerce</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Income</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">$47.482</h1>
                    <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 3.65% </span>
                        <span class="text-muted">Since last week</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Orders</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">2.542</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -5.25% </span>
                        <span class="text-muted">Since last week</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Activity</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="activity"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">16.300</h1>
                    <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 4.65% </span>
                        <span class="text-muted">Since last week</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Revenue</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">$20.120</h1>
                    <div class="mb-0">
                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.35% </span>
                        <span class="text-muted">Since last week</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Total Revenue</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-md">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <div class="dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Sales by State</h5>
                </div>
                <div class="card-body px-4">
                    <div id="usa_map" style="height:294px;"></div>
                </div>
            </div>
        </div>
    </div>


@endsection
