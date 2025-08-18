<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        $featuredProducts = Product::where('is_featured', true)->get();
        return view('products.index', compact('products', 'featuredProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // ✅ Validate input
        $validated = $request->validate([
            'sku'            => 'required|unique:products,sku|max:100',
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'category'       => 'nullable|string|max:100',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
            'brand'          => 'nullable|string|max:100',
            'main_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'         => 'boolean',
            'discount_price' => 'nullable|numeric|min:0',
            'rating'         => 'nullable|numeric|min:0|max:5',
            'reviews_count'  => 'nullable|integer|min:0',
            'color'          => 'nullable|string|max:50',
            'size'           => 'nullable|string|max:50',
            'material'       => 'nullable|string|max:100',
            'weight'         => 'nullable|numeric|min:0',
            'dimensions'     => 'nullable|string|max:100',
            'tags'           => 'nullable|string',
            'warranty'       => 'nullable|string|max:255',
            'shipping_info'  => 'nullable|string|max:255',
            'return_policy'  => 'nullable|string|max:255',
            'video_url'      => 'nullable|url',
            'vendor_id'      => 'nullable|integer',
        ]);

        // ✅ Handle main image upload
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // ✅ Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('products/gallery', 'public');
            }
            $validated['gallery_images'] = json_encode($galleryPaths);
        }

        // ✅ Save product to DB
        $product = \App\Models\Product::create($validated);

        // ✅ Redirect back with success
        return redirect()->route('products.index')
                        ->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
                // Get related products (same category, exclude current product)
        $relatedProducts = Product::where('category', $product->category)
                                ->where('id', '!=', $product->id)
                                ->take(4)
                                ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
         return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // ✅ Validate input (ignore current product's SKU in unique check)
        $validated = $request->validate([
            'sku'            => 'required|max:100|unique:products,sku,' . $product->id,
            'name'           => 'required|string|max:255',
            'description'    => 'nullable|string',
            'category'       => 'nullable|string|max:100',
            'price'          => 'required|numeric|min:0',
            'stock'          => 'required|integer|min:0',
            'brand'          => 'nullable|string|max:100',
            'main_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'         => 'boolean',
            'discount_price' => 'nullable|numeric|min:0',
            'rating'         => 'nullable|numeric|min:0|max:5',
            'reviews_count'  => 'nullable|integer|min:0',
            'color'          => 'nullable|string|max:50',
            'size'           => 'nullable|string|max:50',
            'material'       => 'nullable|string|max:100',
            'weight'         => 'nullable|numeric|min:0',
            'dimensions'     => 'nullable|string|max:100',
            'tags'           => 'nullable|string',
            'warranty'       => 'nullable|string|max:255',
            'shipping_info'  => 'nullable|string|max:255',
            'return_policy'  => 'nullable|string|max:255',
            'video_url'      => 'nullable|url',
            'vendor_id'      => 'nullable|integer',
        ]);

        // ✅ Handle main image upload
        if ($request->hasFile('main_image')) {
            // delete old image if exists
            if ($product->main_image && \Storage::disk('public')->exists($product->main_image)) {
                \Storage::disk('public')->delete($product->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // ✅ Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            // delete old gallery images if exists
            if ($product->gallery_images) {
                foreach (json_decode($product->gallery_images, true) as $oldImage) {
                    if (\Storage::disk('public')->exists($oldImage)) {
                        \Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPaths[] = $image->store('products/gallery', 'public');
            }
            $validated['gallery_images'] = json_encode($galleryPaths);
        }

        // ✅ Update product in DB
        $product->update($validated);

        // ✅ Redirect back with success
        return redirect()->route('products.index')
                        ->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete main image if exists
        if ($product->main_image && \Storage::disk('public')->exists('products/' . $product->main_image)) {
            \Storage::disk('public')->delete('products/' . $product->main_image);
        }

        // Delete gallery images if stored as JSON
        if ($product->gallery_images) {
            $gallery = json_decode($product->gallery_images, true);
            if (is_array($gallery)) {
                foreach ($gallery as $img) {
                    if (\Storage::disk('public')->exists($img)) {
                        \Storage::disk('public')->delete($img);
                    }
                }
            }
        }

        // Finally delete the product record
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Product deleted successfully.');
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('is_featured', true)->get();
        return view('products.featured', compact('featuredProducts'));
    }

    public function productsByCategory(Category $category)
    {
        $products = $category->products()->paginate(10);
        return view('products.category', compact('products', 'category'));
    }

}
