@section('title')
    <title>پنل مدیریت فرید شیشه بری | نمونه کار ها</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/persianDatepicker/css/persianDatepicker-default.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}">
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
                        <li class="breadcrumb-item"><a href="{{route('portfolio.index')}}">لیست نمونه کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio.edit',$portfolio->id)}}">ویرایش نمونه کار ({{$portfolio->name}})</a></li>
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
                            <h3 class="card-title">ویرایش نمونه کار ({{$portfolio->name}})</h3>
                        </div>

                        <form id="edit_portfolio_form" action="{{route('portfolio.update',$portfolio->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$portfolio->name) }}" id="name" name="name"
                                           placeholder="لطفا نام نمونه کار را وارد کنید" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="headline">تیتر نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('headline') is-invalid @enderror"
                                           value="{{ old('headline',$portfolio->headline) }}" id="headline" name="headline"
                                           placeholder="لطفا تیتر نمونه کار را وارد کنید" autocomplete="headline"
                                           autofocus>

                                    @error('headline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$portfolio->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ نمونه کار را وارد کنید" autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="portfolio_category_id">دسته بندی نمونه کار</label>
                                    <select class="form-control  @error('portfolio_category_id') is-invalid @enderror" id="portfolio_category_id"
                                            name="portfolio_category_id" data-container="body"
                                            data-live-search="false"
                                            data-hide-disabled="false" data-actions-box="true"
                                            data-virtual-scroll="true">
                                        <option selected disabled value="">لطفا دسته بندی نمونه کار را انتخاب کنید</option>
                                        @foreach($portfolioCategory as $value)
                                            <option value="{{ $value->id }}"
                                                    @if ($value->id == old('portfolio_category_id',$portfolio->category->id))
                                                    selected="selected"
                                                @endif
                                            >{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('portfolio_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر نمونه کار</label>
                                    <img class="img-size-64" src="{{$portfolio->image->original}}">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                          autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات نمونه کار</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text"
                                              autocomplete="text"
                                              autofocus>{{ old('text',$portfolio->text) }}</textarea>

                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer">مشتری نمونه کار</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('customer') is-invalid @enderror"
                                           value="{{ old('customer',$portfolio->customer) }}" id="customer" name="customer"
                                           placeholder="لطفا مشتری نمونه کار را وارد کنید" autocomplete="customer"
                                           autofocus>

                                    @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="start_date">تاریخ شروع نمونه کار</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                              </span>
                                        </div>
                                        <input readonly type="text"
                                               class="form-control @error('start_date') is-invalid @enderror"
                                               value="{{ old('start_date',$portfolio->start_date) }}" id="start_date" name="start_date"
                                               placeholder="لطفا تاریخ شروع نمونه کار را وارد کنید"
                                               autocomplete="start_date" autofocus>

                                        @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="end_date">تاریخ پایان نمونه کار</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                              </span>
                                        </div>
                                        <input readonly type="text" class="form-control @error('end_date') is-invalid @enderror"
                                               value="{{ old('end_date',$portfolio->end_date) }}" id="end_date" name="end_date"
                                               placeholder="لطفا تاریخ پایان نمونه کار را وارد کنید"
                                               autocomplete="end_date" autofocus>

                                        @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
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
    <script type="text/javascript"
            src="{{asset('admin_assets/plugins/persianDatepicker/js/persianDatepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('admin_assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">
    $("#start_date").persianDatepicker({formatDate: "YYYY-0M-0D"});
    $("#end_date").persianDatepicker({formatDate: "YYYY-0M-0D"});
</script>

<script type="text/javascript">

    $(document).ready(function () {

        $('.selectpicker').on('change', function () {
            $(this).valid();
        });

        $("#start_date").persianDatepicker({formatDate: "YYYY-0M-0D"});
        $("#end_date").persianDatepicker({formatDate: "YYYY-0M-0D"});

        var text_field = 'text';
        var text_error = 'لطفا توضیحات نمونه کار را وارد کنید';

        $('#edit_portfolio_form').validate({

            rules: {

                name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                headline: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                slug: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                portfolio_category_id: {
                    required: true
                },

                customer: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                start_date: {
                    required: true
                },

                end_date: {
                    required: true
                }

            },

            messages: {

                name: {
                    required: "لطفا نام نمونه کار را وارد کنید"
                },

                headline: {
                    required: "لطفا تیتر نمونه کار را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ نمونه کار را وارد کنید"
                },

                portfolio_category_id: {
                    required: "لطفا دسته بندی نمونه کار را وارد کنید"
                },

                customer: {
                    required: "لطفا مشتری  نمونه کار را وارد کنید"
                },

                start_date: {
                    required: "لطفا تاریخ شروع نمونه کار را انتخاب کنید"
                },

                end_date: {
                    required: "لطفا تاریخ پایان نمونه کار را انتخاب کنید"
                }
            }, submitHandler: function (form) {
                if (validateCkeditor(text_field, text_error) == true) {
                    form.submit();
                }
            }

        });

    });

</script>
