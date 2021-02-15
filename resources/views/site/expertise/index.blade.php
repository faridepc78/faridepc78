@section('title')
    <title>فرید شیشه بری | تخصص ها</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.v5b9944e4.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.v5fa83fde.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.v5db2b596.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="expertise">
        @endsection

        @include('site.layout.header')

    <div class="custom-page-header hidden-print" data-page="expertise">
        <div class="cover">
            <div class="wrapper">
                <h1 class="title">
                    <a href="expertise/">لیست دانش‌ها و تخصص‌هایی که دارم</a>
                </h1>
                <div class="breadcrumbs">
                    <ul class="clearfix">
                        <li><a href="https://aminbahrami.ir/">صفحه نخست</a></li>
                        <li><a href="expertise/">لیست دانش‌ها و تخصص‌هایی که دارم</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content expertise" data-page="expertise">
        <div class="wrapper clearfix pc-content">
            <div class="items">

                @if(count($expertise))

                    @foreach($expertise as $item)

                        <div class="col-sm-6 col-md-4 item">
                            <a href="{{$item->path()}}" class="i-content">
                                <div class="i-body">
                                    <div class="i-pic">
                                        <img src="{{$item->image->thumb}}" alt="{{$item->name}}">
                                    </div>
                                    <div class="ic-content">
                                        <h3 class="title">{{$item->name}}</h3>
                                        <p>{{Str::limit($item->text)}}</p>
                                    </div>
                                    <div class="i-next">
                                        <i class="fi fi-lg fi-left-open"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach

                @endif

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
