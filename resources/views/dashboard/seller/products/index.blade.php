<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürünlerim - Satıcı Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .table th {
            background-color: #4361ee;
            color: white;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <!-- Header -->
        <nav class="navbar navbar-dark bg-primary mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="fas fa-store me-2"></i>Satıcı Paneli - Ürünlerim
                </a>
                <div class="d-flex">
                    <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-light me-2">
                        <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                    </a>
                    <a href="{{ route('products.create') }}" class="btn btn-light">
                        <i class="fas fa-plus me-1"></i>Yeni Ürün
                    </a>
                </div>
            </div>
        </nav>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Products Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-boxes me-2 text-primary"></i>
                        Ürünlerim ({{ $products->count() }})
                    </h5>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Yeni Ürün Ekle
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($products->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th width="80">Görsel</th>
                                    <th>Ürün Adı</th>
                                    <th>Kategori</th>
                                    <th>Fiyat</th>
                                    <th>Açıklama</th>
                                    <th>Durum</th>
                                    <th width="120">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="product-image">
                                        @else
                                            <div class="product-image bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-box text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $product->name }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $product->category->name ?? 'Kategori Yok' }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong class="text-success">{{ number_format($product->price, 2) }} ₺</strong>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ Str::limit($product->description, 50) ?: 'Açıklama yok' }}
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $product->status == 'active' ? 'success' : 'warning' }}">
                                            {{ $product->status == 'active' ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="{{ route('products.edit', $product->id) }}" 
                                           class="btn btn-warning btn-sm"
                                           title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Bu ürünü silmek istediğinizden emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm"
                                                    title="Sil">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-box-open fa-4x text-muted"></i>
                        </div>
                        <h4 class="text-muted">Henüz ürününüz bulunmuyor</h4>
                        <p class="text-muted mb-4">Mağazanızı büyütmek için ilk ürününüzü ekleyin!</p>
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus me-2"></i>İlk Ürününü Ekle
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Navigation Footer -->
        <div class="mt-4 text-center">
            <a href="{{ route('seller.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Dashboard'a Dön
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>