<!-- Main Header -->
<header class="main-header">
<!--Header Top-->
<div class="header-top">
<div class="auto-container">
<div class="clearfix">
    <!--Top Left-->
    <div class="top-left col-md-5 col-sm-12 col-xs-12">
        <div class="trend">Trending: </div>
        <div class="single-item-carousel owl-carousel owl-theme">
            @foreach($articles as $article)
            <div class="slide">
                <div class="text">{{ Str::limit($article->title, 58, '..') }}</div>
            </div>
            @endforeach
        </div>
    </div>
    <!--Top Right-->
    <div class="top-right pull-right col-md-7 col-sm-12 col-xs-12">
        <ul class="top-nav">
            <li><a href="{{ route('frontend.about') }}">About</a></li>
            <li><a href="{{ route('frontend.contact') }}">Contacts</a></li>
        </ul>
        <ul class="social-nav">
            <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook-square" style="color: white"></span></a></li>
        </ul>
    </div>
</div>
</div>
</div>
<!--Header-Upper-->
<div class="header-upper">
<div class="auto-container">
<div class="clearfix">

    <div class="pull-left logo-outer">
        <img class="logo" src="{{ asset(imagePath($about->site_logo, 'abouts')) }}" alt="{{ $about->site_logo }}" style="width:210px;height:80px;"/>
    </div>

</div>
</div>
</div>
<!--End Header Upper-->

<!--Header Lower-->
<div class="header-lower">
<div class="auto-container">
<div class="nav-outer clearfix">
    <!-- Main Menu -->
    <nav class="main-menu">
        <div class="navbar-header">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
            <ul class="navigation clearfix">
                <li class="{{ request()->routeIs('frontend.home') ? 'current' : '' }}"><a href="{{ route('frontend.home') }}">Home</a></li>
                @foreach($menu_categories as $category)
                @if($category->articles->count() > 0)
                <li class="{{ request()->is($category->slug . '/show') ? 'current' : '' }}">
                    <a href="{{ route('frontend.categories', $category) }}">{{ $category->name }}
                        <span class="badge badge-danger" style="background:royalblue;"> {{ $category->articles->count() }} </span>
                    </a>
                </li>
                @endif

                @endforeach
                <li class="dropdown"><a href="#">All Categories</a>
                    <ul>
                        @foreach($all_categories as $category)
                        @if($category->articles->count() > 0)
                        <li><a href="{{ route('frontend.categories', $category) }}">{{ $category->name }}
                        <span class="badge badge-danger" style="background:royalblue;"> {{ $category->articles->count() }} </span>
                        </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>

                <li class="{{ request()->routeIs('frontend.gallery') ? 'current' : '' }}"><a href="{{ route('frontend.gallery') }}">Gallery</a></li>

                <li class="{{ request()->routeIs('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

                <li class="{{ request()->routeIs('frontend.contact') ? 'current' : '' }}"><a href="{{ route('frontend.contact') }}">Contact</a></li>
            </ul>
        </div>
        
    </nav>
    <div class="outer-box">
    <!--Search Box-->
    <div class="search-box-outer">
        <div class="dropdown">
            <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
            <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                <li class="panel-outer">
                    <div class="form-container">
                        <form method="get" action="{{ route('frontend.search') }}">
                            <div class="form-group">
                                <input type="search" name="query" value="" placeholder="Search Here" required>
                                <button type="submit" class="search-btn"><i class="fa fa-search" style="color:tomato"></i></button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <!-- Main Menu End-->

    <!-- Hidden Nav Toggler -->
    <div class="nav-toggler">
        <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
    </div>

</div>
</div>
</div>
<!--End Header Lower-->

<!--Sticky Header-->
<div class="sticky-header">
<div class="auto-container clearfix">
<!--Logo-->
<div class="logo pull-left" style="background-image: url('{{ asset(imagePath($about->site_logo, 'abouts')) }}');background-size: contain;">
    <a href="{{ route('frontend.home') }}" class="img-responsive" title=""></a>
</div>

<!--Right Col-->
<div class="right-col pull-right">
    <!-- Main Menu -->
    <nav class="main-menu">
        <div class="navbar-header">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse clearfix">
            <ul class="navigation clearfix">
                <li class="{{ request()->routeIs('frontend.home') ? 'current' : '' }}"><a href="{{ route('frontend.home') }}">Home</a>

                </li>
                @foreach($menu_categories as $category)
                @if($category->articles->count() > 0)
                <li class="{{ request()->is($category->slug . '/show') ? 'current' : '' }}">

                    <a href="{{ route('frontend.categories', $category) }}">{{ $category->name }}

                    <span class="badge badge-danger" style="background:royalblue;"> {{ $category->articles->count() }} </span>

                    </a>
                </li>
                @endif
                @endforeach
                <li class="{{ request()->routeIs('frontend.gallery') ? 'current' : '' }}"><a href="{{ route('frontend.gallery') }}">Gallery</a></li>

                <li class="{{ request()->routeIs('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

                <li class="{{ request()->routeIs('frontend.contact') ? 'current' : '' }}"><a href="{{ route('frontend.contact') }}">Contact</a></li>

            </ul>
        </div>
    </nav><!-- Main Menu End-->
    

</div>

</div>
</div>
<!--End Sticky Header-->

</header>
<!--End Header Style Two -->

<!-- Hidden Navigation Bar -->
<section class="hidden-bar left-align">

<div class="hidden-bar-closer">
<button><span class="qb-close-button"></span></button>
</div>

<!-- Hidden Bar Wrapper -->
<div class="hidden-bar-wrapper">
<div class="logo" style="background-image: url('{{ asset(imagePath($about->site_logo, 'abouts')) }}');height:100px;">
<a href="{{ route('frontend.home') }}"></a>
</div>
<!-- .Side-menu -->
<div class="side-menu">
<!--navigation-->
<ul class="navigation clearfix">
    <li class="{{ request()->routeIs('frontend.home') ? 'current' : '' }}"><a href="{{ route('frontend.home') }}">Home</a>

    </li>
    @foreach($menu_categories as $category)
        @if($category->articles->count() > 0)
        <li class="{{ request()->is($category->slug . '/show') ? 'current' : '' }}">
            <a href="{{ route('frontend.categories', $category) }}">{{ $category->name }}

                <span class="badge badge-danger" style="background:royalblue;"> {{ $category->articles->count() }} </span>

            </a>
        </li>
        @endif
    @endforeach
    <li class="{{ request()->routeIs('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

    <li class="{{ request()->routeIs('frontend.contact') ? 'current' : '' }}"><a href="{{ route('frontend.contact') }}">Contact</a></li>

</ul>
</div>
<!-- /.Side-menu -->

<!--Options Box-->
<div class="options-box">
<!--Social Links-->
<ul class="social-links clearfix">
    <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook-f"></span></a></li>
</ul>

</div>

</div><!-- / Hidden Bar Wrapper -->

</section>
<!-- End / Hidden Bar -->
