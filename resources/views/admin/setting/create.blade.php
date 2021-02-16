@section('title')
    <title>پنل مدیریت فرید شیشه بری | مدیریت تنظیمات</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('setting.index')}}">نمایش تنظیمات</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('setting.create')}}">مدیریت
                                تنظیمات</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">مدیریت تنظیمات</h3>
                        </div>

                        <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="rule">قوانین و مقررات سایت</label>
                                    <textarea class="form-control ckeditor @error('rule') is-invalid @enderror"
                                              id="rule"
                                              name="rule"
                                              autocomplete="rule"
                                              autofocus required>{{ old('rule') }}</textarea>

                                    @error('rule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="full_name">نام و نام خانوادگی مدیر سایت</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ old('full_name') }}" id="full_name" name="full_name"
                                           placeholder="لطفا نام و نام خانوادگی مدیر سایت را وارد کنید" autocomplete="full_name" autofocus
                                           required>

                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="bio">بیو مدیر سایت</label>
                                    <textarea class="form-control @error('bio') is-invalid @enderror"
                                              rows="5"
                                              style="resize: vertical"
                                              id="bio"
                                              name="bio"
                                              autocomplete="bio"
                                              placeholder="لطفا بیو مدیر سایت را وارد کنید"
                                              autofocus required>{{ old('bio') }}</textarea>

                                    @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trust">اعتماد مدیر سایت</label>
                                    <textarea class="form-control ckeditor @error('trust') is-invalid @enderror"
                                              id="trust"
                                              name="trust"
                                              autocomplete="trust"
                                              autofocus required>{{ old('trust') }}</textarea>

                                    @error('trust')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trust_reason1">دلیل 1 اعتماد مدیر سایت</label>
                                    <textarea class="form-control ckeditor @error('trust_reason1') is-invalid @enderror"
                                              id="trust_reason1"
                                              name="trust_reason1"
                                              autocomplete="trust_reason1"
                                              autofocus required>{{ old('trust_reason1') }}</textarea>

                                    @error('trust_reason1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trust_reason2">دلیل 2 اعتماد مدیر سایت</label>
                                    <textarea class="form-control ckeditor @error('trust_reason2') is-invalid @enderror"
                                              id="trust_reason2"
                                              name="trust_reason2"
                                              autocomplete="trust_reason2"
                                              autofocus required>{{ old('trust_reason2') }}</textarea>

                                    @error('trust_reason2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trust_reason3">دلیل 3 اعتماد مدیر سایت</label>
                                    <textarea class="form-control ckeditor @error('trust_reason3') is-invalid @enderror"
                                              id="trust_reason3"
                                              name="trust_reason3"
                                              autocomplete="trust_reason3"
                                              autofocus required>{{ old('trust_reason3') }}</textarea>

                                    @error('trust_reason3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="trust_reason4">دلیل 4 اعتماد مدیر سایت</label>
                                    <textarea class="form-control ckeditor @error('trust_reason4') is-invalid @enderror"
                                              id="trust_reason4"
                                              name="trust_reason4"
                                              autocomplete="trust_reason4"
                                              autofocus required>{{ old('trust_reason4') }}</textarea>

                                    @error('trust_reason4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="about1">درباره من 1</label>
                                    <textarea class="form-control ckeditor @error('about1') is-invalid @enderror"
                                              id="about1"
                                              name="about1"
                                              autocomplete="about1"
                                              autofocus required>{{ old('about1') }}</textarea>

                                    @error('about1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="about2">درباره من 2</label>
                                    <textarea class="form-control ckeditor @error('about2') is-invalid @enderror"
                                              id="about2"
                                              name="about2"
                                              autocomplete="about2"
                                              autofocus required>{{ old('about2') }}</textarea>

                                    @error('about2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>about2
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="footer_text">متن فوتر سایت</label>
                                    <textarea class="form-control @error('footer_text') is-invalid @enderror"
                                              rows="5"
                                              style="resize: vertical"
                                              id="footer_text"
                                              name="footer_text"
                                              autocomplete="footer_text"
                                              placeholder="لطفا متن فوتر سایت را وارد کنید"
                                              autofocus required>{{ old('footer_text') }}</textarea>

                                    @error('footer_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@section('js')
    <script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')
