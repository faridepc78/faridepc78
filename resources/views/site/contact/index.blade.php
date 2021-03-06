@section('title')
    <title>فرید شیشه بری | تماس با من</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/sweetalert.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/plugins/validation/css/validate.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="contact">
        @endsection

@include('site.layout.header')

<div class="custom-page-header hidden-print" data-page="contact">
    <div class="cover">
        <div class="wrapper">
            <h1 class="title">
                <a href="{{route('contact-me')}}">تماس با من</a>
            </h1>
            <div class="breadcrumbs">
                <ul class="clearfix">
                    <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                    <li><a href="javascript:void(0)">تماس با من</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="page-content contact" data-page="contact">
    <div class="contact-form">
        <div class="wrapper clearfix pc-content">

            <h2 class="title">اگر کاری دارید یا چیزی میخواید بگید بفرمایید...</h2>

            <form class="form clearfix" id="frmContact">

                <div class="inputs-area col-sm-9">
                    <div class="description">
                        {{@$setting->contact_text}}
                    </div>

                    <div class="inputs clearfix">

                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input onkeyup="this.value=removeSpaces(this.value);" type="text" id="user_name" name="user_name">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="user_name">لطفا نام خود را وارد کنید *</label>
                            </div>
                            <label id="user_name-error" class="error" for="user_name"></label>
                        </div>

                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input onkeyup="this.value=removeSpaces(this.value);" type="text" id="user_email" name="user_email">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="user_email">لطفا ایمیل خود را وارد کنید *</label>
                            </div>
                            <label id="user_email-error" class="error" for="user_email"></label>
                        </div>

                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input onkeyup="this.value=removeSpaces(this.value);" type="text" id="user_mobile" name="user_mobile">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="user_mobile">لطفا تلفن همراه خود را وارد کنید *</label>
                            </div>
                            <label id="user_mobile-error" class="error" for="user_mobile"></label>
                        </div>

                        <div class="col-md-6 input">
                            <div class="material-input">
                                <input onkeyup="this.value=removeSpaces(this.value);" type="text" id="know" name="know">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="know">لطفا طریقه آشنایی خود با من را وارد کنید *</label>
                            </div>
                            <label id="know-error" class="error" for="know"></label>
                        </div>

                        <div class="col-md-12 input">
                            <div class="material-input">
                                <textarea onkeyup="this.value=removeSpaces(this.value);" id="text" name="text"></textarea>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="text">لطفا متن پیام خود را وارد کنید *</label>
                            </div>
                            <label id="text-error" class="error" for="text"></label>
                        </div>

                        <div class="col-md-12 input-item">
                            {!! app('captcha')->display(); !!}
                            <label id="recaptcha-error" class="error"></label>
                        </div>

                        <div class="col-md-6 input send-button-area mt-3">
                            <div class="loading">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                            <button type="submit" class="send-button ripple-click">ارسال پیام</button>
                        </div>

                    </div>
                </div>

                <div class="icon col-sm-3">
                    <img src="{{asset('site_assets/img/contact.png')}}" alt="تماس با من" class="img-fluid">
                </div>
            </form>
        </div>
    </div>
    <div class="contact-ways">
        <div class="cover">
            <div class="wrapper">
                <div class="ut-header">
                    <div class="title">راه‌های تماس با من</div>
                    <div class="line-area">
                        <div class="line-content">
                            <div class="line"></div>
                        </div>
                        <span class="circle">
<i class="fi fi-circle fi-lg"></i>
</span>
                        <div class="line-content">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>

                <div class="items clearfix">

                    @if(count($contactInfo))

                        @foreach($contactInfo as $value)

                            <div class="item col-md-4 col-sm-6">
                                <div class="i-content">
                                    <div class="logo-area">
                                        <div class="logo">
                                            <img src="{{$value->image->thumb}}" alt="{{$value->name}}">
                                        </div>
                                    </div>
                                    <div class="details-area">
                                        <h3 class="d-title"><a href="{{$value->link}}" target="_blank">{{$value->name}}</a></h3>
                                        <div class="d-value"><a href="{{$value->link}}" target="_blank">{{$value->val}}</a></div>
                                        <div class="d-description">
                                            {{$value->text}}
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
</div>

@section('load_js')
            <script src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/sweetalert.min.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/plugins/validation/js/jquery.validate.min.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/plugins/validation/js/methods.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/pages/contact.js?v='.uniqid()) }}'></script>
@endsection

@include('site.layout.footer')
