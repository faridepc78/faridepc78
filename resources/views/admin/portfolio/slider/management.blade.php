@section('title')
    <title>پنل مدیریت فرید شیشه بری | اسلایدر نمونه کار</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio.slider.index',$portfolio->id)}}">مدیریت اسلایدر نمونه کار({{$portfolio->name}})</a></li>
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
                            <h3 class="card-title">مدیریت اسلایدر نمونه کار({{$portfolio->name}})</h3>
                        </div>

                        <form action="{{route('portfolio.slider.store',$portfolio->id)}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">

                                <input type="hidden" name="portfolio_id" value="{{$portfolio->id}}">

                                <div class="form-group">
                                    <label for="image">اسلایدر نمونه کار</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           value="{{ old('image') }}" autofocus
                                           id="image" name="image" required>

                                    @error('image')
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست اسلایدر های نمونه کار ({{$portfolio->name}})</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($portfolio->slider))

                                    @foreach($portfolio->slider as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img class="img-bordered" alt="اسلایدر نمونه کار" src="{{$value->image->thumb}}"></td>
                                            <td><a href="{{ route('portfolio.slider.destroy', [$value->id]) }}"
                                                   onclick="destroyPortfolioSlider(event, {{ $value->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('portfolio.slider.destroy', $value->id) }}" method="post" id="destroy-PortfolioSlider-{{ $value->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                @else

                                    <div class="alert alert-danger text-center">
                                        <p>اطلاعات این بخش ثبت نشده است</p>
                                    </div>

                                @endif

                            </table>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyPortfolioSlider(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'آیا از حذف اطمینان دارید ؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(221, 51, 51)',
            cancelButtonColor: 'rgb(48, 133, 214)',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`destroy-PortfolioSlider-${id}`).submit()
            }
        })
    }
</script>
