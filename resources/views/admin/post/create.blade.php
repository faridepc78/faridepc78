@section('title')
    <title>پنل مدیریت فرید شیشه بری | پست ها</title>
@endsection

@section('css')
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
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">لیست پست ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('post.create')}}">ایجاد
                                پست ها</a></li>
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
                            <h3 class="card-title">ایجاد پست ها</h3>
                        </div>

                        <form id="create_post_form" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام پست</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="name" name="name"
                                           placeholder="لطفا نام پست را وارد کنید" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ پست</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug') }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ پست را وارد کنید" autocomplete="slug" autofocus>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="post_category_id">دسته بندی پست</label>
                                    <select class="form-control selectpicker  @error('post_category_id') is-invalid @enderror" id="post_category_id"
                                            name="post_category_id" data-container="body"
                                            data-live-search="false"
                                            data-hide-disabled="false" data-actions-box="true"
                                            data-virtual-scroll="true">
                                        <option selected disabled value="">لطفا دسته بندی پست را انتخاب کنید</option>
                                        @foreach($postCategory as $value)
                                            <option value="{{ $value->id }}"
                                                    @if ($value->id == old('post_category_id'))
                                                    selected="selected"
                                                @endif
                                            >{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('post_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر پست</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        autofocus id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات پست</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror"
                                              id="text"
                                              name="text" autocomplete="text"
                                              autofocus>{{ old('text') }}</textarea>

                                    @error('text')
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
    <script src="{{asset('admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('admin_assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        $('.selectpicker').on('change', function () {
            $(this).valid();
        });

        var text_field = 'text';
        var text_error = 'لطفا توضیحات پست را وارد کنید';

        $('#create_post_form').validate({

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
                },

                post_category_id:{
                    required: true
                },

                image: {
                    required: true
                }
            },

            messages: {

                name: {
                    required: "لطفا نام پست را وارد کنید"
                },

                slug: {
                    required: "لطفا اسلاگ پست را وارد کنید"
                },

                post_category_id:{
                    required: "لطفا دسته بندی پست را انتخاب کنید"
                },

                image: {
                    required: "لطفا تصویر پست را وارد کنید"
                }
            }, submitHandler: function (form) {
                if (validateCkeditor(text_field,text_error) == true) {
                    form.submit();
                }
            }

        });

    });

</script>
