@extends('dashboard.layouts.app')

@section('title', 'Siparişlerim - Market')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-shopping-cart"></i> Siparişlerim
                    </h3>
                </div>


                <div class="card-body">
                    @if($orders->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sipariş No</th>
                                        <th>Ürün</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                        <th>Miktar</th>
                                        <th>Toplam</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td><strong>#{{ $order->id }}</strong></td>
                                            <td>
                                                @if($order->product)
                                                    {{ $order->product->name }}
                                                @else
                                                    <span class="text-danger">Ürün bulunamadı</span>
                                                @endif
                                            </td>
                                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                            <td>
                                                @php
                                                    $statusColors = [
                                                        'pending' => 'warning',
                                                        'confirmed' => 'info',
                                                        'shipped' => 'primary',
                                                        'delivered' => 'success',
                                                        'cancelled' => 'danger'
                                                    ];
                                                    $statusLabels = [
                                                        'pending' => 'Bekliyor',
                                                        'confirmed' => 'Onaylandı',
                                                        'shipped' => 'Kargoda',
                                                        'delivered' => 'Teslim Edildi',
                                                        'cancelled' => 'İptal Edildi'
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                                    {{ $statusLabels[$order->status] ?? $order->status }}
                                                </span>
                                            </td>
                                            <td>{{ $order->quantity }} adet</td>
                                            <td><strong>{{ number_format($order->total_price, 2) }} TL</strong></td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}" 
                                                   class="btn btn-sm btn-primary"
                                                   title="Sipariş Detayları">
                                                    <i class="fas fa-eye"></i> Detay
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Sayfalama -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $orders->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Henüz siparişiniz bulunmuyor</h4>
                            <p class="text-muted">İlk siparişinizi vermek için ürünlere göz atın.</p>
                            @if(auth()->user()->role === 'alici')
                                <a href="{{ route('orders.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus"></i> Yeni Sipariş Oluştur
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection