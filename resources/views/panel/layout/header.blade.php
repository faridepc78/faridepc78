<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <link rel="stylesheet" href="{{asset('panel/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('panel/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('panel/dist/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins/toast/css/toast.min.css')}}">

    @yield('css')

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                        <span class="float-left text-muted text-sm">12 ساعت</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                        <span class="float-left text-muted text-sm">2 روز</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
                </div>
            </li>
            <li class="nav-item">
                <a title="خروج" class="nav-link text-danger" href="{{route('logout')}}"><i
                        class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
