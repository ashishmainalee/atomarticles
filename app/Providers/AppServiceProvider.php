<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share("about", About::first());
        View::share("menu_categories", Category::latest()->take(4)->where('is_featured', 1)->get());
        View::share("side_categories", Category::take(7)->get());
        View::share("all_categories", Category::get());
        View::share("articles", Article::inRandomOrder()->limit(5)->get());
        View::share("trending_articles", Article::latest()->inRandomOrder()->limit(3)->where('is_trending', 1)->get());
        View::share("popular_articles", Article::latest()->inRandomOrder()->limit(3)->where('is_featured', 1)->get());
    }
}
