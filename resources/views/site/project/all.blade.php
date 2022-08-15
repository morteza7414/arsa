<x-main-layout>

    <x-slot name="title">
        - پروژه های اجرایی
    </x-slot>


    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>پروژه های اجرایی آرسا</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">پروژه های اجرایی</a></li>
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
                                            <img src="{{asset('images/site/navbar/slider03.jpg')}}"
                                                 class="img-fluid  w-100" alt="پروژه های اجرایی هوشمندسازی ساختمان">
                                        </a>
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
                                                @foreach($projects as $project)
                                                    <div class="col-xl-2 col-lg-3 col-md-4 col-6 col-grid-box">
                                                        <a href="{{route('project.single',$project->id)}}">
                                                            <div class="product-box">
                                                                <div class="product-imgbox">
                                                                    <div class="product-front">
                                                                        @if($project->images()->first())
                                                                            <img
                                                                                Alt="{{$project->title}}"
                                                                                src="{{asset('images/projects/'.$project->images()->first()->image)}}"
                                                                                class="img-fluid " alt="product">
                                                                        @elseif($project->videos()->first())
                                                                            <video
                                                                                class="img-fluid  image_zoom_cls-0"
                                                                                controls>
                                                                                <source
                                                                                    autoplay="false"
                                                                                    src="{{asset('videos/projects/'.$project->videos()->first()->video)}}"
                                                                                    type="video/mp4">
                                                                                Your browser does not support the video
                                                                                tag.
                                                                            </video>
                                                                        @else
                                                                            <img
                                                                                Alt="{{$project->title}}"
                                                                                src="{{asset('images/site/default.png')}}"
                                                                                class="img-fluid " alt="product">
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="product-detail detail-center detail-inverse search_product_detail">
                                                                    <div class="detail-title">
                                                                        <div class="slider-title detail-left">
                                                                            <h4 class="price-title">
                                                                                {{$project->title}}
                                                                            </h4>
                                                                            @if($project->abstract)
                                                                                <div class="slider-abstract">
                                                                                    <h6>
                                                                                        {{$project->abstract}}
                                                                                    </h6>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                <div class="navigation-arrow">
                    {{ $projects->onEachSide(1)->links() }}
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
