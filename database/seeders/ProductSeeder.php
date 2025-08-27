<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::makeDirectory('public/products');

        $products = [
            [
                'name'        => 'iPhone 14',
                'price'       => '1200',
                'description' => 'Latest Apple iPhone 14 with 256GB storage.',
                'category_id' => 1,
                'image'       => 'products/iphone14.jpg',
            ],
            [
                'name'        => 'Nike Air Max',
                'price'       => '150',
                'description' => 'Comfortable and stylish Nike sneakers.',
                'category_id' => 2,
                'image'       => 'products/nike-air-max.jpg',
            ],
            [
                'name'        => 'Atomic Habits',
                'price'       => '20',
                'description' => 'Bestselling self-help book by James Clear.',
                'category_id' => 3,
                'image'       => 'products/atomic-habits.jpg',
            ],
            [
                'name'        => 'Cooking Pan Set',
                'price'       => '80',
                'description' => 'Non-stick cooking pan set for your kitchen.',
                'category_id' => 4,
                'image'       => 'products/pan-set.jpg',
            ],
        ];

        foreach ($products as $product) {
            $fileName = basename($product['image']);
            $sourcePath = public_path('seed-images/' . $fileName);
            $destPath   = 'public/products/' . $fileName;

            if (file_exists($sourcePath)) {
                Storage::put($destPath, file_get_contents($sourcePath));
            }

            Product::create($product);
        }
    }
}
