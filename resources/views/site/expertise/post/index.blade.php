@section('title')
    <title>فرید شیشه بری | تخصص ها</title>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="show_expertise">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="show_expertise">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{$expertise->path()}}">{{$expertise->name}}</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="{{route('expertise')}}">تخصص ها</a></li>
                            <li><a href="javascript:void(0)">{{$expertise->name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content public-page" data-page="show_expertise">
            <div class="wrapper-970 clearfix">
                <div class="pb-header">
                    <div class="title">
                        <h2><a style="font-weight: bold" href="{{$expertise->path()}}">{{$expertise->name}}</a></h2>
                    </div>
                </div>
                <div class="pb-content">
                    <p>{!! $expertise->text !!}</p>
                </div>
            </div>
        </div>

@include('site.layout.footer')
