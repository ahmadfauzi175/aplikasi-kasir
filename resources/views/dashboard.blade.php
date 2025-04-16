@extends('template')

@section('content')
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Dashboard</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">

                <div class="row">
                    <!-- Product Count -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Jumlah Produk</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $productCount }}</h1> <!-- Displaying the product count -->
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>

                    <!-- Sales Count -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Jumlah Penjualan</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $salesCount }}</h1> <!-- Displaying the sales count -->
                                </div>
                            </div>
                            <div id="sparkline-revenue2"></div>
                        </div>
                    </div>

                    <!-- User Count -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Jumlah User</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">{{ $userCount }}</h1> <!-- Displaying the user count -->
                                </div>
                            </div>
                            <div id="sparkline-revenue3"></div>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Pendapatan</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">Rp.{{ number_format($totalRevenue, ) }}</h1> <!-- Displaying the total revenue -->
                                </div>
                            </div>
                            <div id="sparkline-revenue4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
