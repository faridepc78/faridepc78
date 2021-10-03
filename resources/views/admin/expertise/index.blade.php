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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('expertise.index')}}">لیست تخصص
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
                            <h3 class="card-title">لیست تخصص ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>اسلاگ</th>
                                    <th>توضیح</th>
                                    <th>تصویر</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($expertises))

                                    @foreach($expertises as $key=>$expertise)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$expertise->name}}</td>
                                            <td>{{$expertise->slug}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#expertiseText{{$expertise->id}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td><img class="img-size-64" src="{{$expertise->image->original}}"></td>
                                            <td><a target="_blank" href="{{route('expertise.edit',$expertise->id)}}"><i
                                                        class="fa fa-edit text-primary"></i></a></td>
                                            <td><a href="{{ route('expertise.destroy', $expertise->id) }}"
                                                   onclick="destroyExpertise(event, {{ $expertise->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('expertise.destroy', $expertise->id) }}" method="post" id="destroy-expertise-{{ $expertise->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="expertiseText{{$expertise->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            توضیح تخصص
                                                            ({{$expertise->name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">
                                                        {!! $expertise->text !!}
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

                        <div class="pagination mt-3">
                            {!! $expertises->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyExpertise(event, id) {
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
                document.getElementById(`destroy-expertise-${id}`).submit()
            }
        })
    }
</script>
