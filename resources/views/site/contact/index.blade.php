@section('title')
    <title>فرید شیشه بری | تماس با من</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.v5b9944e4.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.v5fa83fde.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.v5db2b596.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/sweetalert.v58dbc1d2.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="contact">
        @endsection

@include('site.layout.header')

<div class="custom-page-header hidden-print" data-page="contact">
    <div class="cover">
        <div class="wrapper">
            <h1 class="title">
                <a href="pages/contact-اطلاعات-تماس-برنامه-نویس-سایت-و-موبایل.html">تماس با من</a>
            </h1>
            <div class="breadcrumbs">
                <ul class="clearfix">
                    <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                    <li><a href="pages/contact-اطلاعات-تماس-برنامه-نویس-سایت-و-موبایل.html">تماس با من</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="page-content contact" data-page="contact">
    <div class="contact-form">
        <div class="wrapper clearfix pc-content">
            <h2 class="title">اگر کاری داری یا چیزی میخوای بگی...</h2>
            <form class="form clearfix" id="frmContact"
                  data-with-captcha="6LdLCbgUAAAAAKFHWTJ06RNvnvRyCxttRh7b5bnl">
                <input type="hidden" name="token">
                <div class="inputs-area col-sm-9">
                    <div class="description"><p>اگر دانش&zwnj;ها و تخصصی&zwnj;هایی که دارم رو خوندین و می&zwnj;خواید
                            که براتون پروژه&zwnj;ای انجام بدم و یا کمکی از دستم بر میاد، می&zwnj;تونید از طریق فرم
                            پایینی برام ارسال کنید. اگر سختتونه خب راه&zwnj;های تماس با من رو پایین&zwnj;تر براتون
                            گذاشتم. هر کدوم راحت&zwnj;تر بودید می&zwnj;تونید استفاده کنید.</p></div>
                    <div class="inputs clearfix">
                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input type="text" name="name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>اسمت چیه؟</label>
                            </div>
                        </div>
                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input type="text" name="phone">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>شماره تماست چنده؟</label>
                            </div>
                        </div>
                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input type="text" name="email">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>آدرس ایمیل؟</label>
                            </div>
                        </div>
                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input type="text" name="whereMeet">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>از کجا آشنا شدی باهام؟</label>
                            </div>
                        </div>
                        <div class="col-md-12 input">
                            <div class="material-input">
                                <textarea name="text"></textarea>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>متن پیام</label>
                            </div>
                        </div>
                        <div class="col-md-6 input send-button-area">
                            <div class="loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                            <button type="submit" class="send-button ripple-click">ارسال پیام</button>
                        </div>
                    </div>
                </div>
                <div class="icon col-sm-3">
                    <img src="site/img/contact.png" alt="تماس با من" class="img-fluid">
                </div>
            </form>
        </div>
    </div>
    <div class="contact-ways">
        <div class="cover">
            <div class="wrapper">
                <div class="ut-header">
                    <div class="title">راه‌های تماس با من</div>
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
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/1.png" alt="شماره موبایل">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a href="tel:09362161236" target="_blank">شماره موبایل</a></h3>
                                <div class="d-value"><a href="tel:09362161236" target="_blank">09362161236</a></div>
                                <div class="d-description">اگر زنگ زدین و جواب ندادم، پیامک بدید؛ خودم سر فرصت جواب
                                    میدم
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/2.png" alt="تلگرام">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a href="http://t.me/ABP1236" target="_blank">تلگرام</a></h3>
                                <div class="d-value"><a href="http://t.me/ABP1236" target="_blank">@ABP1236</a>
                                </div>
                                <div class="d-description">معمولاً همیشه تلگرام دارم. می‌تونید پیام بدید. ممکنه دیر
                                    جواب بدم. ولی جواب میدم
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/3.png" alt="ایمیل">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a
                                        href="/cdn-cgi/l/email-protection#3d5c5f4d135f5c554f5c50547d5a505c5451135e5250"
                                        target="_blank">ایمیل</a></h3>
                                <div class="d-value"><a
                                        href="/cdn-cgi/l/email-protection#afcecddf81cdcec7ddcec2c6efc8c2cec6c381ccc0c2"
                                        target="_blank"><span class="__cf_email__"
                                                              data-cfemail="8fcecddfa1cdeee7fdeee2e6cfe8e2eee6e3a1ece0e2">[email&#160;protected]</span></a>
                                </div>
                                <div class="d-description">ایمیل هم بدید بد نیست. می‌خونم و جواب میدم</div>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/4.png" alt="ایمیل اصلیم">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a
                                        href="/cdn-cgi/l/email-protection#cd8c8f9d8d8ca0a4a38faca5bfaca0a4e3a4bf"
                                        target="_blank">ایمیل اصلیم</a></h3>
                                <div class="d-value"><a
                                        href="/cdn-cgi/l/email-protection#0140435141406c686f43606973606c682f6873"
                                        target="_blank"><span class="__cf_email__"
                                                              data-cfemail="befffceefeffd3d7d0fcdfd6ccdfd3d790d7cc">[email&#160;protected]</span></a>
                                </div>
                                <div class="d-description">یهو دیدین گوگل تحریممون کرد :-) می‌تونید به این ایمیلم
                                    پیام بفرستید
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/5.png" alt="لینکدین">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a href="http://www.linkedin.com/in/ABP1236"
                                                       target="_blank">لینکدین</a>
                                </h3>
                                <div class="d-value"><a href="http://www.linkedin.com/in/ABP1236" target="_blank">@ABP1236</a>
                                </div>
                                <div class="d-description">لینکدین هم بد نیست اگر کسی خواست کانکت بشه</div>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-4 col-sm-6">
                        <div class="i-content">
                            <div class="logo-area">
                                <div class="logo">
                                    <img src="site/img/contact_way/6.png" alt="توییتر">
                                </div>
                            </div>
                            <div class="details-area">
                                <h3 class="d-title"><a href="http://www.twitter.com/ABP1236"
                                                       target="_blank">توییتر</a></h3>
                                <div class="d-value"><a href="http://www.twitter.com/ABP1236"
                                                        target="_blank">@ABP1236</a>
                                </div>
                                <div class="d-description">هنوز از توییتر خوشم نیومده. شاید بعداً خوشم بیاد. ولی
                                    قولتون نمی‌دم :-)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('load_js')
    <script src='{{ asset('site/js/jquery-3.2.0.min.v58ceb168.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/bootstrap.min.v5b56b10a.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/public.v5d7a0f0c.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/sweetalert.min.v57492be8.js') }}' type="text/javascript"></script>
    <script src='{{ asset('site/js/pages/contact.v5d7a1c96.js') }}' type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js?render=6LdLCbgUAAAAAKFHWTJ06RNvnvRyCxttRh7b5bnl'
            type="text/javascript"></script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104848250-1" type="text/javascript"></script>
    <script type="52d9c41e70e3399e341699f4-text/javascript">
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-104848250-1');




    </script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
            data-cf-settings="52d9c41e70e3399e341699f4-|49" defer=""></script>
@endsection

@include('site.layout.footer')
