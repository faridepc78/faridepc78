@section('title')
    <title>فرید شیشه بری |قوانین و مقررات</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="terms">
        @endsection

        @section('right-menu')
            <ul class="clearfix">
                <li>
                    <a href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <li>
                    <a href="{{route('about-me')}}">درباره من</a>
                </li>
                <li>
                    <a href="{{route('contact-me')}}">تماس با من</a>
                </li>
                <li>
                    <a href="{{route('blog')}}">بلاگ</a>
                </li>
            </ul>
        @endsection

        @section('left-menu')
            <div class="menu left-menu">
                <ul class="clearfix">
                    <li>
                        <a href="{{route('works')}}">نمونه کارها</a>
                    </li>
                    <li>
                        <a href="#">پرداخت آنلاین</a>
                    </li>
                    <li class="active">
                        <a href="{{route('terms')}}">قوانین و مقررات</a>
                    </li>
                </ul>
            </div>
        @endsection

        @section('responsive-menu')

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{route('about-me')}}">درباره من</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact-me')}}">تماس با من</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">بلاگ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('works')}}">نمونه کارها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">پرداخت آنلاین</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('terms')}}">قوانین و مقررات</a>
                </li>
            </ul>

        @endsection

        @include('site.layout.header')

    <div class="custom-page-header hidden-print" data-page="terms">
        <div class="cover">
            <div class="wrapper">
                <h1 class="title">
                    <a href="{{route('terms')}}">قوانین و مقررات</a>
                </h1>
                <div class="breadcrumbs">
                    <ul class="clearfix">
                        <li><a href="{{route('index')}}">صفحه نخست</a></li>
                        <li><a href="{{route('terms')}}">قوانین و مقررات</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><div class="page-content public-page" data-page="terms">
        <div class="wrapper-970 clearfix">
            <div class="pb-header">
                <div class="title">
                    <h2><a href="pages/terms-قوانین-و-مقررات.html">قوانین و مقررات</a></h2>
                </div>
            </div>
            <div class="pb-content">
                <p>{!! $setting->rule !!}</p>
            </div>
        </div>
    </div>
    @section('load_js')
        <script src='{{ asset('site/js/jquery-3.2.0.min.js') }}' type="text/javascript"></script>
        <script src='{{ asset('site/js/bootstrap.min.js') }}' type="text/javascript"></script>
        <script src='{{ asset('site/js/public.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
