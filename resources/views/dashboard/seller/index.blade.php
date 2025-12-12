<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Satıcı Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h3>Hoşgeldiniz, {{ auth()->user()->username }} (Satıcı)</h3>

    <a href="{{ route('products.create') }}" class="btn btn-primary my-3">Yeni Ürün Ekle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ürün Adı</th>
            <th>Kategori</th>
            <th>Fiyat</th>
            <th>Açıklama</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }} ₺</td>
                <td>{{ $product->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
