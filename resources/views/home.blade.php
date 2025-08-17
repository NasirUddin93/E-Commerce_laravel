<!-- resources/views/home.blade.php -->
@extends('layouts.app')
@section('title', 'Home')
@section('content')
  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
    <div class="max-w-7xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-bold">Shop the Latest Trends</h1>
      <p class="mt-4 text-lg md:text-xl">Discover amazing deals and discounts</p>
      <a href="#products" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">Shop Now</a>
    </div>
  </section>

  <!-- Categories -->
  <section class="max-w-7xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Shop by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg cursor-pointer">👕 Clothing</div>
      <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg cursor-pointer">👟 Shoes</div>
      <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg cursor-pointer">⌚ Accessories</div>
      <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg cursor-pointer">💻 Electronics</div>
    </div>
  </section>

  <!-- Featured Products -->
  <section id="products" class="max-w-7xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Featured Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

      @foreach ($products as $product)
          <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg">
              <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
              <div class="p-4">
                  <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                  <p class="text-gray-600">${{ $product->price }}</p>
                  <button class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Add to Cart</button>
              </div>
          </div>
      @endforeach

    </div>
  </section>
@endsection

