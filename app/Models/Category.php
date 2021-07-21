<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements Searchable
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'slug', 'is_featured'];
    // Use Slug instead of ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function articles()
    {
    	return $this->hasMany(Article::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('frontend.categories', $this->slug);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }

}
