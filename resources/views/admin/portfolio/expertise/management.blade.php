@section('title')
    <title>پنل مدیریت فرید شیشه بری | اسلایدر نمونه کار</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}">
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
                        <li class="breadcrumb-item"><a href="{{route('portfolio.index')}}">لیست نمونه کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active"
                                                       href="{{route('portfolio.expertise.index',$portfolio->id)}}">مدیریت
                                تخصص های نمونه کار ({{$portfolio->name}})</a></li>
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
                            <h3 class="card-title">مدیریت تخصص های نمونه کار ({{$portfolio->name}})</h3>
                        </div>

                        <form id="create_PortfolioExpertise"
                              action="{{route('portfolio.expertise.store',$portfolio->id)}}" method="post">

                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="expertise_id">تخصص نمونه کار</label>
                                    <select multiple
                                            class="form-control selectpicker  @error('expertise_id') is-invalid @enderror"
                                            id="expertise_id"
                                            name="expertise_id[]" data-container="body"
                                            data-live-search="true"
                                            data-hide-disabled="false" data-actions-box="true"
                                            data-virtual-scroll="true">
                                        <option selected disabled value="">لطفا تخصص نمونه کار را انتخاب
                                            کنید
                                        </option>
                                        @foreach ($expertise as $value)
                                            <option
                                                @if($portfolio->expertise->contains($value->id))
                                                selected disabled value=""
                                                @else
                                                value="{{$value->id}}"
                                            @if (old("expertise_id"))
                                                {{ (in_array($value->id, old("expertise_id")) ? "selected":"") }}
                                                @endif
                                                @endif
                                            >
                                                {{$value->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('expertise_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست تخصص های نمونه کار ({{$portfolio->name}})</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered text-center">

                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>حذف</th>
                                </tr>

                                @if(count($portfolio->expertise))

                                    @foreach($portfolio->expertise as $key=>$value)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>
                                                <a href="{{ route('portfolio.expertise.destroy', [$portfolio->id,$value->portfolio_expertise->id]) }}"
                                                   onclick="destroyPortfolioExpertise(event,{{ $portfolio->id }}, {{ $value->portfolio_expertise->id }})"><i
                                                        class="fa fa-remove text-danger"></i></a>
                                                <form
                                                    action="{{ route('portfolio.expertise.destroy', [$portfolio->id,$value->portfolio_expertise->id]) }}"
                                                    method="post"
                                                    id="destroy-PortfolioExpertise-{{ $portfolio->id }}-{{ $value->portfolio_expertise->id }}">
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

                    </div>

                </div>
            </div>

        </div>
    </section>
</div>

@section('js')
    <script type="text/javascript"
            src="{{asset('admin_assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
@endsection

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {
        $('select').selectpicker();
    });

    $('#create_PortfolioExpertise').submit(function (event) {
        var expertise_id_value = $("#expertise_id").val();
        if (expertise_id_value == '') {
            event.preventDefault();
            toastr["info"]("لطفا یک مورد را انتخاب کنید", "پیام")
        } else {
            event.submit();
        }
    });

    function destroyPortfolioExpertise(event, portfolio_id, id) {
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
                document.getElementById(`destroy-PortfolioExpertise-${portfolio_id}-${id}`).submit()
            }
        })
    }
</script>
