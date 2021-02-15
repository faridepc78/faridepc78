<div class="my-specialities">
    <div class="cover">
        <div class="wrapper">
            <h2 class="title">روی من میتونید حساب کنید</h2>
            <div class="description">تخصص‌ها و دانش‌هایی که دارم</div>
            <div class="items clearfix">

                @if(count($expertise))

                    @foreach($expertise as $item)

                        <div class="item col-xs-12 col-sm-6 col-md-3">
                            <div class="i-content">
                                <a href="{{$item->path()}}">
                                    <img src="{{$item->image->thumb}}" alt="{{$item->name}}">
                                    {{$item->name}} </a>
                            </div>
                        </div>

                    @endforeach

                @endif

            </div>
            <div class="text-center">
                <a href="{{route('expertise')}}" class="show-more-items">
                    مشاهده لیست کامل <i class="fi fi-left-arrow"></i>
                </a>
            </div>
            <div class="specialities-description">
                {{$setting->footer_text}}
            </div>
        </div>
    </div>
</div>
