@section('title')
    <title>پنل مدیریت فرید شیشه بری | نظرات پست ها</title>
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
                        <li class="breadcrumb-item"><a href="{{route('postComment.index')}}">لیست نظرات پست ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('postComment.show',$postComment->id)}}">جزئیات
                                نظرات پست({{$postComment->user_name}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">جزئیات نظرات پست({{$postComment->user_name}})</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="post_id">پست نظر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{$postComment->post->name}}"
                                           id="post_id">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_name">نام کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $postComment->user_name }}" id="user_name">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="user_email">ایمیل کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $postComment->user_email }}" id="user_email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="user_ip">آی پی کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $postComment->user_ip }}" id="user_ip">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="text">متن تماس</label>
                                    <textarea class="form-control" id="text" rows="5" style="resize: vertical" readonly>{{$postComment->text}}</textarea>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="status">وضعیت نظر</label>
                                    <input readonly type="text" class="form-control alert {{ $postComment->status==\App\Models\PostComment::ACTIVE_STATUS ? 'alert-success' : 'alert-danger'  }}"
                                           value="{{ $postComment->status==\App\Models\PostComment::ACTIVE_STATUS ? 'تایید شده' : 'تایید نشده'  }}"
                                           id="status">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status">نوع کاربر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{ $postComment->users==\App\Models\PostComment::ADMIN_USER ? 'مدیر سایت' : 'کاربر سایت'  }}"
                                           id="status">
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="created_at">تاریخ نظر</label>
                                    <input readonly type="text" class="form-control"
                                           value="{{\Hekmatinasser\Verta\Verta::createTimestamp($postComment->created_at)->format('y/n/j - H:i:s')}}"
                                           id="created_at">
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
