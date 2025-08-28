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
            // Electronics
            [
                'name' => 'iPhone 14',
                'price' => 1200,
                'description' => 'Latest Apple iPhone 14 with 256GB storage.',
                'category_id' => 1,
                'image' => 'products/iphone14.jpg',
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'price' => 1100,
                'description' => 'Flagship Samsung Galaxy S23 with AMOLED display.',
                'category_id' => 1,
                'image' => 'products/galaxy-s23.jpg',
            ],
            [
                'name' => 'MacBook Air M2',
                'price' => 1500,
                'description' => 'Apple MacBook Air with M2 chip and 13-inch display.',
                'category_id' => 1,
                'image' => 'products/macbook-air-m2.jpg',
            ],
            [
                'name' => 'Dell XPS 13',
                'price' => 1300,
                'description' => 'Dell XPS 13 ultrabook with Intel i7 processor.',
                'category_id' => 1,
                'image' => 'products/dell-xps13.jpg',
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'price' => 350,
                'description' => 'Sony noise-canceling wireless headphones.',
                'category_id' => 1,
                'image' => 'products/sony-headphones.jpg',
            ],
            [
                'name' => 'iPad Pro 12.9',
                'price' => 999,
                'description' => 'Apple iPad Pro 12.9-inch with M2 chip.',
                'category_id' => 1,
                'image' => 'products/ipad-pro.jpg',
            ],
            [
                'name' => 'Apple Watch Series 8',
                'price' => 450,
                'description' => 'Smartwatch with fitness tracking and health monitoring.',
                'category_id' => 1,
                'image' => 'products/apple-watch.jpg',
            ],
            [
                'name' => 'Canon EOS R10',
                'price' => 1200,
                'description' => 'Mirrorless camera for professionals.',
                'category_id' => 1,
                'image' => 'products/canon-eos.jpg',
            ],
            [
                'name' => 'Logitech MX Master 3',
                'price' => 100,
                'description' => 'Advanced wireless mouse for productivity.',
                'category_id' => 1,
                'image' => 'products/mx-master.jpg',
            ],
            [
                'name' => 'Samsung 4K Smart TV 55"',
                'price' => 700,
                'description' => '55-inch UHD 4K Smart TV with HDR.',
                'category_id' => 1,
                'image' => 'products/samsung-tv.jpg',
            ],

            // Fashion
            [
                'name' => 'Nike Air Max',
                'price' => 150,
                'description' => 'Comfortable and stylish Nike sneakers.',
                'category_id' => 2,
                'image' => 'products/nike-air-max.jpg',
            ],
            [
                'name' => 'Adidas Ultraboost',
                'price' => 180,
                'description' => 'Lightweight running shoes.',
                'category_id' => 2,
                'image' => 'products/adidas-ultraboost.jpg',
            ],
            [
                'name' => 'Levi’s 501 Jeans',
                'price' => 90,
                'description' => 'Classic Levi’s straight fit jeans.',
                'category_id' => 2,
                'image' => 'products/levis-jeans.jpg',
            ],
            [
                'name' => 'Zara Summer Dress',
                'price' => 60,
                'description' => 'Casual women’s summer dress.',
                'category_id' => 2,
                'image' => 'products/zara-dress.jpg',
            ],
            [
                'name' => 'North Face Jacket',
                'price' => 200,
                'description' => 'Waterproof and windproof jacket.',
                'category_id' => 2,
                'image' => 'products/northface-jacket.jpg',
            ],
            [
                'name' => 'Puma Hoodie',
                'price' => 70,
                'description' => 'Comfortable cotton hoodie.',
                'category_id' => 2,
                'image' => 'products/puma-hoodie.jpg',
            ],
            [
                'name' => 'Rolex Submariner',
                'price' => 10000,
                'description' => 'Luxury men’s watch.',
                'category_id' => 2,
                'image' => 'products/rolex.jpg',
            ],
            [
                'name' => 'Ray-Ban Sunglasses',
                'price' => 120,
                'description' => 'Classic aviator sunglasses.',
                'category_id' => 2,
                'image' => 'products/rayban.jpg',
            ],
            [
                'name' => 'Gucci Belt',
                'price' => 250,
                'description' => 'Stylish leather belt.',
                'category_id' => 2,
                'image' => 'products/gucci-belt.jpg',
            ],
            [
                'name' => 'H&M T-Shirt',
                'price' => 25,
                'description' => 'Casual cotton t-shirt.',
                'category_id' => 2,
                'image' => 'products/hm-tshirt.jpg',
            ],

            // Books
            [
                'name' => 'Atomic Habits',
                'price' => 20,
                'description' => 'Bestselling self-help book by James Clear.',
                'category_id' => 3,
                'image' => 'products/atomic-habits.jpg',
            ],
            [
                'name' => 'The Lean Startup',
                'price' => 18,
                'description' => 'Guide to startup success.',
                'category_id' => 3,
                'image' => 'products/lean-startup.jpg',
            ],
            [
                'name' => 'Clean Code',
                'price' => 30,
                'description' => 'Programming practices by Robert C. Martin.',
                'category_id' => 3,
                'image' => 'products/clean-code.jpg',
            ],
            [
                'name' => 'Deep Work',
                'price' => 22,
                'description' => 'Focus and productivity by Cal Newport.',
                'category_id' => 3,
                'image' => 'products/deep-work.jpg',
            ],
            [
                'name' => 'The Pragmatic Programmer',
                'price' => 28,
                'description' => 'Software development guide.',
                'category_id' => 3,
                'image' => 'products/pragmatic-programmer.jpg',
            ],
            [
                'name' => 'Harry Potter Box Set',
                'price' => 100,
                'description' => 'Complete Harry Potter collection.',
                'category_id' => 3,
                'image' => 'products/harry-potter.jpg',
            ],
            [
                'name' => 'The Hobbit',
                'price' => 15,
                'description' => 'Fantasy novel by J.R.R. Tolkien.',
                'category_id' => 3,
                'image' => 'products/hobbit.jpg',
            ],
            [
                'name' => 'Rich Dad Poor Dad',
                'price' => 12,
                'description' => 'Financial education book.',
                'category_id' => 3,
                'image' => 'products/richdad.jpg',
            ],
            [
                'name' => '1984',
                'price' => 14,
                'description' => 'Classic dystopian novel by George Orwell.',
                'category_id' => 3,
                'image' => 'products/1984.jpg',
            ],
            [
                'name' => 'The Alchemist',
                'price' => 16,
                'description' => 'Novel by Paulo Coelho.',
                'category_id' => 3,
                'image' => 'products/alchemist.jpg',
            ],

            // Home & Kitchen
            [
                'name' => 'Cooking Pan Set',
                'price' => 80,
                'description' => 'Non-stick cooking pan set for your kitchen.',
                'category_id' => 4,
                'image' => 'products/pan-set.jpg',
            ],
            [
                'name' => 'Philips Air Fryer',
                'price' => 200,
                'description' => 'Healthy oil-free cooking.',
                'category_id' => 4,
                'image' => 'products/air-fryer.jpg',
            ],
            [
                'name' => 'Dyson Vacuum Cleaner',
                'price' => 500,
                'description' => 'High-power cordless vacuum.',
                'category_id' => 4,
                'image' => 'products/dyson.jpg',
            ],
            [
                'name' => 'IKEA Sofa',
                'price' => 600,
                'description' => 'Comfortable 3-seater sofa.',
                'category_id' => 4,
                'image' => 'products/sofa.jpg',
            ],
            [
                'name' => 'Dining Table Set',
                'price' => 750,
                'description' => 'Wooden dining table with 6 chairs.',
                'category_id' => 4,
                'image' => 'products/dining-table.jpg',
            ],
            [
                'name' => 'Bed Frame',
                'price' => 400,
                'description' => 'Queen-size wooden bed frame.',
                'category_id' => 4,
                'image' => 'products/bed.jpg',
            ],
            [
                'name' => 'Table Lamp',
                'price' => 40,
                'description' => 'Modern bedside table lamp.',
                'category_id' => 4,
                'image' => 'products/lamp.jpg',
            ],
            [
                'name' => 'Coffee Maker',
                'price' => 120,
                'description' => 'Automatic coffee machine.',
                'category_id' => 4,
                'image' => 'products/coffee-maker.jpg',
            ],
            [
                'name' => 'Microwave Oven',
                'price' => 180,
                'description' => 'Stainless steel microwave oven.',
                'category_id' => 4,
                'image' => 'products/microwave.jpg',
            ],
            [
                'name' => 'Blender',
                'price' => 60,
                'description' => 'Multi-speed kitchen blender.',
                'category_id' => 4,
                'image' => 'products/blender.jpg',
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
