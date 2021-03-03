@section('title')
    <title>پنل مدیریت فرید شیشه بری | پست ها</title>
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
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('post.index')}}">لیست پست
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
                            <h3 class="card-title">لیست پست ها</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>کل</th>
                                    <th>در حال برسی</th>
                                    <th>تایید شده</th>
                                    <th>رد شده</th>
                                    <th>نمایش نظرات</th>
                                </tr>

                                @if(count($post))

                                    @foreach($post as $key=>$item)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                {{ $item->countAllComment() }}
                                            </td>
                                            <td class="alert alert-warning">
                                                {{ $item->countPendingComment() }}
                                            </td>
                                            <td class="alert alert-success">
                                                {{ $item->countActiveComment() }}
                                            </td>
                                            <td class="alert alert-danger">
                                                {{ $item->countInactiveComment() }}
                                            </td>
                                            <td><a href="{{route('postComment.showComment',$item->id)}}" target="_blank"><i
                                                        class="fa fa-eye text-success"></i></a></td>
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
                            {!! $post->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.layout.footer')
