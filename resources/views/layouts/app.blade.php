<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AFETİM - Dashboard')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            min-height: calc(100vh - 56px);
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 10px 15px;
            margin: 5px 10px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }
        .main-content {
            padding: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        .user-welcome {
            color: #fff;
            margin-right: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <i class="fas fa-hands-helping"></i> AFETİM
            </a>
            
            <div class="d-flex">
                @auth
                    <span class="user-welcome">
                        <i class="fas fa-user"></i> Hoş geldiniz, {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Giriş Yap</a>
                    <a href="{{ route('register.show') }}" class="btn btn-light btn-sm">Kayıt Ol</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @auth
            <div class="col-md-3 col-lg-2 sidebar d-md-block">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                               href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        
                        @if(auth()->user()->role === 'alici')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}" 
                                   href="{{ route('orders.index') }}">
                                    <i class="fas fa-shopping-cart"></i> Siparişlerim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-buyer') }}">
                                    <i class="fas fa-plus-circle"></i> Yeni Sipariş
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->role === 'satici')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('seller.orders') ? 'active' : '' }}" 
                                   href="{{ route('seller.orders') }}">
                                    <i class="fas fa-list-alt"></i> Siparişler
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-products') }}">
                                    <i class="fas fa-box"></i> Ürünlerim
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endauth

            <!-- Main Content -->
            <div class="{{ auth()->check() ? 'col-md-9 col-lg-10' : 'col-12' }} main-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> Lütfen formdaki hataları düzeltin.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Logout formu submit olduğunda login sayfasına yönlendir
        document.getElementById('logoutForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            this.submit();
        });
    </script>
    
    <!-- Additional Scripts -->
    @yield('scripts')
</body>
</html>