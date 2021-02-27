@section('title')
    <title>پنل مدیریت فرید شیشه بری | نظرات پست ها</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/comment.css')}}">
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('postComment.index')}}">لیست نظرات پست ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('postComment.show',$postComment->id)}}">جزئیات
                                نظرات پست({{$postComment->user_name}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">جزئیات نظرات پست({{$postComment->user_name}})</h3>
                        </div>

                        <div class="card-body">

                                <div class="header hidden-print" data-page="show_blog">

                                    <div class="page-content show-blog" data-page="show_blog">
                                        <div class="wrapper-970 clearfix">

                                            <div class="comments-area" id="comments">
                                                <div class="comments">
                                                    {{--      <div class="comments-title">نظرات دیگران ({{number_format($post->countComment())}})</div>--}}

                                                    <div class="comments-items">

                                                        @if($postComment)

                                                            <div class="item" data-type="{{$postComment->users}}" data-id="{{$postComment->id}}" id="comment{{$postComment->id}}">
                                                                <div class="avatar-area">
                                                                    <img class="img-circle" src="{{$postComment->gravatar}}" alt="{{$postComment->user_name}}">
                                                                    <div class="comment-id">
                                                                        <a href="{{$postComment->post->path()}}#comment{{$postComment->id}}">#{{$postComment->id}}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="content-area">
                                                                    <div class="ca-content">
                                                                        {{$postComment->text}}
                                                                        <div class="ca-bottom clearfix">
                                                                            <div class="c-details">
                                                                                <div class="full_name">{{$postComment->user_name}}</div>
                                                                                <div
                                                                                    class="date">{{\Hekmatinasser\Verta\Verta::createTimestamp($postComment->created_at)->format('l j F Y - H:i:s')}}</div>
                                                                            </div>
                                                                            <div class="reply" data-id="{{$postComment->id}}" data-name="{{$postComment->user_name}}">
                                                                                <i class="fi fi-reply fi-lg"></i>
                                                                                پاسخ
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="answer">

                                                                        @if(count($postComment->childrenComments))

                                                                            @foreach ($postComment->childrenComments as $item)
                                                                                @include('admin.post_comment.child-comments', ['item' => $item])
                                                                            @endforeach

                                                                        @endif

                                                                    </div>

                                                                </div>
                                                            </div>

                                                            {{--<div class="pagination mt-3">
                                                                {!! $comments->links() !!}
                                                            </div>--}}

                                                        @endif

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
