@section('title')
    <title>فرید شیشه بری | تخصص ها</title>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="expertise">
        @endsection

        @include('site.layout.header')

    <div class="custom-page-header hidden-print" data-page="expertise">
        <div class="cover">
            <div class="wrapper">
                <h1 class="title">
                    <a href="{{route('expertise')}}">تخصص ها</a>
                </h1>
                <div class="breadcrumbs">
                    <ul class="clearfix">
                        <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                        <li><a href="javascript:void(0)">تخصص ها</a></li>
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
                                        <p>{!! Str::limit($item->text) !!}</p>
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

@include('site.layout.footer')
