<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Books'],
            ['name' => 'Home & Kitchen'],
            ['name' => 'Sports'],
            ['name' => 'Toys'],
            ['name' => 'Beauty'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
