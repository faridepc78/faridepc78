<div class="last-portfolio">
    <div class="cover">
        <div class="dot-connect top">
            <div class="line"></div>
            <i class="fi fi-dot-inside-circle"></i>
        </div>
        <div class="wrapper">
            <h2 class="title">آخرین نمونه کارها</h2>
            <div class="description">
                {{@$setting->portfolio_text}}
            </div>
            <div class="items clearfix">

                @if(count($portfolio))

                    @foreach($portfolio as $value)

                        <div class="item col-xs-12 col-sm-4 col-md-3">
                            <div class="i-content">
                                <div class="i-header">
                                    <img src="{{$value->image->original}}" alt="{{$value->name}}" class="img-fluid">
                                </div>
                                <div class="ic-content">
                                    <div class="ic-title">
                                        <a href="{{$value->path()}}">{{$value->name}}</a>
                                    </div>
                                    <div class="ic-description">{{$value->headline}}</div>
                                    <a href="{{$value->path()}}"
                                       class="show-more">مشاهده کامل</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif

            </div>
            <a href="{{route('works')}}" class="show-more-items">
                نمونه کارهای بیشتر <i class="fi fi-left-arrow"></i>
            </a>
        </div>
    </div>
</div>
