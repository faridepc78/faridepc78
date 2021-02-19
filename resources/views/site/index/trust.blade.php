<div class="why-trust-me">
    <div class="dot-connect top">
        <div class="line"></div>
        <i class="fi fi-dot-inside-circle"></i>
    </div>
    <div class="wrapper">
        <h2 class="title">دلیل <span class="bold">اعتماد</span> به من چیه؟</h2>
        <div class="description">
            {!! $setting->trust !!}
        </div>
        <div class="section-content">
            <div class="item top">
                <div class="i-description">
                    {!! $setting->trust_reason1 !!}
                </div>
                <div class="i-icon">
                    <i class="fi fi-trust"></i>
                </div>
                <div class="line-area">
                    <div class="line"></div>
                </div>
            </div>
            <div class="middle-items">
                <div class="mi-item right">
                    <div class="details">
                        <div class="i-description">
                            {!! $setting->trust_reason2 !!}
                        </div>
                    </div>
                    <div class="icon-area">
                        <div class="i-icon">
                            <i class="fi fi-infinite"></i>
                        </div>
                    </div>
                    <div class="line-area">
                        <div class="line"></div>
                    </div>
                </div>
                <div class="mi-item center">
                    <div class="icon">
                        <img src="{{asset('site_assets/img/logo.png')}}" class="img-fluid" alt="فرید شیشه بری">
                    </div>
                </div>
                <div class="mi-item left">
                    <div class="line-area">
                        <div class="line"></div>
                    </div>
                    <div class="icon-area">
                        <div class="i-icon">
                            <i class="fi fi-support"></i>
                        </div>
                    </div>
                    <div class="details">
                        <div class="i-description">
                            {!! $setting->trust_reason3 !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="item bottom">
                <div class="line-area">
                    <div class="line"></div>
                </div>
                <div class="i-icon">
                    <i class="fi fi-clock"></i>
                </div>
                <div class="i-description">
                    {!! $setting->trust_reason4 !!}
                </div>
            </div>
        </div>
    </div>
    <div class="dot-connect bottom">
        <i class="fi fi-dot"></i>
        <div class="line"></div>
    </div>
</div>
