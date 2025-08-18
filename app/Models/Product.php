<?php

namespace App\Models;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'sku', 'name', 'description', 'category', 'price', 'stock',
    'brand', 'main_image', 'gallery_images', 'status', 'discount_price',
    'rating', 'reviews_count', 'color', 'size', 'material', 'weight',
    'dimensions', 'tags', 'warranty', 'shipping_info', 'return_policy',
    'video_url', 'vendor_id'
];

    /**
     * Get the cart items for the product.
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

}
