<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #00bcd4, #00838f);
            color: white;
            padding: 20px 10px;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header h3 {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .sidebar-header .dropdown-toggle {
            font-size: 0.9rem;
            text-decoration: none;
            color: white;
            font-weight: 600;
        }

        .nav-link {
            color: #e0f7fa;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            transform: translateX(5px);
        }

        .nav-link i {
            margin-right: 10px;
        }

        .user-avatar-md {
            width: 36px;
            height: 36px;
            object-fit: cover;
            border: 2px solid #ffffff;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px 20px;
            flex: 1;
        }

        .form-inline .form-control {
            width: 100%;
            border-radius: 8px;
            padding: 8px 12px;
            border: none;
        }

        .btn-success {
            background-color: #26c6da;
            border: none;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #00acc1;
        }

        .dropdown-menu a {
            color: #212529;
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }

        .sidebar-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .sidebar-header span {
            font-size: 0.95rem;
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Header with Admin -->
            <div class="sidebar-header d-flex justify-content-between align-items-center mb-3 px-2">
                <h3 class="mb-0">Kasir</h3>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center text-white p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/users/kasir.jpg') }}" alt="User" class="user-avatar-md rounded-circle me-1">
                        <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('account.show') }}">Account</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); 
                            if(confirm('Apakah Anda yakin ingin logout?')) 
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Search Form -->
            <div class="px-2 mb-4">
                <form class="form-inline" action="{{ route('search') }}" method="GET">
                    <input class="form-control mb-2" type="search" name="query" placeholder="Search" required>
                    <button type="submit" class="btn btn-success w-100">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Navigation -->
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>

                @can('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pelanggans.index') }}">
                        <i class="fas fa-users me-2"></i> Pelanggan
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produks.index') }}">
                        <i class="fas fa-box me-2"></i> Produk
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('penjualans.index') }}">
                        <i class="fas fa-shopping-cart me-2"></i> Penjualan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('laporans.index') }}">
                        <i class="fas fa-chart-line me-2"></i> Laporan
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
