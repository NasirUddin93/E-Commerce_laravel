<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    $categories = Category::all();
    return view('home', compact('products', 'categories'));
})->name('home');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/products', ProductController::class);
    // Add more admin routes (orders, users, etc.)
});

Route::get('/featured-products', [App\Http\Controllers\ProductController::class, 'featuredProducts'])->name('products.featured');

Route::get('/featured-categories', [App\Http\Controllers\CategoryController::class, 'featuredCategories'])->name('categories.featured');

Route::get('/products/category/{category:slug}', [App\Http\Controllers\ProductController::class, 'productsByCategory'])->name('products.byCategory');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

require __DIR__.'/auth.php';
