@extends('frontend.layouts.app')

@section('main-content')
    <!--Blog Single Gallery-->
    <div class="blog-single-gallery grey-bg">
        <div class="auto-container">
            <div class="image">
                <img src="{{ asset(imagePath($full_article->image, 'articles')) }}" alt="" />
            </div>
        </div>
    </div>
    <!--End Single Gallery-->

 
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <div class="blog-single">
                            <div class="inner-box">
                                <div class="upper-box">
                                    <ul class="breadcrumb-bar">
                                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                        <li>{{ $full_article->category->name }}</li>
                                        <li>{{ $full_article->title }}</li>
                                    </ul>
                                    <ul class="tag-title">
                                        <li>{{ $full_article->is_featured ? 'Featured' : '' }}</li>
                                        <li>{{ $full_article->category->name }}</li>

                                    </ul>
                                    <h2>{{ $full_article->title }}</h2>
                                    <ul class="post-meta">
                                        <li><span class="icon qb-clock"></span>{{ $full_article->created_at['month'] }} {{ $full_article->created_at['day'] }}, {{ $full_article->created_at['year'] }}</li>


                                        <li><span class="icon qb-user2"></span>by Admin</li>
                                        <li><span class="icon qb-eye"></span>{{ $full_article->views['number_of_views'] ?? '0' }} Views</li>
                                    </ul>
                                    <ul class="social-icon-one alternate">
                                        <li class="share">Share:</li>
                                        <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook"></span></a></li>
                                        <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                    </ul>
                                </div>

                                <div class="text">
                                    {!! $full_article->content !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

             
            </div>

        </div>
    </div>
    <!--End Sidebar Page Container-->

@endsection

@section('footerelements')

@endsection