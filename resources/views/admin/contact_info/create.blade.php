@section('title')
    <title>پنل مدیریت فرید شیشه بری | راه های ارتباطی</title>
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
                        <li class="breadcrumb-item"><a href="{{route('contactInfo.index')}}">لیست راه های ارتباطی</a>
                        </li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('contactInfo.create')}}">ایجاد
                                راه های ارتباطی</a></li>
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
                            <h3 class="card-title">ایجاد راه های ارتباطی</h3>
                        </div>

                        <form id="create_contactInfo_form" action="{{route('contactInfo.store')}}" method="post"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام راه ارتباطی</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام راه ارتباطی را وارد کنید" autocomplete="name"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="val">مقدار راه ارتباطی</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('val') is-invalid @enderror"
                                           value="{{ old('val') }}" id="val" name="val"
                                           placeholder="لطفا مقدار راه ارتباطی را وارد کنید" autocomplete="val"
                                           autofocus>

                                    @error('val')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">لینک راه ارتباطی</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('link') is-invalid @enderror"
                                           value="{{ old('link') }}" id="link" name="link"
                                           placeholder="لطفا لینک راه ارتباطی را وارد کنید" autocomplete="link"
                                           autofocus>

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیح راه ارتباطی</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text"
                                           class="form-control @error('text') is-invalid @enderror"
                                           value="{{ old('text') }}" id="text" name="text"
                                           placeholder="لطفا توضیح راه ارتباطی را وارد کنید" autocomplete="text"
                                           autofocus>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر راه ارتباطی</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           value="{{ old('image') }}" autofocus
                                           id="image" name="image">

                                    @error('image')
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

<script type="text/javascript">

    $(document).ready(function () {

        changeStyleType($('#val'));
        changeStyleType($('#link'));

        $('#create_contactInfo_form').validate({

            rules: {

                name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                val: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                link: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                text: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                image: {
                    required: true
                }
            },

            messages: {

                name: {
                    required: "لطفا نام راه ارتباطی را وارد کنید"
                },

                val: {
                    required: "لطفا مقدار راه ارتباطی را وارد کنید"
                },

                link: {
                    required: "لطفا لینک راه ارتباطی را وارد کنید"
                },

                text: {
                    required: "لطفا توضیح راه ارتباطی را وارد کنید"
                },

                image: {
                    required: "لطفا تصویر راه ارتباطی را وارد کنید"
                }
            }

        });

    });

</script>
