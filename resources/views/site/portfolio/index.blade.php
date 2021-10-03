@section('title')
    <title>فرید شیشه بری | نمونه کار ها</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/pagination.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="works">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="works">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{route('works')}}">نمونه کارها</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            @if((request()->routeIs('filterWorks')))
                                <li><a href="{{route('works')}}">نمونه کارها</a></li>
                                <li><a href="javascript:void(0)">{{$portfolioCategoryInfo->name}}</a></li>
                            @else
                                <li><a href="javascript:void(0)">نمونه کارها</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content works" data-page="works">
            <div class="wrapper">
                <div class="category-items">
                    <ul>
                        <li class="{{ request()->routeIs('works') ? 'active' : '' }}"><a href="{{route('works')}}">همه</a></li>

                        @if(count($portfolioCategory))

                            @foreach($portfolioCategory as $value)

                                @if(isset($portfolio_category_id) && $value->id==$portfolio_category_id)
                                    <li class="active"><a href="{{$value->path()}}">{{$value->name}}</a></li>
                                @else
                                    <li><a href="{{$value->path()}}">{{$value->name}}</a></li>
                                @endif

                            @endforeach

                        @endif

                    </ul>
                </div>

                <div class="items clearfix">

                    @if(count($portfolio))

                        @foreach($portfolio as $item)

                            <div class="col-xs-12 col-sm-4 col-md-3 item">
                                <div class="i-content">
                                    <div class="image">
                                        <a href="{{$item->path()}}">
                                            <img src="{{$item->image->original}}" alt="{{$item->name}}">
                                            <div class="cover">
                                                <div class="icon">
                                                    <i class="fi fi-search"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="i-footer">
                                        <h3 class="title"><a
                                                href="{{$item->path()}}">{{$item->name}}</a></h3>
                                        <div class="mini-description">{{$item->headline}}</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    @endif

                </div>

                <div class="pagination mt-3">
                    {!! $portfolio->links() !!}
                </div>

            </div>
        </div>

    @include('site.layout.footer')
