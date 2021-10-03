@section('title')
    <title>فرید شیشه بری | درباره من</title>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="about">
        @endsection

@include('site.layout.header')

<div class="custom-page-header hidden-print" data-page="about">
    <div class="cover">
        <div class="wrapper">
            <h1 class="title">
                <a href="{{route('about-me')}}">درباره من</a>
            </h1>
            <div class="breadcrumbs">
                <ul class="clearfix">
                    <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                    <li><a href="javascript:void(0)">درباره من</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-content about" data-page="about">
        <div class="title-area">
            <div class="wrapper">
                <h2 class="title">معرفی و توضیحات در مورد خودم</h2>
            </div>
        </div>
        <div class="part1-about">
            <div class="wrapper">
                <div class="p-content">
                    <div class="text-area">
                        {!! @$setting->about1 !!}

                        <div class="social-networks">
                            <ul>

                                @if(count($social))

                                    @foreach($social as $item)

                                        <li><a title="{{$item->name}}" href="{{$item->link}}" target="_blank"><i
                                                    class="fi {{$item->icon}} fi-lg"></i></a></li>

                                    @endforeach

                                @endif

                            </ul>
                        </div>

                    </div>
                    <div class="space">
                    </div>
                </div>
            </div>
        </div>
        <div class="part2-about">
            <div class="wrapper">
                <div class="text clearfix">
                    <div class="me-area">
                        &ensp;
                        <img src="{{@$setting->image->original}}" class="img-fluid me" alt="{{@$setting->full_name}}">
                    </div>
                    {!! @$setting->about2 !!}
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>عنوان</th>
                                    <th>کجا یا برای کی؟</th>
                                    <th>کِی؟</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($resume))

                                    @foreach($resume as $value)

                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->customer}}</td>
                                            <td>{{$value->year}}</td>
                                        </tr>

                                    @endforeach

                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('site.layout.footer')
