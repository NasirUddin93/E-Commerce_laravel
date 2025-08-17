@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- SKU -->
        <div>
            <label class="block text-gray-700">SKU (Unique Code)</label>
            <input type="text" name="sku" class="w-full border p-2 rounded" required>
        </div>

        <!-- Product Name -->
        <div>
            <label class="block text-gray-700">Product Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700">Description</label>
            <textarea name="description" rows="4" class="w-full border p-2 rounded"></textarea>
        </div>

        <!-- Category -->
        <div>
            <label class="block text-gray-700">Category</label>
            <input type="text" name="category" class="w-full border p-2 rounded">
        </div>

        <!-- Price -->
        <div>
            <label class="block text-gray-700">Price ($)</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
        </div>

        <!-- Stock -->
        <div>
            <label class="block text-gray-700">Stock Quantity</label>
            <input type="number" name="stock" class="w-full border p-2 rounded" required>
        </div>

        <!-- Brand -->
        <div>
            <label class="block text-gray-700">Brand</label>
            <input type="text" name="brand" class="w-full border p-2 rounded">
        </div>
            <!-- Main Image -->
    <div>
        <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
        <input type="file" name="main_image" id="main_image"
               class="mt-1 block w-full border border-gray-300 rounded-lg p-2" accept="image/*">
        <div id="mainImagePreview" class="mt-2"></div>
    </div>

    <!-- Gallery Images -->
    <div>
        <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
        <input type="file" name="gallery_images[]" id="gallery_images" multiple
               class="mt-1 block w-full border border-gray-300 rounded-lg p-2" accept="image/*">
        <div id="galleryPreview" class="flex flex-wrap gap-2 mt-2"></div>
    </div>

        {{-- <!-- Main Image -->
        <div>
            <label class="block text-gray-700">Main Image</label>
            <input type="file" name="main_image" class="w-full border p-2 rounded">
        </div>

        <!-- Gallery Images -->
        <div>
            <label class="block text-gray-700">Gallery Images (multiple)</label>
            <input type="file" name="gallery_images[]" class="w-full border p-2 rounded" multiple>
        </div> --}}

        <!-- Status -->
        <div>
            <label class="block text-gray-700">Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <!-- Discount Price -->
        <div>
            <label class="block text-gray-700">Discount Price ($)</label>
            <input type="number" step="0.01" name="discount_price" class="w-full border p-2 rounded">
        </div>

        <!-- Rating -->
        <div>
            <label class="block text-gray-700">Rating (0–5)</label>
            <input type="number" step="0.1" max="5" name="rating" class="w-full border p-2 rounded">
        </div>

        <!-- Reviews Count -->
        <div>
            <label class="block text-gray-700">Reviews Count</label>
            <input type="number" name="reviews_count" class="w-full border p-2 rounded">
        </div>

        <!-- Color -->
        <div>
            <label class="block text-gray-700">Color</label>
            <input type="text" name="color" class="w-full border p-2 rounded">
        </div>

        <!-- Size -->
        <div>
            <label class="block text-gray-700">Size</label>
            <input type="text" name="size" class="w-full border p-2 rounded">
        </div>

        <!-- Material -->
        <div>
            <label class="block text-gray-700">Material</label>
            <input type="text" name="material" class="w-full border p-2 rounded">
        </div>

        <!-- Weight -->
        <div>
            <label class="block text-gray-700">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="w-full border p-2 rounded">
        </div>

        <!-- Dimensions -->
        <div>
            <label class="block text-gray-700">Dimensions (LxWxH)</label>
            <input type="text" name="dimensions" class="w-full border p-2 rounded">
        </div>

        <!-- Tags -->
        <div>
            <label class="block text-gray-700">Tags (comma separated)</label>
            <input type="text" name="tags" class="w-full border p-2 rounded">
        </div>

        <!-- Warranty -->
        <div>
            <label class="block text-gray-700">Warranty Info</label>
            <input type="text" name="warranty" class="w-full border p-2 rounded">
        </div>

        <!-- Shipping Info -->
        <div>
            <label class="block text-gray-700">Shipping Info</label>
            <input type="text" name="shipping_info" class="w-full border p-2 rounded">
        </div>

        <!-- Return Policy -->
        <div>
            <label class="block text-gray-700">Return Policy</label>
            <input type="text" name="return_policy" class="w-full border p-2 rounded">
        </div>

        <!-- Video URL -->
        <div>
            <label class="block text-gray-700">Product Video URL</label>
            <input type="url" name="video_url" class="w-full border p-2 rounded">
        </div>

        <!-- Vendor -->
        <div>
            <label class="block text-gray-700">Vendor ID</label>
            <input type="number" name="vendor_id" class="w-full border p-2 rounded">
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Save Product
            </button>
        </div>
    </form>
</div>
<script>
    // Main Image Preview
    document.getElementById('main_image').addEventListener('change', function(e) {
        let preview = document.getElementById('mainImagePreview');
        preview.innerHTML = "";
        if (e.target.files.length > 0) {
            let file = e.target.files[0];
            let reader = new FileReader();
            reader.onload = function(event) {
                preview.innerHTML = `<img src="${event.target.result}" class="w-32 h-32 object-cover rounded border">`;
            }
            reader.readAsDataURL(file);
        }
    });

    // Gallery Images Preview
    document.getElementById('gallery_images').addEventListener('change', function(e) {
        let preview = document.getElementById('galleryPreview');
        preview.innerHTML = "";
        Array.from(e.target.files).forEach(file => {
            let reader = new FileReader();
            reader.onload = function(event) {
                let img = document.createElement('img');
                img.src = event.target.result;
                img.classList = "w-20 h-20 object-cover rounded border";
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
</script>

@endsection
