<x-main-layout>

    <x-slot name="title">
        - خدمات
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>خدمات</h2>
                            <ul>
                                <li><a href="index.html">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">خدمات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section_services section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service_all">
                            <div class="col-6">
                                <a href="{{route('product.approachs')}}">
                                    <div class="col-6">
                                        <h3>
                                            راهکارها
                                        </h3>
                                    </div>
                                </a>
                                <a href="{{route('consultation')}}">
                                    <div class="col-6">
                                        <h3>
                                            مشاوره
                                        </h3>
                                    </div>
                                </a>
                            </div>

                            <div class="col-6">
                                <a href="{{route('learn.all')}}">
                                    <div class="col-6">
                                        <h3>
                                            آموزش
                                        </h3>
                                    </div>
                                </a>
                                <a href="{{route('support')}}">
                                    <div class="col-6">
                                        <h3>
                                            پشتیبانی
                                        </h3>
                                    </div>
                                </a>
                            </div>

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
