<x-main-layout>

    <x-slot name="title">
        - آموزشها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>آموزش</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">آموزش</a></li>
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
                        <div class="learn_all">
                            <section class="product section-pb-space mb--5">
                                <div class="label-title">
                                    <h4>
                                        محصولات و راهکارها
                                    </h4>
                                </div>

                                <div class="product-slide-6 no-arrow">
                                    @foreach($categoryP as $learn)
                                        <div>
                                            <div class="product-box">
                                                <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                                    <div class="product-imgbox">
                                                        @if($learn->images()->first())
                                                            <div class="product-front">
                                                                <img
                                                                    alt="{{$learn->title}}"
                                                                    src="{{asset('images/learns/'.$learn->images()->first()->image)}}"
                                                                    class="img-fluid  ">
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
                                                                    class="img-fluid  ">

                                                            </div>
                                                        @endif
                                                        <div class="slider-title">
                                                                <h4>
                                                                    {{$learn->title}}
                                                                </h4>
                                                        </div>
                                                        @if($learn->abstract)
                                                            <div class="slider-abstract">
                                                                <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                                                    <h6>
                                                                        {{$learn->abstract}}
                                                                    </h6>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <br/>
                        <div class="navigation-arrow">
                            {{ $categoryP->onEachSide(1)->links() }}
                        </div>
                    </div>

                    <hr/>
                    <br/>

                    <div class="col-lg-12">
                        <div class="learn_all">
                            <section class="product section-pb-space mb--5">
                                <div class="label-title">
                                    <h4>
                                        عمومی
                                    </h4>
                                </div>
                                <div class="product-slide-6 no-arrow">
                                    @foreach($categoryG as $learn)
                                        <div>
                                            <div class="product-box">
                                                <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                                    <div class="product-imgbox">
                                                        @if($learn->images()->first())
                                                            <div class="product-front">
                                                                <img
                                                                    alt="{{$learn->title}}"
                                                                    src="{{asset('images/learns/'.$learn->images()->first()->image)}}"
                                                                    class="img-fluid  ">
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
                                                                    class="img-fluid  ">

                                                            </div>
                                                        @endif
                                                        <div class="slider-title">
                                                            <h4>
                                                                {{$learn->title}}
                                                            </h4>
                                                        </div>
                                                        @if($learn->abstract)
                                                            <div class="slider-abstract">
                                                                <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                                                    <h6>
                                                                        {{$learn->abstract}}
                                                                    </h6>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                        <br/>
                        <div class="navigation-arrow">
                            {{ $categoryG->onEachSide(1)->links() }}
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
