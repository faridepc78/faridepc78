@section('title')
    <title>پنل مدیریت فرید شیشه بری | تنظیمات</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('setting.index')}}">تنظیمات</a></li>
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
                            <h3 class="card-title">تنظیمات</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <td>تنظیمات</td>
                                    <th>ویرایش</th>
                                </tr>

                                @if($setting)

                                    <tr>
                                        <td><div class="alert alert-info text-center"><p>برای مشاهده جزئیات و بروزرسانی می توانید به لینک روبرو مراجعه کنید</p></div></td>
                                        <td><a href="{{route('setting.edit',$setting->id)}}"><i
                                                    class="fa fa-edit text-primary"></i></a></td>
                                    </tr>

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
