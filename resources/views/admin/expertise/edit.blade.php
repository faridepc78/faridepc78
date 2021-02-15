@section('title')
    <title>پنل مدیریت فرید شیشه بری | تخصص ها</title>
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
                        <li class="breadcrumb-item"><a href="{{route('expertise.index')}}">لیست تخصص ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('expertise.edit',$expertise->id)}}">ویرایش تخصص ({{$expertise->name}})</a></li>
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
                            <h3 class="card-title">ویرایش تخصص ({{$expertise->name}})</h3>
                        </div>

                        <form action="{{route('expertise.update',$expertise->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام تخصص</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$expertise->name) }}" id="name" name="name"
                                           placeholder="لطفا نام تخصص را وارد کنید" autocomplete="name" autofocus required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ تخصص</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$expertise->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ تخصص را وارد کنید" autocomplete="slug" autofocus required>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">تصویر تخصص</label>
                                    <img class="img-size-64" src="{{$expertise->image->thumb}}">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           value="{{ old('image') }}" autofocus
                                           id="image" name="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">توضیحات تخصص</label>
                                    <textarea class="form-control ckeditor @error('text') is-invalid @enderror" id="text"
                                              name="text"
                                              placeholder="لطفا توضیحات تخصص را وارد کنید" autocomplete="text"
                                              autofocus required>{{ old('text',$expertise->text) }}</textarea>

                                    @error('text')
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

@section('js')
    <script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')
