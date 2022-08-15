<x-main-layout>
    <x-slot name="title">
        - ادامه سفارش
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>سفارش</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">ادامه خرید</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--order tracking start-->
    <section class="order-tracking section-big-my-space  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="msform">


                        <!-- fieldsets -->
                        <fieldset>
                            <div class="container p-0">
                                <div class="row shpping-block">
                                    <div class="col-lg-8">
                                        <div class="order-tracking-contain order-tracking-box">

                                            <div class="tracking-group">
                                                <div class="product-offer">
                                                    @if(auth()->user()->address)
                                                        <div class="col-md-12 warning">
                                                            <h6 class="warning text_center order-warning">
                                                                در صورت نیاز به ارسال محصولات به آدرس جدید لطفا با کلیک
                                                                روی
                                                                <span>
                                                                     آدرس جدید
                                                                </span>
                                                                آدرس و کدپستی مقصد را وارد نمایید
                                                            </h6>
                                                        </div>
                                                    @endif
                                                    <h6 class="product-title"><i class="fa fa-tags"></i>آدرس ارسال:
                                                    </h6>
                                                    <div class="offer-contain">
                                                        <ul>
                                                            <li class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <h5>آدرس</h5>
                                                                    @if(auth()->user()->address)
                                                                        <p>{{auth()->user()->address}}</p>
                                                                    @else
                                                                        <p class="error_message">آدرسی ثبت نشده است لطفا
                                                                            آدرس خود را وارد
                                                                            نمایید</p>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                            <li class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <h5>کدپستی</h5>
                                                                    @if(auth()->user()->postalcode)
                                                                        <p>{{auth()->user()->postalcode}}</p>
                                                                    @else
                                                                        <p class="error_message">
                                                                            کدپستی ثبت نشده است لطفا کدپستی خود را وارد
                                                                            نمایید
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <ul class="@if(auth()->user()->address) offer-sider @else none-address @endif">
                                                            <li>
                                                                <div>
                                                                    <form id="order-address"
                                                                          action="{{route('purchase')}}"
                                                                          method="get">

                                                                        <input type="text" name="address"
                                                                               class="col-md-12 ordering_input"
                                                                               placeholder="آدرس خود را وارد نمایید"
                                                                               required>
                                                                        @error('address')
                                                                        <p class="error_message">
                                                                            {{ $message }}
                                                                        </p>
                                                                        @enderror
                                                                        <input type="text" name="postalcode"
                                                                               class="col-md-12 ordering_input"
                                                                               placeholder="کدپستی خود را وارد نمایید"
                                                                               required>
                                                                        @error('postalcode')
                                                                        <p class="error_message">
                                                                            {{ $message }}
                                                                        </p>
                                                                        @enderror
                                                                    </form>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <h5 class="@if(auth()->user()->address) show-offer @else not-show-offer @endif">
                                                            <span class="more-offer">آدرس جدید</span>
                                                            <span class="less-offer">پنهان کردن آدرس</span>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tracking-group pb-0">
                                                <h4 class="tracking-title">محصولات سبد خرید </h4>
                                                <ul class="may-product">
                                                    @foreach($carts as $cart)
                                                        <li>
                                                            <div class="media">
                                                                <img src="{{asset('images/products/gallery/'.$cart->product->images()->first()->image)}}"
                                                                     class="img-fluid" alt="">
                                                                <div class="media-body">
                                                                    <h3>{{$cart->product_title}}</h3>
                                                                    @if($cart->product_price == $cart->product_offprice)
                                                                        <h4>
                                                                            {{$cart->product_price}}
                                                                            تومان
                                                                        </h4>
                                                                    @else
                                                                        <h4>
                                                                            {{$cart->product_offprice}}
                                                                            تومان
                                                                            <span>
                                                                                {{$cart->product_price}}
                                                                                تومان
                                                                            </span>
                                                                        </h4>
                                                                    @endif
                                                                    <h6>تعداد</h6>
                                                                    <div class="qty-box">
                                                                        {{$cart->quantity}}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="order-tracking-sidebar order-tracking-box">
                                            <div class="coupan-block">
                                                <form action="{{route('offcode.register')}}" method="post"
                                                      class="form-control inline_flex">
                                                    @csrf
                                                    <h5>
                                                        <i data-feather="tag"></i>
                                                    </h5>
                                                    <input type="text" name="offcode" placeholder="کدتخفیف" required>
                                                    <button type="submit" class="btn btn-solid btn-outline btn-sm">
                                                        اعمال
                                                    </button>
                                                </form>
                                            </div>
                                            <ul class="cart_total">
                                                <li>
                                                    جمع سبد خرید : <span>{{$order->total_amount}} تومان</span>
                                                </li>
                                                <li>
                                                    تخفیف <span>{{$order->total_amount - $order->sum}} تومان</span>
                                                </li>
                                                <li>
                                                    هزینه ارسال <span>درب منزل</span>
                                                </li>
                                                <li>
                                                    کد تخفیف<span>اعمال کد تخفیف</span>
                                                </li>
                                                <li>
                                                    مالیات <span>0,000 تومان</span>
                                                </li>
                                                <li>
                                                    <div class="total">
                                                        جمع کل<span>{{$order->sum}} تومان</span>
                                                    </div>
                                                </li>
                                                <li class="pt-0">
                                                    <div class="buttons">
                                                        <a onclick="goToPurchase(event)"
                                                           class="btn btn-solid btn-sm btn-block">
                                                            پرداخت
                                                            صورت حساب
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="next action-button btn btn-solid btn-sm">بعدی</a>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--order tracking end-->

    <hr>
    <!--section end-->

    <x-slot name="scripts">
        <!-- Bootstrap Notification js-->
        <script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>


    </x-slot>

</x-main-layout>
