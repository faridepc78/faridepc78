@section('title')
    <title>پنل مدیریت فرید شیشه بری | تماس ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('contact.index')}}">لیست تماس
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
                            <h3 class="card-title">لیست تماس ها</h3>
                            <br>
                            <a href="{{route('contact.read')}}" class="btn btn-success">خوانده شده</a>
                            <a href="{{route('contact.unread')}}" class="btn btn-danger">خوانده نشده</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربر</th>
                                    <th>متن</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ تماس</th>
                                    <th>جزئیات</th>
                                    <th>تغییر وضعیت</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($contact))

                                    @foreach($contact as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->user_name}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#contactText{{$item->id}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td class="alert @if($item->status==\App\Models\Contact::READ_STATUS) alert-success @else alert-danger @endif">
                                                @if($item->status==\App\Models\Contact::READ_STATUS)
                                                    خوانده شده
                                                @else
                                                    خوانده نشده
                                                @endif
                                            </td>
                                            <td>{{\Hekmatinasser\Verta\Verta::createTimestamp($item->created_at)->format('y/n/j - H:i:s')}}</td>
                                            <td><a href="{{route('contact.show',$item->id)}}" target="_blank"><i
                                                        class="fa fa-info-circle text-dark"></i></a></td>

                                            <td>
                                                <a href="{{ route('contact.change_status', $item->id) }}"
                                                   onclick="changeContactStatus(event, {{ $item->id }})"><i
                                                        class="fa fa-edit text-primary"></i></a>
                                                <form action="{{ route('contact.change_status', $item->id) }}" method="post"
                                                      id="change-contactStatus-{{ $item->id }}">
                                                    @csrf
                                                    @method('patch')
                                                </form>
                                            </td>

                                            <td><a href="{{ route('contact.destroy', $item->id) }}"
                                                   onclick="destroyContact(event, {{ $item->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('contact.destroy', $item->id) }}" method="post"
                                                      id="destroy-contact-{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="contactText{{$item->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            متن تماس
                                                            ({{$item->user_name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">
                                                        <textarea readonly id="text" class="form-control" rows="10"
                                                                  style="resize: vertical">{{$item->text}}</textarea>
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
                            {!! $contact->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function changeContactStatus(event, id) {
        event.preventDefault();
        document.getElementById(`change-contactStatus-${id}`).submit();
    }

    function destroyContact(event, id) {
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
                document.getElementById(`destroy-contact-${id}`).submit()
            }
        })
    }
</script>
