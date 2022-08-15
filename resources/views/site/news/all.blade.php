<x-main-layout>

    <x-slot name="title">
        - رویدادها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>رویداد</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">رویدادها</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section_learn-all section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="learn_all-videos">
                            <section class="product section-pb-space mb--5">
                                <div class="custom-container">
                                    <div class="row">
                                        <div class="col pr-0">
                                            <div class="product-slide-6 no-arrow">
                                                @foreach($news as $singleNews)
                                                    @if($singleNews->gallery()->first())
                                                        @if($singleNews->gallery()->first()->video)
                                                            <div>
                                                                <div class="product-box learn-all-box">
                                                                    <div class="product-imgbox border-bottom-raduce-5">
                                                                        <a href="{{route('news.single',[$singleNews->id,$singleNews->slut])}}">
                                                                            <div class="product-front">
                                                                                <video width="320" height="240"
                                                                                       controls>
                                                                                    <source
                                                                                        src="{{asset('videos/news/'.$singleNews->gallery()->first()->video)}}"
                                                                                        type="video/mp4">
                                                                                    Your browser does not support the
                                                                                    video tag.
                                                                                </video>
                                                                                <div class="col-12">
                                                                                    <h5 class="all-learn-title">
                                                                                        {{$singleNews->title}}
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="learn_all-images">
                            <section class="product section-pb-space mb--5">
                                <div class="custom-container">
                                    <div class="row">
                                        <div class="col pr-0">
                                            <div class="product-slide-6 no-arrow">
                                                @foreach($news as $singleNews)
                                                    @if($singleNews->gallery()->first())
                                                        @if($singleNews->gallery()->first()->image)
                                                            <div>
                                                                <div class="product-box learn-all-box">
                                                                    <div class="product-imgbox border-bottom-raduce-5">
                                                                        <a href="{{route('news.single',[$singleNews->id,$singleNews->slut])}}">
                                                                            <div class="slider-title product-front">
                                                                                <img
                                                                                    alt="{{$singleNews->title}}"
                                                                                    src="{{asset('images/news/'.$singleNews->gallery()->first()->image)}}"
                                                                                    class="img-fluid">
                                                                                <h4 class="all-learn-title">
                                                                                    {{$singleNews->title}}
                                                                                </h4>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @elseif(empty($singleNews->gallery()->first()->image) and empty($singleNews->gallery()->first()->video))
                                                        <div>
                                                            <div class="product-box learn-all-box">
                                                                <div class="product-imgbox border-bottom-raduce-5">
                                                                    <a href="{{route('news.single',[$singleNews->id,$singleNews->slut])}}">
                                                                        <div class="product-front">
                                                                            <img
                                                                                alt="{{$singleNews->title}}"
                                                                                src="{{asset('images/site/default.png')}}"
                                                                                class="img-fluid">
                                                                            <h5 class="all-learn-title">
                                                                                {{$learn->title}}
                                                                            </h5>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
