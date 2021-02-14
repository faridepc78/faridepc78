@section('title')
    <title>پنل مدیریت فرید شیشه بری | پروژه های رزومه</title>
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
                        <li class="breadcrumb-item"><a href="{{route('resume.index')}}">لیست کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('resume.edit',$resume->id)}}">ویرایش پروژه رزومه ({{$resume->name}})</a></li>
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
                            <h3 class="card-title">ویرایش پروژه رزومه ({{$resume->name}})</h3>
                        </div>

                        <form action="{{route('resume.update',$resume->id)}}" method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام پروژه رزومه</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$resume->name) }}" id="name" name="name"
                                           placeholder="لطفا نام پروژه رزومه را وارد کنید" autocomplete="name" autofocus
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer">مشتری پروژه رزومه</label>
                                    <input type="text" class="form-control @error('customer') is-invalid @enderror"
                                           value="{{ old('customer',$resume->customer) }}" id="customer" name="customer"
                                           placeholder="لطفا مشتری پروژه رزومه را وارد کنید" autocomplete="customer" autofocus
                                           required>

                                    @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="year">سال تولید پروژه رزومه</label>
                                    <input type="number" class="form-control @error('year') is-invalid @enderror"
                                           value="{{ old('year',$resume->year) }}" id="year" name="year"
                                           placeholder="لطفا سال تولید پروژه رزومه را وارد کنید" autocomplete="year" autofocus
                                           required>

                                    @error('year')
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

@include('admin.layout.footer')
