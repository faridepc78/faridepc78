<div class="i-can-do">
    <div class="dot-connect top">
        <div class="line"></div>
        <i class="fi fi-dot-inside-circle"></i>
    </div>
    <div class="wrapper">
        <h2 class="title">چه کارهایی می‌تونم بکنم؟</h2>
        <div class="description">همونطور که بالاتر گفتم، تخصص من برنامه نویسی هست. حالا بخوایم تقسیم‌بندی کنیم
            بخش‌ها رو، می‌تونم بگم توی سه بخش برنامه نویسی سایت، برنامه نویسی موبایل (اندروید و بزودی iOS) و
            آموزش دادن برنامه نویسی می‌تونم فعالیت کنم
        </div>

        <div class="items clearfix">

            @if(count($work))

                @foreach($work as $value)

                    <div class="item col-md-4">
                        <div class="i-content">
                            <div class="icon">
                                <img src="{{$value->image->thumb}}" class="img-fluid" alt="{{$value->title}}">
                            </div>
                            <h3 class="i-title">{{$value->title}}</h3>
                            <div class="i-description">{{$value->text}}</div>
                        </div>
                    </div>

                @endforeach

            @endif

        </div>

    </div>
    <div class="dot-connect bottom">
        <i class="fi fi-dot"></i>
        <div class="line"></div>
    </div>
</div>
