<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satıcı Siparişleri</title>
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
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: none;
        }
        
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table thead {
            background-color: var(--primary-color);
            color: white;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending { background: #fff3cd; color: #856404; }
        .status-confirmed { background: #d1ecf1; color: #0c5460; }
        .status-shipped { background: #d4edda; color: #155724; }
        .status-delivered { background: #e2e3e5; color: #383d41; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        
        .action-buttons {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
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
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(255, 71, 87, 0.4);
            animation: pulse 2s infinite;
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #6c757d;
            transition: all 0.3s ease;
            padding: 8px 12px;
            border-radius: 50%;
        }
        
        .notification-btn:hover {
            color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.1);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 64px;
            margin-bottom: 20px;
            color: #adb5bd;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-3 shadow-sm mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-primary" href="{{ route('seller.dashboard') }}">
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
                             style="width: 350px;">
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
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" 
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

        <!-- İçerik -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-4">
                        <!-- Başlık -->
                        <div class="page-header">
                            <h1 class="h3 mb-0">
                                <i class="fas fa-shopping-cart me-2"></i>Siparişlerim
                            </h1>
                            <div>
                                <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-primary me-2">
                                    <i class="fas fa-arrow-left me-2"></i>Dashboard'a Dön
                                </a>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">
                                    <i class="fas fa-box me-2"></i>Ürünlerim
                                </a>
                            </div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <div>{{ session('success') }}</div>
                            </div>
                        @endif

                        @if($orders->count() > 0)
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
                                            <th>Sipariş Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td><strong>#{{ $order->id }}</strong></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($order->product->image)
                                                        <img src="{{ asset('storage/' . $order->product->image) }}" 
                                                             alt="{{ $order->product->name }}" 
                                                             class="rounded me-2" 
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center me-2" 
                                                             style="width: 40px; height: 40px;">
                                                            <i class="fas fa-box text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <div class="fw-semibold">{{ $order->product->name }}</div>
                                                        <small class="text-muted">{{ number_format($order->product->price, 2) }} ₺</small>
                                                    </div>
                                                </div>
                                            </td>
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
                                            <td>
                                                <div class="action-buttons">
                                                    <!-- Durum Güncelleme Formu -->
                                                    <form action="{{ route('orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <select name="status" class="form-select form-select-sm" 
                                                                onchange="this.form.submit()" 
                                                                style="width: 140px;">
                                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Bekliyor</option>
                                                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Onaylandı</option>
                                                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Kargoda</option>
                                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Teslim Edildi</option>
                                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                                                        </select>
                                                    </form>
                                                    
                                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-info" title="Detayları Gör">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div class="text-muted">
                                    Toplam {{ $orders->total() }} siparişin {{ $orders->firstItem() }} - {{ $orders->lastItem() }} arası gösteriliyor
                                </div>
                                <div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="fas fa-shopping-cart"></i>
                                <h4>Henüz siparişiniz yok</h4>
                                <p class="mb-4">Müşteriler ürünlerinizi satın aldığında siparişler burada görünecek.</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">
                                    <i class="fas fa-box me-2"></i>Ürünlerimi Gör
                                </a>
                            </div>
                        @endif
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