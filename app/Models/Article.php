<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Searchable\Searchable;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model implements Searchable
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
		'content',
		'slug',
        'image',
        'video_url',
        'category_id',
        'is_featured',
        'is_trending',
        'views'
    ];

    // Use Slug instead of ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFeaturedOrTrending($value)
    {
        if($value) {
            $value = 1;
            return $value;
        } else {
            $value = 0;
            return $value;
        }
    }

    public function incrementViewsCount($article) {
        DB::table('articles')->whereId($article->id)->increment('views');
    }


    public function getViewsAttribute($value)
    {
        if($value > 500){
            $views = [
                'number_of_views' => $value,
                'views_status' => 'Most Viewed'
            ];
        } elseif ($value > 200) {
            $views = [
                'number_of_views' => $value,
                'views_status' => 'Average Viewed'
            ];
        } else {
            $views = [
                'number_of_views' => $value,
                'views_status' => 'Normal Viewed'
            ];
        }
        return $views;
    }


    public function getCreatedAtAttribute($value) {
        $timestamp = strtotime($value);
        //Uppercase letters gives day, month in language(Jan, Third, etc)
        $year = date('Y', $timestamp);
        $month = date('M', $timestamp);
        //lowercase letters gives day, month in numbers(1, 3, etc)
        $day = date('d', $timestamp);

        $date = [
            'year' => $year,
            'month' => $month,
            'day'   => $day
        ];
        return $date;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('frontend.articles', $this->slug);

        return new SearchResult(
            $this,
            Str::limit($this->title, 250),
            $url
         );
    }
}
