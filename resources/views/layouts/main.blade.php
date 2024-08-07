<!DOCTYPE html>
<html>
<div id="google_translate_element"></div>
<script type="text/javascript">// <![CDATA[
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'fa', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
    // ]]></script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

<head>
    <title>آرسا {{$title ?? ''}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
{{--    <meta name="description" content="مجموعه آرسا با بهترین خدمات در راستای هوشمندسازی ساختمان های مختلف در خدمت شماست">--}}
{{--    <meta name="keywords" content="هوشمندسازی ساختمان/هوشمندسازی">--}}
    <meta name="author" content="Morteza Jaladat">

    <meta name="enamad" content="551192"/>

    <link rel="icon" href="{{asset('images/site/rsa_background2.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('images/site/rsa_icon.png')}}" type="image/x-icon">


{{$link ?? ''}}
<!--icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/themify.css')}}">


    {{--    <!--Slick slider css-->--}}
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick.css')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/bootstrap.css')}}" >

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/color2.css')}}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="screen">

</head>

<body class="bg-light rtl">

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="{{asset('images/site/Rsa_Rotate_Site_gif.gif')}}" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
<header id="stickyheader">
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-12 header-div-display">
                    <div class="header-logo-with-title col-md-3">
                        <div class="brand-logo logo-sm-center">
                            <a href="{{route('home')}}">
                                <img src="{{asset('images/site/logo-micro.png')}}" class="img-fluid  "
                                     alt="هوشمندسازی-ساختمان-آرسا">
                            </a>
                        </div>
                        <div class="brand-name">
                            <h4>
                                شرکت آرسا
                            </h4>
                        </div>
                    </div>
                    <div class="arsa_slogan col-md-6">
                        <h5>
                            <p>
                                با آرسا هوشمندانه زندگی کن
                            </p>
                        </h5>
                    </div>
                    <div class="col-md-3 user-panel">
                        @if(auth()->check())
                            <div class="header-user-name">
                                <div class="header-user-block">
                                    <div class="header-user-dropdown">
                                              <span class="user-dropdown-click">
                                                  <span style="padding: 0 5px"><i class="fas fa-user"></i></span>
                                                {{auth()->user()->name}} <i class="fa fa-angle-down"
                                                                            aria-hidden="true"></i>
                                              </span>
                                        <ul class="user-dropdown-open">
                                            <li><a href="{{route('dashboard')}}">پنل کاربری</a></li>
                                            <li><a href="{{route('cart.index')}}">سبد خرید</a></li>
                                            <li><a href="{{route('wishlist')}}">لیست علاقه مندی ها</a></li>
                                            <li><a href="{{route('logout')}}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">خروج
                                                    از حساب</a></li>
                                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="user-sign-select">
                                <ul>
                                    <li style="padding: 0 5px"><i class="color_gold fas fa-user"></i></li>
                                    <li><a href="{{route('register')}}">ثبت نام</a></li>
                                    <li><a id="user-sign-select-slash">/</a></li>
                                    <li><a href="{{route('login')}}">ورود </a></li>
                                    <form action="{{ route('login') }}" method="get" id="login-form">
                                    </form>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="main-menu-block">
                    <div class="header-right">
                        <div class="menu-nav">
                            <span class="toggle-nav">
                              <i class="fa fa-bars "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-header-2">
        <div class="container">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-menu">
                            <div class="logo-block">
                                <div class="brand-logo logo-sm-center">
                                    <a href="index.html">
                                        <img src="{{asset('images/site/logo.png')}}"
                                             class="img-fluid  "  alt="هوشمندسازی-ساختمان-آرسا">
                                    </a>
                                </div>
                            </div>
                            <div class="menu-block">
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">بازگشت<i class="fa fa-angle-left pe-2"
                                                                                         aria-hidden="true"></i>
                                            </div>
                                        </li>
                                        <!--HOME-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('home')}}">صفحه اصلی</a>
                                        </li>
                                        <!--HOME-END-->

                                        <!--product-menu start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('allProducts')}}">محصولات</a>
                                            <ul>
                                                @foreach(\App\Models\Category::all() as $category)
                                                    <li>
                                                        <a href="{{route('category',[$category->child])}}">
                                                            {{$category->child}}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <!--product-meu end-->

                                        <!--khadamat start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('home')}}">خدمات</a>
                                            <ul>
                                                <li><a href="{{route('allApproachs')}}">راهکارها </a></li>
                                                <li><a href="{{route('invoiceCalculator.input')}}">پیش فاکتور</a></li>
                                                <li><a href="{{route('consultation')}}"> مشاوره </a></li>
                                                <li><a href="{{route('support')}}">پشتیبانی</a></li>
                                                <li><a href="{{route('learn.all')}}">آموزش</a></li>

                                            </ul>
                                        </li>
                                        <!--khadamat end-->

                                        <!--hamkari start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('representation')}}">همکاری با ما</a>
                                            <ul>
                                                <li><a href="{{route('representation')}}"> درخواست نمایندگی </a></li>
                                            </ul>
                                        </li>
                                        <!--hamkari end-->

                                        <!--darbarema start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('home')}}">درباره ما</a>
                                            <ul>
                                                <li><a href="{{route('define.arsa')}}">معرفی آرسا</a></li>
                                                <li><a href="{{route('project.all')}}">پروژه ها</a></li>
                                                <li><a href="{{route('why.arsa')}}">چرا آرسا</a></li>
                                            <!--<li><a href="{{route('branchs')}}">شعبه ها</a></li>-->
                                                <li><a href="{{route('oath')}}">سوگند نامه</a></li>
                                                <li><a href="{{route('regulation')}}">قوانین و مقررات</a></li>
                                            </ul>
                                        </li>
                                        <!--darbarema end-->

                                        <!--tamasbama start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('contact.us')}}">تماس با ما</a>
                                        </li>
                                        <!--tamasbama end-->

                                        <!--catalog start-->
                                        <li>
                                            <a class="dark-menu-item" href="{{route('showCatalog')}}">کاتالوگ</a>
                                            <ul>
                                                <li><a href="{{route('showCatalog')}}" >نمایش کاتالوگ</a>
                                                <li><a href="{{route('downloadCatalog')}}">دانلود کاتالوگ</a></li>
                                            </ul>
                                        </li>
                                        <!--catalog end-->


                                    </ul>
                                </nav>
                            </div>
                            <div class="header-leftdiv inline_flex">
                                <div class="search-div ">
                                    <div class="input-block">
                                        <div class="input-box">
                                            <form class="classic-form " action="{{ route('search') }}" method="get">
                                                <div class="input-group ">

                                                    <button class="header-search-button" type="submit">
                                                        <span class="search search-icon"><i
                                                                class="fa fa-search"></i></span>
                                                    </button>

                                                    <input name="search_input" type="search" class="classic-input"
                                                           placeholder="جستجوی محصول">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-social">
                                    <ul class="sosiyal">
                                        <li><a target="_blank"
                                               href="https://www.google.com/maps/@31.7722745,54.2227189,16.75z"><i
                                                    class="fa fa-map-marker"></i></a></li>
                                        <li><a target="_blank"
                                               href="https://mail.google.com/mail/u/0/?fs=1&to=info@rsaholding.com&bcc=info@rsaholding.com&tf=cm"><i
                                                    class="fa fa-envelope"></i></a></li>
                                        <!--<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>-->
                                        <li><a target="_blank" href="https://www.instagram.com/r.sa_bms/"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <!--<li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
<!--header end-->

{{$slot}}


<!-- footer start -->
<footer>
    <div class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main">
                        <div class="footer-box">
                            <div class="footer-title mobile-title">
                                <h5>شرکت آرسا</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="{{asset('images/site/logo-mini.png')}}"
                                             class="img-fluid"  alt="هوشمندسازی-ساختمان-آرسا-لوگو">
                                    </a>
                                </div>
                                <p>
                                    در فروشگاه آرسا محصولات را با بهترین کیفیت و بهترین قیمت خریداری نمایید
                                    و درب منزل تحویل بگیرید.
                                    رضایت شما افتخار ماست.

                                </p>
                                <!--<ul class="paymant">-->
                                <!--    <li>-->
                                <!--        <a href="javascript:void(0)">-->
                            <!--            <img src="{{asset('images/site/zarinpal.svg')}}"-->
                                <!--                 class="img-fluid"-->
                                <!--                 alt="pay">-->
                                <!--        </a>-->
                                <!--    </li>-->

                                <!--</ul>-->
                                <div id="enamad">
                                    <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=271241&amp;Code=ZOBmt80xHiaD2exQCjAi"><img referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=271241&amp;Code=ZOBmt80xHiaD2exQCjAi" alt="" style="cursor:pointer" id="ZOBmt80xHiaD2exQCjAi">
                                    </a>
                                </div>

                            </div>


                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>راه های ارتباطی</h5>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li>
                                        <a href="{{route('contact.us')}}">تماس با ما</a>
                                    </li>

                                    <li>
                                        <a class="arsa-location" target="_blank"
                                           href="https://www.google.com/maps/place/Salamat+Drug+Store/@31.8385938,54.3691094,21z/data=!4m5!3m4!1s0x3fa61eca7c2c7137:0xe411e9b812cf3aca!8m2!3d31.8386126!4d54.3690875">
                                            <i class="fa-solid fa-map-marker fa-bounce"></i>
                                        </a>
                                        <h6>
                                            دفتر مرکزی:
                                        </h6>
                                        <span>
                                           یزد، صفاییه، بلوار دانشگاه، جنب داروخانه سلامت
                                        </span>
                                    </li>
                                    <li>
                                        <a class="arsa-location" target="_blank"
                                           href="https://www.google.com/maps/@31.7722745,54.2227189,16.75z">
                                            <i class="fa-solid fa-map-marker fa-bounce"></i>
                                        </a>
                                        <h6>
                                            کارخانه:
                                        </h6>
                                        <span>
                                            یزد ، شهرک صنعتی 2 تفت، خیابان کارآفرین1
                                        </span>

                                    </li>
                                    <li>
                                        شماره تماس :
                                        <span>09198387828</span>
                                    </li>
                                    <li>
                                        ایمیل :info@rsaholding.com
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>شبکه های اجتماعی</h5>
                            </div>
                            <div class="footer-contant">
                                <p>
                                    از اینکه مارا در شبکه های اجتماعی دنبال می کنید سپاسگزاریم
                                </p>
                                <div class="social-box">
                                    <ul class="sosiyal">
                                        <li>
                                            <a target="_blank"
                                               href="https://linkedin.com/rsabms">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank"
                                               href="https://twitter.com/rsabms">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank"
                                               href="https://t.me/rsabms">
                                                <i class="fab fa-telegram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank"
                                               href="https://mail.google.com/mail/u/0/?fs=1&to=info@rsaholding.com&bcc=info@rsaholding.com&tf=cm">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/r.sa_bms/">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="support-whatsapp">
        <div class="support-whatsapp-icon">
            <a target="_blank" href="https://wa.me/+989330892905">
                <i class="fab fa-whatsapp fa-beat" class="whatsappIcon"></i>
            </a>
        </div>
        <div class="support-whatsapp-text">
             <span>
                 کمک نیاز دارید؟
             <br/>
             <strong>چت از طریق واتساپ</strong>
             </span>
        </div>
    </div>

    
    <div class="subfooter dark-footer ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="footer-left">
                        <p>تمام حقوق این سایت محفوظ و در اختیار شرکت آرسا می باشد</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->



{{$afterfooter ?? ''}}

<!-- sweet alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('status'))
    <script>
        Swal.fire({title: "{{ session('status') }}", confirmButtonText: 'تایید', icon: 'success'})
    </script>
@endif
@if(Session::has('error'))
    <script>
        Swal.fire({title: "{{ session('error') }}", confirmButtonText: 'تایید', icon: 'error'})
    </script>
@endif
@if(Session::has('info'))
    <script>
        Swal.fire({title: "{{ session('info') }}", confirmButtonText: 'تایید', icon: 'info'})
    </script>
@endif
<!-- latest jquery-->
<script src="{{asset('bigdeal/assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- slick js-->
<script src="{{asset('bigdeal/assets/js/slick.js')}}"></script>

<!-- menu js-->
<script src="{{asset('bigdeal/assets/js/menu.js')}}"></script>

<!-- Bootstrap js-->

<script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- tool tip js -->
<script src="{{asset('bigdeal/assets/js/tippy-popper.min.js')}}"></script>
<script src="{{asset('bigdeal/assets/js/tippy-bundle.iife.min.js')}}"></script>

<!-- feather icon -->
<script src="{{asset('bigdeal/assets/js/feather.min.js')}}"></script>
<script src="{{asset('bigdeal/assets/js/feather-icon.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('bigdeal/assets/js/script.js')}}"></script>




{{ $scripts ?? '' }}


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-226233549-1">
</script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-226233549-1');
</script>

</body>


</html>
