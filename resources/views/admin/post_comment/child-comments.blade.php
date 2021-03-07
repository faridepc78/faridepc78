<div class="answer">
    <div class="item" data-type="{{$item->role()}}" data-id="{{$item->id}}" id="comment{{$item->id}}">
        <div class="avatar-area">
            <img class="img-circle"
                 src="{{$item->gravatar}}"
                 alt="{{$item->user_name}}">
            <div class="comment-id">
                <a href="{{route('postComment.reply',$postComment->id)}}#comment{{$item->id}}">#{{$item->id}}</a>
            </div>
        </div>
        <div class="content-area">
            <div class="ca-content">
                {{$item->text}}
                <div class="ca-bottom clearfix">
                    <div class="c-details">
                        <div class="full_name">{{$item->user_name}}</div>
                        <div class="full_name">{{$item->user_email}}</div>
                        <div class="full_name">{{$item->user_ip}}</div>
                        <div class="full_name">{!! $item->status() !!}</div>

                        <div class="full_name">
                            @if($item->status==\App\Models\PostComment::PENDING_STATUS)

                                <a class="btn btn-default"
                                   href="{{ route('postComment.active_status', [$postComment->id,$item->id]) }}"
                                   onclick="commentActiveStatus(event,{{ $postComment->id }}, {{ $item->id }})"><i
                                        class="fa fa-check text-success"></i></a>

                                <a class="btn btn-default"
                                   href="{{ route('postComment.inactive_status', [$postComment->id,$item->id]) }}"
                                   onclick="commentInactiveStatus(event,{{ $postComment->id }}, {{ $item->id }})"><i
                                        class="fa fa-remove text-danger"></i></a>

                                <form
                                    action="{{ route('postComment.active_status', [$postComment->id,$item->id]) }}"
                                    method="post"
                                    id="commentActiveStatus-{{ $postComment->id }}-{{ $item->id }}">
                                    @csrf
                                    @method('patch')
                                </form>

                                <form
                                    action="{{ route('postComment.inactive_status', [$postComment->id,$item->id]) }}"
                                    method="post"
                                    id="commentInactiveStatus-{{ $postComment->id }}-{{ $item->id }}">
                                    @csrf
                                    @method('patch')
                                </form>

                            @elseif($item->status==\App\Models\PostComment::INACTIVE_STATUS)

                                <a class="btn btn-default"
                                   href="{{ route('postComment.active_status', [$postComment->id,$item->id]) }}"
                                   onclick="commentActiveStatus(event, {{ $postComment->id }},{{ $item->id }})"><i
                                        class="fa fa-check text-success"></i></a>

                                <form
                                    action="{{ route('postComment.active_status', [$postComment->id,$item->id]) }}"
                                    method="post"
                                    id="commentActiveStatus-{{ $postComment->id }}-{{ $item->id }}">
                                    @csrf
                                    @method('patch')
                                </form>

                            @elseif($item->status==\App\Models\PostComment::ACTIVE_STATUS)

                                <a class="btn btn-default"
                                   href="{{ route('postComment.inactive_status', [$postComment->id,$item->id]) }}"
                                   onclick="commentInactiveStatus(event, {{ $postComment->id }},{{ $item->id }})"><i
                                        class="fa fa-remove text-danger"></i></a>

                                <form
                                    action="{{ route('postComment.inactive_status', [$postComment->id,$item->id]) }}"
                                    method="post"
                                    id="commentInactiveStatus-{{ $postComment->id }}-{{ $item->id }}">
                                    @csrf
                                    @method('patch')
                                </form>

                            @endif
                        </div>

                        <div class="full_name">
                            <a class="btn btn-danger"
                               href="{{ route('postComment.destroy', [$postComment->id,$item->id]) }}"
                               onclick="destroyPostComment(event, {{ $postComment->id }},{{ $item->id }})">
                                حذف
                            </a>
                            <form
                                action="{{ route('postComment.destroy', [$postComment->id,$item->id]) }}"
                                method="post"
                                id="destroy-postComment-{{ $postComment->id }}-{{ $item->id }}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>

                        <div
                            class="full_name">{{ $item->users==\App\Models\PostComment::COMMON_USER ? 'کاربر' : 'مدیر' }}</div>
                        <div class="date">
                            {{\Hekmatinasser\Verta\Verta::createTimestamp($item->created_at)->format('l j F Y - H:i:s')}}
                        </div>
                        <div class="answer-to">
                            در پاسخ به <a
                                href="{{route('postComment.reply',$postComment->id)}}#comment{{$item->parent_id}}">#{{$item->parent_id}}</a>
                        </div>
                    </div>
                        <div class="reply" data-id="{{$item->id}}" data-name="{{$item->user_name}}">
                            <i class="fi fi-reply fi-lg"></i>
                            پاسخ
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (count($item->comments))
    @foreach ($item->comments as $item)
        @include('admin.post_comment.child-comments', ['item' => $item])
    @endforeach
@endif


