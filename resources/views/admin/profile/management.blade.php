@section('title')
    <title>پنل مدیریت فرید شیشه بری | پروفایل</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('profile')}}">پروفایل</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">پروفایل</h3>
                        </div>

                        <form id="management_profile_form" action="{{route('profile.update',auth()->user()->id)}}"
                              method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="full_name">نام و نام خانوادگی</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ old('full_name',auth()->user()->full_name) }}" id="full_name"
                                           name="full_name"
                                           placeholder="لطفا نام و نام خانوادگی را وارد کنید"
                                           autocomplete="full_name" autofocus>

                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" style="direction: ltr"
                                           type="text" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email',auth()->user()->email) }}" id="email" name="email"
                                           placeholder="لطفا ایمیل را وارد کنید" autocomplete="email"
                                           autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر پروفایل</label>
                                    <img class="img-size-64" src="{{auth()->user()->image->thumb}}"
                                         alt="{{ auth()->user()->image->thumb }}">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">رمز عبور</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="لطفا رمز عبور را وارد کنید" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">تکرار رمز عبور</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="password"
                                           class="form-control"
                                           id="password_confirmation" name="password_confirmation"
                                           placeholder="لطفا رمز عبور را تکرار وارد کنید" autocomplete="new-password">
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">بروزرسانی</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@section('js')
    <script type="text/javascript" src="{{asset('admin_assets/plugins/validation/js/methods.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        changeStyleType($('#email'));
        changeStyleType($('#password'));
        changeStyleType($('#password_confirmation'));

        $('#management_profile_form').validate({

            rules: {

                full_name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                },

                email: {
                    required: true,
                    checkEmail: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                },

                password: {
                    minlength: 8,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                password_confirmation: {
                    minlength: 8,
                    equalTo: "#password",
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }
            },

            messages: {

                full_name: {
                    required: "لطفا نام و نام خانوادگی را وارد کنید"
                },

                email: {
                    required: "لطفا ایمیل خود را وارد کنید",
                    checkEmail: "لطفا ایمیل خود را صحیح وارد کنید"
                },

                password: {
                    minlength: "لطفا رمز عبور حداقل 8 رقم وارد کنید"
                },

                password_confirmation: {
                    minlength: "لطفا رمز عبور را مجداد وارد کنید",
                    equalTo: "لطفا رمز عبور را مجداد وارد کنید"
                }
            }

        });

    });

</script>
