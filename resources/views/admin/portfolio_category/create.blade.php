@section('title')
    <title>پنل مدیریت فرید شیشه بری | دسته بندی نمونه کارها</title>
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
                        <li class="breadcrumb-item"><a href="{{route('portfolio_category.index')}}">لیست دسته بندی نمونه کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio_category.create')}}">ایجاد دسته بندی نمونه کارها</a></li>
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
                            <h3 class="card-title">ایجاد دسته بندی نمونه کارها</h3>
                        </div>

                        <form id="create_portfolioCategory_form" action="{{route('portfolio_category.store')}}" method="post">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام دسته بندی نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام دسته بندی نمونه کار را وارد کنید" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ دسته بندی نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ دسته بندی نمونه کار را وارد کنید" autocomplete="slug" autofocus>

                                    @error('slug')
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

        $('#create_portfolioCategory_form').validate({

            rules: {

                name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                },

                slug: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    },
                }

            },

            messages: {

                name: {
                    required: "لطفا نام دسته بندی نمونه کار را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ دسته بندی نمونه کار را وارد کنید"
                }
            }

        });

    });

</script>
