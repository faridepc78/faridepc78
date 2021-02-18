@section('title')
    <title>پنل مدیریت فرید شیشه بری | داشبورد</title>
@endsection

@include('admin.layout.header')

@include('admin.layout.sidebar')


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-database"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">تخصص ها</span>
                            <span class="info-box-number">
                              {{number_format($countExpertise)}}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-wordpress"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">نمونه کار ها</span>
                            <span class="info-box-number">{{number_format($countPortfolio)}}</span>
                        </div>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-paper-plane"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">پست ها</span>
                            <span class="info-box-number">{{number_format($countPost)}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-file"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">پروژه های رزومه</span>
                            <span class="info-box-number">{{number_format($countResume)}}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>


<aside class="control-sidebar control-sidebar-dark">
</aside>

@include('admin.layout.footer')
