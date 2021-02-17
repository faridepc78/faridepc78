@section('title')
    <title>پنل مدیریت فرید شیشه بری | کار ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('work.index')}}">لیست کار
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
                            <h3 class="card-title">لیست کار ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($work))

                                    @foreach($work as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#workText{{$item->id}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td><img class="img-size-64" src="{{$item->image->thumb}}" alt="تصویر کار"></td>
                                            <td><a href="{{route('work.edit',$item->id)}}"><i
                                                        class="fa fa-edit text-primary"></i></a></td>
                                            <td><a href="{{ route('work.destroy', $item->id) }}"
                                                   onclick="destroyWork(event, {{ $item->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('work.destroy', $item->id) }}" method="post" id="destroy-work-{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="workText{{$item->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            توضیحات کار
                                                            ({{$item->title}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">
                                                            <textarea readonly id="text" class="form-control" rows="10" style="resize: vertical">{{$item->text}}</textarea>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

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

@include('panel.layout.footer')

<script type="text/javascript">
    function destroyWork(event, id) {
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
                document.getElementById(`destroy-work-${id}`).submit()
            }
        })
    }
</script>
