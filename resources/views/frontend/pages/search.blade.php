@extends('frontend.layouts.app')

@section('main-content')
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h2><span style="color:green;">{{ $searchResults->count() }}</span> results found for
                            query "{{ request('query') }}"</h2>
                </div>
                <div class="pull-right">
                    <ul class="page-title-breadcrumb">
                        <li><a href="{{ route('frontend.home') }}"><span class="fa fa-home"></span>Home</a></li>
                        <li>Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    <!--End Page Title-->
    <!--Search Section-->
        <hr/>
        <div class="auto-container">
        @foreach($searchResults->groupByType() as $type => $modelSearchResults)
        <h5 style="color:green">{{ ucfirst($type) }} <span class="badge badge-success"> {{ $modelSearchResults->count() }} </span></h5>
        <hr />
        @foreach($modelSearchResults as $searchResult)
        <ul>
            <li> <i class="ti ti-arrow-right"></i>  <a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
        </ul>
        @endforeach
        @endforeach
        </div>
    <!--End Search Section-->

    </section>
    

@endsection