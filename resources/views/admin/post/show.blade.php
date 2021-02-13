@section('title')
    <title>پنل مدیریت فرید شیشه بری | پست ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('post.create')}}">جزئیات پست({{$post->name}})</a></li>
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
                            <h3 class="card-title">جزئیات پست({{$post->name}})</h3>
                        </div>

                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="name">نام پست</label>
                                        <input readonly type="text" class="form-control"
                                               value="{{ $post->name }}" id="name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="slug">اسلاگ پست</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ $post->slug }}" id="slug">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="post_category_id">اسلاگ پست</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ $post->category->name }}" id="post_category_id">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="image">تصویر پست</label>
                                        <img class="img-fluid" src="{{$post->image->thumb}}" alt="تصویر پست">
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="text">توضیحات پست</label>
                                        <textarea readonly class="form-control ckeditor"
                                                  id="text">{{ $post->text }}</textarea>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="view">تعداد بازدید پست</label>
                                            <input readonly type="text" class="form-control"
                                                   value="{{ number_format($post->view) }}" id="view">
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
    <script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')
