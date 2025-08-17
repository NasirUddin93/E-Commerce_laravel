<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

                        // Essential properties
            $table->string('sku')->unique(); // Product ID / SKU
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description
            $table->string('category')->nullable(); // Category
            $table->decimal('price', 10, 2); // Base price
            $table->integer('stock')->default(0); // Quantity in stock
            $table->string('brand')->nullable(); // Brand or Manufacturer
            $table->string('main_image')->nullable(); // Main product image
            $table->json('gallery_images')->nullable(); // Multiple images
            $table->boolean('status')->default(true); // Active / Inactive

            // Additional properties
            $table->decimal('discount_price', 10, 2)->nullable(); // Discounted price
            $table->float('rating', 2, 1)->default(0); // Avg rating
            $table->integer('reviews_count')->default(0); // Total reviews
            $table->string('color')->nullable(); // Color variation
            $table->string('size')->nullable(); // Size variation
            $table->string('material')->nullable(); // Material
            $table->decimal('weight', 8, 2)->nullable(); // Weight (kg)
            $table->string('dimensions')->nullable(); // Dimensions (LxWxH)
            $table->string('tags')->nullable(); // Keywords for search
            $table->string('warranty')->nullable(); // Warranty info
            $table->string('shipping_info')->nullable(); // Delivery details
            $table->string('return_policy')->nullable(); // Return policy
            $table->string('video_url')->nullable(); // Product demo video


            // Metadata
            $table->unsignedBigInteger('vendor_id')->nullable(); // Seller / Vendor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
