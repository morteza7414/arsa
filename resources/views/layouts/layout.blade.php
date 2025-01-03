{{--<!DOCTYPE html>--}}
<html>
<head>
    <title>آرسا {{$title ?? ''}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="مجموعه آرسا با بهترین خدمات در راستای هوشمندسازی ساختمان های مختلف در خدمت شماست">
    <meta name="keywords" content="هوشمندسازی ساختمان/هوشمندسازی">
    <meta name="author" content="Morteza Jaladat">
{{--    <link rel="icon" href="{{asset('/bigdeal/assets/images/favicon/favicon.png')}}" type="image/x-icon">--}}
{{--    <link rel="shortcut icon" href="{{asset('bigdeal/assets/images/favicon/favicon.png')}}" type="image/x-icon">--}}


{{$link ?? ''}}
<!--icon css-->
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/font-awesome.css')}}">--}}

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/themify.css')}}">


    {{--    <!--Slick slider css-->--}}
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick.css')}}">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick-theme.css')}}">--}}

<!--Animate css-->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/animate.css')}}">--}}
<!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/bootstrap.css')}}">
    <!-- CSS only -->
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}

<!--portfolio css-->
{{--    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/magnific-popup.css')}}">--}}

<!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/color2.css')}}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="screen">
</head>

<body class="bg-light rtl">

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="{{asset('images/site/loader.gif')}}" alt="loader">
    </div>
</div>
<!-- loader end -->

<!--header start-->
<header id="stickyheader">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="custom-container">
            <div id="top-header" class="row">
                <div class="col-xl-5 col-md-8 col-sm-6">
                    <div class="top-header-left">
                        <div class="shpping-order">
                            <h6>به زودی در آرسا محصولات جدیدی قرار خواهد گرفت </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-7 col-sm-6 user-panel">
                    @if(auth()->check())
                        <div class="header-user-name">
                            <div class="header-user-block">
                                <div class="header-user-dropdown">
                                              <span class="user-dropdown-click">
                                                {{auth()->user()->name}} <i class="fa fa-angle-down"
                                                                            aria-hidden="true"></i>
                                              </span>
                                    <ul class="user-dropdown-open">
                                        <li><a href="{{route('dashboard')}}">پنل کاربری</a></li>
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
                                <li><a  href="{{route('register')}}">ثبت نام</a></li>
                                <li><a id="user-sign-select-slash">/</a></li>
                                <li><a  href="{{route('login')}}">ورود </a></li>
                                <form action="{{ route('login') }}" method="get" id="login-form">
                                </form>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="layout-header2">
        <div class="container">
            <div class="col-md-12">
                <div class="main-menu-block">
                    <div class="header-left">
                        <div class="sm-nav-block">
                <span class="sm-nav-btn">
                  <i class="fa fa-bars"></i>
                </span>
                            <ul class="nav-slide">
                                <li>
                                    <div class="nav-sm-back">
                                        بازگشت <i class="fa fa-angle-left pe-2"></i>
                                    </div>
                                </li>
                                <li><a target="_blank" href="{{route('category','هوشمندسازی ساختمان')}}">هوشمندسازی ساختمان</a></li>
                                <li><a target="_blank" href="{{route('category','کلید لمسی')}}">کلید لمسی</a></li>
                                <li><a target="_blank" href="{{route('category','خانه و آشپزخانه')}}">خانه وآشپزخانه</a></li>
                                <li><a target="_blank" href="{{route('category','دکوری')}}">وسایل دکوری</a></li>
                                <li><a target="_blank" href="{{route('category','ساعت')}}">ساعت</a></li>
                                <li><a target="_blank" href="{{route('category','عصا')}}">عصا</a></li>
                                <li><a target="_blank" href="{{route('category','نانوآنتیک')}}">نانوآنتیک </a></li>
                                <li><a target="_blank" href="{{route('category','سندبلاست')}}">سندبلاست</a></li>
                            </ul>
                        </div>
                        <div class="brand-logo logo-sm-center">
                            <a href="index.html">
                                <img src="{{asset('images/site/logo2.png')}}" class="img-fluid  "
                                     alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="input-block">
                        <div class="input-box">
                            <form class="big-deal-form " action="{{ route('search') }}" method="get" >
                                <div class="input-group ">
                                    <div class="input-group-text">
                                        <button class="header-search-button" type="submit">
                                            <span class="search"><i class="fa fa-search"></i></span>
                                        </button>
                                    </div>
                                    <input name="search_input" type="search" class="form-control" placeholder="جستجوی یک محصول">
                                    <div class="input-group-text">
                                        <select name="category">
                                            <option value="all">همه دسته بندی ها</option>
                                            <option value="هوشمندسازی">هوشمندسازی</option>
                                            <option value="تزیینات چوبی">تزیینات چوبی</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="icon-block">
                            <ul>
                                <li class="mobile-search">
                                    <a href="javascript:void(0)">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             x="0px" y="0px" viewBox="0 0 612.01 612.01"
                                             style="enable-background:new 0 0 612.01 612.01;"
                                             xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                              C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                              l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                              c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                              S377.82,467.8,257.493,467.8z"/>
                                </g>
                            </g>
                        </g>
                      </svg>
                                    </a>
                                </li>
                                <li class="mobile-user " >
                                    <a href="{{(auth()->check()) ? route('dashboard') : route('login')}}">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             x="0px" y="0px" viewBox="0 0 512 512"
                                             style="enable-background:new 0 0 512 512;"
                                             xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                              c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"/>
                            </g>
                        </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                               M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"/>
                                                </g>
                                            </g>
                      </svg>
                                    </a>
                                </li>
                                {{--                                <li class="mobile-setting" onclick="openSetting()">--}}
                                {{--                                    <a href="javascript:void(0)">--}}
                                {{--                                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"--}}
                                {{--                                             xmlns="http://www.w3.org/2000/svg">--}}
                                {{--                                            <path--}}
                                {{--                                                    d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z"/>--}}
                                {{--                                            <path--}}
                                {{--                                                    d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z"/>--}}
                                {{--                                        </svg>--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}
                                <li class="mobile-wishlist item-count" onclick="@if (auth()->check())  openWishlist(); @else openWishlistAlert(); @endif ">
                                    <a href="javascript:void(0)">
                                        <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"/>
                                        </svg>
                                        <div class="item-count-contain">
                                            @if(auth()->check())
                                                {{auth()->user()->likeCount()}}
                                            @else
                                                0
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                <li class="mobile-cart item-count" onclick="openCart()">
                                    <a href="{{route('cart.index')}}">
                                        <div class="cart-block">
                                            <div class="cart-icon">
                                                <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"/>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="cart-item">
                                                <h5> سبد خرید</h5>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="item-count-contain">
                                        @if(auth()->user())
                                            {{count(auth()->user()->carts)}}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="menu-nav">
                <span class="toggle-nav">
                  <i class="fa fa-bars "></i>
                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input mobile-searchbar-new">
            <div class="input-group">
                {{--          <span class="input-group-text">--}}
                {{--            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"--}}
                {{--                 y="0px" width="28.931px" height="28.932px" viewBox="0 0 28.931 28.932"--}}
                {{--                 style="enable-background:new 0 0 28.931 28.932;" xml:space="preserve">--}}
                {{--              <g>--}}
                {{--                <path--}}
                {{--                        d="M28.344,25.518l-6.114-6.115c1.486-2.067,2.303-4.537,2.303-7.137c0-3.275-1.275-6.355-3.594-8.672C18.625,1.278,15.543,0,12.266,0C8.99,0,5.909,1.275,3.593,3.594C1.277,5.909,0.001,8.99,0.001,12.266c0,3.276,1.275,6.356,3.592,8.674c2.316,2.316,5.396,3.594,8.673,3.594c2.599,0,5.067-0.813,7.136-2.303l6.114,6.115c0.392,0.391,0.902,0.586,1.414,0.586c0.513,0,1.024-0.195,1.414-0.586C29.125,27.564,29.125,26.299,28.344,25.518z M6.422,18.111c-1.562-1.562-2.421-3.639-2.421-5.846S4.86,7.983,6.422,6.421c1.561-1.562,3.636-2.422,5.844-2.422s4.284,0.86,5.845,2.422c1.562,1.562,2.422,3.638,2.422,5.845s-0.859,4.283-2.422,5.846c-1.562,1.562-3.636,2.42-5.845,2.42S7.981,19.672,6.422,18.111z"/>--}}
                {{--              </g>--}}
                {{--            </svg>--}}
                {{--          </span>--}}
                <form class="big-deal-form " action="{{ route('search') }}" method="get" >
                    <div class="input-group ">
                        <div class="input-group-text">
                            <button class="header-search-button" type="submit">
                                <span class="search"><i class="fa fa-search"></i></span>
                            </button>
                        </div>
                        <input name="search_input" type="search" class="form-control" placeholder="نام محصول مورد نظرتان را وارد کنید">
                        <div class="input-group-text">
                            <select name="category">
                                <option value="all">همه دسته بندی ها</option>
                                <option value="هوشمندسازی">هوشمندسازی</option>
                                <option value="تزیینات چوبی">تزیینات چوبی</option>
                            </select>
                        </div>
                    </div>
                </form>
                {{--                <input type="text" class="form-control" placeholder="جستجو محصول شما">--}}
                <span class="input-group-text close-searchbar">
            <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
              <path
                  d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/>
            </svg>
          </span>
            </div>
        </div>
    </div>
    <div class="category-header-2">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-menu">
                        <div class="logo-block">
                            <div class="brand-logo logo-sm-center">
                                <a href="index.html">
                                    <img src="{{asset('images/site/logo2.png')}}"
                                         class="img-fluid  " alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="nav-block">

                            <div class="nav-left">

                                <nav class="navbar" data-bs-toggle="collapse"
                                     data-bs-target="#navbarToggleExternalContent">
                                    <button class="navbar-toggler" type="button">
                                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                    <h5 class="mb-0  text-white title-font">دسته بندی های فروشگاه</h5>
                                </nav>
                                <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        <li>
                                            <a target="_blank" href="{{route('category','هوشمندسازی ساختمان')}}">
                                                <img class="home-category-images" src="{{asset('images/site/5.jpeg')}}"
                                                     alt="category-product">
                                                هوشمندسازی ساختمان
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','کلید لمسی')}}">
                                                <img class="home-category-images" src="{{asset('images/site/5.jpeg')}}"
                                                     alt="category-product">
                                                کلید لمسی
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','خانه و آشپزخانه')}}">
                                                <img class="home-category-images" src="{{asset('images/site/6.jpeg')}}"
                                                     alt="category-product">
                                                خانه و آشپزخانه
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','دکوری')}}">
                                                <img class="home-category-images" src="{{asset('images/site/4.jpeg')}}"
                                                     alt="images/site/2.jpeg">
                                                وسایل دکوری
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','ساعت')}}">
                                                <img class="home-category-images" src="{{asset('images/site/3.jpeg')}}"
                                                     alt="category-product">
                                                ساعت
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','عصا')}}">
                                                <img class="home-category-images" src="{{asset('images/site/1.jpeg')}}"
                                                     alt="category-product">
                                                عصا
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','نانوآنتیک')}}">
                                                <img class="home-category-images" src="{{asset('images/site/7.jpeg')}}"
                                                     alt="category-product">
                                                نانوآنتیک
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="{{route('category','سندبلاست')}}">
                                                <img class="home-category-images" src="{{asset('images/site/8.jpeg')}}"
                                                     alt="category-product">
                                                سندبلاست
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
                                        <a class="dark-menu-item" href="{{route('home')}}">خانه</a>
                                    </li>
                                    <!--HOME-END-->

                                    <!--product-meu start-->
                                    <li class="mega"><a class="dark-menu-item" href="javascript:void(0)">فروشگاه
                                        </a>
                                        <ul class="mega-menu full-mega-menu ">
                                            <li>
                                                <div class="container">
                                                    <div class="inline_flex">
                                                        <div class="col-lg-3 mega-box" style="max-width: 25%">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>هوشمندسازی</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank" href="{{route('category','هوشمندسازی ساختمان')}}">
                                                                                هوشمندسازی ساختمان
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','کلید لمسی')}}">
                                                                                کلید لمسی
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mega-box" style="max-width: 25%">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>تزیینات چوبی</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','خانه وآشپزخانه')}}">
                                                                                خانه و آشپزخانه
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','وسایل دکوری')}}">
                                                                                وسایل دکوری
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','ساعت')}}">
                                                                                ساعت
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','عصا')}}">
                                                                                عصا
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mega-box" style="max-width: 25%">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>اکسسوری بتنی</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','خانه وآشپزخانه')}}">
                                                                                خانه و آشپزخانه
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','وسایل دکوری')}}">
                                                                                وسایل دکوری
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mega-box" style="max-width: 25%">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>سنگ های مصنوعی</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','نانوآنتیک')}}">
                                                                                نانوآنتیک
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a target="_blank" href="{{route('category','سندبلاست')}}">
                                                                                سند بلاست
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row menu-banner">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <img src="{{asset('images/site/navbar/header_navbar_image2.jpg')}}"
                                                                     alt="menu-banner" class="img-fluid">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <img src="{{asset('images/site/navbar/header_navbar_image1.jpg')}}"
                                                                     alt="menu-banner" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--product-meu end-->

                                    <!--mega-meu start-->
                                    <li class="mega">
                                        <a class="dark-menu-item" href="javascript:void(0)">آموزش</a>
                                        <ul class="mega-menu full-mega-menu ratio_landscape">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>به زودی در آرسا</h5>
                                                                </div>
                                                                <div class="menu-content">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--mega-meu end-->

                                    <!--pages meu start-->
                                    <li>
                                        <a class="dark-menu-item" href="{{route('about.us')}}">درباره ما</a>
                                    </li>
                                    <!--product-end end-->

                                    <!--blog-meu start-->
                                    <li>
                                        <a class="dark-menu-item" href="{{route('contact.us')}}">تماس با ما</a>
                                    </li>
                                    <!--blog-meu end-->

                                    <!--blog-meu start-->
                                    <li>
                                        <a class="dark-menu-item" href="{{route('home')}}">آرسا</a>
                                        <ul>
                                            <li><a href="{{route('branchs')}}">شعبه ها</a></li>
                                            <li><a href="{{route('oath')}}">سوگند نامه</a></li>
                                            <li><a href="{{route('regulation')}}">قوانین و مقررات</a></li>
                                        </ul>
                                    </li>
                                    <!--blog-meu end-->
                                </ul>
                            </nav>
                        </div>
                        <div class="icon-block">
                            <ul>
                                <li class="mobile-search">
                                    <a href="javascript:void(0)">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             x="0px" y="0px" viewBox="0 0 612.01 612.01"
                                             style="enable-background:new 0 0 612.01 612.01;"
                                             xml:space="preserve">
                        <g>
                            <g>
                                <g>
                                    <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                            C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                            l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                            c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                            S377.82,467.8,257.493,467.8z"/>
                                </g>
                            </g>
                        </g>
                      </svg>
                                    </a>
                                </li>


                                <li class="mobile-user onhover-dropdown">
                                    <a href="{{(auth()->check()) ? route('dashboard') : route('login')}}">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             x="0px" y="0px" viewBox="0 0 512 512"
                                             style="enable-background:new 0 0 512 512;"
                                             xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z M256,240
                            c-57.897,0-105-47.103-105-105c0-57.897,47.103-105,105-105c57.897,0,105,47.103,105,105C361,192.897,313.897,240,256,240z"/>
                            </g>
                        </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z
                             M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"/>
                                                </g>
                                            </g>
                      </svg>
                                    </a>
                                </li>
                                <li class="mobile-setting" onclick="{{\App\Models\User::OnclickCheckLogin()}}">
                                    <a href="javascript:void(0)">
                                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z"/>
                                            <path
                                                d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li class="mobile-wishlist item-count"
                                    onclick="@if (auth()->check())  openWishlist(); @else openWishlistAlert(); @endif ">
                                    <a href="javascript:void(0)">
                                        <svg viewBox="0 -28 512.001 512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m256 455.515625c-7.289062 0-14.316406-2.640625-19.792969-7.4375-20.683593-18.085937-40.625-35.082031-58.21875-50.074219l-.089843-.078125c-51.582032-43.957031-96.125-81.917969-127.117188-119.3125-34.644531-41.804687-50.78125-81.441406-50.78125-124.742187 0-42.070313 14.425781-80.882813 40.617188-109.292969 26.503906-28.746094 62.871093-44.578125 102.414062-44.578125 29.554688 0 56.621094 9.34375 80.445312 27.769531 12.023438 9.300781 22.921876 20.683594 32.523438 33.960938 9.605469-13.277344 20.5-24.660157 32.527344-33.960938 23.824218-18.425781 50.890625-27.769531 80.445312-27.769531 39.539063 0 75.910156 15.832031 102.414063 44.578125 26.191406 28.410156 40.613281 67.222656 40.613281 109.292969 0 43.300781-16.132812 82.9375-50.777344 124.738281-30.992187 37.398437-75.53125 75.355469-127.105468 119.308594-17.625 15.015625-37.597657 32.039062-58.328126 50.167969-5.472656 4.789062-12.503906 7.429687-19.789062 7.429687zm-112.96875-425.523437c-31.066406 0-59.605469 12.398437-80.367188 34.914062-21.070312 22.855469-32.675781 54.449219-32.675781 88.964844 0 36.417968 13.535157 68.988281 43.882813 105.605468 29.332031 35.394532 72.960937 72.574219 123.476562 115.625l.09375.078126c17.660156 15.050781 37.679688 32.113281 58.515625 50.332031 20.960938-18.253907 41.011719-35.34375 58.707031-50.417969 50.511719-43.050781 94.136719-80.222656 123.46875-115.617188 30.34375-36.617187 43.878907-69.1875 43.878907-105.605468 0-34.515625-11.605469-66.109375-32.675781-88.964844-20.757813-22.515625-49.300782-34.914062-80.363282-34.914062-22.757812 0-43.652344 7.234374-62.101562 21.5-16.441406 12.71875-27.894532 28.796874-34.609375 40.046874-3.453125 5.785157-9.53125 9.238282-16.261719 9.238282s-12.808594-3.453125-16.261719-9.238282c-6.710937-11.25-18.164062-27.328124-34.609375-40.046874-18.449218-14.265626-39.34375-21.5-62.097656-21.5zm0 0"/>
                                        </svg>
                                        {{--                                        <i class="fa-solid fa-heart fa-beat" style="font-size: 15px;color: #f7fafc;"></i>--}}
                                        <div class="cart-item">
                                            <div>
                                                {{--                                                @if(auth()->check())--}}
                                                {{--                                                    {{auth()->user()->likeCount()}}--}}
                                                {{--                                                @else--}}
                                                {{--                                                    0--}}
                                                {{--                                                @endif--}}
                                                <span>لیست علاقه مندی</span>
                                            </div>
                                        </div>
                                        <div class="item-count-contain">
                                            @if(auth()->check())
                                                {{auth()->user()->likeCount()}}
                                            @else
                                                0
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                <li class="mobile-cart item-count" onclick="openCart()">
                                    <a href="{{route('cart.index')}}">
                                        <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m497 401.667c-415.684 0-397.149.077-397.175-.139-4.556-36.483-4.373-34.149-4.076-34.193 199.47-1.037-277.492.065 368.071.065 26.896 0 47.18-20.377 47.18-47.4v-203.25c0-19.7-16.025-35.755-35.725-35.79l-124.179-.214v-31.746c0-17.645-14.355-32-32-32h-29.972c-17.64 0-31.99 14.351-31.99 31.99v31.594l-133.21-.232-9.985-54.992c-2.667-14.694-15.443-25.36-30.378-25.36h-68.561c-8.284 0-15 6.716-15 15s6.716 15 15 15c72.595 0 69.219-.399 69.422.719 16.275 89.632 5.917 26.988 49.58 306.416l-38.389.2c-18.027.069-32.06 15.893-29.81 33.899l4.252 34.016c1.883 15.06 14.748 26.417 29.925 26.417h26.62c-18.8 36.504 7.827 80.333 49.067 80.333 41.221 0 67.876-43.813 49.067-80.333h142.866c-18.801 36.504 7.827 80.333 49.067 80.333 41.22 0 67.875-43.811 49.066-80.333h31.267c8.284 0 15-6.716 15-15s-6.716-15-15-15zm-209.865-352.677c0-1.097.893-1.99 1.99-1.99h29.972c1.103 0 2 .897 2 2v111c0 8.284 6.716 15 15 15h22.276l-46.75 46.779c-4.149 4.151-10.866 4.151-15.015 0l-46.751-46.779h22.277c8.284 0 15-6.716 15-15v-111.01zm-30 61.594v34.416h-25.039c-20.126 0-30.252 24.394-16.014 38.644l59.308 59.342c15.874 15.883 41.576 15.885 57.452 0l59.307-59.342c14.229-14.237 4.13-38.644-16.013-38.644h-25.039v-34.254l124.127.214c3.186.005 5.776 2.603 5.776 5.79v203.25c0 10.407-6.904 17.4-17.18 17.4h-299.412l-35.477-227.039zm-56.302 346.249c0 13.877-11.29 25.167-25.167 25.167s-25.166-11.29-25.166-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167zm241 0c0 13.877-11.289 25.167-25.166 25.167s-25.167-11.29-25.167-25.167 11.29-25.167 25.167-25.167 25.166 11.291 25.166 25.167z"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <div class="item-count-contain">
                                        @if(auth()->user())
                                            {{count(auth()->user()->carts)}}
                                        @else
                                            0
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="searchbar-input mobile-searchbar-new">
            <div class="input-group">
                <form class="big-deal-form " action="{{ route('search') }}" method="get" >
                    <div class="input-group ">
                        <div class="input-group-text">
                            <button class="header-search-button" type="submit">
                                <span class="search"><i class="fa fa-search"></i></span>
                            </button>
                        </div>
                        <input name="search_input" type="search" class="form-control" placeholder="نام محصول مورد نظرتان را وارد کنید">
                        <div class="input-group-text">
                            <select name="category">
                                <option value="all">همه دسته بندی ها</option>
                                <option value="هوشمندسازی">هوشمندسازی</option>
                                <option value="تزیینات چوبی">تزیینات چوبی</option>
                            </select>
                        </div>
                    </div>
                </form>
                <span class="input-group-text close-searchbar">
            <svg viewBox="0 0 329.26933 329" xmlns="http://www.w3.org/2000/svg">
              <path
                  d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/>
            </svg>
          </span>
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
                                <h5>درباره ما</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="{{asset('images/site/logo.png')}}"
                                             class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <p>
                                    در فروشگاه آرسا محصولات را با بهترین کیفیت و بهترین قیمت خریداری نمایید
                                    و درب منزل تحویل بگیرید.
                                    رضایت شما افتخار ماست.

                                </p>
                                <ul class="paymant">
                                    <li><a href="javascript:void(0)">
                                            <img src="{{asset('images/site/zarinpal.svg')}}"
                                                 class="img-fluid"
                                                 alt="pay">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>تماس با ما</h5>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li>
                                        <i class="fa-solid fa-map-marker fa-bounce"></i><span>
                                            یزد ، شهرک صنعتی 2 تفت
                                            <br>
                                            <span>
                                             فروشگاه آرسا
                                            </span></span></li>
                                    <li><i class="fa-solid fa-phone fa-shake"></i>شماره تماس : <span>09198387828</span></li>
                                    <li><i class="fa-solid fa-envelope fa-beat-fade" ></i>ایمیل :info@rsaholding.com</li>
                                    <!--<li><i class="fa fa-fax"></i>فکس : <span>123456</span></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>آرسا</h5>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="{{route('about.us')}}">درباره ما</a></li>
                                    <li><a href="{{route('contact.us')}}">تماس با ما</a></li>
                                    <li><a href="javascript:void(0)">قوانین و مقررات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter dark-footer ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="footer-left">
                        <p>تمام حقوق این سایت محفوظ و در اختیار شرکت آرسا می باشد</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 col-sm-12">
                    <div class="footer-right">
                        <ul class="sosiyal">
                            <li><a target="_blank" href="https://www.google.com/maps/@31.7722745,54.2227189,16.75z"><i class="fa fa-map-marker"></i></a></li>
                            <li><a target="_blank"  href="https://mail.google.com/mail/u/0/?fs=1&to=info@rsaholding.com&bcc=info@rsaholding.com&tf=cm"><i class="fa fa-envelope"></i></a></li>
                            <!--<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>-->
                            <li><a target="_blank" href="https://www.instagram.com/r.sa_bms/"><i class="fab fa-instagram"></i></a></li>
                            <!--<li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <div class="quick-view-img">
                            <img src="{{asset('bigdeal/assets/images/layout-1/product/3.jpg')}}" alt=""
                                 class="img-fluid bg-img">
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <div class="pro-group">
                                <h2>
                                    نام محصول
                                </h2>
                                <ul class="pro-price">
                                    <li>70,000 تومان</li>
                                    <li><span>140,000 تومان</span></li>
                                    <li>50% تخفیف</li>
                                </ul>
                                <div class="revieu-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <a href="review.html"><span>(6 بررسی)</span></a>
                                </div>
                                <ul class="best-seller">
                                    <li>
                                        <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m102.427 43.155-2.337-2.336a3.808 3.808 0 0 1 -.826-4.149l1.263-3.053a3.808 3.808 0 0 0 -2.063-4.975l-3.036-1.256a3.807 3.807 0 0 1 -2.352-3.519v-3.286a3.808 3.808 0 0 0 -3.809-3.808h-3.3a3.81 3.81 0 0 1 -3.518-2.35l-1.269-3.052a3.808 3.808 0 0 0 -4.98-2.059l-3.032 1.258a3.807 3.807 0 0 1 -4.152-.825l-2.323-2.323a3.809 3.809 0 0 0 -5.386 0l-2.336 2.336a3.808 3.808 0 0 1 -4.149.826l-3.053-1.263a3.809 3.809 0 0 0 -4.975 2.063l-1.257 3.036a3.808 3.808 0 0 1 -3.519 2.353h-3.285a3.808 3.808 0 0 0 -3.809 3.808v3.3a3.808 3.808 0 0 1 -2.349 3.519l-3.053 1.266a3.809 3.809 0 0 0 -2.059 4.976l1.259 3.035a3.81 3.81 0 0 1 -.825 4.152l-2.324 2.323a3.809 3.809 0 0 0 0 5.386l2.337 2.337a3.807 3.807 0 0 1 .826 4.149l-1.263 3.056a3.808 3.808 0 0 0 2.063 4.975l3.036 1.256a3.807 3.807 0 0 1 2.352 3.519v3.286a3.808 3.808 0 0 0 3.809 3.808h3.3a3.809 3.809 0 0 1 3.518 2.35l1.265 3.052a3.808 3.808 0 0 0 4.984 2.059l3.035-1.259a3.811 3.811 0 0 1 4.152.825l2.323 2.324a3.809 3.809 0 0 0 5.386 0l2.336-2.336a3.81 3.81 0 0 1 4.149-.827l3.053 1.264a3.809 3.809 0 0 0 4.975-2.063l1.257-3.037a3.809 3.809 0 0 1 3.519-2.352h3.285a3.808 3.808 0 0 0 3.809-3.808v-3.3a3.808 3.808 0 0 1 2.349-3.518l3.053-1.266a3.809 3.809 0 0 0 2.059-4.976l-1.259-3.036a3.809 3.809 0 0 1 .825-4.151l2.324-2.324a3.809 3.809 0 0 0 -.003-5.39z"
                                                    fill="#f9cc4e"/>
                                                <circle cx="64" cy="45.848" fill="#4ec4b5" r="29.146"/>
                                                <path
                                                    d="m59.795 41.643 4.205-12.614 4.205 12.614h12.615l-8.41 8.41 4.205 12.615-12.615-8.41-12.615 8.41 4.205-12.615-8.41-8.41z"
                                                    fill="#f9cc4e"/>
                                                <path
                                                    d="m87.579 74.924h-1.6a3.809 3.809 0 0 0 -3.519 2.352l-1.257 3.037a3.809 3.809 0 0 1 -4.975 2.063l-3.053-1.264a3.81 3.81 0 0 0 -4.149.827l-2.336 2.336a3.809 3.809 0 0 1 -5.386 0l-2.323-2.324a3.811 3.811 0 0 0 -4.152-.825l-3.029 1.259a3.808 3.808 0 0 1 -4.977-2.059l-1.265-3.052a3.809 3.809 0 0 0 -3.518-2.35h-1.618l-17.417 35.386 17.255-5.872 5.872 17.256 17.868-36.304 17.868 36.3 5.872-17.256 17.26 5.876z"
                                                    fill="#f95050"/>
                                            </g>
                                        </svg>
                                        3 بهترین فروشنده
                                    </li>
                                    <li>
                                        <svg enable-background="new 0 0 497 497" viewBox="0 0 497 497"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m329.63 405.42-.38.43c-10.048 19.522-48.375 35.567-80.775 35.607-24.881 0-53.654-9.372-71.486-20.681-5.583-3.54-2.393-10.869-6.766-15.297l19.149-5.13c3.76-1.22 6.46-4.54 6.87-8.47l8.574-59.02 82.641-2.72 12.241 28.06.837 8.668-1.844 9.951 3.456 6.744.673 6.967c.41 3.93 3.11 7.25 6.87 8.47z"
                                                    fill="#f2d1a5"/>
                                                <path
                                                    d="m420.39 497h-343.78c-6.21 0-7.159-6.156-6.089-12.266l2.53-14.57c3.82-21.96 16.463-37.323 37.683-44.153l27.702-8.561 28.754-8.035c18.34 18.57 48.615 27.957 81.285 27.957 32.4-.04 61.709-8.478 80.259-26.809l.38-.43 31.486 5.256 26.39 8.5c21.22 6.83 36.9 24.87 40.72 46.83l2.53 14.57c1.07 6.111-3.64 11.711-9.85 11.711z"
                                                    fill="#7e8b96"/>
                                                <g>
                                                    <path
                                                        d="m384.055 215c-2.94 43.71-18.85 104.74-24.92 130.96-.68 2.94-2.33 5.45-4.56 7.22-2.23 1.78-5.05 2.82-8.06 2.82-6.88 0-12.55-5.37-12.94-12.23 0 0-5.58-84.28-7.63-128.77z"
                                                        fill="#dc4955"/>
                                                </g>
                                                <path
                                                    d="m141 271c-27.062 0-49-21.938-49-49 0-11.046 8.954-20 20-20h8.989l240.468-6.287 8.293 6.287h15.25c11.046 0 20 8.954 20 20 0 27.062-21.938 49-49 49z"
                                                    fill="#f2bb88"/>
                                                <path
                                                    d="m360.6 415.39-.06.09c-49.3 66.23-174.56 66.38-223.76.56l-.43-.63 18.171-1.91 12.669-8.02c18.34 18.57 48.41 29.8 81.08 29.8h.15c32.4-.04 62.28-11.1 80.83-29.43l.38-.43z"
                                                    fill="#a9a4d3"/>
                                                <path
                                                    d="m147.8 418.394v10.136l-32.89 10.59c-15.6 5.02-27.05 18.18-29.86 34.34l-3.59 23.54h-4.85c-6.21 0-10.92-5.6-9.85-11.71l2.53-14.57c3.82-21.96 19.5-40 40.72-46.83l26.34-8.48z"
                                                    fill="#64727a"/>
                                                <path
                                                    d="m182.19 417.45-34.39 11.08c-3.99-3.86-7.68-8.02-11.02-12.49l-.43-.63 30.84-9.93c1.828 1.848 10.344.351 12.353 2.02 2.928 2.433-.561 7.928 2.647 9.95z"
                                                    fill="#938dc8"/>
                                                <path
                                                    d="m299.7 358.2-2.71-28.06-79.861 2.255.001-.005-16.48.47-2.98 26.56-.763 6.8 2.039 12.83-3.989 4.55-.778 6.93c-.41 3.93-3.11 7.25-6.87 8.47l-20.12 6.48c4.37 4.43 9.41 8.44 15 11.97l10.02-3.22c9.79-3.17 16.79-11.79 17.88-21.97l2.058-17.506c.392-3.33 3.888-5.367 6.958-4.02 11.414 5.008 21.565 7.765 28.393 7.765 11.322.001 31.852-7.509 52.202-20.299z"
                                                    fill="#f2bb88"/>
                                                <path
                                                    d="m134.539 164.427s-.849 18.411-.849 33.002c0 38.745 9.42 76.067 25.701 105.572 20.332 36.847 72.609 61.499 88.109 61.499s68.394-24.653 89.275-61.499c14.137-24.946 23.338-55.482 25.843-87.741.458-5.894-9.799-20.073-9.799-26.058l10.491-24.775c0-38.422-36.205-111.427-114.81-111.427s-113.961 73.005-113.961 111.427z"
                                                    fill="#f2d1a5"/>
                                                <g>
                                                    <path
                                                        d="m294 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                        fill="#64727a"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m203 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                        fill="#64727a"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m249 260.847c-5.976 0-11.951-1.388-17.398-4.163-3.691-1.88-5.158-6.397-3.278-10.087 1.88-3.691 6.398-5.158 10.087-3.278 6.631 3.379 14.547 3.379 21.178 0 3.689-1.881 8.207-.413 10.087 3.278 1.88 3.69.413 8.207-3.278 10.087-5.447 2.775-11.422 4.163-17.398 4.163z"
                                                        fill="#f2bb88"/>
                                                </g>
                                                <path
                                                    d="m288.989 40.759c0 22.511-9.303 40.759-40.489 40.759s-48.702-42.103-48.702-42.103 17.516-39.415 48.702-39.415c25.911 0 47.746 12.597 54.392 29.769 1.353 3.497-13.903 7.182-13.903 10.99z"
                                                    fill="#df646e"/>
                                                <path
                                                    d="m254.305 81.307c1.031-.099 2.069-.167 3.093-.295 26.96-3.081 47.572-19.928 47.572-40.252 0-3.81-.72-7.49-2.08-10.99-15.42-6.31-33.46-10.34-54.39-10.34-4.139 0-8.163.159-12.073.462-5.127.397-7.393-6.322-3.107-9.163 7.36-4.878 16.519-8.364 26.68-9.879-3.71-.56-7.56-.85-11.5-.85-25.933 0-47.766 12.621-54.393 29.813-.006.002-.011.004-.017.007-1.337 3.487-2.055 7.201-2.06 10.94 0 22.51 25.28 40.76 56.47 40.76 1.946.008 3.872-.09 5.805-.213z"
                                                    fill="#dc4955"/>
                                                <path
                                                    d="m363.31 164.43v33c0 5.99-.23 11.94-.7 17.83-4.32-.91-8.4-2.66-12.05-5.19-22.785-15.834-31.375-40.163-37.64-60.936-.382-1.268-1.547-2.134-2.871-2.134h-30.949c-4.96 0-9.65-2.15-12.89-5.91l-10.947-12.711c-1.197-1.39-3.349-1.39-4.546 0l-10.947 12.711c-3.24 3.76-7.93 5.91-12.89 5.91h-90.33c8.47-39.6 44.09-94 111.95-94 78.61 0 114.81 73 114.81 111.43z"
                                                    fill="#f2bb88"/>
                                                <path
                                                    d="m381 164.19v37.81h-11.25c-4 0-7.93-1.16-11.22-3.44-19.74-13.72-26.93-35.65-33.69-58.43-1.26-4.24-5.16-7.13-9.58-7.13h-36.165c-.873 0-1.703-.38-2.273-1.042l-21.559-25.029c-1.197-1.389-3.349-1.389-4.546 0l-21.559 25.029c-.57.662-1.4 1.042-2.273 1.042h-38.015c-5.3 0-9.68 4.14-9.98 9.44 0 0-2.331 25.591-4.032 66.31-1.765 42.256-7.908 135.02-7.908 135.02-.16 2.822-1.215 5.393-2.879 7.441-2.381 2.929-5.67.375-9.72.375-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-.792-5.474-1.472-8.414-6.7-28.94-23.83-94.686-23.83-138.351 0-13.73-.14-34.689 0-37.649.14-26.43 12.74-54.048 32-78.128 12.937-16.178 28.667-38.955 58.628-47.692 10.986-3.204 23.248-5.101 36.883-5.101 50.8 0 82.75 26.31 100.6 48.39 19.68 24.319 31.9 55.879 31.9 82.369z"
                                                    fill="#df646e"/>
                                                <path
                                                    d="m211.62 38.54c-19.38 9.9-33.55 23.84-43.37 36.44-19.26 24.69-31.27 56.78-31.41 83.88-.14 3.03-.84 25.18-.84 39.25 0 44.77 18.69 117.93 25.39 147.6.47 2.08 1.4 3.94 2.68 5.5-2.38 2.93-6.01 4.79-10.06 4.79-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-3.88-4.28-4.56-7.22-6.7-28.94-25.39-100.29-25.39-143.96 0-13.73.7-35.33.84-38.29.14-26.43 12.15-57.73 31.41-81.81 12.94-16.18 33.4-34.63 63.37-43.36z"
                                                    fill="#dc4955"/>
                                                <g>
                                                    <path
                                                        d="m316.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.172.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                        fill="#df646e"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m225.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.171.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                        fill="#df646e"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m302.143 383.517c-16.23 10.87-34.973 16.353-53.643 16.353s-37.3-5.41-53.54-16.27l3.476-6.313-1.526-11.067 4.15 3.37c28.46 20.41 66.63 20.37 95.05-.12.2-.14.39-.27.6-.39l3.826-2.211z"
                                                        fill="#a9a4d3"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m211.98 376.2-1.85 15.68c-5.23-2.27-10.31-5.03-15.17-8.28l1.95-17.38 4.15 3.37c3.5 2.51 7.15 4.72 10.92 6.61z"
                                                        fill="#938dc8"/>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m269.5 306.5h-42c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h42c4.142 0 7.5 3.358 7.5 7.5s-3.358 7.5-7.5 7.5z"
                                                        fill="#df646e"/>
                                                </g>
                                            </g>
                                        </svg>
                                        44 مشاهده فعال
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-group">
                                <h6 class="product-title">اطلاعات محصول</h6>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم، لورم ایپسوم متن ساختگی با تولید سادگی
                                </p>
                            </div>
                            <div class="pro-group pb-0">
                                <h6 class="product-title size-text">انتخاب سایز<span>
                      <a href="default.htm" data-bs-toggle="modal" data-bs-target="#sizemodal">نمودار سایز</a></span>
                                </h6>
                                <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">نمودار راهنمای سایز
                                                    محصول</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body"><img
                                                    src="{{asset('bigdeal/assets/images/size-chart.jpg')}}" alt=""
                                                    class="img-fluid ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="size-box">
                                    <ul>
                                        <li><a href="javascript:void(0)">s</a></li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a></li>
                                        <li><a href="javascript:void(0)">2xl</a></li>
                                    </ul>
                                </div>
                                <h6 class="product-title">رنگ</h6>
                                <div class="color-selector inline">
                                    <ul>
                                        <li>
                                            <div class="color-1 active"></div>
                                        </li>
                                        <li>
                                            <div class="color-2"></div>
                                        </li>
                                        <li>
                                            <div class="color-3"></div>
                                        </li>
                                        <li>
                                            <div class="color-4"></div>
                                        </li>
                                        <li>
                                            <div class="color-5"></div>
                                        </li>
                                        <li>
                                            <div class="color-6"></div>
                                        </li>
                                        <li>
                                            <div class="color-7"></div>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="product-title">تعداد</h6>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <button class="qty-minus"></button>
                                        <input class="qty-adj form-control" type="number" value="1">
                                        <button class="qty-plus"></button>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="javascript:void(0)" onclick="openCart()"
                                       class="btn cart-btn btn-normal tooltip-top"
                                       data-tippy-content="افزودن به سبد خرید">
                                        <i class="fa fa-shopping-cart"></i>
                                        افزودن به سبد خرید
                                    </a>
                                    <a href="product-page(left-sidebar).html" class="btn btn-normal tooltip-top"
                                       data-tippy-content="view detail">
                                        مشاهده جزئیات
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->

<!-- edit product modal start-->
<div class="modal fade bd-example-modal-lg theme-modal pro-edit-modal" id="edit-product" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="pro-group">
                    <div class="product-img">
                        <div class="media">
                            <div class="img-wraper">
                                <a href="product-page(left-sidebar).html">
                                    <img src="{{asset('bigdeal/assets/images/layout-2/product/1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h3>گوشی هوشمند</h3>
                                </a>
                                <h6>80,000 تومان<span>120,000 تومان</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pro-group">
                    <h6 class="product-title">انتخاب سایز</h6>
                    <div class="size-box">
                        <ul>
                            <li><a href="javascript:void(0)">s</a></li>
                            <li><a href="javascript:void(0)">m</a></li>
                            <li><a href="javascript:void(0)">l</a></li>
                            <li><a href="javascript:void(0)">xl</a></li>
                            <li><a href="javascript:void(0)">2xl</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pro-group">
                    <h6 class="product-title">انتخاب رنگ</h6>
                    <div class="color-selector inline">
                        <ul>
                            <li>
                                <div class="color-1 active"></div>
                            </li>
                            <li>
                                <div class="color-2"></div>
                            </li>
                            <li>
                                <div class="color-3"></div>
                            </li>
                            <li>
                                <div class="color-4"></div>
                            </li>
                            <li>
                                <div class="color-5"></div>
                            </li>
                            <li>
                                <div class="color-6"></div>
                            </li>
                            <li>
                                <div class="color-7"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pro-group">
                    <h6 class="product-title">تعداد</h6>
                    <div class="qty-box">
                        <div class="input-group">
                            <button class="qty-minus"></button>
                            <input class="qty-adj form-control" type="number" value="1"/>
                            <button class="qty-plus"></button>
                        </div>
                    </div>
                </div>
                <div class="pro-group mb-0">
                    <div class="modal-btn">
                        <a href="cart.html" class="btn btn-solid btn-sm">
                            افزودن به سبد خرید
                        </a>
                        <a href="product-page(left-sidebar).html" class="btn btn-solid btn-sm">
                            جزئیات بیشتر
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit product modal end-->

<!-- Add to cart bar -->
@if(auth()->user())
    <div id="cart_side" class="add_to_cart top ">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>سبد خرید من</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">

                    @foreach(auth()->user()->carts as $cart)
                        <li>
                            <div class="media">
                                <a href="{{route('productpage' , $cart->product->id)}}">
                                    <img alt="megastore1" class="me-3"
                                         src="{{asset('images/products/' . $cart->product->image)}}">
                                </a>
                                <div class="media-body">
                                    <a href="{{route('productpage' , $cart->product->id)}}">
                                        <h4>{{$cart->product->title}}</h4>
                                    </a>
                                    <h6>
                                        @if($cart->product->offprice)
                                            {{$cart->product->offprice}} تومان
                                            <span>{{$cart->product->price}} تومان</span>
                                        @else
                                            {{$cart->product->price}} تومان <span>{{$cart->product->price}} تومان</span>
                                        @endif
                                    </h6>
                                    <div class="addit-box">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <button class="qty-minus"
                                                        onclick="quantityMinus(event,{{$cart->id}})"></button>
                                                <input class="qty-adj form-control" type="number"
                                                       value="{{$cart->quantity}}" readonly="readonly"/>
                                                <button class="qty-plus"
                                                        onclick="quantityPlus(event,{{$cart->id}})"></button>
                                            </div>
                                        </div>
                                        <div class="pro-add">
                                            {{--                                        <a href="javascript:void(0)" data-bs-toggle="modal"--}}
                                            {{--                                           data-bs-target="#edit-product">--}}
                                            {{--                                            <i data-feather="edit"></i>--}}
                                            {{--                                        </a>--}}
                                            <a href="javascript:void(0)" class="icon tooltip-top"
                                               data-tippy-content="حذف از لیست سبد خرید"
                                               onclick="deleteCart(event,{{$cart->id}})">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('quantity.plus', $cart->id) }}" method="post"
                                      id="quantityPlus-{{$cart->id}}">
                                    @csrf
                                    @method('put')
                                </form>
                                <form action="{{ route('quantity.minus', $cart->id) }}" method="post"
                                      id="quantityMinus-{{$cart->id}}">
                                    @csrf
                                    @method('put')
                                </form>
                                <form action="{{ route('cart.delete', $cart->id) }}" method="post"
                                      id="deleteCart-{{$cart->id}}">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <ul class="cart_total">
                    <li>
                        جمع سبد خرید : <span>{{auth()->user()->total_sum()}} تومان</span>
                    </li>

                    <li>
                        مالیات <span>0,000 تومان</span>
                    </li>
                    <li>
                        <div class="total">
                            جمع کل<span>{{auth()->user()->total_sum()}} تومان</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="{{route('cart.index')}}" class="btn btn-solid btn-sm">سبد خرید</a>
                            <a href="{{route('ordering')}}" class="btn btn-solid btn-sm ">پرداخت</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
<!-- Add to cart bar end-->

<!-- wishlistbar bar -->
<div id="wishlist_side" class="add_to_cart right ">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>لیست علاقه مندی من</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeWishlist()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>

        </div>
        <div class="cart_media">
            <ul class="cart_product">
                @if(auth()->check())
                    @if(!empty(auth()->user()->likes->toArray()))
                        @foreach(auth()->user()->likes->toArray() as $like)
                            <li>
                                <div class="media">
                                    <a href="product-page(left-sidebar).html">
                                        <img alt="megastore1" class="me-3"
                                             src="{{asset('images/products/'.'/'.$like['image'])}}">
                                    </a>
                                    <div class="media-body">
                                        <a href="product-page(left-sidebar).html">
                                            <h4>{{$like['title']}}</h4>
                                        </a>
                                        <h6>
                                            @if($like['offprice'])
                                                {{$like['offprice']}} تومان <span>{{$like['price']}} تومان</span>
                                            @else
                                                {{$like['price']}} تومان <span>{{$like['price']}} تومان</span>
                                            @endif
                                        </h6>
                                        <div class="addit-box">

                                            <div class="pro-add">
                                                <span>حذف:</span>
                                                <a onclick="like(event,{{$like['id']}})"
                                                   href="javascript:void(0)"
                                                   class="tooltip-top" data-tippy-content="حذف از لیست علاقه مندی">
                                                    <i data-feather="trash-2"></i>
                                                </a>

                                            </div>
                                            <form action="{{ route('like', $like['id']) }}" method="post"
                                                  id="addLike-{{$like['id']}}">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>
            <ul class="cart_total">
                <li>
                    <div class="buttons">
                        <a href="{{route('wishlist')}}" class="btn btn-solid btn-block btn-md">مشاهده لیست علاقه
                            مندی</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- wishlistbar bar end-->


<!-- My account bar start-->
<div id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>حساب کاربری من</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <form class="theme-form" action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">شماره موبایل</label>
                <input type="text" name="mobile" class="form-control" id="email"
                       placeholder="شماره موبایل خود را وارد کنید" required="">
                @error('password')
                <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                >
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <label for="review">رمز عبور</label>
                <input type="password" name="password" class="form-control" id="review"
                       placeholder="رمز عبور خود را وارد کنید" required="">
                @error('password')
                <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                >
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-normal" type="submit">ورود</button>
            </div>
            <div class="accout-fwd">
                <a href="forget-pwd.html" class="d-block">
                    <h5>فراموشی رمز عبور؟</h5>
                </a>
                <a href="{{route('register')}}" class="d-block" target="_blank">
                    <h6>شما حساب کاربری ندارید؟<span>ثبت نام کنید</span></h6>
                </a>
            </div>
        </form>
    </div>
</div>
<!-- Add to account bar end-->

<!-- add to  setting bar  start-->
<div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>تنظیمات من</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeSetting()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="setting-block">
            <div class="form-group">
                <select>
                    <option value="">زبان</option>
                    <option value="">فارسی</option>
                    <option value="">انگلیسی</option>
                    <option value="">ترکی استانبولی</option>
                </select>
            </div>
            <div class="form-group">
                <select>
                    <option value="">واحد پول</option>
                    <option value="">تومان</option>
                    <option value="">دلار</option>
                    <option value="">لیر</option>
                    <option value="">یورو</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- add to  setting bar  end-->


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

<!-- popper js-->
<script src="{{asset('bigdeal/assets/js/popper.min.js')}}"></script>


<!-- menu js-->
<script src="{{asset('bigdeal/assets/js/menu.js')}}"></script>


<!-- Bootstrap js-->
{{--<script src="{{asset('bigdeal/assets/js/bootstrap.js')}}"></script>--}}
<script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- tool tip js -->
<script src="{{asset('bigdeal/assets/js/tippy-popper.min.js')}}"></script>
<script src="{{asset('bigdeal/assets/js/tippy-bundle.iife.min.js')}}"></script>

<!-- feather icon -->
<script src="{{asset('bigdeal/assets/js/feather.min.js')}}"></script>
<script src="{{asset('bigdeal/assets/js/feather-icon.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('bigdeal/assets/js/modal.js')}}"></script>
<script src="{{asset('bigdeal/assets/js/script.js')}}"></script>

{{ $scripts ?? '' }}

</body>


</html>
