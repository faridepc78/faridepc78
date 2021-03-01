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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('postComment.index')}}">لیست
                                نظرات پست
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
                            <h3 class="card-title">لیست نظرات پست ها</h3>
                            <br>
                            <a href="{{route('postComment.pending')}}" class="btn btn-warning">در حال برسی</a>
                            <a href="{{route('postComment.active')}}" class="btn btn-success">تایید شده</a>
                            <a href="{{route('postComment.inactive')}}" class="btn btn-danger">تایید نشده</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>اطلاعات کاربر</th>
                                    <th>پست نظر</th>
                                    <th>تعداد زیر نظرات</th>
                                    <th>متن</th>
                                    <th>وضعیت</th>
                                   {{-- <th>تاریخ نظر</th>--}}
                                    <th>زیر نظرات</th>
                                    <th>جزئیات</th>
                             {{--       <th>تغییر وضعیت</th>
                                    <th>حذف</th>--}}
                                </tr>

                                @if(count($postComment))

                                    @foreach($postComment as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#postCommentUserInfo{{$item->id}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>
                                            <td>{{$item->post->name}}</td>

                                            <td>@if($item->parent_id==null)<i class="fa fa-check text-success"></i>@else<i
                                                    class="fa fa-remove text-danger"></i> @endif</td>

                                            <td>
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                   data-target="#postCommentText{{$item->id}}">
                                                    <i class="fa fa-eye text-success"></i>
                                                </a>
                                            </td>

                                            <td class="alert @if($item->status==\App\Models\PostComment::ACTIVE_STATUS)
                                                alert-success @elseif($item->status==\App\Models\PostComment::INACTIVE_STATUS) alert-danger @else alert-warning @endif">
                                                @if($item->status==\App\Models\PostComment::ACTIVE_STATUS)
                                                    تایید شده
                                                @elseif($item->status==\App\Models\PostComment::INACTIVE_STATUS)
                                                    تایید نشده
                                                @else
                                                    در حال برسی
                                                @endif
                                            </td>

                                            <td>
                                                {{ $item->countChildrenComments() }}
                                            </td>

                                            {{--<td>{{\Hekmatinasser\Verta\Verta::createTimestamp($item->created_at)->format('y/n/j - H:i:s')}}</td>--}}

                                            <td><a href="{{route('postComment.reply',$item->id)}}" target="_blank"><i
                                                        class="fa fa-comments text-success"></i></a></td>

                                            <td><a href="{{route('postComment.show',$item->id)}}" target="_blank"><i
                                                        class="fa fa-info-circle text-dark"></i></a></td>

                                            {{--<td>
                                                <a href="{{ route('postComment.change_status', $item->id) }}"
                                                   onclick="changePostCommentStatus(event, {{ $item->id }})"><i
                                                        class="fa fa-edit text-primary"></i></a>
                                                <form action="{{ route('postComment.change_status', $item->id) }}"
                                                      method="post"
                                                      id="change-postCommentStatus-{{ $item->id }}">
                                                    @csrf
                                                    @method('patch')
                                                </form>
                                            </td>--}}

                                            <td><a href="{{ route('postComment.destroy', $item->id) }}"
                                                   onclick="destroyPostComment(event, {{ $item->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form action="{{ route('postComment.destroy', $item->id) }}"
                                                      method="post"
                                                      id="destroy-postComment-{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade mt-lg-5"
                                             id="postCommentUserInfo{{$item->id}}" tabindex="-1"
                                             role="dialog"
                                             aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-header">

                                                        <h6 class="modal-title">
                                                            اطلاعات کاربر
                                                            ({{$item->user_name}})
                                                        </h6>

                                                        <a style="color: red;cursor: pointer"
                                                           data-dismiss="modal" aria-label="Close">
                                                            <i style="color: red" class="fa fa-close"></i>
                                                        </a>

                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="user_name">نام کاربر :</label>
                                                                <input class="form-control" id="user_name" type="text"
                                                                       readonly value="{{$item->user_name}}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="user_email">ایمیل کاربر :</label>
                                                                <input class="form-control text-left" id="user_email"
                                                                       type="text" readonly
                                                                       value="{{$item->user_email}}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="user_ip">آی پی کاربر :</label>
                                                                <input class="form-control text-left" id="user_ip"
                                                                       type="text" readonly value="{{$item->user_ip}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="modal fade mt-lg-5"
                                             id="postCommentText{{$item->id}}" tabindex="-1"
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
                            {!! $postComment->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')

<script type="text/javascript">
    function changePostCommentStatus(event, id) {
        event.preventDefault();
        document.getElementById(`change-postCommentStatus-${id}`).submit();
    }

    function destroyPostComment(event, id) {
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
                document.getElementById(`destroy-postComment-${id}`).submit()
            }
        })
    }
</script>
