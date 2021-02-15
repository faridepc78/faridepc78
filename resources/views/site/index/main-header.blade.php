<div class="main-header">
    <div class="main-header-cover">
        <div class="content">
            <div class="wrapper-970">
                <div class="c-title">
                    من
                    <div class="name">&lt;{{$setting->full_name}}/&gt;</div>
                    هستم
                </div>
                <div class="c-description">{{$setting->bio}}</div>
                <a href="pages/about-اطلاعات-کامل-درباره-امین-بهرامی،-برنامه-نویس-حرفه-ای.html"
                   class="about-me">اطلاعات بیشتر درباره من</a>
                <div class="social-networks">
                    <ul>

                        @if(count($social))

                            @foreach($social as $value)

                                <li>
                                    <a title="{{$value->name}}" href="{{$value->link}}" target="_blank"><i
                                            class="fi {{$value->icon}}"></i></a>
                                </li>

                            @endforeach

                        @endif

                    </ul>
                </div>
            </div>
            <div class="dot-connect">
                <i class="fi fi-dot"></i>
                <div class="line"></div>
            </div>
        </div>
    </div>
</div>
