@section('title')
    <title>فرید شیشه بری | وبلاگ</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/pagination.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="about">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="blog">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{route('posts')}}">بلاگ</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="javascript:void(0)">بلاگ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-content blog" data-page="blog">
                <div class="wrapper clearfix pc-content">
                    <div class="col-md-3 panel">
                        <div class="panel-item">
                            <div class="title">دسته‌بندی</div>
                            <div class="items">
                                <ul>

                                    @if(count($postCategory))

                                        @foreach($postCategory as $data)

                                            @if(isset($post_category_id) && $data->id==$post_category_id)
                                                <li class="active">
                                                    <img src="{{$data->image->thumb}}" alt="{{$data->name}}">
                                                    <a href="{{$data->path()}}">{{$data->name}}</a>
                                                    <div class="count">{{$data->countPostByCategoryId($data->id)}}</div>
                                                </li>
                                            @else
                                                <li>
                                                    <img src="{{$data->image->thumb}}" alt="{{$data->name}}">
                                                    <a href="{{$data->path()}}">{{$data->name}}</a>
                                                    <div class="count">{{$data->countPostByCategoryId($data->id)}}</div>
                                                </li>
                                            @endif

                                        @endforeach

                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 items-container">

                        <a class="telegram" href="https://t.me/ABPBlog" target="_blank">
                            <div class="t-icon">
                                <img src="{{asset('site_assets/img/telegram-logo.png')}}" alt="telegram channel">
                            </div>
                            <div class="t-content"><b>کانال تلگرام من</b>
                                <p>
                                    دوستانی که تمایل دارند پست هایی که توی سایت میزارم و یا اینکه اگر مورد مهمی پیش
                                    اومد، بهشون
                                    سریع پیام بدم، می تونن توی کانال تلگرام من عضو بشن.
                                </p></div>
                        </a>

                        <form id="frmSearch">
                            <div class="search-box">
                                <div class="input-area">
                                    <input type="text" class="search-input" name="txtSearch" placeholder="جستجو...">
                                </div>
                                <div class="input-operates">
                                    <div class="io-btn">
                                        <i class="fi fi-search fi-lg btn-search" id="btnSearch"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="d-none">
                        </form>

                        <div class="items clearfix">

                            @if(count($post))

                                @foreach($post as $value)

                                    <div class="item col-xs-12 col-md-4 col-sm-6" data-link-type="Internal">
                                        <div class="i-content">
                                            <div class="item-header">
                                                <img src="{{$value->image->thumb}}" class="img-fluid"
                                                     alt="{{$value->name}}">
                                                <div class="date">
                                                    <i class="fi fi-calendar"></i>
                                                    {{\Hekmatinasser\Verta\Verta::createTimestamp($value->created_at)->format('l j F Y')}}
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <h3 class="title"><a
                                                        href="{{$value->path()}}">{{$value->name}}</a></h3>
                                                <div class="text">
                                                    {!! Str::limit($value->text) !!}
                                                </div>
                                            </div>
                                            <div class="item-footer">
                                                <div class="if-item">
                                                    <i class="fi fi-eye-1 fi-lg"></i>
                                                    {{ number_format($value->view()) }}
                                                </div>
                                                <div class="if-item">
                                                    <i class="fi fi-comments-1 fi-lg"></i>
                                                    5
                                                </div>
                                                <div class="if-item">
                                                    <i class="fi fi-heart1 fi-lg"></i>
                                                    7
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endif

                        </div>

                        <div class="pagination mt-3">
                            {!! $post->links() !!}
                        </div>


                    </div>
                </div>
            </div>

            @section('load_js')
                <script src='{{ asset('site/js/pages/blog.js') }}' type="text/javascript"></script>
@endsection

@include('site.layout.footer')
