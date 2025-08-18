<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->unique()->word() . ' Category';
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->sentence(10),
                'is_featured' => ($i <= 3) ? true : false,
            ]);
        }
    }
}
