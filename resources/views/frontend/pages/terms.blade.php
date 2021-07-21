@extends('frontend.layouts.app')

@section('main-content')
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>{{ $about->site_name }}</h2>
                </div>
                <div class="pull-right">
                    <ul class="page-title-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}"><span class="fa fa-home"></span>Home</a></li>
                        <li>Site Terms & Conditions</li>
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
                    <div class="content-column col-md-12 col-sm-12 col-xs-12">
                        <div class="content-inner">
                            <h2>{{ $about->site_name }} <span class="theme_color">Terms and Conditions</span></h2>
                            <div class="text">
                                <p>{!! $about->site_terms !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End About Section-->

@endsection