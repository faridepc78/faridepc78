<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <link rel="stylesheet" href="{{asset('admin_assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/adminlte.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/dist/css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/toast/css/toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/plugins/validation/css/validate.css')}}">
    <link rel="icon" href="{{ asset('admin_assets/dist/img/favicon.ico') }}" type="image/x-icon">

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

        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-warning navbar-badge">{{ number_format($countAllPendingPostComment+$countAllPendingContact) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

                    <span class="dropdown-item dropdown-header">{{ number_format($countAllPendingPostComment+$countAllPendingContact) }} نوتیفیکیشن</span>

                    <a target="_blank" href="{{ route('postComment.index') }}" class="dropdown-item">
                        <i class="fa fa-comments ml-2"></i>
                        <span>{{number_format($countAllPendingPostComment)}}</span>
                        <span>نظر در حال برسی</span>
                    </a>

                    <a target="_blank" href="{{ route('contact.index') }}" class="dropdown-item">
                        <i class="fa fa-whatsapp ml-2"></i>
                        <span>{{number_format($countAllPendingContact)}}</span>
                        <span>تماس در حال برسی</span>
                    </a>

                </div>
            </li>
            <li class="nav-item">
                <a title="خروج" class="nav-link text-danger" href="{{route('logout')}}"><i
                        class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </nav>
