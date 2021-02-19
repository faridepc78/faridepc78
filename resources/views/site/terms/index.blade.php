@section('title')
    <title>فرید شیشه بری |قوانین و مقررات</title>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="terms">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="terms">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{route('terms')}}">قوانین و مقررات</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="javascript:void(0)">قوانین و مقررات</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content public-page" data-page="terms">
            <div class="wrapper-970 clearfix">
                <div class="pb-header">
                    <div class="title">
                        <h2>قوانین و مقررات</h2>
                    </div>
                </div>
                <div class="pb-content">
                    <p>{!! $setting->rule !!}</p>
                </div>
            </div>
        </div>

@include('site.layout.footer')
