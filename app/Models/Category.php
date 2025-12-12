<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Fillable alanları tanımlayın
    protected $fillable = ['name', 'slug', 'description', 'color'];
    
    // Kategoriye ait ürünler ilişkisi - BU EKLENDİ
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    // Slug otomatik oluşturma
    public static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            $category->slug = \Illuminate\Support\Str::slug($category->name);
        });
    }
}