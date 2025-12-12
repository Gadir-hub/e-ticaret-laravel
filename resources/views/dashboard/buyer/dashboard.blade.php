<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alıcı Paneli - GadirMarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --success-color: #4cc9f0;
            --light-bg: #f8f9fa;
            --dark-text: #212529;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
        }
        
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }
        
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        
        .stat-card {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .product-card {
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-3px);
        }
        
        .product-image {
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }
        
        .price {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.2rem;
        }
        
        .order-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-confirmed { background-color: #d1ecf1; color: #0c5460; }
        .status-shipped { background-color: #d4edda; color: #155724; }
        .status-delivered { background-color: #d1e7dd; color: #0f5132; }
        .status-cancelled { background-color: #f8d7da; color: #721c24; }
        
        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-store me-2"></i>GadirMarket
            </a>
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i> {{ Auth::user()->name ?? 'Kullanıcı' }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-cart me-2"></i>Siparişlerim</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Çıkış Yap</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="container">
            <!-- Başarı Mesajı -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Hoş Geldiniz -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h2 class="card-title mb-1">Hoş Geldiniz, {{ Auth::user()->name ?? 'Kullanıcı' }}! 👋</h2>
                                    <p class="text-muted mb-0">GadirMarket'de alışveriş keyfini yaşayın</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <a href="{{ route('orders.create') }}" class="btn btn-success btn-lg">
                                        <i class="fas fa-cart-plus me-2"></i>Sipariş Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- İstatistikler -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">{{ $totalOrders ?? 0 }}</div>
                            <div class="stat-label">Toplam Sipariş</div>
                            <i class="fas fa-shopping-bag fa-2x text-primary mt-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">{{ $pendingOrders ?? 0 }}</div>
                            <div class="stat-label">Bekleyen Sipariş</div>
                            <i class="fas fa-clock fa-2x text-warning mt-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-number">{{ $completedOrders ?? 0 }}</div>
                            <div class="stat-label">Tamamlanan Sipariş</div>
                            <i class="fas fa-check-circle fa-2x text-success mt-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Son Siparişler -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-history me-2"></i>Son Siparişlerim
                            </h5>
                        </div>
                        <div class="card-body">
                            @if(isset($recentOrders) && $recentOrders->count() > 0)
                                @foreach($recentOrders as $order)
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                    <div>
                                        <h6 class="mb-1">{{ $order->product->name ?? 'Ürün Silinmiş' }}</h6>
                                        <small class="text-muted">
                                            {{ $order->product->seller->name ?? 'Satıcı Yok' }} • 
                                            {{ $order->quantity ?? 0 }} adet
                                        </small>
                                    </div>
                                    <div class="text-end">
                                        <div class="price">{{ number_format($order->total_price ?? 0, 2, ',', '.') }} ₺</div>
                                        <span class="order-status status-{{ $order->status ?? 'pending' }}">
                                            @php
                                                $statusText = [
                                                    'pending' => 'Bekliyor',
                                                    'confirmed' => 'Onaylandı',
                                                    'shipped' => 'Kargoda',
                                                    'delivered' => 'Teslim Edildi',
                                                    'cancelled' => 'İptal Edildi'
                                                ];
                                            @endphp
                                            {{ $statusText[$order->status ?? 'pending'] ?? 'Bekliyor' }}
                                        </span>
                                    </div>
                                </div>
                                @endforeach
                                <div class="text-center mt-3">
                                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">Tüm Siparişleri Gör</a>
                                </div>
                            @else
                                <div class="empty-state">
                                    <i class="fas fa-shopping-cart text-muted"></i>
                                    <h5 class="text-muted mb-3">Henüz siparişiniz bulunmuyor</h5>
                                    <p class="text-muted mb-4">İlk siparişinizi vermek için aşağıdaki butonu kullanın</p>
                                    <a href="{{ route('orders.create') }}" class="btn btn-success">
                                        <i class="fas fa-cart-plus me-2"></i>İlk Siparişi Ver
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Popüler Ürünler -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-fire me-2"></i>Öne Çıkan Ürünler
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(isset($products) && $products->count() > 0)
                                    @foreach($products as $product)
                                    <div class="col-md-6 mb-3">
                                        <div class="card product-card">
                                            <div class="product-image">
                                                <i class="fas fa-box"></i>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="card-title">{{ Str::limit($product->name ?? 'Ürün Adı', 30) }}</h6>
                                                <p class="card-text text-muted small mb-2">{{ $product->seller->name ?? 'Satıcı' }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="price">{{ number_format($product->price ?? 0, 2, ',', '.') }} ₺</span>
                                                    <a href="{{ route('orders.create') }}?product_id={{ $product->id }}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-cart-plus me-1"></i>Sipariş Ver
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="empty-state">
                                        <i class="fas fa-box-open text-muted"></i>
                                        <h5 class="text-muted mb-3">Henüz ürün bulunmuyor</h5>
                                        <p class="text-muted">Satıcılar ürün ekledikçe burada görünecek</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategoriler -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-list me-2"></i>Kategoriler
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(isset($categories) && $categories->count() > 0)
                                    @foreach($categories as $category)
                                    <div class="col-md-3 mb-3">
                                        <div class="card text-center product-card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <i class="fas fa-folder fa-2x" style="color: {{ $category->color ?? '#4361ee' }}"></i>
                                                </div>
                                                <h6 class="card-title">{{ $category->name ?? 'Kategori' }}</h6>
                                                <p class="text-muted small">{{ $category->products_count ?? 0 }} ürün</p>
                                                <a href="{{ route('orders.create') }}?category_id={{ $category->id }}" class="btn btn-outline-primary btn-sm">Sipariş Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="empty-state">
                                        <i class="fas fa-folder-open text-muted"></i>
                                        <h5 class="text-muted mb-3">Henüz kategori bulunmuyor</h5>
                                        <p class="text-muted">Kategoriler eklendikçe burada görünecek</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 3 saniye sonra başarı mesajını otomatik kapat
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 3000);
    </script>
</body>
</html>