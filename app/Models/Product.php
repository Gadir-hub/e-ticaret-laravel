<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'seller_id',
        'image',
        'stock_quantity',
        'is_active',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'stock_quantity' => 'integer'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = \Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->getOriginal('slug'))) {
                $product->slug = \Str::slug($product->name);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /**
     * Kategori ilişkisi
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Satıcı ilişkisi
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    /**
     * Siparişler ilişkisi
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Resimler ilişkisi (eğer product_images tablonuz varsa)
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Yorumlar ilişkisi (eğer reviews tablonuz varsa)
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Favorilere ekleyen kullanıcılar (eğer favorites tablonuz varsa)
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    /**
     * Scope for active products
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for products in stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    /**
     * Scope for products by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope for products by seller
     */
    public function scopeBySeller($query, $sellerId)
    {
        return $query->where('seller_id', $sellerId);
    }

    /**
     * Scope for searching products
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
    }

    /**
     * Check if product is in stock
     */
    public function getIsInStockAttribute(): bool
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2, ',', '.') . ' ₺';
    }

    /**
     * Get average rating (eğer reviews tablonuz varsa)
     */
    public function getAverageRatingAttribute(): float
    {
        if (!$this->relationLoaded('reviews')) {
            $this->load('reviews');
        }
        
        return $this->reviews->avg('rating') ?? 0;
    }

    /**
     * Get total orders count
     */
    public function getTotalOrdersAttribute(): int
    {
        if (!$this->relationLoaded('orders')) {
            $this->load('orders');
        }
        
        return $this->orders->count();
    }

    /**
     * Get total sales amount
     */
    public function getTotalSalesAttribute(): float
    {
        if (!$this->relationLoaded('orders')) {
            $this->load('orders');
        }
        
        return $this->orders->sum('total_price');
    }

    /**
     * Decrease stock quantity
     */
    public function decreaseStock(int $quantity = 1): bool
    {
        if ($this->stock_quantity < $quantity) {
            return false;
        }

        $this->decrement('stock_quantity', $quantity);
        return true;
    }

    /**
     * Increase stock quantity
     */
    public function increaseStock(int $quantity = 1): void
    {
        $this->increment('stock_quantity', $quantity);
    }

    /**
     * Check if product belongs to user
     */
    public function belongsToUser(User $user): bool
    {
        return $this->seller_id === $user->id;
    }

    /**
     * Check if product can be ordered
     */
    public function canBeOrdered(int $quantity = 1): bool
    {
        return $this->is_active && $this->is_in_stock && $this->stock_quantity >= $quantity;
    }

    /**
     * Get primary image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        
        return null;
    }

    /**
     * Get related products (same category)
     */
    public function relatedProducts(int $limit = 4)
    {
        return self::where('category_id', $this->category_id)
                  ->where('id', '!=', $this->id)
                  ->active()
                  ->inStock()
                  ->limit($limit)
                  ->get();
    }
}