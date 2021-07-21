<?php

namespace App\Http\Controllers\Backend;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(8);
        return view('backend.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.articles.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->only(['title','video_url', 'content', 'category_id', 'is_featured', 'is_trending']);

        $article = new Article;
     
        /** 
        $input['slug'] = Str::slug($input['title']);

        $input['is_featured'] = $article -> getFeaturedOrTrending($input['is_featured'] ?? '');
        $input['is_trending'] = $article -> getFeaturedOrTrending($input['is_trending'] ?? '');
        */
        // dd($input);

        $image = $request->file('image');
        $path = 'articles';

        if($image) {
            $input['image'] = uploadImage($image, $path, 1181, 563);
        }

        $article = $article->create($input);

        if($article) {
           session()->flash('success', 'Article created Successfully!');
        } else {
           session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backend.articles.show')
                ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories  = Category::all();

        return view('backend.articles.create')->with('article', $article)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $model = new Article;

        $input = $request->only(['title','video_url', 'content', 'category_id', 'is_featured', 'is_trending']);

        // $input['content'] = preg_replace('/<span[^>]+\>/i', '', $input['content']);
        // $input['content'] = preg_replace('/<div[^>]+\>/i', '', $input['content']);
        
        /*
        $tags_to_strip = Array("p","div", "span");
        $replace_with = '';
        foreach ($tags_to_strip as $tag)
        {
            $input['content'] = preg_replace("/<\\/?" . $tag . "(.|\\s)*?>/",$replace_with,$input['content']);
        }*/

        $input['slug'] = Str::slug($input['title']);


        $input['is_featured'] = $model->getFeaturedOrTrending($input['is_featured'] ?? '');
        $input['is_trending'] = $model->getFeaturedOrTrending($input['is_trending'] ?? '');

        $image = $request->file('image');

        $input['image'] = updateNewImageOrKeepOld($image, $article->image,'articles', 1181, 563);

        $result = $article->update($input);

        if($result) {
             session()->flash('success', 'Article Updated Successfully!');
        } else {
             session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.articles');
    }


    public function trash(Article $article)
    {
        $result = $article->delete();

         if($result) {
            session()->flash('success', 'Article Trashed Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('backend.articles') ;
    }

    public function getTrashed()
    {
        $articles = Article::onlyTrashed()-> get();

        return view('backend.articles.trashed')->with('articles', $articles);
    }


    public function delete($article)
    {
        $article = Article::withTrashed() -> where('slug', $article) -> first();
        if($article->image)
        {
            deleteImage($article->image, 'articles');
        }
        $result = $article->forceDelete();

         if($result) {
            session()->flash('success', 'Article Deleted permanently!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('backend.articles.trashed') ;
    }


    public function restore($article)
    {
        $article = Article::withTrashed() -> where('slug', $article) -> first();

        $result = $article->restore();

         if($result) {
            session()->flash('success', 'Article Successfully restored!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('backend.articles') ;
    }

    public function trashAll()
    {
        $result = DB::table('articles')->update(['deleted_at' => now()]);
        
        if($result) {
            session()->flash('success', 'All Articles Trashed Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('backend.articles') ;
    }

    public function deleteAll()
    {
        $articles =  Article::onlyTrashed()-> get();
        foreach ($articles as $article) {
            if($article->image) {
                deleteImage($article->image, 'articles');
            }
            $result = $article->forceDelete();
        }     
        
        if($result) {
            session()->flash('success', 'All Articles deleted Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('backend.articles') ;
    }

    public function restoreAll()
    {
        $result = DB::table('articles')->update(['deleted_at' => null]);
        
        if($result) {
            session()->flash('success', 'All Articles Restored Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('backend.articles') ;
    }
}
