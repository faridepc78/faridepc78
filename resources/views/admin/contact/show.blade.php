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
                        <li class="breadcrumb-item"><a href="{{route('contact.index')}}">لیست تماس ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('contact.show',$contact->id)}}">جزئیات
                                تماس({{$contact->user_name}})</a></li>
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
                            <h3 class="card-title">جزئیات تماس({{$contact->user_name}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="user_name">نام کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->user_name }}" id="user_name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_mobile">تلفن همراه کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->user_mobile }}" id="user_mobile">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="user_email">ایمیل کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->user_email }}" id="user_email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_ip">آی پی کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->user_ip }}" id="user_ip">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="text">متن تماس</label>
                                    <textarea class="form-control" id="text" rows="5" style="resize: vertical" readonly>{{$contact->text}}</textarea>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="status">وضعیت تماس</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->status==\App\Models\Contact::READ_STATUS ? 'خوانده شده' : 'خوانده نشده'  }}"
                                           id="status">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="created_at">تاریخ تماس</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{\Hekmatinasser\Verta\Verta::createTimestamp($contact->created_at)->format('y/n/j - H:i:s')}}"
                                           id="created_at">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="know">شیوه آشنایی کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $contact->know }}" id="know">
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@section('js')
    <script src="{{asset('admin_assets/plugins/ckeditor/ckeditor.js')}}"></script>
@endsection

@include('admin.layout.footer')
