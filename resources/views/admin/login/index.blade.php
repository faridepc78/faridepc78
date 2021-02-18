<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/adminlte.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/iCheck/square/blue.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/custom-style.css')}}">
</head>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="{{route('login')}}"><b>ورود</b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <form action="{{route('login')}}" method="post">

                @csrf

                <div class="input-group mb-3">
                    <input id="email" type="email" placeholder="ایمیل را وارد کنید"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" autocomplete="email" autofocus required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-user"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="رمز عبور را وارد کنید"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           autocomplete="current-password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> یاد آوری من
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                    </div>

                </div>
            </form>

            <br>

            <div class="social-auth-links text-center mb-3">
                <a href="{{route('index')}}" class="btn btn-block btn-primary">
                    <i class="fa fa-home mr-2"></i>
                    بازگشت به خانه
                </a>
            </div>

        </div>

    </div>
</div>
<script type="text/javascript" src="{{asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        })
    })
</script>
</body>
</html>
