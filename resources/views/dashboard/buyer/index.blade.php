@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Hoşgeldiniz, {{ auth()->user()->username }} (Alıcı)</h3>
        <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm">+ Yeni Sipariş Ver</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($orders->count() > 0)
        <table class="table table-bordered shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Ürün</th>
                    <th>Satıcı</th>
                    <th>Adet</th>
                    <th>Durum</th>
                    <th>Tarih</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->product->seller->username ?? '-' }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Henüz siparişiniz yok.</div>
    @endif
</div>
@endsection
