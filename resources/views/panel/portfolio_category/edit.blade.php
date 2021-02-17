@section('title')
    <title>پنل مدیریت فرید شیشه بری | دسته بندی نمونه کارها</title>
@endsection

@include('panel.layout.header')

@include('panel.layout.sidebar')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item"><a href="{{route('portfolio_category.index')}}">لیست دسته بندی نمونه کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio_category.edit',$portfolio_category->id)}}">ویرایش دسته بندی نمونه کار ها ({{$portfolio_category->name}})</a></li>
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
                            <h3 class="card-title">ویرایش دسته بندی نمونه کار ({{$portfolio_category->name}})</h3>
                        </div>

                        <form action="{{route('portfolio_category.update',$portfolio_category->id)}}" method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام دسته بندی نمونه کار</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$portfolio_category->name) }}" id="name" name="name"
                                           placeholder="لطفا نام دسته بندی نمونه کار را وارد کنید" autocomplete="name" autofocus required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ دسته بندی نمونه کار</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$portfolio_category->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ دسته بندی نمونه کار را وارد کنید" autocomplete="slug" autofocus required>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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

@include('panel.layout.footer')
