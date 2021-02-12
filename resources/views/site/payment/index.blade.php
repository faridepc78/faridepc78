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
    <div class="header hidden-print" data-page="payment">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="payment">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="pages/payment-پرداخت-اینترنتی-هزینه-پروژه-ها-و-کارها.html">پرداخت اینترنتی</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                            <li><a href="pages/payment-پرداخت-اینترنتی-هزینه-پروژه-ها-و-کارها.html">پرداخت اینترنتی</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content payment" data-page="payment">
            <div class="wrapper">
                <div class="p-content clearfix">
                    <div class="col-sm-6 text-area">
                        <h2 class="title"><a href="pages/payment-پرداخت-اینترنتی-هزینه-پروژه-ها-و-کارها.html">پرداخت
                                اینترنتی</a></h2>
                        <div class="text"><p>
                                در مورد پروژه‌هایی که می‌گیرم، معمولاً به این صورت کار می‌کنم که 40 درصد هزینه رو قبل از
                                شروع کار می‌گیرم. 30 درصد رو بعد از اتمام کار و نشون دادن به مشتری و رضایتش از کار
                                می‌گیرم و 30 درصد باقیمانده رو موقع تحویل پروژه.
                            </p>
                            <p>
                                معمولاً پرداخت‌ها از طریق درگاه‌های بانکیم و فرم روبرو صورت می‌گیره.
                            </p>
                            <p>
                                هزینه پروژه برای مشتریان خارج از کشور رو در حال حاضر بصورت دلار آمریکا می‌گیرم. البته
                                اجبار نیست. ولی خب فعلاً اینطوری با مشتریان خارج از کشور دارم کار می‌کنم.
                            </p>
                            <p>
                                در مورد هزینه‌ای که با مشتری توافق می‌کنم، با توجه به کیفیت کار و تجربه خودم مشخص
                                می‌کنم. پس اگر کار بی‌کیفیت یا کم کیفیت بخواید، من شرمنده اخلاق ورزشیتون هستم و نمی‌تونم
                                پروژه شما رو قبول کنم. :-)
                            </p></div>
                    </div>
                    <div class="col-sm-6 form-area">
                        <div class="form-content">
                            <div class="selectors">
                                <div class="item" data-id="30" data-sign="$">
                                    <div class="i-radio">
                                        <i class="radio-checked fi fi-lg fi-radio-checked"></i>
                                        <i class="radio-empty fi fi-lg fi-radio-empty"></i>
                                    </div>
                                    <div class="i-details">
                                        <div class="d-title">دلار آمریکا</div>
                                        <div class="d-description">مشتریان خارج از کشور که توافق کردیم بصورت ارزی هزینه
                                            رو بدن، از این قسمت می‌تونن استفاده کنند.
                                        </div>
                                    </div>
                                </div>
                                <div class="item active" data-id="29" data-sign="تومان">
                                    <div class="i-radio">
                                        <i class="radio-checked fi fi-lg fi-radio-checked"></i>
                                        <i class="radio-empty fi fi-lg fi-radio-empty"></i>
                                    </div>
                                    <div class="i-details">
                                        <div class="d-title">تومان <small>(از ریال خوشم نمیاد، همون تومان بهتره)</small>
                                        </div>
                                        <div class="d-description">مشتریان داخل کشور که بصورت تومانی می‌خوان هزینه رو
                                            بدن، از این قسمت استفاده کنند. حواستون باشه که مبلغ به تومانه‌هاا، یهو فکر
                                            نکنید ریاله 10 برابر پول پرداخت کنید :-)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="frmPayment" class="form clearfix" data-confirm="0"
                                  data-with-captcha="6LdLCbgUAAAAAKFHWTJ06RNvnvRyCxttRh7b5bnl">
                                <input type="hidden" name="token">
                                <input type="hidden" name="currencyTypeId" value="0">
                                <div class="col-md-6 input">
                                    <label>نام و نام خانوادگی</label>
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="fullName">
                                        <span class="icon">
<i class="fi fi-lg fi-user"></i>
</span>
                                    </div>
                                </div>
                                <div class="col-md-6 input">
                                    <label>شماره تماس</label>
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="phone">
                                        <span class="icon">
<i class="fi fi-lg fi-phone"></i>
</span>
                                    </div>
                                </div>
                                <div class="col-md-6 input">
                                    <label>آدرس ایمیل</label>
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="email">
                                        <span class="icon">
<i class="fi fi-lg fi-email"></i>
</span>
                                    </div>
                                </div>
                                <div class="col-md-6 input">
                                    <label>عنوان پرداخت</label>
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="paymentTitle">
                                        <span class="icon">
<i class="fi fi-lg fi-invoice"></i>
</span>
                                    </div>
                                </div>
                                <div class="col-md-12 input">
                                    <label>مبلغ پرداختی</label>
                                    <div class="input-area">
                                        <input type="text" class="form-control" name="amount" maxlength="9">
                                        <span class="icon" data-name="showCurrencySign"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 input submit-area">
                                    <div class="center-block">
                                        <div class="loading">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-back">برگشت</button>
                                    <button type="submit" class="btn-payment" data-button-title="پرداخت"
                                            data-button-confirm-title="تأیید و پرداخت">پرداخت
                                    </button>
                                </div>
                            </form>
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
            <script src='{{ asset('site/js/pages/payment.v5f25b383.js') }}' type="text/javascript"></script>
            <script src='https://www.google.com/recaptcha/api.js?render=6LdLCbgUAAAAAKFHWTJ06RNvnvRyCxttRh7b5bnl'
                    type="text/javascript"></script>
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104848250-1"
                    type="text/javascript"></script>
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
