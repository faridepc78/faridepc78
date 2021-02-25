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
                        <li class="breadcrumb-item"><a href="{{route('payment.index')}}">لیست تراکنش ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('payment.show',$payment->id)}}">جزئیات تراکنش({{$payment->title}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-{{$payment->status==\App\Models\Payment::ACTIVE_STATUS ? 'success' : 'danger'}}">

                        <div class="card-header">
                            <h3 class="card-title">جزئیات تراکنش({{$payment->title}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="user_name">نام کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->user_name }}" id="user_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_mobile">تلفن همراه کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->user_mobile }}" id="user_mobile">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="user_email">ایمیل کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->user_email }}" id="user_email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_ip">آی پی کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->user_ip }}" id="user_ip">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="title">عنوان تراکنش</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->title }}" id="title">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price">مبلغ تراکنش</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ number_format($payment->price) }}" id="price">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="ref_number">کد پیگیری بانک</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->status==\App\Models\Payment::ACTIVE_STATUS ? $payment->ref_number : 'ندارد'  }}" id="ref_number">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="order_number">کد پیگیری سایت</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->order_number }}" id="order_number">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="status">وضعیت تراکنش</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $payment->status==\App\Models\Payment::ACTIVE_STATUS ? 'پرداخت شده' : 'پرداخت نشده'  }}" id="status">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="created_at">تاریخ تراکنش</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{\Hekmatinasser\Verta\Verta::createTimestamp($payment->created_at)->format('y/n/j - H:i:s')}}" id="created_at">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')
