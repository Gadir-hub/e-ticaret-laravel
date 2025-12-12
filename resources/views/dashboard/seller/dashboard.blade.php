<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satıcı Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            overflow: hidden;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .stat-card.primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .stat-card.success { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .stat-card.warning { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .stat-card.danger { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        
        .stat-card .icon {
            font-size: 2.5rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }
        
        .stat-card .number {
            font-size: 2.2rem;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .stat-card .label {
            font-size: 0.9rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .quick-action-card {
            background: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .quick-action-card:hover {
            transform: translateY(-8px);
            border-color: var(--primary-color);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .quick-action-card .icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .quick-action-card .action-text {
            font-weight: 600;
            color: #2c3e50;
        }
        
        .recent-orders {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .recent-orders table {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .recent-orders thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending { background: #fff3cd; color: #856404; }
        .status-confirmed { background: #d1ecf1; color: #0c5460; }
        .status-shipped { background: #d4edda; color: #155724; }
        .status-delivered { background: #e2e3e5; color: #383d41; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        
        .nav-tabs-custom {
            border-bottom: 2px solid #e9ecef;
        }
        
        .nav-tabs-custom .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 500;
            padding: 12px 25px;
            border-radius: 10px 10px 0 0;
            transition: all 0.3s ease;
        }
        
        .nav-tabs-custom .nav-link.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
        }
        
        .nav-tabs-custom .nav-link:hover {
            border: none;
            color: var(--primary-color);
        }
        
        /* Bildirim Stilleri */
        .notification-wrapper {
            position: relative;
            display: inline-block;
        }
        
        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: linear-gradient(135deg, #ff4757, #ff3838);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid white;
            box-shadow: 0 3px 10px rgba(255, 71, 87, 0.4);
            animation: pulse 2s infinite;
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: white;
            transition: all 0.3s ease;
            padding: 10px 15px;
            border-radius: 50%;
        }
        
        .notification-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.1);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .welcome-card h1 {
            font-weight: 300;
        }
        
        .welcome-card .lead {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <!-- Navbar -->
        <nav class="navbar navbar-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-3" href="#">
                    <i class="fas fa-store me-2"></i>Satıcı Paneli
                </a>
                
                <div class="d-flex align-items-center">
                    <!-- Bildirim Dropdown -->
                    <div class="dropdown me-3" x-data="notificationHandler()">
                        <div class="notification-wrapper">
                            <button class="notification-btn" 
                                    type="button" 
                                    @click="toggleNotifications()"
                                    :class="{ 'show': showNotifications }">
                                <i class="fas fa-bell"></i>
                            </button>
                            <span x-show="unreadCount > 0" 
                                  class="notification-badge"
                                  x-text="unreadCount > 99 ? '99+' : unreadCount">
                            </span>
                        </div>
                        
                        <div class="dropdown-menu dropdown-menu-end p-0" 
                             x-show="showNotifications"
                             @click.away="showNotifications = false"
                             style="width: 380px;">
                            <div class="p-3 border-bottom bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold">
                                        <i class="fas fa-bell me-2 text-primary"></i>
                                        Bildirimler
                                        <span x-show="unreadCount > 0" 
                                              class="badge bg-primary ms-2" 
                                              x-text="unreadCount"></span>
                                    </h6>
                                    <button x-show="unreadCount > 0" 
                                            @click="markAllAsRead()"
                                            class="btn btn-sm btn-outline-primary">
                                        Tümünü Oku
                                    </button>
                                </div>
                            </div>
                            
                            <div style="max-height: 400px; overflow-y: auto;">
                                <template x-if="notifications.length === 0">
                                    <div class="text-center py-4 text-muted">
                                        <i class="fas fa-bell-slash fa-2x mb-3"></i>
                                        <p class="mb-0">Henüz bildirim yok</p>
                                    </div>
                                </template>
                                
                                <template x-for="notification in notifications" :key="notification.id">
                                    <div class="p-3 border-bottom" 
                                         :class="{ 'bg-light': !notification.is_read }">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-semibold" x-text="notification.title"></h6>
                                                <p class="mb-2 small text-muted" x-text="notification.message"></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted" x-text="formatTime(notification.created_at)"></small>
                                                    <div>
                                                        <button x-show="!notification.is_read" 
                                                                @click="markAsRead(notification.id)"
                                                                class="btn btn-sm btn-success">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            
                            <div class="p-2 border-top bg-light">
                                <a href="{{ route('notifications.index') }}" class="btn btn-sm btn-outline-primary w-100">
                                    Tüm Bildirimleri Gör
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kullanıcı Menüsü -->
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" 
                                data-bs-toggle="dropdown">
                            <i class="fas fa-user me-2"></i>{{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('seller.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('products.index') }}">
                                <i class="fas fa-box me-2"></i>Ürünlerim
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('seller.orders') }}">
                                <i class="fas fa-shopping-cart me-2"></i>Siparişler
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Çıkış Yap
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Dashboard İçeriği -->
        <div class="dashboard-container">
            <div class="container-fluid p-4">
                <!-- Hoş Geldin Kartı -->
                <div class="welcome-card">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="display-5 fw-bold">Hoş Geldin, {{ Auth::user()->name }}! 👋</h1>
                            <p class="lead">Satıcı panelinizde son durumu ve istatistikleri görüntülüyorsunuz.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white text-primary rounded-pill px-4 py-2 d-inline-block">
                                <small class="text-uppercase fw-bold">Bugün</small>
                                <div class="fs-4 fw-bold">{{ now()->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- İstatistik Kartları -->
                <div class="row mb-5">
                    <div class="col-xl-3 col-md-6">
                        <div class="stat-card primary">
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="number">
                                @php
                                    $totalOrders = \App\Models\Order::where('seller_id', Auth::id())->count();
                                @endphp
                                {{ $totalOrders }}
                            </div>
                            <div class="label">Toplam Sipariş</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="stat-card warning">
                            <div class="icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="number">
                                @php
                                    $pendingOrders = \App\Models\Order::where('seller_id', Auth::id())->where('status', 'pending')->count();
                                @endphp
                                {{ $pendingOrders }}
                            </div>
                            <div class="label">Bekleyen Sipariş</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="stat-card success">
                            <div class="icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="number">
                                @php
                                    try {
                                        // Önce seller_id'yi dene
                                        $totalProducts = \App\Models\Product::where('seller_id', Auth::id())->count();
                                    } catch (\Exception $e) {
                                        // seller_id yoksa user_id kullan
                                        $totalProducts = \App\Models\Product::where('user_id', Auth::id())->count();
                                    }
                                @endphp
                                {{ $totalProducts }}
                            </div>
                            <div class="label">Toplam Ürün</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="stat-card danger">
                            <div class="icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="number">
                                @php
                                    $totalRevenue = \App\Models\Order::where('seller_id', Auth::id())->where('status', '!=', 'cancelled')->sum('total_price');
                                @endphp
                                {{ number_format($totalRevenue, 2) }} ₺
                            </div>
                            <div class="label">Toplam Ciro</div>
                        </div>
                    </div>
                </div>

                <!-- Hızlı Erişim ve İçerik -->
                <div class="row">
                    <!-- Hızlı Erişim -->
                    <div class="col-lg-4 mb-4">
                        <div class="chart-container">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-bolt me-2 text-warning"></i>Hızlı İşlemler
                            </h5>
                            <div class="row g-3">
                                <div class="col-6">
                                    <a href="{{ route('products.create') }}" class="text-decoration-none">
                                        <div class="quick-action-card">
                                            <div class="icon">
                                                <i class="fas fa-plus-circle"></i>
                                            </div>
                                            <div class="action-text">Ürün Ekle</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('products.index') }}" class="text-decoration-none">
                                        <div class="quick-action-card">
                                            <div class="icon">
                                                <i class="fas fa-boxes"></i>
                                            </div>
                                            <div class="action-text">Ürünlerim</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('seller.orders') }}" class="text-decoration-none">
                                        <div class="quick-action-card">
                                            <div class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                            <div class="action-text">Siparişler</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('categories.index') }}" class="text-decoration-none">
                                        <div class="quick-action-card">
                                            <div class="icon">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            <div class="action-text">Kategoriler</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Son Siparişler -->
                    <div class="col-lg-8 mb-4">
                        <div class="recent-orders">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">
                                    <i class="fas fa-history me-2 text-primary"></i>Son Siparişler
                                </h5>
                                <a href="{{ route('seller.orders') }}" class="btn btn-sm btn-outline-primary">
                                    Tümünü Gör <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            
                            @php
                                $recentOrders = \App\Models\Order::with(['product', 'buyer'])
                                                ->where('seller_id', Auth::id())
                                                ->latest()
                                                ->take(5)
                                                ->get();
                            @endphp
                            
                            @if($recentOrders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sipariş No</th>
                                                <th>Ürün</th>
                                                <th>Müşteri</th>
                                                <th>Miktar</th>
                                                <th>Tutar</th>
                                                <th>Durum</th>
                                                <th>Tarih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentOrders as $order)
                                            <tr>
                                                <td><strong>#{{ $order->id }}</strong></td>
                                                <td>{{ Str::limit($order->product->name, 20) }}</td>
                                                <td>{{ $order->buyer->name }}</td>
                                                <td>{{ $order->quantity }} adet</td>
                                                <td class="fw-bold text-primary">{{ number_format($order->total_price, 2) }} ₺</td>
                                                <td>
                                                    <span class="status-badge status-{{ $order->status }}">
                                                        @switch($order->status)
                                                            @case('pending') Bekliyor @break
                                                            @case('confirmed') Onaylandı @break
                                                            @case('shipped') Kargoda @break
                                                            @case('delivered') Teslim Edildi @break
                                                            @case('cancelled') İptal Edildi @break
                                                        @endswitch
                                                    </span>
                                                </td>
                                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5 text-muted">
                                    <i class="fas fa-shopping-cart fa-3x mb-3 opacity-25"></i>
                                    <p class="mb-0 fw-medium">Henüz sipariş bulunmuyor</p>
                                    <small>Müşteriler ürünlerinizi satın aldığında burada görünecek</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Ekstra İstatistikler -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="chart-container">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-chart-pie me-2 text-info"></i>Sipariş Durum Dağılımı
                            </h5>
                            <div class="text-center py-4">
                                <div class="row">
                                    @php
                                        $statusCounts = [
                                            'pending' => \App\Models\Order::where('seller_id', Auth::id())->where('status', 'pending')->count(),
                                            'confirmed' => \App\Models\Order::where('seller_id', Auth::id())->where('status', 'confirmed')->count(),
                                            'shipped' => \App\Models\Order::where('seller_id', Auth::id())->where('status', 'shipped')->count(),
                                            'delivered' => \App\Models\Order::where('seller_id', Auth::id())->where('status', 'delivered')->count(),
                                            'cancelled' => \App\Models\Order::where('seller_id', Auth::id())->where('status', 'cancelled')->count(),
                                        ];
                                    @endphp
                                    
                                    @foreach($statusCounts as $status => $count)
                                    <div class="col-4 mb-3">
                                        <div class="fw-bold fs-4 text-primary">{{ $count }}</div>
                                        <small class="text-muted text-uppercase fw-bold">
                                            @switch($status)
                                                @case('pending') Bekleyen @break
                                                @case('confirmed') Onaylanan @break
                                                @case('shipped') Kargoda @break
                                                @case('delivered') Teslim @break
                                                @case('cancelled') İptal @break
                                            @endswitch
                                        </small>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="chart-container">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-trophy me-2 text-warning"></i>Performans Özeti
                            </h5>
                            <div class="text-center py-4">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <div class="fw-bold fs-4 text-success">
                                            @php
                                                try {
                                                    $totalProducts = \App\Models\Product::where('seller_id', Auth::id())->count();
                                                } catch (\Exception $e) {
                                                    $totalProducts = \App\Models\Product::where('user_id', Auth::id())->count();
                                                }
                                            @endphp
                                            {{ $totalProducts }}
                                        </div>
                                        <small class="text-muted">AKTİF ÜRÜN</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="fw-bold fs-4 text-info">
                                            @php
                                                $totalOrders = \App\Models\Order::where('seller_id', Auth::id())->count();
                                            @endphp
                                            {{ $totalOrders }}
                                        </div>
                                        <small class="text-muted">TOPLAM SATIŞ</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="fw-bold fs-4 text-primary">
                                            @php
                                                $totalRevenue = \App\Models\Order::where('seller_id', Auth::id())->where('status', '!=', 'cancelled')->sum('total_price');
                                            @endphp
                                            {{ number_format($totalRevenue, 2) }} ₺
                                        </div>
                                        <small class="text-muted">TOPLAM CİRO</small>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="fw-bold fs-4 text-warning">
                                            @php
                                                $pendingOrders = \App\Models\Order::where('seller_id', Auth::id())->where('status', 'pending')->count();
                                            @endphp
                                            {{ $pendingOrders }}
                                        </div>
                                        <small class="text-muted">BEKLEYEN SİPARİŞ</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function notificationHandler() {
            return {
                showNotifications: false,
                notifications: [],
                unreadCount: 0,
                
                init() {
                    this.loadNotifications();
                    setInterval(() => {
                        this.loadNotifications();
                    }, 20000);
                },
                
                toggleNotifications() {
                    this.showNotifications = !this.showNotifications;
                    if (this.showNotifications) {
                        this.loadNotifications();
                    }
                },
                
                async loadNotifications() {
                    try {
                        const response = await fetch('{{ route("notifications.get") }}');
                        const data = await response.json();
                        this.notifications = data.notifications;
                        this.unreadCount = data.unread_count;
                    } catch (error) {
                        console.error('Bildirim hatası:', error);
                    }
                },
                
                async markAsRead(notificationId) {
                    try {
                        const response = await fetch(`/notifications/${notificationId}/mark-read`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        });
                        
                        if (response.ok) {
                            this.loadNotifications();
                        }
                    } catch (error) {
                        console.error('Okundu işaretleme hatası:', error);
                    }
                },
                
                async markAllAsRead() {
                    try {
                        const response = await fetch('{{ route("notifications.mark-all-read") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        });
                        
                        if (response.ok) {
                            this.loadNotifications();
                        }
                    } catch (error) {
                        console.error('Tümünü okundu işaretleme hatası:', error);
                    }
                },
                
                formatTime(dateString) {
                    const date = new Date(dateString);
                    const now = new Date();
                    const diff = Math.floor((now - date) / 1000);
                    
                    if (diff < 60) return 'Az önce';
                    if (diff < 3600) return `${Math.floor(diff / 60)} dakika önce`;
                    if (diff < 86400) return `${Math.floor(diff / 3600)} saat önce`;
                    
                    return date.toLocaleDateString('tr-TR');
                }
            }
        }
    </script>
</body>
</html>