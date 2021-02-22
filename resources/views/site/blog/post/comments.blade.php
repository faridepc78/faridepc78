<div class="comments-area" id="comments">
    <div class="comments">
        <div class="comments-title">نظرات دیگران ({{number_format($post->countComment())}})</div>

        <div class="comments-items">

            @if(count($comments))

                @foreach($comments as $value)

                    <div class="item" data-type="{{$value->users}}" data-id="{{$value->id}}" id="comment{{$value->id}}">
                        <div class="avatar-area">
                            <img class="img-circle" src="{{$value->gravatar}}" alt="{{$value->user_name}}">
                            <div class="comment-id">
                                <a href="{{$post->path()}}#comment{{$value->id}}">#{{$value->id}}</a>
                            </div>
                        </div>
                        <div class="content-area">
                            <div class="ca-content">
                                {{$value->text}}
                                <div class="ca-bottom clearfix">
                                    <div class="c-details">
                                        <div class="full_name">{{$value->user_name}}</div>
                                        <div
                                            class="date">{{\Hekmatinasser\Verta\Verta::createTimestamp($value->created_at)->format('l j F Y - H:i:s')}}</div>
                                    </div>
                                    <div class="reply" data-id="{{$value->id}}" data-name="{{$value->user_name}}">
                                        <i class="fi fi-reply fi-lg"></i>
                                        پاسخ
                                    </div>
                                </div>
                            </div>

                            <div class="answer">

                                @if(count($value->childrenComments))

                                    @foreach ($value->childrenComments as $item)
                                        @include('site.blog.post.child-comments', ['item' => $item])
                                    @endforeach

                                @endif

                            </div>

                        </div>
                    </div>

                    <div class="pagination mt-3">
                        {!! $comments->links() !!}
                    </div>

                @endforeach

            @endif

        </div>

    </div>

    <div class="send-comment" id="sendComment"
         data-article-url="{{$post->path()}}">

        <div class="title">لطفا نظر خود را بنویسید</div>

        <div class="description">ایمیلتون منتشر نمیشه، فقط برای داشتن اطلاعات بیشتره</div>

        <form class="form clearfix" id="frmSendComment">

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
                <input id="post_comment_id" name="post_comment_id" value="0" type="hidden">
            </div>

            <div class="col-sm-12">
                <input id="post_id" name="post_id" value="{{$post->id}}" type="hidden">
            </div>

            <div class="col-sm-6 input-item">
                <input onkeyup="this.value=removeSpaces(this.value);" id="user_name" type="text"
                       class="form-control input" placeholder="لطفا نام خود را وارد کنید *"
                       name="user_name">
                <label id="user_name-error" class="error" for="user_name"></label>
            </div>

            <div class="col-sm-6 input-item">
                <input onkeyup="this.value=removeSpaces(this.value);" id="user_email" type="text"
                       class="form-control input" placeholder="لطفا ایمیل خود را وارد کنید *"
                       name="user_email">
                <label id="user_email-error" class="error" for="user_email"></label>
            </div>

            <div class="col-md-12 input-item">
                            <textarea onkeyup="this.value=removeSpaces(this.value);" id="text"
                                      class="form-control input textarea"
                                      placeholder="لطفا پیام خود را وارد کنید *"
                                      name="text"></textarea>
                <label id="text-error" class="error" for="text"></label>
            </div>

            <div class="col-sm-6 input-item">
                {!! app('captcha')->display(); !!}
                <label id="recaptcha-error" class="error"></label>
            </div>

            <div class="col-md-6 input-item send-button-area">
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
