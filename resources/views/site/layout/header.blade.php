<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">

    @yield('title')

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
          content="وب سایت شخصی فرید شیشه بری, برنامه نویس حرفه ای وب, برنامه نویس حرفه ای PHP, برنامه نویس حرفه ای,برنامه نویس یک یزد, یزد">
    <meta name="description"
          content="فرید شیشه بری برنامه نویس حرفه ای وب در ایران می باشد که سال های زیادی بصورت تخصصی به برنامه نویسی تخصصی مشغول می باشد.">
    <meta name="theme-color" content="#27ae60">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{asset('/')}}">

    <link rel="icon" href="{{ asset('site_assets/img/favicon.ico') }}" type="image/x-icon">
    <link rel='stylesheet' href='{{ asset('site_assets/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/css/fonticon.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/css/fa.min.css') }}'>
    <link rel="stylesheet" href="{{asset('site_assets/plugins/toast/css/toast.min.css')}}">

    @yield('load_css')

</head>

<body data-dir="rtl">

<div class="body-content">

    @yield('data_page')

    <div class="wrapper full-menu">

        <div class="menu right-menu">

            <ul class="clearfix">
                <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
                    <a href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <li class="{{ request()->routeIs('about-me') ? 'active' : '' }}">
                    <a href="{{route('about-me')}}">درباره من</a>
                </li>
                <li class="{{ request()->routeIs('contact-me') ? 'active' : '' }}">
                    <a href="{{route('contact-me')}}">تماس با من</a>
                </li>
                <li class="{{ request()->routeIs('posts') ? 'active' : '' }}">
                    <a href="{{route('posts')}}">بلاگ</a>
                </li>
            </ul>

        </div>

        <div class="logo-area">
            <div class="logo">
                <img src="{{ asset('site_assets/img/logo.png') }}" class="img-fluid" alt="{{@$setting->full_name}}">
            </div>
        </div>

        <div class="menu left-menu">
            <ul class="clearfix">
                <li class="{{ request()->routeIs('expertise') ? 'active' : '' }}">
                    <a href="{{route('expertise')}}">تخصص ها</a>
                </li>
                <li class="{{ request()->routeIs(['works','filterWorks']) ? 'active' : '' }}">
                    <a href="{{route('works')}}">نمونه کارها</a>
                </li>
                <li class="{{ request()->routeIs('payment') ? 'active' : '' }}">
                    <a href="{{route('payment')}}">پرداخت آنلاین</a>
                </li>
                <li class="{{ request()->routeIs('terms') ? 'active' : '' }}">
                    <a href="{{route('terms')}}">قوانین و مقررات</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="responsive-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('index')}}">
                    <div class="logo-area">
                        <div class="logo">
                            <img src="{{ asset('site_assets/img/logo.png') }}" class="img-fluid"
                                 alt="{{@$setting->full_name}}">
                        </div>
                    </div>
                    <h1 class="site-owner">{{@$setting->full_name}}</h1>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu"
                        aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('index')}}">صفحه اصلی</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about-me') ? 'active' : '' }}">
                        <a class="nav-link"
                           href="{{route('about-me')}}">درباره من</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact-me') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('contact-me')}}">تماس با من</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('posts') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('posts')}}">بلاگ</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('expertise') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('expertise')}}">تخصص ها</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs(['works','filterWorks']) ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('works')}}">نمونه کارها</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('payment') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('payment')}}">پرداخت آنلاین</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('terms') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('terms')}}">قوانین و مقررات</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>

</div>
