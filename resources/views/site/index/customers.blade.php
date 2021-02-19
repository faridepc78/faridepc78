<div class="customers-comments">
    <div class="content clearfix">
        <div class="title-content">
            <div class="title">
                <div class="bold">مشتری‌ها</div>
                چی میگن؟
            </div>
            <div class="buttons">
                <div class="b-btn" data-type="prev"><i class="fi fi-right-arrow"></i></div>
                <div class="b-btn" data-type="next"><i class="fi fi-left-arrow"></i></div>
            </div>
        </div>
        <div class="items-content">
            <div class="items owl-carousel">

                @if(count($customer))

                    @foreach($customer as $value)

                        <div class="item">
                            <div class="item-content">
                                <div class="i-header">
                                    <div class="i-pic">
                                        <img src="{{asset('site_assets/img/customer_comment/no_pic.png')}}" alt="{{$value->name}}">
                                    </div>
                                    <div class="i-details">
                                        <h4 class="title">{{$value->name}}</h4>
                                        <div class="who">{{$value->from}}</div>
                                    </div>
                                </div>
                                <div class="i-content">
                                    {{$value->text}}
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
