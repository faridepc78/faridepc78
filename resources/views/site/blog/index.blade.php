@section('title')
    <title>فرید شیشه بری | وبلاگ</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.v5b9944e4.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.v5fa83fde.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.v5db2b596.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="about">
        @endsection

@include('site.layout.header')

<div class="custom-page-header hidden-print" data-page="blog">
    <div class="cover">
        <div class="wrapper">
            <h1 class="title">
                <a href="blog/">بلاگ</a>
            </h1>
            <div class="breadcrumbs">
                <ul class="clearfix">
                    <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                    <li><a href="blog/">بلاگ</a></li>
                </ul>
            </div>
        </div>
    </div>

<div class="page-content blog" data-page="blog">
    <div class="wrapper clearfix pc-content">
        <div class="col-md-3 panel">
            <div class="panel-item">
                <div class="title">دسته‌بندی</div>
                <div class="items">
                    <ul>
                        <li>
                            <img src="site/img/blog_groups/1.png" alt="اعتراض">
                            <a href="blog/c1-اعتراض.html">اعتراض</a>
                            <div class="count">3</div>
                        </li>
                        <li>
                            <img src="site/img/blog_groups/4.png" alt="ابزار برنامه نویسی">
                            <a href="blog/c4-ابزار-برنامه-نویسی.html">ابزار برنامه نویسی</a>
                            <div class="count">1</div>
                        </li>
                        <li>
                            <img src="site/img/blog_groups/2.png" alt="متفرقه">
                            <a href="blog/c2-متفرقه.html">متفرقه</a>
                            <div class="count">7</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 items-container">
            <a class="telegram" href="https://t.me/ABPBlog" target="_blank">
                <div class="t-icon">
                    <img src="site/img/telegram-logo.png" alt="telegram logo">
                </div>
                <div class="t-content"><b>کانال تلگرام من</b>
                    <p>
                        دوستانی که تمایل دارند پست هایی که توی سایت میزارم و یا اینکه اگر مورد مهمی پیش اومد، بهشون
                        سریع پیام بدم، می تونن توی کانال تلگرام من عضو بشن.
                    </p></div>
            </a>
            <form id="frmSearch">
                <div class="search-box">
                    <div class="input-area">
                        <input type="text" class="search-input" name="txtSearch" placeholder="جستجو...">
                    </div>
                    <div class="input-operates">
                        <div class="io-btn">
                            <i class="fi fi-search fi-lg btn-search" id="btnSearch"></i>
                        </div>
                        <div class="io-btn">
                            <a href="https://aminbahrami.ir/rss.xml" target="_blank"
                               class="fi fi-rss fi-lg btn-rss"></a>
                        </div>
                    </div>
                </div>
                <input type="submit" class="d-none">
            </form>
            <div class="items clearfix">
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/19.v5e1a18b6.jpg" class="img-fluid"
                                 alt="نماد اعتماد الکترونیک (اینماد) پول زور می‌خواد">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                شنبه 21 دی 1398
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a href="blog/19-نماد-اعتماد-الکترونیک-اینماد-پول-زور-میخواد.html">نماد
                                    اعتماد الکترونیک (اینماد) پول زور می‌خواد</a></h3>
                            <div class="text">چند سال پیش نماد اعتماد الکترونیک اومد. بهش میگیم اینماد (Enamad)
                                مثلاً برای این بود که هر سایتی که درگاه پرداخت داره، باید نماد اعتماد بگیره. وگرنه
                                د...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                414
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                5
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                7
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/18.v5daacbb5.jpg" class="img-fluid"
                                 alt="رمز یکبار مصرف بانک‌ها امنیت ندارند!">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                شنبه 27 مهر 1398
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a
                                    href="blog/18-رمز-یکبار-مصرف-بانک-ها-امنیت-ندارند-و-روش-هک-کارت-بانکی.html">رمز
                                    یکبار مصرف بانک‌ها امنیت ندارند!</a></h3>
                            <div class="text">الان که این پست رو دارم می&zwnj;نویسم، بانک&zwnj;ها دارن تبلیغ گسترده
                                می&zwnj;کنند که مردم بیاید از رمز عبور یکبار مصرف استفاده کنید. اینطوری حساب بان...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                780
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                8
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                8
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/17.v5d7c07ec.jpg" class="img-fluid"
                                 alt="سایت لومیناتی و پرهام مراد زاده سرابی">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                شنبه 23 شهریور 1398
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a href="blog/17-سایت-لومیناتی-و-پرهام-مراد-زاده-سرابی.html">سایت
                                    لومیناتی و پرهام مراد زاده سرابی</a></h3>
                            <div class="text">سایت لومیناتی یه سایت برای سرمایه گذاری ارزهای دیجیتال بود که برای یه
                                مشتری برنامه نویسی کردم. این مشتری اسمش&nbsp;پرهام مراد زاده سرابی&nbsp;بود. سای...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                466
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                0
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                4
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/15.v5ce7990a.jpg" class="img-fluid"
                                 alt="فساد در کلانتری و نیروی انتظامی">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                جمعه 3 خرداد 1398
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a href="blog/15-درخواست-رشوه-و-فساد-در-کلانتری-و-نیروی-انتظامی.html">فساد
                                    در کلانتری و نیروی انتظامی</a></h3>
                            <div class="text">مطمئناً همتون شنیدین که نیروی انتظامی خیلی کثیفه. محاله یه نفر توی
                                نیروی انتظامی باشه، باهاش حرف بزنیم و این حرف رو نزنه. من خودم زیاد باور نمی‌کردم.
                                ...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                509
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                9
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                9
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/14.v5b8d91c4.jpg" class="img-fluid"
                                 alt="دنبال گرافیست خوب می‌گردی؟">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                دوشنبه 12 شهریور 1397
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a href="blog/14-طراح-و-گرافیست-حرفه-ای-سایت-و-اپلیکیشن.html">دنبال
                                    گرافیست خوب می‌گردی؟</a></h3>
                            <div class="text">اول یه توضیحی کوچیک بدم، بعد یه گرافیست خیلی کار درست رو بهتون معرفی
                                می‌کنم :-) برنامه نویس‌ها اگه خودشون بخوان تنهایی کار کنن، همون بهتر که کار نکنن ...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                1,672
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                1
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                8
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                    <div class="i-content">
                        <div class="item-header">
                            <img src="site/img/blog/12.v5b3f9d18.jpg" class="img-fluid"
                                 alt="باز نوبت فیلتر اینستاگرام شد">
                            <div class="date">
                                <i class="fi fi-calendar"></i>
                                جمعه 15 تیر 1397
                            </div>
                        </div>
                        <div class="item-content">
                            <h3 class="title"><a
                                    href="blog/12-فیلتر-اینستاگرام-و-فیلتر-هر-چیزی-که-خبرها-رو-سریع-پخش-میکنه.html">باز
                                    نوبت فیلتر اینستاگرام شد</a></h3>
                            <div class="text">الان که دارم این پست رو می‌نویسم، خبرهایی هست که می‌خوان اینستاگرام رو
                                هم فیلتر کنن!!! اونم به یه دلیل خیییلی مسخره. دلیلشون هم این گفتن که تعدادی افر...
                            </div>
                        </div>
                        <div class="item-footer">
                            <div class="if-item">
                                <i class="fi fi-eye fi-lg"></i>
                                845
                            </div>
                            <div class="if-item">
                                <i class="fi fi-comments-1 fi-lg"></i>
                                2
                            </div>
                            <div class="if-item">
                                <i class="fi fi-heart1 fi-lg"></i>
                                8
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination-content">
                <div class="pagination">
                    <span class="number active">1</span><a href="blog/page-2.html" class="number">2</a></div>
            </div>
        </div>
    </div>
</div>

@section('load_js')
    <script src='{{ asset('site/js/jquery-3.2.0.min.v58ceb168.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/bootstrap.min.v5b56b10a.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/public.v5d7a0f0c.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/pages/post.v5ad501d2.js') }}' type="text/javascript"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104848250-1" type="text/javascript"></script>
    <script type="52d9c41e70e3399e341699f4-text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-104848250-1');


    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="52d9c41e70e3399e341699f4-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
            data-cf-beacon='{"rayId":"60ed0d8b09580796","r":1,"version":"2020.12.2","si":10}'></script>
@endsection

@include('site.layout.footer')
