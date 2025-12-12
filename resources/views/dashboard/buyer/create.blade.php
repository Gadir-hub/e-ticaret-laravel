@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Yeni Sipariş</h5>
                </div>
                
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="product_id" class="form-label fw-semibold">Ürün Seçin</label>
                            <select name="product_id" id="product_id" class="form-select" required>
                                <option value="">Ürün Seçin</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                            data-price="{{ $product->price }}">
                                        {{ $product->name }} - {{ $product->price }} ₺
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-semibold">Adet</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" 
                                   min="1" value="1" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Toplam Tutar</label>
                            <div class="alert alert-primary">
                                <h4 class="mb-0 fw-bold" id="totalPrice">0 ₺</h4>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Sipariş Ver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const totalPrice = document.getElementById('totalPrice');

    function calculateTotal() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        if (selectedOption.value) {
            const price = parseFloat(selectedOption.getAttribute('data-price'));
            const quantity = parseInt(quantityInput.value);
            totalPrice.textContent = (price * quantity) + ' ₺';
        } else {
            totalPrice.textContent = '0 ₺';
        }
    }

    productSelect.addEventListener('change', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);
});
</script>
@endsection