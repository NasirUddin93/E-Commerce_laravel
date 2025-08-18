<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_featured',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'name'); // 'category' is the foreign key on products table, 'name' is the local key on categories table
    }
}
