@section('title')
    <title>فرید شیشه بری | بلاگ-جستجو</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/pagination.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="search">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="search">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="javascript:void(0)">جستجو</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="{{route('posts')}}">بلاگ</a></li>
                            <li><a style="cursor: pointer"
                                   href="{{route('posts.search',['keyword'=>$keyword])}}">جستجوی {{$keyword}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content search" data-page="search">

            <div class="wrapper-970">
                <form id="frmSearch" action="{{route('posts.search')}}" method="get">
                    <div class="search-box">
                        <input type="text" class="search-input" name="keyword" placeholder="جستجو..."
                               value="{{$keyword}}">
                        <i class="fi fi-search fi-lg" id="btnSearch"></i>
                    </div>
                    <input type="submit" class="d-none">
                </form>

                <div class="items-area">

                    @if(count($post))

                        @foreach($post as $value)

                            <div class="items clearfix">
                                <div class="item">
                                    <h3 class="title"><a href="{{$value->path()}}"
                                                         target="_blank">{{$value->name}}</a></h3>
                                    <div class="link-area">
                                        <a href="{{$value->path()}}" target="_blank"
                                           class="link">{{route('index').'/post/'.$value->id.'-'.str_slug_persian($value->slug)}}</a>
                                    </div>
                                    <div class="description">{!! Str::limit($value->text) !!}</div>
                                    <div class="date">{{\Hekmatinasser\Verta\Verta::createTimestamp($value->created_at)->format('Y/n/j - H:i:s')}}</div>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <div class="alert alert-danger">در جستجو شما نتیجه ای یافت نشد</div>

                    @endif

                    <div class="pagination mt-3">
                        {!! $post->links() !!}
                    </div>

                </div>

            </div>
        </div>


        @section('load_js')
            <script src='{{ asset('site_assets/js/pages/search.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
