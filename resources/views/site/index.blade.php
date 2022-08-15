<x-main-layout>

    <x-slot name="title">
        | هوشمندسازی | هوشمندسازی ساختمان | bms | پکیج هوشمندسازی
    </x-slot>


    <!--slider start-->
    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1 no-arrow">
                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img slide1">

                                </div>
                                <div class="slider-banner-content">
                                    <div class="header-slider-content content-right">
                                        <h2>
                                            دوره آموزش
                                            <span>
                                                هوشمندسازی
                                            </span>
                                        </h2>
                                        <h3>
                                            به همراه مدرک فنی حرفه ای
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            شروع خرید
                                        </a>
                                    </div>
                                    <div class="header-slider-content content-left">
                                        <h2>
                                            <span>
                                                هوشمندسازی
                                            </span>
                                            ساختمان
                                        </h2>
                                        <h3>
                                            به همراه خدمات پس از فروش
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            شروع خرید
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img slide2">

                                </div>
                                <div class="slider-banner-content">
                                    <div class="header-slider-content content-right">
                                        <h2>
                                            ارائه
                                            <span>
                                                پیش فاکتور
                                            </span>
                                        </h2>
                                        <h3>
                                           با توجه به اطلاعات ورودی شما
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            ثبت پیش فاکتور
                                        </a>
                                    </div>
                                    <div class="header-slider-content content-left">
                                        <h2>
                                            <span>
                                               نمایندگی
                                            </span>
                                            بگیرید
                                        </h2>
                                        <h3>
                                           به همراه آموزش و پشتیبانی از طرف شرکت
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            گرفتن نمایندگی
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div>
                            <div class="slider-banner p-center slide-banner-1">
                                <div class="slider-img slide3">

                                </div>
                                <div class="slider-banner-content">
                                    <div class="header-slider-content content-right">
                                        <h2>
                                            دریافت
                                            <span>
                                                کاتالوگ
                                            </span>
                                        </h2>
                                        <h3>
                                            برای دریافت کاتالوگ کلیک کنید
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            مشاهده کاتالوگ
                                        </a>
                                    </div>
                                    <div class="header-slider-content content-left">
                                        <h2>
                                            <span>
                                               راهکارهای
                                            </span>
                                            اقتصادی
                                        </h2>
                                        <h3>
                                            به همراه 5 سال ضمانت تعویض کالا
                                        </h3>
                                        <a href="{{route('category','هوشمند')}}" class="btn btn-normal">
                                            مشاهده راهکارها
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->


    <!--collection banner start-->
    <div class="col-12 background-white">
        <div class="container">
            <section class="collection-banner section-pt-space b-g-white ">
                <div class="fast-access-collection col-md-12 col-xs-12 col-sm-12">

                    <div class="fast-access">
                        <a href="{{route('allProducts')}}">
                            <div class="col-12 fast-access-seperate">
                                <h4>
                                    محصولات
                                </h4>
                            </div>
                        </a>
                    </div>

                    <div class="fast-access ">
                        <a href="{{route('invoiceCalculator.input')}}">
                            <div class="col-12 fast-access-seperate">
                                <h4>
                                    پیش فاکتور
                                </h4>
                            </div>
                        </a>
                    </div>

                    <div class="fast-access">
                        <a href="{{route('allApproachs')}}">
                            <div class="col-12 fast-access-seperate">
                                <h4>
                                    راه کارها
                                </h4>
                            </div>
                        </a>
                    </div>

                    <div class="fast-access ">
                        <a href="{{route('project.all')}}">
                            <div class="col-12 fast-access-seperate">
                                <h4>
                                    پروژه ها
                                </h4>
                            </div>
                        </a>
                    </div>

                    <div class="fast-access">
                        <a href="{{route('representation')}}">
                            <div class="col-12 fast-access-seperate">
                                <h4>
                                    اخذ نمایندگی
                                </h4>
                            </div>
                        </a>
                    </div>


                </div>
            </section>
        </div>
    </div>
    <!--collection banner end-->

    <br/>

    <!--product start-->
    <section class="index-section allproduct-slider product section-pb-space mb--5">
        <div class="label-title">
            <a href="{{route('allProducts')}}">
                <h4>
                    محصولات و راهکارها
                </h4>
            </a>
        </div>
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        @foreach($products as $product)
                            <div>
                                <div class="product-box">
                                    <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                        <div class="product-imgbox">
                                            @if($product->images()->first())
                                                <div class="product-front">
                                                    <img
                                                        alt="{{$product->title}}"
                                                        src="{{asset('images/products/gallery/'.$product->images()->first()->image)}}"
                                                        class="img-fluid  " alt="product">
                                                </div>
                                            @elseif(empty($product->images()->first()) and $product->videos()->first())
                                                <div class="product-front">
                                                    <video width="320" height="240" controls>
                                                        <source
                                                            src="{{asset('videos/products/gallery/'.$product->videos()->first()->video)}}"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            @else
                                                <div class="product-front">
                                                    <img
                                                        alt="{{$product->title}}"
                                                        src="{{asset('images/site/default.png')}}"
                                                        class="img-fluid  " alt="product">
                                                </div>
                                            @endif
                                            @if($product->created_at > \Carbon\Carbon::now()->subDay(2))
                                                <div class="new-label1">
                                                    <div>جدید</div>
                                                </div>
                                            @endif
                                            <div class="product-back">
                                                <div class="product-icon icon-inline">
                                                    @include('partials.product_options')
                                                </div>
                                            </div>

                                        </div>
                                        <div class="slider-title">
                                            <h4>
                                                {{$product->title}}
                                            </h4>
                                        </div>
                                    </a>
                                    @if($product->abstract)
                                        <div class="slider-abstract">
                                            <h6>
                                                {{$product->abstract}}
                                            </h6>
                                        </div>
                                    @endif

                                    @include('partials.homepage.product-price')

                                </div>


                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product end-->

    <br/>

    <!--learns start-->
    <section class="index-section news-slider product section-pb-space ">
        <div class="label-title">
            <a href="{{route('learn.all')}}">
                <h4>
                    جدیدترین آموزشها
                </h4>
            </a>
        </div>
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        @foreach($learns as $learn)
                            <div>
                                <div class="product-box index-news-box">
                                    <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                        <div class="product-imgbox">
                                            @if($learn->images()->first())
                                                <div class="product-front">

                                                    <img
                                                        alt="{{$learn->title}}"
                                                        src="{{asset('images/learns/'.$learn->images()->first()->image)}}"
                                                        class="img-fluid  " alt="product">

                                                </div>
                                            @elseif(empty($learn->images()->first()) and $learn->videos()->first())
                                                <div class="product-front">
                                                    <video width="320" height="240"
                                                           controls>
                                                        <source
                                                            src="{{asset('videos/learns/'.$learn->videos()->first()->video)}}"
                                                            type="video/mp4">
                                                        Your browser does not support the
                                                        video tag.
                                                    </video>
                                                </div>
                                            @else
                                                <div class="product-front">
                                                    <img
                                                        alt="{{$learn->title}}"
                                                        src="{{asset('images/site/default.png')}}"
                                                        class="img-fluid  " alt="product">
                                                </div>
                                            @endif
                                            @if($learn->created_at > \Carbon\Carbon::now()->subDay(2))
                                                <div class="new-label1">
                                                    <div>
                                                        جدید
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="slider-title">
                                            <h4>
                                                {{$learn->title}}
                                            </h4>
                                        </div>
                                    </a>
                                    @if($learn->abstract)
                                        <div class="slider-abstract">
                                            <h6>
                                                {{$learn->abstract}}
                                            </h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--learns end-->

    <br/>

    <!--news start-->
    <section class="index-section news-slider product section-pb-space ">
        <div class="label-title">
            <a href="{{route('news')}}">
                <h4>
                    رویدادها
                </h4>
            </a>
        </div>
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        @foreach($news as $singleNews)
                            <div>
                                <div class="product-box index-news-box">
                                    <a href="{{route('news.single',[$singleNews->id,$singleNews->slut])}}">
                                        <div class="product-imgbox">
                                            @if($singleNews->images()->first())
                                                <div class="product-front">
                                                    <img
                                                        alt="{{$singleNews->title}}"
                                                        src="{{asset('images/news/'.$singleNews->images()->first()->image)}}"
                                                        class="img-fluid  " alt="product">
                                                </div>
                                            @else
                                                <div class="product-front">
                                                    <img
                                                        alt="{{$singleNews->title}}"
                                                        src="{{asset('images/site/default.png')}}"
                                                        class="img-fluid  " alt="product">
                                                </div>
                                            @endif
                                            @if($singleNews->created_at > \Carbon\Carbon::now()->subDay(2))
                                                <div class="new-label1">
                                                    <div>
                                                        جدید
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="slider-title">
                                            <h4>
                                                {{$singleNews->title}}
                                            </h4>
                                        </div>
                                    </a>
                                    @if($singleNews->abstract)
                                        <div class="slider-abstract">
                                            <h6>
                                                {{$singleNews->abstract}}
                                            </h6>
                                        </div>
                                    @endif

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--news end-->


</x-main-layout>
