@section('title')
    <title>پنل مدیریت فرید شیشه بری | تراکنش ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('payment.index')}}">لیست تراکنش
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
                            <h3 class="card-title">لیست تراکنش ها</h3>
                            <br>
                            <a href="{{route('payment.pending')}}" class="btn btn-warning">پرداخت معلق</a>
                            <a href="{{route('payment.fail')}}" class="btn btn-danger">پرداخت نشده</a>
                            <a href="{{route('payment.success')}}" class="btn btn-success">پرداخت شده</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام کاربر</th>
                                    <th>عنوان</th>
                                    <td>مبلغ</td>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                    <th>جزئیات</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($payment))

                                    @foreach($payment as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->user_name}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{number_format($item->price)}}</td>
                                            <td class="alert @if($item->status==\App\Models\Payment::ACTIVE_STATUS)
                                                alert-success @elseif($item->status==\App\Models\Payment::INACTIVE_STATUS) alert-danger @else alert-warning @endif">
                                                @if($item->status==\App\Models\Payment::ACTIVE_STATUS)
                                                    پرداخت شده
                                                @elseif($item->status==\App\Models\Payment::INACTIVE_STATUS)
                                                    پرداخت نشده
                                                @else
                                                    پرداخت معلق
                                                @endif
                                            </td>
                                            <td>{{\Hekmatinasser\Verta\Verta::createTimestamp($item->created_at)->format('y/n/j - H:i:s')}}</td>
                                            <td><a href="{{route('payment.show',$item->id)}}" target="_blank"><i class="fa fa-info-circle text-dark"></i></a></td>
                                            <td><a href="{{ route('payment.destroy', $item->id) }}"
                                                   onclick="destroyPayment(event, {{ $item->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('payment.destroy', $item->id) }}" method="post"
                                                      id="destroy-payment-{{ $item->id }}">
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
                            {!! $payment->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function destroyPayment(event, id) {
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
                document.getElementById(`destroy-payment-${id}`).submit()
            }
        })
    }
</script>
