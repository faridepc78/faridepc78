<div class="answer">
    <div class="item" data-type="{{$item->role()}}" data-id="{{$item->id}}" id="comment{{$item->id}}">
        <div class="avatar-area">
            <img class="img-circle"
                src="{{$item->gravatar}}"
                alt="{{$item->user_name}}">
            <div class="comment-id">
                <a href="{{$post->path()}}#comment{{$item->id}}">#{{$item->id}}</a>
            </div>
        </div>
        <div class="content-area">
            <div class="ca-content">
                {{$item->text}}
                <div class="ca-bottom clearfix">
                    <div class="c-details">
                        <div class="full_name">{{$item->user_name}}</div>
                        <div class="date">
                            {{\Hekmatinasser\Verta\Verta::createTimestamp($item->created_at)->format('l j F Y - H:i:s')}}
                        </div>
                        <div class="answer-to">
                            در پاسخ به <a
                                href="{{$post->path()}}#comment{{$item->parent_id}}">#{{$item->parent_id}}</a>
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

@if (count($item->ActiveComments))
        @foreach ($item->ActiveComments as $item)
            @include('site.blog.post.child-comments', ['item' => $item])
        @endforeach
@endif


