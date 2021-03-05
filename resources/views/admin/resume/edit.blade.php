@section('title')
    <title>پنل مدیریت فرید شیشه بری | پروژه های رزومه</title>
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
                        <li class="breadcrumb-item"><a href="{{route('resume.index')}}">لیست کار ها</a></li>
                        <li class="breadcrumb-item"><a class="my-active" href="{{route('resume.edit',$resume->id)}}">ویرایش پروژه رزومه ({{$resume->name}})</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">ویرایش پروژه رزومه ({{$resume->name}})</h3>
                        </div>

                        <form id="edit_resume_form" action="{{route('resume.update',$resume->id)}}" method="post">

                            @csrf
                            @method('patch')

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">نام پروژه رزومه</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name',$resume->name) }}" id="name" name="name"
                                           placeholder="لطفا نام پروژه رزومه را وارد کنید" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer">مشتری پروژه رزومه</label>
                                    <input onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('customer') is-invalid @enderror"
                                           value="{{ old('customer',$resume->customer) }}" id="customer" name="customer"
                                           placeholder="لطفا مشتری پروژه رزومه را وارد کنید" autocomplete="customer" autofocus>

                                    @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="year">سال تولید پروژه رزومه</label>
                                    <input style="direction: ltr" onkeyup="this.value=removeSpaces(this.value)" type="text" class="form-control @error('year') is-invalid @enderror"
                                           value="{{ old('year',$resume->year) }}" id="year" name="year"
                                           placeholder="لطفا سال تولید پروژه رزومه را وارد کنید" autocomplete="year" autofocus>

                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">بروزرسانی</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('admin.layout.footer')

<script type="text/javascript">

    $(document).ready(function () {

        changeStyleType($('#year'));

        $('#edit_resume_form').validate({

            rules: {

                name: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                customer: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                year: {
                    required: true,
                    digits: true,
                    maxlength: 4,
                    minlength: 4,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }
            },

            messages: {

                name: {
                    required: "لطفا نام پروژه رزومه را وارد کنید"
                },

                customer: {
                    required: "لطفا مشتری پروژه رزومه را وارد کنید"
                },

                year: {
                    required: "لطفا سال تولید پروژه رزومه را وارد کنید",
                    digits: "لطفا سال تولید پروژه رزومه را صحیح وارد کنید",
                    maxlength: "لطفا سال تولید پروژه رزومه را 4 رقمی وارد کنید",
                    minlength: "لطفا سال تولید پروژه رزومه را 4 رقمی وارد کنید"
                }
            }

        });

    });

</script>
