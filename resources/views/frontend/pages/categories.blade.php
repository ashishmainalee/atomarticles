@extends('frontend.layouts.app')

@section('main-content')

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!--Latest News-->
                <div class="latest-news-section">
                    <!--Sec Title-->
                    <div class="sec-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                    <div class="row clearfix">

                        <!--News Block Two-->
                        @foreach($category_articles as $article)
                        <div class="news-block-two with-margin col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ route('frontend.articles', $article) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset(imagePath($article->image, 'articles')) }}" alt="" style="width:381px;height:293px;" /></a>

                                    <div class="category"><a href="#">{{ $article->category->name }}</a></div>
                                </div>
                                <div class="lower-box">
                                    <h3><a href="{{ route('frontend.articles', $article) }}">{{ $article->title }}</a></h3>

                                    <ul class="post-meta">
                                        <li><span class="icon fa fa-clock-o"></span>{{ $article->created_at['month'] .' '. $article->created_at['day'] }}, {{ $article->created_at['year'] }}</li>

                                        <li><span class="icon fa fa-eye"></span>{{ $article->views['number_of_views'] ?? '0' }}</li>
                                    </ul>
                                    <div class="text">{{ Str::limit($article->content, 200, '...') }}
                                    </div>
                                    <a href="{{ route('frontend.articles', $article) }}" class="btn btn-danger btn-sm mt-4" style="margin-top:10px;">Read More</a>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Styled Pagination -->
                    <div class="pagination-custom">
                        {{ $category_articles->links() }}
                    </div>

                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <aside class="sidebar default-sidebar right-sidebar">
                    <div class="sidebar-widget search-box">
                        	<form method="get" action="{{ route('frontend.search') }}">
                                <div class="form-group">
                                    <input type="search" name="query" value="" placeholder="Search" required="">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>
                    <!--Social Widget-->
                    <div class="sidebar-widget sidebar-social-widget">
                        <div class="sidebar-title">
                            <h2>Follow Us</h2>
                        </div>
                        <ul class="social-icon-one alternate">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="instagram"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                    <!--End Social Widget-->


                    <!--Category Widget-->
                    <div class="sidebar-widget categories-widget">
                        <div class="sidebar-title">
                            <h2>Categories</h2>
                        </div>
                        <ul class="cat-list">
                            @foreach($side_categories as $category)
                            @if ($category->articles->count() > 0) 
                            <li class="clearfix"><a href="{{ route('frontend.categories', $category) }}">{{ $category->name }} <span>({{ $category->articles->count() ?? 0 }})</span></a></li>
                            @endif

                            @endforeach
                        </ul>
                    </div>
                    <!--End Category Widget-->

                    <!--News Post Widget-->
                    <div class="sidebar-widget posts-widget">

                        <!--Product widget Tabs-->
                        <div class="product-widget-tabs">
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box">

                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-popular" class="tab-btn active-btn">Featured</li>

                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">

                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-popular">
                                        <div class="content">
                                            @foreach($popular_articles as $article)
                                            <article class="widget-post">
                                                <figure class="post-thumb"><a href="{{ route('frontend.articles', $article) }}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset(imagePath($article->image, 'articles')) }}" style="width:86;height:79px;" alt=""></a>

                                                     <div class="overlay"></div>
                                                </figure>
                                                <div class="text"><a href="{{ route('frontend.articles', $article) }}">{{ Str::limit($article->title, 70, '..') }}</a></div>

                                                <div class="post-info">{{ $article->created_at['month'] .' '. $article->created_at['day'] }}, {{ $article->created_at['year'] }}</div>
                                            </article>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!--End Product Info Tabs-->

                    </div>
                    <!--End Post Widget-->


            </div>

        </div>

    </div>
</div>
<!--End Sidebar Page Container-->
@endsection

