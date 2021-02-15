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

    <base href="{{asset('/')}}">

    <link rel="icon" href="{{ asset('site/img/favicon.ico') }}" type="image/x-icon">

    @yield('load_css')

</head>

<body data-dir="rtl">

<div class="body-content">

    @yield('data_page')

        <div class="wrapper full-menu">

            <div class="menu right-menu">

                @yield('right-menu')

            </div>

            <div class="logo-area">
                <div class="logo">
                    <img src="{{ asset('site/img/logo.png') }}" class="img-fluid" alt="فرید شیشه بری">
                </div>
            </div>

            @yield('left-menu')

        </div>

        <div class="responsive-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://aminbahrami.ir/">
                        <div class="logo-area">
                            <div class="logo">
                                <img src="{{ asset('site/img/logo.png') }}" class="img-fluid" alt="فرید شیشه بری">
                            </div>
                        </div>
                        <h1 class="site-owner">فرید شیشه بری</h1>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#menu"
                            aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu">

                    @yield('responsive-menu')

                </div>
            </nav>
        </div>

    </div>
