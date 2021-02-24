@section('title')
    <title>فرید شیشه بری | نتیجه پرداخت</title>
@endsection

@section('data_page')
    <div class="header hidden-print" data-page="payment">
        @endsection

        @include('site.layout.header')

        <div class="custom-page-header hidden-print" data-page="payment">
            <div class="cover">
                <div class="wrapper">
                    <h1 class="title">
                        <a href="javascript:void(0)">نتیجه پرداخت</a>
                    </h1>
                    <div class="breadcrumbs">
                        <ul class="clearfix">
                            <li><a href="{{route('index')}}">صفحه اصلی</a></li>
                            <li><a href="{{route('payment')}}">پرداخت آنلاین</a></li>
                            <li><a href="javascript:void(0)">نتیجه پرداخت</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content payment-callback" data-page="payment_callback">
            <div class="wrapper-970 clearfix pc-content">
                <div class="payment-result"
                     data-status="{{ $data->status==\App\Models\Payment::ACTIVE_STATUS ? 'Paid' : 'Unpaid' }}">
                    <div class="clearfix pr-header">
                        <div class="col-md-6 h-title">
                            <div class="title">{{$data->title}}</div>
                            <div
                                class="status">{{ $data->status==\App\Models\Payment::ACTIVE_STATUS ? 'پرداخت شده' : 'پرداخت نشده' }}</div>
                        </div>
                        <div class="col-md-6 h-details">
                            <div class="amount">{{number_format($data->price)}} تومان</div>
                            <div
                                class="date">{{\Hekmatinasser\Verta\Verta::createTimestamp($data->created_at)->format('l j F Y - H:i:s')}}</div>
                        </div>
                    </div>
                    <div class="pr-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام و نام خانوادگی</th>
                                    <th>ایمیل</th>
                                    <th>شماره تماس</th>
                                    <th>کد پیگیری سایت</th>
                                    <th>کد پیگیری بانک</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$data->user_name}}</td>
                                    <td>{{$data->user_email}}</td>
                                    <td>{{$data->user_mobile}}</td>
                                    <td>{{$data->order_number}}</td>
                                    <td>{{$data->status==\App\Models\Payment::ACTIVE_STATUS ? $data->ref_number : ''}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="print-button-area hidden-print">
                        <button type="button" class="btn-print">
                            <i class="fi fi-lg fi-print"></i>
                            چاپ رسید پرداخت
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @section('load_js')
            <script type="text/javascript" src='{{ asset('site_assets/js/pages/payment_callback.js') }}'></script>
@endsection

@include('site.layout.footer')
