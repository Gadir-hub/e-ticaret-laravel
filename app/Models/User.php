<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'seller_id');
    }

    public function boughtOrders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    public function soldOrders()
    {
        return $this->hasMany(Order::class, 'seller_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function isSeller()
    {
        return $this->role === 'satici';
    }

    public function isBuyer()
    {
        return $this->role === 'alici';
    }
}