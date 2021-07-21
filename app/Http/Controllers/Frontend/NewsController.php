<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class NewsController extends Controller
{
    public function index() 
    {
        $home_articles = Article::latest()->where('is_featured', 1)->paginate(8);
        $top_articles = Article::latest()->inRandomOrder()->limit(5)->where('is_featured', 1)->get();
        $site_title = "Atom Articles - Home";
        return view('frontend.pages.index', compact('home_articles', 'top_articles', 'site_title'));
    }

    public function about()
    {
        $site_title = "Atom Articles - About Us";
        return view('frontend.pages.about', compact('site_title'));
    }

    public function terms()
    {
        $site_title = "Atom Articles - Terms & Conditions";
        return view('frontend.pages.terms', compact('site_title'));
    }

   public function policies()
    {
        $site_title = "Atom Articles - Privacy Policies";
        return view('frontend.pages.policies', compact('site_title'));
    }


    public function contact()
    {
        $site_title = "Atom Articles - Contact Us";
        return view('frontend.pages.contact', compact('site_title'));
    }

    public function submitForm(Request $request)
    {
    //    dd($request->all());
       $this -> validate($request, [
            'name'   => 'required',
            'phone'  => 'required',
            'message' => 'required'
       ]);

       $input = $request->only(['name', 'email', 'phone', 'message']);

       $result = Message::create($input);

      \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('phone'),
            'phone' => $request->get('enail'),
            'message' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('admin@atomarticles.com', 'Hello Admin')->subject($request->get('subject'));
        });    

       if($result) {
            session()->flash('success', 'Message sent Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('frontend.contact');
    }

    public function getNewsByCategory($category)
    {
        $category = Category::where('slug', $category)->first();
        $category_articles = Article::where('category_id', $category->id)->paginate(6);
        $site_title = "Atom Articles - " .$category->name;

        return view('frontend.pages.categories', compact('category_articles', 'category', 'site_title'));
    }

    public function showArticle(Article $article)
    {
        $article->incrementViewsCount($article);
        // dd($article);
        $site_title = "Atom Articles - " .$article->title;

        return view('frontend.pages.show-article', compact('site_title'))->with('full_article', $article);
    }

    public function gallery()
    {
        $gallery = Gallery::latest()->paginate(20);
        $site_title = "Atom Articles - Gallery";

        return view('frontend.pages.gallery', compact('gallery', 'site_title'));
    }

    public function search(Request $request)
    {
        $q = $request->input('query');
        $site_title = "Atom Articles - Search";
         $searchResults = (new Search())
            ->registerModel(Category::class, 'name')
            ->registerModel(Article::class, ['title', 'content'])
            ->limitAspectResults(200)
            ->perform($q);
        return view('frontend.pages.search', compact('searchResults', 'site_title'));
    }
}
