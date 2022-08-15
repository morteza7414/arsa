<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>آرسا - تایید تراکنش</title>
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{assert('bigdeal/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/color2.css')}}" media="screen" id="color">
    <link rel="stylesheet" type="text/css" href="{{asset('bigdeal/assets/css/color2.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="screen">
</head>
<body>

<div class="purchase_content">
    <div class="purchase_box">
        <div class="purchase_header">
            نتیجه تراکنش
        </div>
        <div class="purchase_status">
            <text class="purchase_success_detail">
                {{$message}}
            </text>
        </div>
        <div class="purchase_success_reference">
            <span>شماره پیگیری:</span>
            <span class="referenceId">{{$reference_id}}</span>
        </div>
    </div>
    <div class="purchase_button">
        <a href="{{route('home')}}">
            بازگشت به خانه
        </a>
    </div>
</div>




</body>
</html>
