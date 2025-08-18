@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mb-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Featured Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($featuredProducts as $product)
            <div class="border rounded-lg p-4 text-center">
                @if($product->main_image)
                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                @else
                    <div class="w-full h-48 flex items-center justify-center bg-gray-200 rounded-md mb-4 text-gray-500">No Image</div>
                @endif
                <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                <p class="text-gray-700">${{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Details</a>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No featured products found.</p>
        @endforelse
    </div>
</div>
@endsection
