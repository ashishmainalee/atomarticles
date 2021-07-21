<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ $about->site_name }}" />
    <meta name="author" content="{{ $about->site_name }}" />
    <meta name="description" content="{{ Str::limit($about->site_description, '150') }}" />
    @if($site_title)
    <meta name="current_page" content="{{ $site_title }}" />
    @endif
    <meta name="url" content="{{ Request::url()  }}" />
    <meta name="facebook" content="{{ $about->facebook }}" />

    <title>{{ $site_title ?? $about->site_name }}</title>
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

    <!--Color Themes-->
    
    <link id="theme-color-file" href="{{ asset('frontend/css/color-themes/default-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    
    @section('headerStyles')
    @show

    <!-- favicon icon -->
    <link rel="shortcut icon" type="image/ico" href="{{ asset('uploads/favicon.png') }}" />

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
    /* span {
        color: white;
    } */
</style>
</head>

{{-- <body onclick='window.location.href="http://www.google.com"'> --}}
<body>
    <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

