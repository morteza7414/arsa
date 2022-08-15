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
                            <h2>سبد خرید</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">سبد خرید</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">تصویر</th>
                            <th scope="col">نام محصول</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">عمل</th>
                            <th scope="col">مجموع</th>
                        </tr>
                        </thead>
                        @foreach(auth()->user()->carts as $cart)
                            <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)">
                                        <img src="{{asset('images/products/gallery/' . $cart->product->images()->first()->image)}}" alt="cart">
                                    </a>
                                </td>
                                <td><a href="javascript:void(0)">{{$cart->product->title}}</a>
                                    <div class="mobile-cart-content">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                           value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">63,000 تومان</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="javascript:void(0)" class="icon"><i
                                                            class="ti-close"></i></a></h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
{{--                                    @if($cart->product->offprice() !== $cart->product->price)--}}
{{--                                        <h2>{{$cart->product->offprice()}} تومان</h2>--}}
{{--                                    @else--}}
                                        <h2>{{$cart->product->offprice()}} تومان</h2>
{{--                                    @endif--}}
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"
                                                    onclick="quantityMinus(event,{{$cart->id}})"></button>
                                            <input
                                                    type="number"
                                                    name="quantity"
                                                    class="form-control input-number"
                                                    value="{{$cart->quantity}}"
                                                    readonly="readonly"
                                            />

                                            <button class="qty-plus"
                                                    onclick="quantityPlus(event,{{$cart->id}})"></button>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="icon tooltip-top"
                                       data-tippy-content="حذف از لیست سبد خرید"
                                       onclick="deleteCart(event,{{$cart->id}})">
                                        <i class="ti-close"></i>
                                    </a>
                                </td>
                                <td>
                                    <h2 class="td-color">{{$cart->sum}} تومان</h2>

                                </td>
                            </tr>
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
                            </tbody>
                        @endforeach
                        @error('quantity')
                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                        >
                            {{ $message }}
                        </p>
                        @enderror
                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>جمع سبد خرید :</td>
                                <td>
                                    <h2>{{auth()->user()->total_sum()}} تومان</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-12">
                    <a href="{{route('ordering')}}" class="btn btn-normal">
                        ادامه خرید
                    </a>
{{--                    <a href="{{route('purchase')}}" class="btn btn-normal ms-3">--}}
{{--                        پرداخت--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </section>
    <!--section end-->

    <hr>
    <!--section end-->

    <x-slot name="scripts">
        <!-- Bootstrap Notification js-->
        <script src="{{asset('bigdeal/assets/js/bootstrap-notify.min.js')}}"></script>


    </x-slot>

</x-main-layout>
