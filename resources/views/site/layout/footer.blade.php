<footer data-page="home" class="hidden-print">
    <div class="footer-content wrapper clearfix">
        <div class="col-md-4 copyright">
            <i class="fi fi-copyright"></i>
            کلیه حقوق سایت محفوظ می‌باشد.
        </div>
        <div class="col-md-5 menu">
            <ul>
                <li>
                    <a href="#top">بازگشت به بالا</a>
                </li>
                <li>
                    <a href="{{route('posts')}}">بلاگ</a>
                </li>
                <li>
                    <a href="{{route('terms')}}">قوانین و مقررات</a>
                </li>
                <li>
                    <a href="{{route('contact-me')}}">تماس با من</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 social-networks">
            <ul>

                @if(count($social))

                    @foreach($social as $value)

                        <li data-color="{{$value->color}}">
                            <a href="{{$value->link}}"><i class="fi fi-lg {{$value->icon}}" title="{{$value->name}}"></i></a>
                        </li>

                    @endforeach

                @endif

            </ul>
        </div>
    </div>
</footer>

</div>

<script type="text/javascript" src='{{ asset('site_assets/js/jquery-3.2.0.min.js') }}'></script>
<script type="text/javascript" src='{{ asset('site_assets/js/bootstrap.min.js') }}'></script>
<script type="text/javascript" src='{{ asset('site_assets/js/public.js') }}'></script>
<script type="text/javascript" src="{{asset('site_assets/plugins/toast/js/toast.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site_assets/plugins/toast/js/toast-options.js')}}"></script>
<script>@include('site.layout.feedbacks')</script>

@yield('load_js')

</body>
</html>
