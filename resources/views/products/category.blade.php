@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Products in {{ $category->name }}</h2>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg">
                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="mt-3 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 block text-center">View Details</a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No products found in this category.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
