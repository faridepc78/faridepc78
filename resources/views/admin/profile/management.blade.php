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

                        <form action="{{route('profile.update',auth()->user()->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="full_name">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ old('name',auth()->user()->full_name) }}" id="full_name"
                                           name="full_name"
                                           placeholder="لطفا نام و نام خانوادگی را وارد کنید"
                                           autocomplete="full_name" autofocus
                                           required>

                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('name',auth()->user()->email) }}" id="email" name="email"
                                           placeholder="لطفا ایمیل را وارد کنید" autocomplete="email"
                                           autofocus
                                           required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر پروفایل</label>
                                    <img class="img-size-64" src="{{auth()->user()->image->thumb}}">
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
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password"
                                           placeholder="لطفا رمز عبور را وارد کنید" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">تکرار رمز عبور</label>
                                    <input type="password" class="form-control"
                                           id="password-confirm" name="password_confirmation"
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

@include('admin.layout.footer')
