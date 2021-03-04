<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('admin_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>


    <div class="sidebar">
        <div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{auth()->user()->image->thumb}}"
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
                        <a target="_blank" href="{{ route('index') }}"
                           class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                خانه
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('profile') }}"
                           class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                پروفایل
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['expertise.index','expertise.create','expertise.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['expertise.index','expertise.create','expertise.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                تخصص ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('expertise.index') }}"
                                   class="nav-link {{ request()->routeIs('expertise.index') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تخصص ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('expertise.create') }}"
                                   class="nav-link {{ request()->routeIs('expertise.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد تخصص ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['work.index','work.create','work.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['work.index','work.create','work.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                کار ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('work.index') }}"
                                   class="nav-link {{ request()->routeIs(['work.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کار ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('work.create') }}"
                                   class="nav-link {{ request()->routeIs(['work.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد کار ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(
    ['portfolio_category.index','portfolio_category.create','portfolio_category.edit',
    'portfolio.index','portfolio.create','portfolio.edit']
    ) ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link {{ request()->routeIs(
    ['portfolio_category.index','portfolio_category.create','portfolio_category.edit',
    'portfolio.index','portfolio.create','portfolio.edit']
    ) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-wordpress"></i>
                            <p>
                                نمونه کارها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('portfolio_category.index') }}"
                                   class="nav-link {{ request()->routeIs('portfolio_category.index') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('portfolio_category.create') }}"
                                   class="nav-link {{ request()->routeIs('portfolio_category.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('portfolio.index') }}"
                                   class="nav-link {{ request()->routeIs('portfolio.index') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست نمونه کار ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('portfolio.create') }}"
                                   class="nav-link {{ request()->routeIs('portfolio.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد نمونه کار ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(
    ['post_category.index','post_category.create','post_category.edit',
    'post.index','post.create','post.edit']
    ) ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link {{ request()->routeIs(
    ['post_category.index','post_category.create','post_category.edit',
    'post.index','post.create','post.edit']
    ) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-paper-plane"></i>
                            <p>
                                پست ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('post_category.index') }}"
                                   class="nav-link {{ request()->routeIs('post_category.index') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('post_category.create') }}"
                                   class="nav-link {{ request()->routeIs('post_category.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد دسته بندی ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('post.index') }}"
                                   class="nav-link {{ request()->routeIs('post.index') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پست ها</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('post.create') }}"
                                   class="nav-link {{ request()->routeIs('post.create') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد پست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['postComment.index','postComment.active','postComment.inactive','postComment.show']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['postComment.index','postComment.active','postComment.inactive','postComment.show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-comments"></i>
                            <p>
                                نظرات پست ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('postComment.index') }}"
                                   class="nav-link {{ request()->routeIs(['postComment.index','postComment.active','postComment.inactive','postComment.show']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست نظرات پست ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['payment.index','payment.success','payment.fail','payment.show']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['payment.index','payment.success','payment.fail','payment.show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-paypal"></i>
                            <p>
                                تراکنش ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('payment.index') }}"
                                   class="nav-link {{ request()->routeIs(['payment.index','payment.success','payment.fail','payment.show']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تراکنش ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['contact.index','contact.read','contact.unread','contact.show']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['contact.index','contact.read','contact.unread','contact.show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-whatsapp"></i>
                            <p>
                                تماس ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('contact.index') }}"
                                   class="nav-link {{ request()->routeIs(['contact.index','contact.read','contact.unread','contact.show']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست تماس ها</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['customer.index','customer.create','customer.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['customer.index','customer.create','customer.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                مشتریان
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}"
                                   class="nav-link {{ request()->routeIs(['customer.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست مشتریان</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('customer.create') }}"
                                   class="nav-link {{ request()->routeIs(['customer.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد مشتریان</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['social.index','social.create','social.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['social.index','social.create','social.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-telegram"></i>
                            <p>
                                شبکه های اجتماعی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('social.index') }}"
                                   class="nav-link {{ request()->routeIs(['social.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست شبکه های اجتماعی</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('social.create') }}"
                                   class="nav-link {{ request()->routeIs(['social.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد شبکه های اجتماعی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['contactInfo.index','contactInfo.create','contactInfo.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['contactInfo.index','contactInfo.create','contactInfo.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-phone"></i>
                            <p>
                                راه های ارتباطی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('contactInfo.index') }}"
                                   class="nav-link {{ request()->routeIs(['contactInfo.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست راه های ارتباطی</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('contactInfo.create') }}"
                                   class="nav-link {{ request()->routeIs(['contactInfo.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد راه های ارتباطی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['resume.index','resume.create','resume.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['resume.index','resume.create','resume.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file"></i>
                            <p>
                                پروژه های رزومه
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('resume.index') }}"
                                   class="nav-link {{ request()->routeIs(['resume.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پروژه های رزومه</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('resume.create') }}"
                                   class="nav-link {{ request()->routeIs(['resume.create']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>ایجاد پروژه های رزومه</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs(['setting.index','setting.create','setting.edit']) ? 'menu-open' : '' }}">

                        <a href="#"
                           class="nav-link {{ request()->routeIs(['setting.index','setting.create','setting.edit']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                تنظیمات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('setting.index') }}"
                                   class="nav-link {{ request()->routeIs(['setting.index']) ? 'active' : '' }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>نمایش تنظیمات</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('setting.create') }}"
                                   class="nav-link {{ request()->routeIs(['setting.create','setting.edit']) ? 'active' : '' }}">
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
