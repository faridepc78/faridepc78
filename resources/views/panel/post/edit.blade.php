@section('title')
    <title>پنل مدیریت فرید شیشه بری | پست ها</title>
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
                        <li class="breadcrumb-item"><a href="{{route('post.index')}}">لیست پست ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('post.edit',$post->id)}}">ویرایش پست ({{$post->name}})</a></li>
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
                            <h3 class="card-title">ویرایش پست ({{$post->name}})</h3>
                        </div>

                        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام پست</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$post->name) }}" id="name" name="name"
                                           placeholder="لطفا نام پست را وارد کنید" autocomplete="name" autofocus
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">اسلاگ پست</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           value="{{ old('slug',$post->slug) }}" id="slug" name="slug"
                                           placeholder="لطفا اسلاگ پست را وارد کنید" autocomplete="slug" autofocus
                                           required>

                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="post_category_id">دسته بندی پست</label>
                                    <select class="form-control  @error('post_category_id') is-invalid @enderror" id="post_category_id"
                                            name="post_category_id" required>
                                        <option selected disabled value="">لطفا دسته بندی پست را انتخاب کنید</option>
                                        @foreach($postCategory as $value)
                                            <option value="{{ $value->id }}"
                                                    @if ($value->id == old('post_category_id',$post->category->id))
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
                                    <img class="img-size-64" src="{{$post->image->thumb}}">
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
                                              autofocus required>{{ old('text',$post->text) }}</textarea>

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
    <script src="{{asset('panel/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('panel.layout.footer')
