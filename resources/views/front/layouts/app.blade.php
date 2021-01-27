<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{isset($website_setting) && $website_setting!=null ? getDefaultValueKey($website_setting->title).' || ' : ''}} @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front')}}/img/icon.png">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css">
    @else
        <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap.min.css">
    @endif


<!--owl carousel min css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/font.awesome.css">
    <!--animate css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="{{asset('front')}}/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('front')}}/css/style.css">
    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="{{asset('front')}}/css/style_rtl.css">
    @endif

    <link rel="stylesheet" href="{{asset('front')}}/css/loading.css">

    <style>
        #scrollUp {
            display: none !important;
        }
    </style>

    <!--modernizr min js here-->
    <script src="{{asset('front')}}/js/vendor/modernizr-3.7.1.min.js"></script>

    @yield('style')
</head>

<body style="overflow: hidden;">

<!----- Start Section Loading ----->
<section class="loading-overlay">
    <div class="loader"></div>
    <img src="{{asset('front')}}/img/icon.png"/>
</section>
<!----- End Section Loading ----->

<!--header area start-->

<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="welcome-text">
                        <p>{{ translate('website','welcome_message') }}</p>
                    </div>
                    <div class="language_currency text-center">
                        <ul>
                            <li class="language"><a href="#">{{ translate('website','language') }}<i
                                            class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_language">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="call-support">
                        <p>{{ translate('website','call_support') }}<a
                                    href="tel:{{$website_setting->support_phone}}">{{$website_setting->support_phone}}</a>
                        </p>
                    </div>
                    <div id="menu" class="text-left">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children"><a
                                        href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                            <li class="menu-item-has-children"><a
                                        href="{{route('about')}}">{{ translate('website','about') }}</a></li>
                            <li class="menu-item-has-children">
                                <a href="{{route('products')}}">{{ translate('website','our_products') }}</a>
                                @if(isset($categories) && $categories!=null)
                                    <ul class="sub-menu">
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{route('products', [$category->id])}}">{{getDefaultValueKey($category->title)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li class="menu-item-has-children"><a
                                        href="{{route('certifications')}}">{{ translate('website','certifications') }}</a>
                            </li>
                            <li class="menu-item-has-children"><a
                                        href="{{route('blog')}}">{{ translate('website','blog') }}</a></li>
                            <li class="menu-item-has-children"><a
                                        href="{{route('contact_us')}}">{{ translate('website','contact_us') }}</a></li>
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span>
                            <a href="{{$website_setting->support_email}}">
                                <i class="fa fa-envelope-o"></i> {{$website_setting->support_email}}
                            </a>
                        </span>
                        @if(isset($sociallinks) && $sociallinks!=null)
                            <ul>
                                @foreach($sociallinks as $sociallink)
                                    <li class="{{$sociallink->class}}">
                                        <a href="{{$sociallink->link}}">
                                            <i class="{{$sociallink->icon}}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--offcanvas menu area end-->
<header>
    <div class="main_header header_3 header_transparent sticky-header">
        <div class="header_container">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="{{asset('files/'.$website_setting->image)}}"
                                                             alt="{{getDefaultValueKey($website_setting->title)}}"></a>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-9 col-8">
                        <!--main menu start-->
                        <div class="main_menu menu_three menu_position">
                            <nav>
                                <ul>
                                    @php $segment =  Request::segment(2) @endphp
                                    <li>
                                        <a href="{{route('home')}}"
                                           class="{{$segment=='home'||!isset($segment) ? 'active' : ''}}">
                                            {{ translate('website','home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('about')}}" class="{{$segment=='about' ? 'active' : ''}}">
                                            {{ translate('website','about') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('products')}}"
                                           class="{{$segment=='products'||$segment=='product' ? 'active' : ''}}">{{ translate('website','our_products') }}</a>
                                        @if(isset($categories) && $categories!=null)
                                            <ul class="sub_menu">
                                                @foreach($categories as $category)
                                                    <li>
                                                        <a href="{{route('products', [$category->id])}}">{{getDefaultValueKey($category->title)}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                    <li><a href="{{route('certifications')}}"
                                           class="{{$segment=='certifications' ? 'active' : ''}}">{{ translate('website','certifications') }}</a>
                                    </li>
                                    <li><a href="{{route('blog')}}"
                                           class="{{$segment=='blog'||$segment=='blog_details' ? 'active' : ''}}">{{ translate('website','blog') }}</a>
                                    </li>
                                    <li><a href="{{route('contact_us')}}"
                                           class="{{$segment=='contact_us' ? 'active' : ''}}">{{ translate('website','contact_us') }}</a>
                                    </li>

                                    @foreach (LaravelLocalization::getSupportedLocales() as $key => $value)
                                        @if($key != app()->getLocale())
                                            <li>
                                                <a href="{{LaravelLocalization::getLocalizedURL($key)}}">{{$key}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->

@yield('content')

<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="widgets_container widget_app">
                        <div class="footer_logo">
                            <a href="{{route('home')}}"><img src="{{asset('files/'.$website_setting->image)}}"
                                                             alt="{{getDefaultValueKey($website_setting->title)}}"></a>
                        </div>
                        <div>
                            <p>{!! isset($website_setting) && $website_setting!=null ? getDefaultValueKey($website_setting->description) : '' !!}</p>
                        </div>
                        @if(isset($sociallinks) && $sociallinks!=null)
                            <div class="footer_social">
                                <ul>
                                    @foreach($sociallinks as $sociallink)
                                        <li>
                                            <a href="{{$sociallink->link}}" target="_blank">
                                                <i class="{{$sociallink->icon}}" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>{{ translate('website','quick_links') }}</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{route('home')}}">{{ translate('website','home') }}</a></li>
                                <li><a href="{{route('about')}}">{{ translate('website','about') }}</a></li>
                                <li><a href="{{route('products')}}">{{ translate('website','our_products') }}</a></li>
                                <li>
                                    <a href="{{route('certifications')}}">{{ translate('website','certifications') }}</a>
                                </li>
                                <li><a href="{{route('blog')}}">{{ translate('website','blog') }}</a></li>
                                <li><a href="{{route('contact_us')}}">{{ translate('website','contact_us') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>{{ translate('website','main_categories') }}</h3>
                        <div class="footer_menu">
                            @if(isset($categories) && $categories!=null)
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('products', [$category->id])}}">{{getDefaultValueKey($category->title)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widgets_container contact_us">
                        <h3>{{ translate('website','contact_info') }}</h3>
                        <div class="contact_message content">
                            <ul>
                                <li>
                                    <i class="fa fa-fax"></i>{{ translate('website','address') }} {{getDefaultValueKey($website_setting->address)}}
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:{{$website_setting->support_email}}">{{$website_setting->support_email}}</a>
                                    <a href="mailto:{{$website_setting->sales_email}}"
                                       style="padding-left: 28px;">{{$website_setting->sales_email}}</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:{{$website_setting->support_phone}}">{{$website_setting->support_phone}}</a>
                                    -
                                    <a href="tel:{{$website_setting->sales_phone}}">{{$website_setting->sales_phone}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="copyright_area text-center">
                        <p>Copyright &copy; 2020 <a href="javascript:void(0);">Planet Herbs</a> All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="javascript:void(0);">
                                                <img id="product_image" style="width: 380px; height: 380px;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2 id="product_title"></h2>
                                </div>
                                <div class="modal_price mb-10">
                                    {{ translate('website','product_code') }} <span class="new_price"
                                                                                    id="product_code"> </span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p id="product_description"></p>
                                </div>
                                <div class="variants_selects">
                                    <div class="modal_add_to_cart">
                                        <a class="modal_button"
                                           id="product_url">{{ translate('website','view_full_details') }}</a>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>{{ translate('website','share_product') }}</h2>
                                    <ul>
                                        <li class="facebook"><a href="javascript:void(0);"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="pinterest"><a href="javascript:void(0);"><i
                                                        class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="javascript:void(0);"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="javascript:void(0);"><i
                                                        class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->


<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{asset('front')}}/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="{{asset('front')}}/js/popper.js"></script>
<!--bootstrap min js-->
<script src="{{asset('front')}}/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="{{asset('front')}}/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="{{asset('front')}}/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="{{asset('front')}}/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="{{asset('front')}}/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="{{asset('front')}}/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="{{asset('front')}}/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="{{asset('front')}}/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="{{asset('front')}}/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="{{asset('front')}}/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="{{asset('front')}}/js/plugins.js"></script>

<!-- Main JS -->
@if(App::isLocale('ar'))
    <script src="{{asset('front')}}/js/main_rtl.js"></script>
@else
    <script src="{{asset('front')}}/js/main.js"></script>
@endif

<script>
    //--------------------------------- Loading Screen --------------------------------
    $(window).on('load', function () {
        $(".loading-overlay .loader, .loading-overlay img").fadeOut(2000, function () {
            $(this).parent().fadeOut(2000)
        });
        $("body").css("overflow", "auto");
        $(this).remove();
    });

    //--------------------------------- Loading Modal Data ----------------------------
    function modalData(id, code, title, description, image_url, product_url) {
        console.log('id:', id);
        console.log('code:', code);
        console.log('title:', title);
        console.log('description:', description);
        console.log('image_url:', image_url);
        console.log('product_url:', product_url);

        $("#product_code").html(code);
        $("#product_title").html(title);
        $("#product_description").html(description);
        $('#product_image').attr('src', image_url);
        $('#product_url').attr('href', product_url);
    }
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5ff70bdda9a34e36b96a0232/1eregcmca';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->

@yield('script')


</body>

</html>
