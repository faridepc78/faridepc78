@section('title')
    <title>پنل مدیریت فرید شیشه بری | کار ها</title>
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
                        <li class="breadcrumb-item"><a href="{{route('work.index')}}">لیست کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('work.create')}}">ایجاد
                                کار ها</a></li>
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
                            <h3 class="card-title">ایجاد کار ها</h3>
                        </div>

                        <form id="create_work_form" action="{{route('work.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">عنوان کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}" id="title" name="title"
                                           placeholder="لطفا عنوان کار را وارد کنید" autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات کار</label>
                                    <textarea placeholder="لطفا توضیحات کار را وارد کنید" onkeyup="this.value=removeSpaces(this.value)" rows="5" style="resize: vertical" class="form-control @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text') }}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر کار</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           autofocus id="image" name="image">

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

        $('#create_work_form').validate({

            rules: {

                title: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                },

                text: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                },

                image: {
                    required: true
                }

            },

            messages: {

                title: {
                    required: "لطفا نام کار را وارد کنید"
                },

                text: {
                    required: "لطفا توضیحات کار را وارد کنید"
                },

                image: {
                    required: "لطفا تصویر کار را وارد کنید"
                }
            }

        });

    });

</script>
