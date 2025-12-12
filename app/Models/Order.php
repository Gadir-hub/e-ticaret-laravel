<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'buyer_id',
        'seller_id',
        'quantity',
        'total_price',
        'address',
        'phone',
        'status'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];

    // Siparişin ürünü
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Alıcı
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // Satıcı
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}