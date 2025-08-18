<!-- resources/views/home.blade.php -->
@extends('layouts.app')
@section('title', 'Home')
@section('content')
  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
    <div class="max-w-7xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-bold">Shop the Latest Trends</h1>
      <p class="mt-4 text-lg md:text-xl">Discover amazing deals and discounts on all your favorite items!</p>
      <a href="{{ route('products.index') }}" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Shop Now</a>
    </div>
  </section>

  <!-- Promotional Banners/Deals Section -->
  <section class="max-w-7xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Today's Hot Deals</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-yellow-400 p-8 rounded-lg text-center text-white shadow-md">
        <h3 class="text-3xl font-bold mb-2">Flash Sale!</h3>
        <p class="text-lg">Up to 50% off on selected items. Limited time offer!</p>
        <a href="#" class="mt-4 inline-block bg-white text-yellow-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Shop Sale</a>
      </div>
      <div class="bg-green-500 p-8 rounded-lg text-center text-white shadow-md">
        <h3 class="text-3xl font-bold mb-2">New Customer Discount</h3>
        <p class="text-lg">Get 15% off your first purchase with code NEWBIE15</p>
        <a href="{{ route('register') }}" class="mt-4 inline-block bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition duration-300">Register Now</a>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section class="max-w-7xl mx-auto py-12 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Shop by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @forelse($categories as $category)
            <a href="{{ route('products.byCategory', $category->slug) }}" class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg cursor-pointer">
                {{ $category->name }}
            </a>
        @empty
            <p class="col-span-full text-center text-gray-500">No categories found.</p>
        @endforelse
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
                  <div class="flex justify-between items-center mt-3">
                      <a href="{{ route('products.show', $product->id) }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 text-sm">View Details</a>
                      <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm">Add to Cart</button>
                  </div>
              </div>
          </div>
      @endforeach

    </div>
  </section>

  <!-- Testimonials/Customer Reviews -->
  <section class="bg-gray-100 py-12 px-4">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-2xl font-bold mb-8 text-gray-800">What Our Customers Say</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="italic text-gray-700">"Amazing products and fast shipping! Highly recommend this store."</p>
          <p class="font-semibold mt-4">- Jane Doe</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="italic text-gray-700">"Great customer service and quality items. Will definitely shop here again."</p>
          <p class="font-semibold mt-4">- John Smith</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <p class="italic text-gray-700">"Found exactly what I was looking for at a great price. Very satisfied!"</p>
          <p class="font-semibold mt-4">- Emily White</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Brand Story/About Us Snippet -->
  <section class="max-w-7xl mx-auto py-12 px-4 text-center">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Our Story</h2>
    <p class="text-gray-700 leading-relaxed max-w-3xl mx-auto">
      Welcome to {{ config('app.name', 'Laravel') }}! We are passionate about providing high-quality products and an exceptional shopping experience. Our mission is to bring you the latest trends and best deals, all while ensuring your satisfaction.
    </p>
    <a href="#" class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Learn More</a>
  </section>

  <!-- Behind the Scenes/Craftsmanship -->
  <section class="max-w-7xl mx-auto py-12 px-4 text-center">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Behind the Scenes</h2>
    <p class="text-gray-700 leading-relaxed max-w-3xl mx-auto mb-8">
      Discover the passion and precision that goes into every product. We believe in quality craftsmanship and sustainable practices.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/400x250?text=Craftsmanship+Image+1" alt="Craftsmanship" class="w-full rounded-md mb-4">
        <h3 class="text-xl font-semibold mb-2">Our Process</h3>
        <p class="text-gray-700">Learn about the meticulous steps we take to create durable and beautiful products.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/400x250?text=Craftsmanship+Image+2" alt="Materials" class="w-full rounded-md mb-4">
        <h3 class="text-xl font-semibold mb-2">Quality Materials</h3>
        <p class="text-gray-700">We source only the finest materials to ensure the longevity and performance of our items.</p>
      </div>
    </div>
    <a href="#" class="mt-8 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">Explore Our Craft</a>
  </section>

  <!-- Behind the Scenes/Craftsmanship -->
  <section class="max-w-7xl mx-auto py-12 px-4 text-center">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Behind the Scenes</h2>
    <p class="text-gray-700 leading-relaxed max-w-3xl mx-auto mb-8">
      Discover the passion and precision that goes into every product. We believe in quality craftsmanship and ethical production.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/400x250?text=Craftsmanship+Image+1" alt="Craftsmanship" class="w-full h-auto rounded-md mb-4">
        <h3 class="text-xl font-semibold mb-2">Our Process</h3>
        <p class="text-gray-600">Learn about the meticulous steps we take to create durable and beautiful products.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="https://via.placeholder.com/400x250?text=Craftsmanship+Image+2" alt="Ethical Production" class="w-full h-auto rounded-md mb-4">
        <h3 class="text-xl font-semibold mb-2">Ethical Production</h3>
        <p class="text-gray-600">We are committed to sustainable practices and fair labor in every stage of production.</p>
      </div>
    </div>
  </section>

  <!-- Call to Action (Newsletter Signup) -->
  <section class="bg-indigo-700 text-white py-12 px-4">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-4">Stay Updated!</h2>
      <p class="text-lg mb-6">Subscribe to our newsletter for exclusive offers and new product alerts.</p>
      <form action="#" method="POST" class="max-w-md mx-auto flex">
        <input type="email" placeholder="Enter your email" class="flex-1 p-3 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800" required>
        <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-r-lg font-semibold hover:bg-blue-600 transition duration-300">Subscribe</button>
      </form>
    </div>
  </section>

  <!-- Social Media Links -->
  <section class="max-w-7xl mx-auto py-12 px-4 text-center">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Connect With Us</h2>
    <div class="flex justify-center space-x-6 text-4xl">
      <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-300"><i class="fab fa-facebook"></i></a>
      <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-300"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-300"><i class="fab fa-instagram"></i></a>
      <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-300"><i class="fab fa-pinterest"></i></a>
    </div>
    <p class="text-gray-500 text-sm mt-4">Font Awesome icons are assumed to be available via a CDN or local setup.</p>
  </section>

  <!-- Contact Us Section -->
  <section class="max-w-7xl mx-auto py-12 px-4 text-center">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Get in Touch</h2>
    <p class="text-gray-700 leading-relaxed max-w-3xl mx-auto mb-8">
      Have questions or feedback? We'd love to hear from you!
    </p>
    <a href="{{ route('contact.create') }}" class="inline-block bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-blue-700 transition duration-300">Contact Us</a>
  </section>

@endsection