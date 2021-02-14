<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>


    <div class="sidebar">
        <div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://s.gravatar.com/avatar/ab4c18bcfafe0af95fd3af2613479e44?s=80"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">فرید شیشه بری</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                تخصص ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('expertise.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تخصص ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('expertise.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد تخصص ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-check"></i>
                            <p>
                                دسته بندی نمونه کارها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('portfolio_category.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی نمونه کار ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('portfolio_category.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی نمونه کار ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-wordpress"></i>
                            <p>
                                نمونه کارها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('portfolio.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست نمونه کار ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('portfolio.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد نمونه کار ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-amazon"></i>
                            <p>
                                دسته بندی پست ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('post_category.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی پست ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('post_category.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی پست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-paper-plane"></i>
                            <p>
                                پست ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('post.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پست ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('post.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد پست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                کار ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('work.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کار ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('work.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد کار ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-telegram"></i>
                            <p>
                                شبکه های اجتماعی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('social.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست شبکه های اجتماعی</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('social.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد شبکه های اجتماعی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-phone"></i>
                            <p>
                                راه های ارتباطی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('contactInfo.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست راه های ارتباطی</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('contactInfo.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد راه های ارتباطی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>
                                پروژه های رزومه
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('resume.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پروژه های رزومه</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('resume.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد پروژه های رزومه</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                تنظیمات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('setting.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمایش تنظیمات</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('setting.create') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>مدیریت تنظیمات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </nav>

        </div>
    </div>

</aside>
