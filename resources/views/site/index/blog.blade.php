<div class="blog">
    <div class="cover">
        <div class="wrapper">
            <div class="items clearfix">
                <div class="section-header col-md-3">
                    <h3 class="title">وبلاگ</h3>
                    <div class="description">معمولاً در مورد مطالبی که برام جالب بوده و یا تخصصی و یا حتی آموزشی
                        هست توی بلاگم مطلب می‌نویسم؛ شاید به درد کسی بخوره.
                    </div>
                    <a href="blog/" class="show-more">
                        <i class="fi fi-archive fi-lg"></i>
                        مشاهده آرشیو بلاگ </a>
                </div>

                @if(count($post))

                    @foreach($post as $value)

                        <div class="item col-sm-6 col-md-3" data-link-type="Internal">
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
                                        {{number_format($value->view)}}
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
        </div>
    </div>
</div>
