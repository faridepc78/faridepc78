<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">

    @yield('title')

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
          content="وب سایت شخصی فرید شیشه بری, برنامه نویس حرفه ای وب,, برنامه نویس حرفه ای PHP, برنامه نویس حرفه ای, یزد">
    <meta name="description"
          content="فرید شیشه بری برنامه نویس حرفه ای وب در ایران می باشد که سال های زیادی بصورت تخصصی به برنامه نویسی تخصصی مشغول می باشد.">
    <meta name="theme-color" content="#27ae60">

    <base href="http://faridepc78.test/">

    <link rel="icon" href="{{ asset('site/img/favicon.ico') }}" type="image/x-icon">

    @yield('load_css')

</head>

<body data-lang-id="36" data-alert-successful="موفق" data-alert-unsuccessful="ناموفق" data-dir="rtl">

<div class="body-content">

    @yield('data_page')

        <div class="wrapper full-menu">
            <div class="menu right-menu">
                <ul class="clearfix">
                    <li class="active">
                        <a href="index.html">صفحه اصلی</a>
                    </li>
                    <li>
                        <a href="about-me.html">درباره من</a>
                    </li>
                    <li>
                        <a href="contact-me.html">تماس با من</a>
                    </li>
                    <li>
                        <a href="blog/">بلاگ</a>
                    </li>
                </ul>
            </div>
            <div class="logo-area">
                <div class="logo">
                    <img src="{{ asset('site/img/logo.png') }}" class="img-fluid" alt="فرید شیشه بری">
                </div>
            </div>
            <div class="menu left-menu">
                <ul class="clearfix">
                    <li>
                        <a href="works/">نمونه کارها</a>
                    </li>
                    <li>
                        <a href="pages/payment-پرداخت-اینترنتی-هزینه-پروژه-ها-و-کارها.html">پرداخت آنلاین</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="responsive-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://aminbahrami.ir/">
                        <div class="logo-area">
                            <div class="logo">
                                <img src="site/img/logo.png" class="img-fluid" alt="امین بهرامی">
                            </div>
                        </div>
                        <h1 class="site-owner">امین بهرامی</h1>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="https://aminbahrami.ir/">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="pages/about-اطلاعات-کامل-درباره-امین-بهرامی،-برنامه-نویس-حرفه-ای.html">درباره
                                من</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/contact-اطلاعات-تماس-برنامه-نویس-سایت-و-موبایل.html">تماس با
                                من</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog/">بلاگ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="criticism/">از من انتقاد کن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="works/">نمونه کارها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/payment-پرداخت-اینترنتی-هزینه-پروژه-ها-و-کارها.html">پرداخت
                                آنلاین</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
