@section('title')
    <title>فرید شیشه بری | صفحه اصلی</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/owl.carousel.min.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="home">
        @endsection

        @section('right-menu')
            <ul class="clearfix">
                <li class="active">
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
                    <li>
                        <a href="{{route('terms')}}">قوانین و مقررات</a>
                    </li>
                </ul>
            </div>
        @endsection

        @section('responsive-menu')

            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
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
            </ul>

        @endsection

        @include('site.layout.header')

        <div class="page-content" data-page="home">

            @include('site.index.main-header')

            @include('site.index.services')

            @include('site.index.trust')

            @include('site.index.portfolio')

            @include('site.index.customers')

            @include('site.index.blog')

            @include('site.index.specialities')

        </div>

        @section('load_js')
            <script src='{{ asset('site/js/jquery-3.2.0.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/bootstrap.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/public.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/pages/home.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/owl.carousel.min.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
