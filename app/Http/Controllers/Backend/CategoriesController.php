<?php

namespace App\Http\Controllers\Backend;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this -> validate($request, [
            'name'   => 'required|unique:categories'
       ]);
       $input = $request->only(['name', 'is_featured']);
       $input['slug'] = Str::slug($input['name']);
    //    dd($input);
       if ($input['is_featured'] ?? '') {
           $input['is_featured'] = 1;
       } else {
           $input['is_featured'] = 0;
       }

       $result = Category::create($input);

       if($result) {
            session()->flash('success', 'Category Created Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->paginate(6);
        return view('backend.categories.show')
                ->with('category', $category)
                ->with('articles', $articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       $this -> validate($request, [
            'name'   => 'required|unique:categories'
       ]);

       $input = $request->only(['name', 'is_featured']);
       $input['slug'] = Str::slug($input['name']);

       if ($input['is_featured'] ?? '') {
           $input['is_featured'] = 1;
       } else {
           $input['is_featured'] = 0;
       }

       $result = $category->update($input);

       if($result) {
            session()->flash('success', 'Category Updated Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.categories');
    }

    public function trash(Category $category)
    {
        $result = $category->delete();
        $result_articles =  $category->articles()->delete();

         if($result || $result_articles) {
            session()->flash('success', 'Category Trashed Successfully!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }
         return redirect() -> route('backend.categories') ;
    }

    public function getTrashed()
    {
        $categories = Category::onlyTrashed()-> get();
        return view('backend.categories.trashed')->with('categories', $categories);

    }


    public function delete($category)
    {
        $category = Category::withTrashed() -> where('slug', $category) -> first();

        $result_articles =  $category->articles()->forceDelete();
        $result = $category->forceDelete();

         if($result || $result_articles) {
            session()->flash('success', 'Category Deleted permanently!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('backend.categories.trashed') ;
    }


    public function restore($category)
    {
        $category = Category::withTrashed() -> where('slug', $category) -> first();
        $result_articles =  $category->articles()->restore();

        $result = $category->restore();

         if($result) {
            session()->flash('success', 'Category Successfully restored!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('backend.categories') ;

    }
}
