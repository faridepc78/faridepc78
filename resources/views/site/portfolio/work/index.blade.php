@section('title')
    <title>فرید شیشه بری | نمونه کارها</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/owl.carousel.min.css') }}'>
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

@section('data_page')
    <div class="header hidden-print" data-page="show_work">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="show_work">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{$portfolio->path()}}">{{$portfolio->name}}</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه نخست</a></li>
                            <li><a href="{{route('works')}}">نمونه کارهای من طی 12 سال تجربه ای که دارم</a></li>
                            <li><a href="{{$portfolio->path()}}">{{$portfolio->name}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content show-work" data-page="show_work">

            @if(count($portfolioSlider))

                <div class="images-area clearfix">
                    <div class="items owl-carousel" data-count="{{count($portfolioSlider)}}">

                        @foreach($portfolioSlider as $value)

                            <div class="item">
                                <div class="i-content">
                                    <img src="{{$value->image->thumb}}" class="img-fluid"
                                         alt="{{$value->name}}">
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

            @endif

            <div class="wrapper-970">
                <div class="pc-content">
                    <h2 class="title"><a href="{{$portfolio->path()}}">{{$portfolio->name}}</a></h2>

                    <div class="text">{!! $portfolio->text !!}</div>

                    <div class="details">
                        <div class="d-item">
                            <div class="i-field">
                                <i class="fi fi-customer"></i>
                                مشتری:
                            </div>
                            <div class="i-value">
                                {{$portfolio->customer}}
                            </div>
                        </div>
                        <div class="d-item">
                            <div class="i-field">
                                <i class="fi fi-calendar-1"></i>
                                تاریخ شروع:
                            </div>
                            <div class="i-value">
                                {{str_replace('-','/',$portfolio->start_date)}}
                            </div>
                        </div>
                        <div class="d-item">
                            <div class="i-field">
                                <i class="fi fi-calendar-1"></i>
                                تاریخ پایان:
                            </div>
                            <div class="i-value">
                                {{str_replace('-','/',$portfolio->end_date)}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="use-technologies">
                <div class="cover">
                    <div class="wrapper">
                        <div class="ut-header">
                            <div class="title">تکنولوژی‌ها و مواردی که توی این پروژه استفاده کردم</div>
                            <div class="line-area">
                                <div class="line-content">
                                    <div class="line"></div>
                                </div>
                                <span class="circle">
<i class="fi fi-circle fi-lg"></i>
</span>
                                <div class="line-content">
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="items clearfix">

                            @if(count($portfolioExpertise))

                                @foreach($portfolioExpertise as $value)

                                    <div class="item col-sm-6 col-md-4">
                                        <div class="i-content">
                                            <div class="logo-area">
                                                <div class="logo">
                                                    <img src="{{$value->image->thumb}}" alt="{{$value->name}}">
                                                </div>
                                            </div>
                                            <div class="details-area">
                                                <h3 class="d-title"><a href="{{$value->path()}}">{{$value->name}}</a></h3>
                                                <div class="d-description">
                                                    {{Str::limit($value->text)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="share-area">
                <div class="wrapper">
                    <h3 class="title">می‌تونی این پروژه رو با دوستات به اشتراک بذاری</h3>
                    <ul class="items">
                        <li data-color="#0077b5"><a
                                href="https://www.facebook.com/sharer.php?u=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html"
                                target="_blank"><i class="fi fi-lg fi-facebook-2"></i></a></li>
                        <li data-color="#1da1f2"><a
                                href="https://twitter.com/intent/tweet?url=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html&text=وب سایت لومیناتی"
                                target="_blank"><i class="fi fi-lg fi-twitter-2"></i></a></li>
                        <li data-color="#ea2b2b"><a
                                href="https://plus.google.com/share?url=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html"
                                target="_blank"><i class="fi fi-lg fi-gplus"></i></a></li>
                        <li data-color="#0077b5"><a
                                href="https://www.linkedin.com/shareArticle?url=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html&title=وب سایت لومیناتی"
                                target="_blank"><i class="fi fi-lg fi-linkedin"></i></a></li>
                        <li data-color="#0088cc"><a
                                href="https://telegram.me/share/url?url=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html&text=وب سایت لومیناتی"
                                target="_blank"><i class="fi fi-lg fi-telegram"></i></a></li>
                        <li data-color="#E1306C"><a
                                href="https://instagram.com/?url=https://aminbahrami.ir/works/69-وب-سایت-لومیناتی-سایت-سرمایه-گذاری-ارز-دیجیتال.html&text=وب سایت لومیناتی"
                                target="_blank"><i class="fi fi-lg fi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        @section('load_js')
            <script src='{{ asset('site/js/jquery-3.2.0.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/bootstrap.min.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/public.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/pages/show_work.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/owl.carousel.min.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
