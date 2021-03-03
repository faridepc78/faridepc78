@section('title')
    <title>فرید شیشه بری | پست ({{$post->name}})</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/sweetalert.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/plugins/validation/css/validate.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/css/pagination.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="show_blog">
        @endsection

        @include('site.layout.header')


        <div class="custom-page-header hidden-print" data-page="show_blog">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{$post->path()}}">{{$post->name}}</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="{{route('posts')}}">بلاگ</a></li>
                            <li><a href="javascript:void(0)">{{$post->name}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content show-blog" data-page="show_blog">
            <div class="wrapper-970 clearfix">
                <div class="sb-header">
                    <div class="title">
                        <h2>{{$post->name}}</h2>
                    </div>
                    <div class="clearfix header-bottom">
                        <div class="date">
                            {{\Hekmatinasser\Verta\Verta::createTimestamp($post->created_at)->format('l j F Y - H:i:s')}}
                        </div>

                        <div class="details">
                            <div class="d-comments">
                                <div class="d-content">
                                    <i class="fi fi-comments fi-lg"></i>
                                    <span class="value">{{$post->countActiveComment()}}</span>
                                </div>
                            </div>
                            <div class="d-likes" data-id="{{$post->id}}" data-like-count="{{$post->like()}}" data-link="{{$post->isLikePostByIp() ? route('dislikePost',$post->id) : route('likePost',$post->id)}}">
                                <div class="d-content">
                                    <i id="like_icon" class="fi fi-heart fi-lg"
                                       style="color: {{$post->isLikePostByIp($post->id) ? 'red' : '#9E9E9E'}}"></i>
                                    <span class="value">{{number_format($post->like())}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="sb-content">

                    {!! $post->text !!}

                    <div class="content-bottom clearfix">

                        @include('site.blog.post.share')

                    </div>
                </div>

                @include('site.blog.post.comments')

            </div>
        </div>

        @section('load_js')
            <script src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/sweetalert.min.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/plugins/validation/js/jquery.validate.min.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/plugins/validation/js/methods.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/pages/show_blog.js?v='.uniqid()) }}'></script>
@endsection

@include('site.layout.footer')
