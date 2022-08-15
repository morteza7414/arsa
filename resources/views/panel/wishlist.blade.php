<x-main-layout>
    <x-slot name="title">
        - لیست علاقه مندی ها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>لیست علاقه مندی ها</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">لیست علاقه مندی</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="wishlist-section section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">تصویر</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">دسترسی</th>
                            <th scope="col">عمل</th>
                        </tr>
                        </thead>
                        @if(auth()->user()->likes->toArray())
                            @foreach(auth()->user()->likes->toArray() as $like)
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="javascript:void(0)"><img
                                                    src="{{asset('images/products/'.'/'.$like['image'])}}"
                                                    alt="product"
                                                    class="img-fluid  "></a>
                                    </td>
                                    <td><a href="javascript:void(0)">{{$like['title']}}</a>
                                        {{--                                        <div class="mobile-cart-content">--}}
                                        {{--                                            <div class="col-xs-3">--}}
                                        {{--                                                --}}
                                        {{--                                                <p>موجود در انبار</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-xs-3">--}}
                                        {{--                                                <h2 class="td-color">63,000 تومان</h2>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-xs-3">--}}
                                        {{--                                                <h2 class="td-color"><a href="javascript:void(0)" class="icon me-1"><i--}}
                                        {{--                                                                class="ti-close"></i>--}}
                                        {{--                                                    </a><a href="javascript:void(0)" class="cart"><i--}}
                                        {{--                                                                class="ti-shopping-cart"></i></a></h2>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </td>
                                    <td>
                                        @if($like['offprice'])
                                            <h2>{{$like['offprice']}} تومان</h2>
                                        @else
                                            <h2>{{$like['price']}} تومان</h2>
                                        @endif
                                    </td>
                                    <td>
                                        @if($like['inventory'] > 0)
                                            <p>موجود در انبار</p>
                                        @else
                                            <p class="inventory-none">ناموجود</p>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                           data-tippy-content="حذف از لیست"
                                           class="icon ms-3  tooltip-top"
                                           onclick="like(event,{{$like['id']}})">
                                            <i class="ti-close"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="cart tooltip-top"
                                           data-tippy-content="افزودن به سبد خرید">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                        <form action="{{ route('like', $like['id']) }}" method="get"
                                              id="addLike-{{$like['id']}}">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>

        </div>
    </section>
    <hr>
    <!--section end-->

    <x-slot name="scripts">
        <script src="{{asset('bigdeal/assets/js/isotope.min.js')}}"></script>
        <script src="{{asset('bigdeal/assets/js/portfolio_init.js')}}"></script>
        <script src="{{asset('bigdeal/assets/js/jquery.magnific-popup.js')}}"></script>
        <script src="{{asset('bigdeal/assets/js/zoom-gallery.js')}}"></script>


    </x-slot>

</x-main-layout>