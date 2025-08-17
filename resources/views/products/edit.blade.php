@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- SKU --}}
        <div class="mb-4">
            <label class="block font-semibold">SKU</label>
            <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="w-full border p-2 rounded">
            @error('sku') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border p-2 rounded">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Description --}}
        <div class="mb-4">
            <label class="block font-semibold">Description</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Category --}}
        <div class="mb-4">
            <label class="block font-semibold">Category</label>
            <input type="text" name="category" value="{{ old('category', $product->category) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Price & Stock --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-semibold">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">Stock</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border p-2 rounded">
            </div>
        </div>

        {{-- Brand --}}
        <div class="mb-4">
            <label class="block font-semibold">Brand</label>
            <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" class="w-full border p-2 rounded">
        </div>

        {{-- Main Image --}}
        <div class="mb-4">
            <label class="block font-semibold">Main Image</label>
            <input type="file" name="main_image" accept="image/*" onchange="previewMainImage(event)" class="w-full border p-2 rounded">
            @if($product->main_image)
                <img id="mainPreview" src="{{ asset('storage/'.$product->main_image) }}" class="w-32 mt-2">
            @else
                <img id="mainPreview" class="w-32 mt-2 hidden">
            @endif
        </div>

        {{-- Gallery Images --}}
        <div class="mb-4">
            <label class="block font-semibold">Gallery Images</label>
            <input type="file" name="gallery_images[]" multiple accept="image/*" onchange="previewGalleryImages(event)" class="w-full border p-2 rounded">
            <div id="galleryPreview" class="flex flex-wrap gap-2 mt-2">
                @if($product->gallery_images)
                    @foreach(json_decode($product->gallery_images, true) as $img)
                        <img src="{{ asset('storage/'.$img) }}" class="w-24 h-24 object-cover rounded">
                    @endforeach
                @endif
            </div>
        </div>

        {{-- Other Fields --}}
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label>Status</label>
                <input type="checkbox" name="status" value="1" {{ old('status', $product->status) ? 'checked' : '' }}>
            </div>
            <div>
                <label>Discount Price</label>
                <input type="number" step="0.01" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Rating</label>
                <input type="number" step="0.1" name="rating" value="{{ old('rating', $product->rating) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Reviews Count</label>
                <input type="number" name="reviews_count" value="{{ old('reviews_count', $product->reviews_count) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Color</label>
                <input type="text" name="color" value="{{ old('color', $product->color) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Size</label>
                <input type="text" name="size" value="{{ old('size', $product->size) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Material</label>
                <input type="text" name="material" value="{{ old('material', $product->material) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Weight</label>
                <input type="number" step="0.01" name="weight" value="{{ old('weight', $product->weight) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Dimensions</label>
                <input type="text" name="dimensions" value="{{ old('dimensions', $product->dimensions) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Tags</label>
                <input type="text" name="tags" value="{{ old('tags', $product->tags) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Warranty</label>
                <input type="text" name="warranty" value="{{ old('warranty', $product->warranty) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Shipping Info</label>
                <input type="text" name="shipping_info" value="{{ old('shipping_info', $product->shipping_info) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Return Policy</label>
                <input type="text" name="return_policy" value="{{ old('return_policy', $product->return_policy) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Video URL</label>
                <input type="url" name="video_url" value="{{ old('video_url', $product->video_url) }}" class="w-full border p-2 rounded">
            </div>
            <div>
                <label>Vendor ID</label>
                <input type="number" name="vendor_id" value="{{ old('vendor_id', $product->vendor_id) }}" class="w-full border p-2 rounded">
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

{{-- Image Preview Script --}}
<script>
    function previewMainImage(event) {
        const preview = document.getElementById('mainPreview');
        preview.src = URL.createObjectURL(event.target.files[0]);
        preview.classList.remove('hidden');
    }

    function previewGalleryImages(event) {
        const galleryPreview = document.getElementById('galleryPreview');
        galleryPreview.innerHTML = ""; // clear previous
        Array.from(event.target.files).forEach(file => {
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.classList.add("w-24", "h-24", "object-cover", "rounded");
            galleryPreview.appendChild(img);
        });
    }
</script>
@endsection
