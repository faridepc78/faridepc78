@section('title')
    <title>فرید شیشه بری | صفحه اصلی</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/owl.carousel.min.css') }}'>
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
            <script type="text/javascript" src='{{ asset('site_assets/js/pages/home.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/owl.carousel.min.js') }}'></script>
@endsection

@include('site.layout.footer')
