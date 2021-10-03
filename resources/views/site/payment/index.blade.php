@section('title')
    <title>فرید شیشه بری | پرداخت آنلاین</title>
@endsection

@section('load_css')
    <link rel='stylesheet' href='{{ asset('site_assets/css/sweetalert.css') }}'>
    <link rel='stylesheet' href='{{ asset('site_assets/plugins/validation/css/validate.css') }}'>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="payment">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="payment">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="{{route('payment')}}">پرداخت آنلاین</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="javascript:void(0)">پرداخت آنلاین</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content payment" data-page="payment">
            <div class="wrapper">
                <div class="p-content clearfix">

                    <div class="col-sm-12 form-area">
                        <div class="form-content">

                            <form id="frmPayment" class="form clearfix" method="post"
                                  action="{{route('payment.request')}}">

                                @csrf

                                <div class="col-md-6 input">
                                    <label for="user_name">نام و نام خانوادگی</label>
                                    <div class="input-area">
                                        <input onkeyup="this.value=removeSpaces(this.value);" type="text"
                                               class="form-control @error('user_name') is-invalid @enderror"
                                               value="{{ old('user_name') }}" id="user_name" name="user_name"
                                               autocomplete="user_name" autofocus/>
                                        <span class="icon">
                                            <i class="fi fi-lg fi-user"></i>
                                        </span>
                                    </div>
                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 input">
                                    <label for="user_mobile">تلفن همراه</label>
                                    <div class="input-area">
                                        <input style="direction: ltr" onkeyup="this.value=removeSpaces(this.value);"
                                               type="text"
                                               class="form-control @error('user_mobile') is-invalid @enderror"
                                               value="{{ old('user_mobile') }}" id="user_mobile" name="user_mobile"
                                               autocomplete="user_mobile" autofocus/>
                                        <span class="icon">
                                            <i class="fi fi-lg fi-phone"></i>
                                        </span>
                                    </div>
                                    @error('user_mobile')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 input">
                                    <label for="user_email">ایمیل</label>
                                    <div class="input-area">
                                        <input style="direction: ltr" onkeyup="this.value=removeSpaces(this.value);"
                                               type="text"
                                               class="form-control @error('user_email') is-invalid @enderror"
                                               value="{{ old('user_email') }}" id="user_email" name="user_email"
                                               autocomplete="user_email" autofocus/>
                                        <span class="icon">
                                            <i class="fi fi-lg fi-email"></i>
                                        </span>
                                    </div>
                                    @error('user_email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 input">
                                    <label for="title">عنوان پرداخت</label>
                                    <div class="input-area">
                                        <input onkeyup="this.value=removeSpaces(this.value);" type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title') }}" id="title" name="title"
                                               autocomplete="title" autofocus/>
                                        <span class="icon">
                                            <i class="fi fi-lg fi-invoice"></i>
                                        </span>
                                    </div>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 input">
                                    <label for="price">مبلغ پرداختی (تومان)</label>
                                    <div class="input-area">
                                        <input style="direction: ltr"
                                               onkeyup="this.value=removeSpaces(this.value);separateNum(this.value,this)"
                                               type="text"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{ str_replace(',','',old('price')) }}" id="price"
                                               name="price" autocomplete="price" autofocus maxlength="10"/>
                                        <span class="icon">
                                            <i class="fi fi-lg fi-keyboard"></i>
                                        </span>
                                    </div>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 input">
                                    {!! app('captcha')->display(); !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block" role="alert">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-12 input submit-area">

                                    <div class="center-block">
                                        <div class="loading">
                                            <div class="bounce1"></div>
                                            <div class="bounce2"></div>
                                            <div class="bounce3"></div>
                                        </div>
                                    </div>
                                    <button style="cursor: pointer" type="submit" class="btn-payment">پرداخت</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @section('load_js')
            <script src="https://www.google.com/recaptcha/api.js?explicit&hl=fa" async defer></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/sweetalert.min.js') }}'></script>
            <script type="text/javascript"
                    src='{{ asset('site_assets/plugins/validation/js/jquery.validate.min.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/plugins/validation/js/methods.js') }}'></script>
            <script type="text/javascript" src='{{ asset('site_assets/js/pages/payment.js?v='.uniqid()) }}'></script>
@endsection

@include('site.layout.footer')
