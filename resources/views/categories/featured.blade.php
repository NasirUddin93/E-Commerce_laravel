@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mb-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Featured Categories</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($featuredCategories as $category)
            <div class="border rounded-lg p-4 text-center">
                <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>
                <p class="text-gray-700">{{ $category->description }}</p>
                <a href="#" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Products</a>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No featured categories found.</p>
        @endforelse
    </div>
</div>
@endsection
