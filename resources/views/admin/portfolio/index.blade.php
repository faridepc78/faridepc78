@section('title')
    <title>پنل مدیریت فرید شیشه بری | نمونه کار ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('portfolio.index')}}">لیست نمونه کار
                                ها</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست نمونه کار ها</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="جستجو">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>دسته بندی</th>
                                    <th>تصویر</th>
                                    <th>جزئیات</th>
                                    <td>اسلایدر</td>
                                    <th>تخصص ها</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($portfolio))

                                    @foreach($portfolio as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->category->name}}</td>
                                            <td><img class="img-size-64" src="{{$item->image->thumb}}"></td>
                                            <td><a href="{{route('portfolio.show',$item->id)}}"><i class="fa fa-info-circle text-dark"></i></a></td>
                                            <td><a href="{{route('portfolio.slider.index',$item->id)}}"><i class="fa fa-image text-warning"></i></a></td>
                                            <td><a href="#"><i class="fa fa-database text-success"></i></a></td>
                                            <td><a href="{{route('portfolio.edit',$item->id)}}"><i
                                                        class="fa fa-edit text-primary"></i></a></td>
                                            <td><a href="{{ route('portfolio.destroy', $item->id) }}"
                                                   onclick="destroyPortfolio(event, {{ $item->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('portfolio.destroy', $item->id) }}" method="post" id="destroy-portfolio-{{ $item->id }}">
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

                        <div class="pagination mt-3">
                            {!! $portfolio->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <div id="delete_form">

    </div>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyPortfolio(event, id) {
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
                document.getElementById(`destroy-portfolio-${id}`).submit()
            }
        })
    }
</script>
