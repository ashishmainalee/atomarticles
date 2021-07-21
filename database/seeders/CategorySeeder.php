<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'is_featured' => 1
        ]);
        
        $category_2 = Category::create([
            'name' => 'Economy',
            'slug' => 'economy',
            'is_featured' => 0
        ]);

    }
}
