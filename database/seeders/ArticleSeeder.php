<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name'    => 'Society',
            'slug'  => 'society',
            'is_featured' => 1
        ]);

        $category2 = Category::create([
            'name'    => 'Health',
            'slug'  => 'health',
            'is_featured' => 1
        ]);

        $category3 = Category::create([
            'name'    => 'Technology',
            'slug'  => 'technology',
            'is_featured' => 1,
        ]);

        $article1 = Article::create([
            'title' => 'We relocated our office to a new designed garage',
            'slug'  => Str::slug('We relocated our office to a new designed garage'),
            'content' => 'We relocated our office to a new designed garage',
            'category_id' => $category1->id,
            'is_featured' => 1,
            'is_trending' => 1,
            'views' => 1,
            'image'        => '',
        ]);

        $article2 = Article::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'slug'  => Str::slug('Top 5 brilliant content marketing strategies'),
            'content' => 'We relocated our office to a new designed garage',
            'category_id' => $category2->id,
            'is_featured' => 1,
            'is_trending' => 1,
            'views' => 1,
            'image'        => '',
        ]);


        $article3 = Article::create([
            'title' => 'Best practices for minimalist design with example',
            'slug'  => Str::slug('Best practices for minimalist design with example'),
            'content' => 'We relocated our office to a new designed garage',
            'category_id' => $category3->id,
            'is_featured' => 1,
            'is_trending' => 1,
            'views' => 1,
            'image'        => '',
        ]);

        $article4 = Article::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'slug'  => Str::slug('Congratulate and thank to Maryam for joining our team'),
            'content' => 'We relocated our office to a new designed garage',
            'category_id' => $category2->id,
            'is_featured' => 1,
            'is_trending' => 1,
            'views' => 1,
            'image'        => '',
        ]);
    }
}
