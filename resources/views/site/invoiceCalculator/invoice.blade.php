<!DOCTYPE html>
<html lang="en">

<head>
    <title>سایت آرسا - پیش فاکتور</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content=" پیش فاکتور آرسا">
    <meta name="keywords" content="هوشمندسازی آرسا">
    <meta name="author" content="آرسا">
    <link rel="icon" href="{{asset('/images/site/rsa_background2.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/images/site/rsa_icon.png')}}" type="image/x-icon">


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
                                                    <h4>پیش فاکتور به:</h4>
                                                </li>
                                                <li>
                                                    <h3>{{$info['name']}}</h3>
                                                </li>
                                                <li>
                                                    {{$info['mobile']}}
                                                </li>
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
                                                www.rsabms.com
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
                                        <h6>تاریخ: </h6>
                                        <h5>{{(\App\Models\InvoiceCalculatorUser::where('mobile',$info['mobile'])->first())?\App\Models\InvoiceCalculatorUser::where('mobile',$info['mobile'])->first()->getDateInPersian():''}}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>سفارش دهنده: </h6>
                                        <h5 style="text-align: center">{{$info['name']}}</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>نوع فاکتور: </h6>
                                        <h5>پیش فاکتور</h5>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h6>مبلغ نهایی :</h6>
                                        <h5>{{$info['finalPrice']}} تومان</h5>
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
                                    <th>قیمت نهایی</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div hidden>{{$count=1}}</div>
                                @foreach($data as $item)
                                    @if($item['number']>0)
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>
                                                <h3>
                                                    {{$item['title']}}
                                                </h3>
                                            </td>
                                            <td>{{$item['number']}}</td>
                                            <td>{{$item['price']}} تومان</td>
                                            <td>{{$item['number']*$item['price']}} تومان</td>
                                        </tr>
                                        <div hidden>{{$count++}}</div>
                                    @endif
                                @endforeach

                                </tbody>
                                <tfoot>


                                <tr>
                                    <td colspan="4"></td>
                                    <td colspan="2">مبلغ نهایی</td>
                                    <td>{{$info['finalPrice']}} تومان</td>
                                </tr>
                                </tfoot>
                            </table>
                            <hr>
                            <div class="row print-bar">
                                <div class="col-md-6">
                                    {{--                                    <div class="printbar-left">--}}
                                    {{--                                        <button id="exportpdf" class="btn btn-solid btn-md">--}}
                                    {{--                                            <i class="fa fa-file"></i>--}}
                                    {{--                                            خروجی PDF--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}
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
