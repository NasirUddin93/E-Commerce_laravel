<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
