@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Product Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Images -->
        <div>
            <!-- Main Image -->
            <div class="border rounded-lg overflow-hidden">
                <img src="{{ $product->main_image ? asset('storage/'.$product->main_image) : asset('images/no-image.png') }}"
                     alt="{{ $product->name }}"
                     class="w-full h-96 object-cover">
            </div>

            <!-- Gallery Images -->
            @if($product->gallery_images)
                <div class="flex gap-2 mt-4">
                    @foreach(json_decode($product->gallery_images, true) as $galleryImage)
                        <img src="{{ asset('storage/'.$galleryImage) }}"
                             alt="Gallery Image"
                             class="w-20 h-20 object-cover rounded border hover:scale-105 transition">
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Product Info -->
        <div>
            <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
            <p class="text-lg text-gray-500 mt-2">{{ $product->brand }} - {{ $product->category }}</p>

            <!-- Price -->
            <div class="mt-4">
                <span class="text-2xl font-semibold text-green-600">${{ number_format($product->price, 2) }}</span>
                @if($product->discount > 0)
                    <span class="line-through text-gray-400 ml-2">${{ number_format($product->price + $product->discount, 2) }}</span>
                @endif
            </div>

            <!-- Stock -->
            <p class="mt-2">
                @if($product->stock_quantity > 0)
                    <span class="text-green-600 font-medium">In Stock ({{ $product->stock_quantity }})</span>
                @else
                    <span class="text-red-600 font-medium">Out of Stock</span>
                @endif
            </p>

            <!-- Description -->
            <div class="mt-4">
                <h2 class="text-lg font-semibold">Description</h2>
                <p class="text-gray-700 mt-2">{{ $product->description }}</p>
            </div>

            <!-- Extra Features -->
            <div class="mt-4 space-y-1 text-gray-700">
                <p><strong>SKU:</strong> {{ $product->sku }}</p>
                <p><strong>Weight:</strong> {{ $product->weight }} kg</p>
                <p><strong>Dimensions:</strong> {{ $product->dimensions }}</p>
                <p><strong>Color:</strong> {{ $product->color }}</p>
                <p><strong>Material:</strong> {{ $product->material }}</p>
            </div>

            <!-- Add to Cart -->
            <div class="mt-6 flex items-center gap-4">
                <input type="number" value="1" min="1"
                       class="w-16 border border-gray-300 rounded-lg p-2 text-center">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>

    {{-- <!-- Related Products -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($relatedProducts as $related)
                <div class="border rounded-lg p-4 hover:shadow-lg transition">
                    <a href="{{ route('products.show', $related->id) }}">
                        <img src="{{ $related->main_image ? asset('storage/'.$related->main_image) : asset('images/no-image.png') }}"
                             alt="{{ $related->name }}"
                             class="w-full h-40 object-cover rounded">
                        <h3 class="mt-3 font-semibold text-gray-800">{{ $related->name }}</h3>
                        <p class="text-green-600 font-medium">${{ number_format($related->price, 2) }}</p>
                    </a>
                </div>
            @empty
                <p class="text-gray-500">No related products found.</p>
            @endforelse
        </div>
    </div> --}}

    <!-- Related Products Carousel -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Related Products</h2>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @forelse($relatedProducts as $related)
                    <div class="swiper-slide">
                        <div class="border rounded-lg p-4 hover:shadow-lg transition">
                            <a href="{{ route('products.show', $related->id) }}">
                                <img src="{{ $related->main_image ? asset('storage/'.$related->main_image) : asset('images/no-image.png') }}"
                                    alt="{{ $related->name }}"
                                    class="w-full h-40 object-cover rounded">
                                <h3 class="mt-3 font-semibold text-gray-800">{{ $related->name }}</h3>
                                <p class="text-green-600 font-medium">${{ number_format($related->price, 2) }}</p>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No related products found.</p>
                @endforelse
            </div>

            <!-- Swiper Navigation -->
            <div class="flex justify-between items-center mt-4">
                <div class="swiper-button-prev text-gray-700"></div>
                <div class="swiper-button-next text-gray-700"></div>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination mt-2"></div>
        </div>
    </div>


</div>
@endsection
