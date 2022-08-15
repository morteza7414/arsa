<x-main-layout>

    <x-slot name="title">
        - جست و جوی محصول
    </x-slot>


    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>دسته بندی</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">نتایج جست و جو</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('images/site/navbar/slider04.jpg')}}"
                                                 class="img-fluid  w-100" alt="">
                                        </a>
{{--                                        <div class="category-header-title top-banner-content small-section">--}}
{{--                                            <h5>--}}
{{--                                                نتایج جست و جوی :--}}
{{--                                            </h5>--}}
{{--                                            <h4>--}}
{{--                                                {{ $title }}--}}
{{--                                            </h4>--}}

{{--                                        </div>--}}
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="container-fluid p-0">

                                                <div class="row">
                                                    <div class="col-12 position-relative">
                                                        <div class="product-filter-content horizontal-filter-mian ">
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li>
                                                                        <img src="{{asset('images/site/icon/2.png')}}"
                                                                             alt=""
                                                                             class="product-2-layout-view"></li>
                                                                    <li>
                                                                        <img src="{{asset('images/site/icon/3.png')}}"
                                                                             alt=""
                                                                             class="product-3-layout-view"></li>
                                                                    <li>
                                                                        <img src="{{asset('images/site/icon/4.png')}}"
                                                                             alt=""
                                                                             class="product-4-layout-view"></li>
                                                                    <li>
                                                                        <img src="{{asset('images/site/icon/6.png')}}"
                                                                             alt=""
                                                                             class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-wrapper-grid product">
                                            <div class="row">
                                                @foreach($products as $product)
                                                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="product-imgbox">
                                                                <div class="product-front">
                                                                    <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                                                        <img src="{{asset('images/products/gallery/'.$product->images()->first()->image)}}"
                                                                             class="img-fluid " alt="product">
                                                                    </a>
                                                                </div>
                                                                @if(count($product->images())>1)
                                                                    <div class="product-back">
                                                                        <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                                                            <img
                                                                                    src="{{asset('images/products/gallery/'.$product->images()->skip(1)->take(1)->first()->image)}}"
                                                                                    class="img-fluid  " alt="product">
                                                                        </a>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                            <div class="product-detail detail-center detail-inverse search_product_detail">
                                                                <div class="detail-title">
                                                                    <div class="detail-left">

                                                                        <a href="{{route('productpage',[$product['id'],$product['slut']])}}">
                                                                            <h6 class="price-title">
                                                                                {{$product['title']}}
                                                                            </h6>
                                                                        </a>
                                                                    </div>
                                                                    <div class="detail-right">
                                                                        @if($product['offprice'])
                                                                            <div class="check-price"> {{$product['price']}}
                                                                                تومان
                                                                            </div>
                                                                            <div class="price">
                                                                                <div class="price"> {{$product['offprice']}}
                                                                                    تومان
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="price">
                                                                                <div class="price"> {{$product['price']}}
                                                                                    تومان
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="product_wrapper_description" style="display: none;">
                                                                        <div class="detail-right">
                                                                            <div class="description">
                                                                                {!! $product['description'] !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="icon-detail">
                                                                    <a href="{{route('cart.store' , $product['id'])}}"
                                                                       onclick="cart(event,{{$product['id']}})"
                                                                       class="tooltip-top"
                                                                       data-tippy-content="افزودن به سبد خرید">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </a>

                                                                    <a href="{{route('like', $product['id'])}}"
                                                                       class="add-to-wish tooltip-top"
                                                                       data-tippy-content="@if(\App\Models\Product::find($product['id'])->is_liked())حذف از لیست علاقه مندی @else افزودن به لیست علاقه مندی@endif"
                                                                       onclick="like(event,{{$product['id']}})">
                                                                        <i class="@if(\App\Models\Product::find($product['id'])->is_liked()) like @endif"
                                                                           data-feather="heart"></i>
                                                                    </a>

                                                                    <a href="{{route('productpage',[$product['id'],$product['slut']])}}"
                                                                       class="tooltip-top"
                                                                       data-tippy-content="مشاهده محصول">
                                                                        <i data-feather="eye"></i>
                                                                    </a>
                                                                    <form action="{{ route('cart.store', $product['id']) }}"
                                                                          method="post"
                                                                          id="addCart-{{$product['id']}}">
                                                                        @csrf
                                                                    </form>
                                                                    <form action="{{ route('like', $product['id']) }}"
                                                                          method="post"
                                                                          id="addLike-{{$product['id']}}">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--                                        <div class="product-pagination">--}}
                                        {{--                                            <div class="theme-paggination-block">--}}
                                        {{--                                                <div class="container-fluid p-0">--}}
                                        {{--                                                    <div class="row">--}}
                                        {{--                                                        <div class="col-xl-6 col-md-6 col-sm-12">--}}
                                        {{--                                                            <nav aria-label="Page navigation">--}}
                                        {{--                                                                <ul class="pagination">--}}
                                        {{--                                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)"--}}
                                        {{--                                                                                             aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left"--}}
                                        {{--                                                                                                                                               aria-hidden="true"></i></span> <span class="sr-only">قبلی</span></a></li>--}}
                                        {{--                                                                    <li class="page-item "><a class="page-link" href="javascript:void(0)">1</a></li>--}}
                                        {{--                                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>--}}
                                        {{--                                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>--}}
                                        {{--                                                                    <li class="page-item"><a class="page-link" href="javascript:void(0)"--}}
                                        {{--                                                                                             aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right"--}}
                                        {{--                                                                                                                                           aria-hidden="true"></i></span> <span class="sr-only">بعدی</span></a></li>--}}
                                        {{--                                                                </ul>--}}
                                        {{--                                                            </nav>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                        <div class="col-xl-6 col-md-6 col-sm-12">--}}
                                        {{--                                                            <div class="product-search-count-bottom">--}}
                                        {{--                                                                <h5>نمایش 1-12 محصول از 24 نتیجه</h5>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->


    <x-slot name="afterfooter">


        <!-- elevatezoom js-->
        <script src="{{asset('bigdeal/assets/js/jquery.elevatezoom.js')}}"></script>

        <!-- timer js -->
        <script src="{{asset('bigdeal/assets/js/timer1.js')}}"></script>

        <!-- bootstrap js -->
        <script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>


        <!-- Theme js-->
        <script src="{{asset('bigdeal/assets/js/modal.js')}}"></script>


        <!-- popper js-->
        <script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>


    </x-slot>

</x-main-layout>
