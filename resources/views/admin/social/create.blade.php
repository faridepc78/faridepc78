@section('title')
    <title>پنل مدیریت فرید شیشه بری | شبکه های اجتماعی</title>
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
                        <li class="breadcrumb-item"><a href="{{route('social.index')}}">لیست شبکه های اجتماعی</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('social.create')}}">ایجاد
                                شبکه های اجتماعی</a></li>
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
                            <h3 class="card-title">ایجاد شبکه های اجتماعی</h3>
                        </div>

                        <form action="{{route('social.store')}}" method="post">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام شبکه اجتماعی</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام شبکه اجتماعی را وارد کنید" autocomplete="name" autofocus
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="icon">آیکون شبکه اجتماعی</label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                           value="{{ old('icon') }}" id="icon" name="icon"
                                           placeholder="لطفا آیکون شبکه اجتماعی را وارد کنید" autocomplete="icon" autofocus
                                           required>

                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">لینک شبکه اجتماعی</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                           value="{{ old('link') }}" id="link" name="link"
                                           placeholder="لطفا لینک شبکه اجتماعی را وارد کنید" autocomplete="link" autofocus
                                           required>

                                    @error('link')
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

@include('admin.layout.footer')
