<!DOCTYPE html>
<html lang="en">

<head>
    <title>سایت آرسا - فاکتور</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="آرسا">
    <meta name="keywords" content="آرسا">
    <meta name="author" content="آرسا">
    <link rel="icon" href="{{asset('bigdeal/assets/images/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('bigdeal/assets/images/favicon/favicon.png')}}" type="image/x-icon">


    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/themify.css')}}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick-theme.css')}}">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/animate.css')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/bootstrap.css')}}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/color2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

</head>

<style>
    ul {
        padding-left: unset;
        padding-right: 0;
    }
</style>


<body class="light-layout rtl">

<!-- invoice start -->
<section class="invoice-five">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="invoice-popup">
                    <div>
                        <div class="invoice-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="header-left">
                                        <div class="brand-logo invoice-logo">
                                            <a href="{{route('home')}}">
                                                <img src="{{asset('images/site/logo2.png')}}"
                                                     alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="invoice-to">
                                            <ul>
                                                <li>
                                                    <h4>فاکتور به:</h4>
                                                </li>
                                                <li>
                                                    <h3>{{$transaction->user->name}}</h3>
                                                </li>
                                                <li>
                                                    {{$transaction->user->mobile}}
                                                </li>
                                                @if($transaction->user->email)
                                                    <li>
                                                        {{$transaction->user->email}}
                                                    </li>
                                                @endif
                                                @if($transaction->address)
                                                    <li>
                                                        آدرس:
                                                        {{$transaction->address}}
                                                    </li>
                                                @endif
                                                @if($transaction->postalcode)
                                                    <li>
                                                        کد پستی:
                                                        {{$transaction->postalcode}}
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="header-right">
                                        <ul>
                                            <li>
                          <span>
                            <i class="fa fa-map-marker"></i>
                          </span>
                                                فروشگاه بزرگ آرسا در ایران - یزد
                                            </li>
                                            <li>
                          <span>
                            <i class="fa fa-phone"></i>
                          </span>
                                                09198387828
                                            </li>
                                            <li>
                          <span>
                            <i class="fa fa-envelope"></i>
                          </span>
                                                info@rsabms.com
                                            </li>
                                            <li>
                          <span>
                            <i class="fa fa-globe"></i>
                          </span>
                                                <a href="{{route('home')}}">www.rsabms.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-to">
                            <div class="row">
                                <div class="col-6">
                                    <div class="invoiceto-left">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="invoiceto-right">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-breadcrumb">
                            <ul>
                                <li>
                                    <div>
                                        <h6>تاریخ خرید : </h6>
                                        <h5>{{$transaction->getCreatedAtInPersian()}}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>شناسه تراکنش : </h6>
                                        <h5 style="text-align: center">{{(int)$transaction->transaction_id}}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>شماره پیگیری : </h6>
                                        <h5>{{$transaction->transaction_result->getReferenceId()}}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>مبلغ نهایی :
                                            </h6>
                                                <h5>{{number_format($transaction->paid)}} تومان</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive-md">
                            <table class="invoice-table">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت</th>
                                    <th>قیمت با تخفیف</th>
                                    <th>دلیل تخفیف</th>
                                    <th>مجموع</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div hidden>{{$count=1}}</div>
                                @foreach($transaction['carts'] as $cart)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>
                                            <h3>
                                                {{$cart->product_title}}
                                            </h3>
                                            {{--                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>--}}
                                        </td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>{{number_format($cart->product_price)}} تومان</td>
                                        <td>{{number_format($cart->product_offprice)}} تومان</td>
                                        <td>{{($cart->off_reason)?$cart->off_reason:''}} </td>
                                        <td>{{number_format($cart->sum)}} تومان</td>
                                    </tr>
                                    <div hidden>{{$count++}}</div>
                                @endforeach

                                </tbody>
                                <tfoot>
                                @if(!empty($order_offcodes))
                                    @foreach($order_offcodes as $off)
                                        <tr>
                                            <td colspan="4"></td>
                                            <td colspan="2">
                                                استفاده از کد تخفیف

                                                @if(\App\Models\Offcode::where('id',$off->offcode_id)->first()->off_reason)
                                                    {{\App\Models\Offcode::where('id',$off->offcode_id)->first()->off_reason}}
                                                @endif
                                            </td>
                                            <td>{{number_format($off->off_amount)}} تومان</td>
                                        </tr>
                                    @endforeach
                                @endif


                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2">مبلغ نهایی</td>
                                    <td>{{number_format($transaction->paid)}} تومان</td>
                                </tr>
                                </tfoot>
                            </table>
                            <hr>
                            <div class="row print-bar">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="printbar-right">
                                        <button id="printinvoice" class="btn btn-solid btn-md ">
                                            <i class="fa fa-print"></i>
                                            چاپ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invoice end -->

<!-- latest jquery-->
<script src="{{asset('bigdeal/assets/js/jquery-3.3.1.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('bigdeal/assets/js/bootstrap.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('bigdeal/assets/js/invoice.js')}}"></script>
</body>

</html>
