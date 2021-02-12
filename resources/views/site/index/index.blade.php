@section('title')
    <title>فرید شیشه بری | صفحه اصلی</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site/css/bootstrap.min.v5b9944e4.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fonticon.v5fa83fde.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/fa.min.v5db2b596.css') }}'>
    <link rel='stylesheet' href='{{ asset('site/css/owl.carousel.min.v58b60b10.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="home">
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
            <script src='{{ asset('site/js/jquery-3.2.0.min.v58ceb168.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/bootstrap.min.v5b56b10a.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/public.v5d7a0f0c.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/pages/home.v5d27bfb0.js') }}' type="text/javascript"></script>
            <script src='{{ asset('site/js/owl.carousel.min.v58b60b10.js') }}' type="text/javascript"></script>
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
