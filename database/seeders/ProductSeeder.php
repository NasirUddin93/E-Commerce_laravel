<?php

namespace Database\Seeders;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$faker = Faker::create();

        // Ensure directories exist
        Storage::disk('public')->makeDirectory('products');
        Storage::disk('public')->makeDirectory('products/gallery');

        for ($i = 1; $i <= 10; $i++) {

            // Generate main image
            $mainImagePath = "products/main_$i.png";
            $this->generatePlaceholderImage(storage_path("app/public/$mainImagePath"), 400, 400, "Product $i");

            // Generate 2 gallery images
            $galleryPaths = [];
            for ($j = 1; $j <= 2; $j++) {
                $galleryPath = "products/gallery/product_{$i}_$j.png";
                $this->generatePlaceholderImage(storage_path("app/public/$galleryPath"), 200, 200, "Gallery $i-$j");
                $galleryPaths[] = $galleryPath;
            }

            Product::create([
                'sku' => 'SKU' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => "Demo Product $i",
                'description' => $faker->sentence(10),
                'category' => $faker->randomElement(['Smartphones', 'Headphones', 'Wearables']),
                'price' => $faker->randomFloat(2, 50, 1000),
                'stock' => $faker->numberBetween(10, 100),
                'brand' => $faker->company,
                'main_image' => $mainImagePath,
                'gallery_images' => json_encode($galleryPaths),
                'status' => 1,
                'is_featured' => ($i <= 3) ? true : false,
                'color' => $faker->safeColorName(),
                'size' => $faker->randomElement(['Small','Medium','Large']),
                'weight' => $faker->randomFloat(2, 0.05, 2),
                'dimensions' => $faker->randomElement(['10x10x2 cm','15x7x0.8 cm','20x18x5 cm']),
                'material' => $faker->randomElement(['Plastic','Aluminum','Rubber']),
            ]);
        }
    }

private function generatePlaceholderImage($path, $width, $height, $text)
{
    // Create image
    $img = imagecreatetruecolor($width, $height);

    // Colors
    $bgColor = imagecolorallocate($img, 200, 200, 200); // light gray
    $textColor = imagecolorallocate($img, 50, 50, 50);  // dark gray

    // Fill background
    imagefilledrectangle($img, 0, 0, $width, $height, $bgColor);

    // Add text in center
    $fontSize = 5; // built-in font (1-5)
    $textWidth = imagefontwidth($fontSize) * strlen($text);
    $textHeight = imagefontheight($fontSize);
    $x = ($width - $textWidth) / 2;
    $y = ($height - $textHeight) / 2;

    imagestring($img, $fontSize, $x, $y, $text, $textColor);

    // Save image as PNG
    imagepng($img, $path);
    imagedestroy($img);
}

}
