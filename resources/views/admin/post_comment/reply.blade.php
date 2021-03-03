@section('title')
    <title>پنل مدیریت فرید شیشه بری | زیر نظرات پست ({{ $postComment->post->name }})</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/comment.css?v='.uniqid()) }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/fonticon.css') }}">
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
                        <li class="breadcrumb-item"><a
                                href="{{route('postComment.showComment',$postComment->post->id)}}">
                                لیست نظرات پست
                                ({{ $postComment->post->name }})
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('postComment.reply',$postComment->id)}}">جزئیات
                                نظرات({{$postComment->user_name}})</a></li>
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

                                                <div class="comments-items">

                                                    @if($postComment)

                                                        <div class="item" data-type="{{$postComment->role()}}"
                                                             data-id="{{$postComment->id}}"
                                                             id="comment{{$postComment->id}}">
                                                            <div class="avatar-area">
                                                                <img class="img-circle" src="{{$postComment->gravatar}}"
                                                                     alt="{{$postComment->user_name}}">
                                                                <div class="comment-id">
                                                                    <a href="{{route('postComment.reply',$postComment->id)}}#comment{{$postComment->id}}">#{{$postComment->id}}</a>
                                                                </div>
                                                            </div>
                                                            <div class="content-area">
                                                                <div class="ca-content">
                                                                    {{$postComment->text}}
                                                                    <div class="ca-bottom clearfix">
                                                                        <div class="c-details">
                                                                            <div
                                                                                class="full_name">{{$postComment->user_name}}</div>
                                                                            <div
                                                                                class="full_name">{{$postComment->user_email}}</div>
                                                                            <div
                                                                                class="full_name">{{$postComment->user_ip}}</div>
                                                                            <div
                                                                                class="full_name">{!! $postComment->status() !!}</div>

                                                                            <div class="full_name">
                                                                                @if($postComment->status==\App\Models\PostComment::PENDING_STATUS)

                                                                                    <a class="btn btn-default"
                                                                                       href="{{ route('postComment.active_status', [$postComment->id,$postComment->id]) }}"
                                                                                       onclick="commentActiveStatus(event,{{ $postComment->id }}, {{ $postComment->id }})"><i
                                                                                            class="fa fa-check text-success"></i></a>

                                                                                    <a class="btn btn-default"
                                                                                       href="{{ route('postComment.inactive_status', [$postComment->id,$postComment->id]) }}"
                                                                                       onclick="commentInactiveStatus(event,{{ $postComment->id }}, {{ $postComment->id }})"><i
                                                                                            class="fa fa-remove text-danger"></i></a>

                                                                                    <form
                                                                                        action="{{ route('postComment.active_status', [$postComment->id,$postComment->id]) }}"
                                                                                        method="post"
                                                                                        id="commentActiveStatus-{{ $postComment->id }}-{{ $postComment->id }}">
                                                                                        @csrf
                                                                                        @method('patch')
                                                                                    </form>

                                                                                    <form
                                                                                        action="{{ route('postComment.inactive_status', [$postComment->id,$postComment->id]) }}"
                                                                                        method="post"
                                                                                        id="commentInactiveStatus-{{ $postComment->id }}-{{ $postComment->id }}">
                                                                                        @csrf
                                                                                        @method('patch')
                                                                                    </form>

                                                                                @elseif($postComment->status==\App\Models\PostComment::INACTIVE_STATUS)

                                                                                    <a class="btn btn-default"
                                                                                       href="{{ route('postComment.active_status', [$postComment->id,$postComment->id]) }}"
                                                                                       onclick="commentActiveStatus(event, {{ $postComment->id }},{{ $postComment->id }})"><i
                                                                                            class="fa fa-check text-success"></i></a>

                                                                                    <form
                                                                                        action="{{ route('postComment.active_status', [$postComment->id,$postComment->id]) }}"
                                                                                        method="post"
                                                                                        id="commentActiveStatus-{{ $postComment->id }}-{{ $postComment->id }}">
                                                                                        @csrf
                                                                                        @method('patch')
                                                                                    </form>

                                                                                @elseif($postComment->status==\App\Models\PostComment::ACTIVE_STATUS)

                                                                                    <a class="btn btn-default"
                                                                                       href="{{ route('postComment.inactive_status', [$postComment->id,$postComment->id]) }}"
                                                                                       onclick="commentInactiveStatus(event, {{ $postComment->id }},{{ $postComment->id }})"><i
                                                                                            class="fa fa-remove text-danger"></i></a>

                                                                                    <form
                                                                                        action="{{ route('postComment.inactive_status', [$postComment->id,$postComment->id]) }}"
                                                                                        method="post"
                                                                                        id="commentInactiveStatus-{{ $postComment->id }}-{{ $postComment->id }}">
                                                                                        @csrf
                                                                                        @method('patch')
                                                                                    </form>

                                                                                @endif
                                                                            </div>

                                                                            <div class="full_name">
                                                                                <a class="btn btn-danger"
                                                                                   href="{{ route('postComment.destroy', [$postComment->id,$postComment->id]) }}"
                                                                                   onclick="destroyPostComment(event, {{ $postComment->id }},{{ $postComment->id }})">
                                                                                    حذف
                                                                                </a>
                                                                                <form
                                                                                    action="{{ route('postComment.destroy', [$postComment->id,$postComment->id]) }}"
                                                                                    method="post"
                                                                                    id="destroy-postComment-{{ $postComment->id }}-{{ $postComment->id }}">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                </form>
                                                                            </div>

                                                                            <div
                                                                                class="full_name">{{ $postComment->users==\App\Models\PostComment::COMMON_USER ? 'کاربر' : 'مدیر' }}</div>
                                                                            <div
                                                                                class="date">{{\Hekmatinasser\Verta\Verta::createTimestamp($postComment->created_at)->format('l j F Y - H:i:s')}}</div>
                                                                        </div>
                                                                        <div class="reply"
                                                                             data-id="{{$postComment->id}}"
                                                                             data-name="{{$postComment->user_name}}">
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

                                                    @endif

                                                </div>

                                            </div>

                                            <div class="send-comment" id="sendComment"
                                                 data-article-url="{{route('postComment.reply',$postComment->id)}}">

                                                <form class="form clearfix" id="frmSendComment" method="post">

                                                    @csrf

                                                    <div class="col-md-12 answer-to-comment">
                                                        <div class="answer-field-area">
                                                            <div class="af-title">پاسخ به</div>
                                                            <div class="who-area">
                                                                <div class="comment-id">
                                                                    <a href="#">#</a>
                                                                </div>
                                                                <div class="name">
                                                                    <div class="value">#</div>
                                                                </div>
                                                                <div class="remove-area">
                                                                    <div class="remove">
                                                                        <i class="fi fi-cancel fi-lg"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <input id="post_comment_id" name="post_comment_id" value="0"
                                                               type="hidden">
                                                    </div>

                                                    <div class="col-md-12 input-item">
                            <textarea onkeyup="this.value=removeSpaces(this.value);" id="text"
                                      class="form-control input textarea"
                                      placeholder="لطفا پیام خود را وارد کنید *"
                                      name="text" required></textarea>
                                                        <label id="text-error" class="error" for="text"></label>
                                                    </div>

                                                    <div class="col-md-12 input-item send-button-area">
                                                        <div class="loading">
                                                            <div class="bounce1"></div>
                                                            <div class="bounce2"></div>
                                                            <div class="bounce3"></div>
                                                        </div>
                                                        <button type="submit" class="send-button">ارسال</button>
                                                    </div>

                                                </form>

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

@section('js')
    <script type="text/javascript" src="{{ asset('admin_assets/dist/js/comment.js') }}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">
    function commentActiveStatus(event, parent_id, id) {
        event.preventDefault();
        document.getElementById(`commentActiveStatus-${parent_id}-${id}`).submit();
    }

    function commentInactiveStatus(event, parent_id, id) {
        event.preventDefault();
        document.getElementById(`commentInactiveStatus-${parent_id}-${id}`).submit();
    }

    $('#frmSendComment').submit(function (event) {
        event.preventDefault();
        var post_comment_id = $('#post_comment_id').val();
        var parent_id ={{ $postComment->id }};
        if (post_comment_id==0){
            var url = window.location.origin + '/admin/post_comment/' + parent_id + '/admin_comment';
        }else {
            var url = window.location.origin + '/admin/post_comment/' + parent_id + '/admin_reply/' + post_comment_id;
        }
        $(this).attr('action', url);
        $(this).unbind('submit').submit();
    });

    function destroyPostComment(event, parent_id, id) {
        event.preventDefault();
        Swal.fire({
            title: 'آیا از حذف اطمینان دارید ؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221, 51, 51)',
            cancelButtonColor: 'rgb(48, 133, 214)',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-postComment-${parent_id}-${id}`).submit()
            }
        })
    }
</script>
