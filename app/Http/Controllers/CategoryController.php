<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function featuredCategories()
    {
        $featuredCategories = Category::where('is_featured', true)->get();
        return view('categories.featured', compact('featuredCategories'));
    }
}
