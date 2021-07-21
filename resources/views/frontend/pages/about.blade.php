@extends('frontend.layouts.app')
@section('main-content')
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>About {{ $about->site_name }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="page-title-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}"><span class="fa fa-home"></span>Home</a></li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--About Section-->
    <section class="about-section">

        <!--Author Info-->
        <div class="author-info">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Image Column-->
                    <div class="image-column col-md-4 col-sm-12 col-xs-12">
                        <div class="image">
                            <img src="{{ asset(imagePath($about->site_image, 'abouts')) }}" alt="" style="height:400px;width:400px;" />
                        </div>
                    </div>
                    <!--Image Column-->
                    <div class="content-column col-md-8 col-sm-12 col-xs-12">
                        <div class="content-inner">
                            <h2>About <span class="theme_color">{{ $about->site_name }}</span></h2>
                            <div class="text">
                                <p>{!! $about->site_description !!}</p>
                            </div>
                            <ul class="social-icon-one alternate">
                                <li><a href="{{ $about->facebook }}"><span class="fa fa-facebook"></span></a></li>
                                <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Site Policy Section-->
        <div class="skill-section grey-bg">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h2>Site Policy : <span class="theme_color"></span></h2>

                        <div class="text">
                        {!! Str::limit($about->site_policy, 800, '.....') !!}
                        </div>
                        <a href="{{ route('frontend.policies') }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="text">
                            <img src="{{ asset(imagePath($about->site_logo, 'abouts')) }}" style="width:380px;height:120px;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--End Policy Section-->

    </section>
    <!--End About Section-->

@endsection