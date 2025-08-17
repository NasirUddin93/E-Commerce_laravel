@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Products List</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Product Button -->
    <div class="mb-4 text-right">
        <a href="{{ route('products.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Image</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Price</th>
                    <th class="border p-2">Stock</th>
                    <th class="border p-2">Category</th>
                    <th class="border p-2">Brand</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="border p-2 text-center">{{ $product->id }}</td>

                    <!-- Product Image -->
                    <td class="border p-2 text-center">
                        @if($product->main_image)
                            <img src="{{ asset('storage/products/' . $product->main_image) }}"
                                 class="w-16 h-16 object-cover rounded mx-auto">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    {{-- // gallery image --}}
                    {{-- <td class="border p-2 text-center">
                    @if($product->gallery_images)
                        @php
                            $gallery = json_decode($product->gallery_images, true);
                        @endphp
                        <div class="flex flex-wrap justify-center gap-2">
                            @foreach($gallery as $img)
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="w-12 h-12 object-cover rounded border">
                            @endforeach
                        </div>
                    @else
                        <span class="text-gray-400">No Gallery</span>
                    @endif
                </td> --}}

                    <td class="border p-2">{{ $product->name }}</td>
                    <td class="border p-2">${{ number_format($product->price, 2) }}</td>
                    <td class="border p-2 text-center">{{ $product->stock }}</td>
                    <td class="border p-2">{{ $product->category ?? 'N/A' }}</td>
                    <td class="border p-2">{{ $product->brand ?? 'N/A' }}</td>
                    <td class="border p-2 text-center">
                        @if($product->status)
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Active</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Inactive</span>
                        @endif
                    </td>

                    <!-- Actions -->
                    <td class="border p-2 text-center space-x-2">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    class="text-red-600 hover:underline delete-btn">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="border p-4 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(form => {
        const btn = form.querySelector(".delete-btn");

        btn.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Success Message after delete
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "Success",
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    @endif
});
</script>

@endsection
