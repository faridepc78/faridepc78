@section('title')
    <title>فرید شیشه بری | نمونه کار ها</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="works">
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

        <div class="custom-page-header hidden-print" data-page="works">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="works/">نمونه کارهای من طی 12 سال تجربه ای که دارم</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                            <li><a href="works/">نمونه کارهای من طی 12 سال تجربه ای که دارم</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content works" data-page="works">
            <div class="wrapper">
                <div class="category-items">
                    <ul>
                        <li><a href="{{route('works')}}">همه</a></li>

                        @if(count($portfolioCategory))

                            @foreach($portfolioCategory as $value)

                                @if(isset($portfolio_category_id) && $value->id==$portfolio_category_id)
                                    <li class="active"><a href="{{$value->path()}}">{{$value->name}}</a></li>
                                @else
                                    <li><a href="{{$value->path()}}">{{$value->name}}</a></li>
                                @endif

                            @endforeach

                        @endif

                    </ul>
                </div>

                <div class="items clearfix">

                    @if(count($portfolio))

                        @foreach($portfolio as $item)

                            <div class="col-xs-12 col-sm-4 col-md-3 item">
                                <div class="i-content">
                                    <div class="image">
                                        <a href="{{$item->path()}}">
                                            <img src="{{$item->image->thumb}}" alt="{{$item->name}}">
                                            <div class="cover">
                                                <div class="icon">
                                                    <i class="fi fi-search"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="i-footer">
                                        <h3 class="title"><a
                                                href="{{$item->path()}}">{{$item->name}}</a></h3>
                                        <div class="mini-description">{{$item->headline}}</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <div class="alert alert-info text-center container"><p>برای این دسته بندی نمونه کاری ثبت نشده است</p></div>

                    @endif

                </div>

<!--                <div class="pagination-content">
                    <div class="pagination">
                        <span class="number active">1</span><a href="works/page-2.html" class="number">2</a><a
                            href="works/page-3.html" class="number">3</a><a href="works/page-4.html"
                                                                            class="number">4</a><a
                            href="works/page-5.html" class="number">5</a></div>
                </div>-->

            </div>
        </div>

        @section('load_js')
            <script src='{{ asset('site/js/jquery-3.2.0.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/bootstrap.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/public.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
