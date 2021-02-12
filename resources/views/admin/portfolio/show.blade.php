@section('title')
    <title>پنل مدیریت فرید شیشه بری | نمونه کار ها</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/persianDatepicker/css/persianDatepicker-default.css')}}">
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio.create')}}">ویرایش نمونه کار({{$portfolio->name}})</a></li>
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
                            <h3 class="card-title">ویرایش نمونه کار({{$portfolio->name}})</h3>
                        </div>

                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="name">نام نمونه کار</label>
                                        <input readonly type="text" class="form-control"
                                               value="{{ $portfolio->name }}" id="name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="headline">تیتر نمونه کار</label>
                                        <input readonly type="text" class="form-control"
                                               value="{{ $portfolio->headline }}" id="headline">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="slug">اسلاگ نمونه کار</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ $portfolio->slug }}" id="slug">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="portfolio_category_id">اسلاگ نمونه کار</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ $portfolio->category->name }}" id="portfolio_category_id">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="image">تصویر نمونه کار</label>
                                        <img class="img-fluid" src="{{$portfolio->image->thumb}}" alt="تصویر نمونه کار">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="text">توضیحات نمونه کار</label>
                                        <textarea readonly class="form-control ckeditor"
                                                  id="text">{{ $portfolio->text }}</textarea>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="customer">مشتری نمونه کار</label>
                                        <input readonly type="text" class="form-control"
                                               value="{{ $portfolio->customer }}" id="customer">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="start_date">تاریخ شروع نمونه کار</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                              </span>
                                            </div>
                                            <input readonly type="text"
                                                   class="form-control"
                                                   value="{{ $portfolio->start_date }}" id="start_date">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="end_date">تاریخ پایان نمونه کار</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                              </span>
                                            </div>
                                            <input readonly type="text"
                                                   class="form-control"
                                                   value="{{ $portfolio->end_date }}" id="end_date">
                                        </div>
                                    </div>

                                </div>

                            </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@section('js')
    <script src="{{asset('admin/plugins/persianDatepicker/js/persianDatepicker.min.js')}}"></script>
    <script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')
