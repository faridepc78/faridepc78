@section('title')
    <title>پنل مدیریت فرید شیشه بری | مشتریان</title>
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
                        <li class="breadcrumb-item"><a href="{{route('customer.index')}}">لیست مشتریان</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('customer.edit',$customer->id)}}">ویرایش مشتری ({{$customer->name}})</a></li>
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
                            <h3 class="card-title">ویرایش مشتری ({{$customer->name}})</h3>
                        </div>

                        <form action="{{route('customer.update',$customer->id)}}" method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام راه ارتباطی</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$customer->name) }}" id="name" name="name"
                                           placeholder="لطفا نام راه ارتباطی را وارد کنید" autocomplete="name" autofocus
                                           required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="from">سمت مشتری</label>
                                    <input type="text" class="form-control @error('from') is-invalid @enderror"
                                           value="{{ old('from',$customer->from) }}" id="from" name="from"
                                           placeholder="لطفا سمت مشتری را وارد کنید" autocomplete="from" autofocus
                                           required>

                                    @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="text">نظر مشتری</label>
                                    <textarea style="resize: vertical" rows="5" type="text" class="form-control @error('text') is-invalid @enderror"
                                              id="text" name="text"
                                              placeholder="لطفا نظر مشتری را وارد کنید" autocomplete="text" autofocus
                                              required>{{ old('text',$customer->text) }}</textarea>

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

@include('panel.layout.footer')
