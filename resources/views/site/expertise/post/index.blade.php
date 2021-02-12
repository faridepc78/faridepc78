@section('title')
    <title>فرید شیشه بری | تخصص ها</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.v5b9944e4.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.v5fa83fde.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.v5db2b596.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="show_expertise">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="show_expertise">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="expertise/6-php-چیست.html">PHP</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                            <li><a href="expertise/">لیست دانش‌ها و تخصص‌هایی که دارم</a></li>
                            <li><a href="expertise/6-php-چیست.html">PHP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content public-page" data-page="show_expertise">
            <div class="wrapper-970 clearfix">
                <div class="pb-header">
                    <div class="title">
                        <h2><a href="expertise/6-php-چیست.html">PHP</a></h2>
                    </div>
                </div>
                <div class="pb-content">
                    <p>
                        اصلاً نگید PHP. بگید ماه. زبان برنامه نویسی که برای سایت و سمت سروراستفاده میشه. بسیار قدرتمند،
                        راحت، سریع و ... . نمی‌خوام از فواید PHP توضیح بدم. سعی می‌کنم فقط معرفیش کنم.
                    </p>
                    <p>
                        ما وقتی سایتی رو می‌نویسیم، چیزی که کاربر داره میبینه، همون HTML، CSS، JavaScript، عکس و چیزای
                        دیگه هست. ولی مغز اصلی رو که همه اینا رو مدیریت می‌کنه رو نمی‌تونیم ببینیم. PHP برای اینکه ریا
                        نشه، همه کارارو خودش انجام میده و نتیجه رو میده دست مرورگر. میگه اینو به کاربر نشون بده. اصلاً
                        هم نمی‌خوام که کاربر بدونه من همه این کارارو انجام دادم.
                    </p>
                    <p>
                        قبل از اینکه مثال بزنم بزارید یه نکته‌ای رو بگم. "هر چیزی که کاربر داره توی یه سایتی می‌بینه،
                        قابل ذخیره کردن یا دستکاری کردن رو داره"
                        <br>
                        این چیزی که گفتم یعنی چی؟ یه مثال. فرض کنید شما می‌خواید یه فیلمی رو از طرف یوتیوب دانلود کنید.
                        هر کاری می‌کنید نمیشه. ولی من میگم میشه. چون شما اون رو دیدید. پس هر چیزی که شما دارید می‌بینید
                        قابل دانلود و ذخیره کردن هست. حالا ممکنه یوتیوب کاری کنه که به راحتی نشه دانلودش کرد؛ ولی هر
                        کاری کنه باز هم راهی هست که بشه دورش زد.
                    </p>
                    <p>
                        خب گفتم هر چیزی که میبینیم رو می‌تونیم دستکاری کنیم. ولی چون PHP داره سمت سرور اجرا میشه و ما
                        فقط نتیجشو داریم می‌بینیم، دیگه کاربر نمی‌تونه دستکاریش کنه. چون کاربر فقط داره نتیجه رو
                        می‌بینه. خیلی از سایت‌ها به این نکته توجه نمی‌کنن که کاربر می‌تونه هر چیزی رو که میبینه دستکاری
                        کنه. پس سمت سرور رو دیگه چک نمی‌کنن. مثلاً سایت‌های دانشگاه‌ها معمولاً 90 درصدشون هک میشه. چون
                        این نکته رو رعایت نکردن. خیلی از سایت‌های دولتی هم همین مشکل رو داره.
                    </p>
                    <p>
                        خب خلاصه‌وار بخوام توضیح بدم در مورد PHP، یه زبان کد نویسی سمت سرور هست که درخواست‌های کاربر رو
                        از طرف مرورگر می‌گیره و پردازش می‌کنه، ذخیره می‌کنه و کلی کارای دیگه روش انجام می‌ده و بعد نتیجه
                        رو برمیگردونه به کاربر.
                    </p>
                </div>
            </div>
        </div>

        @section('load_js')
            <script src='{{ asset('site/js/jquery-3.2.0.min.v58ceb168.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/bootstrap.min.v5b56b10a.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/public.v5d7a0f0c.js') }}' type="text/javascript"></script>
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
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js"
                    data-cf-beacon='{"rayId":"60ed0d8b09580796","r":1,"version":"2020.12.2","si":10}'></script>
@endsection

@include('site.layout.footer')
