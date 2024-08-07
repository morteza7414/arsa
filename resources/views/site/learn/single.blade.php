<x-main-layout>

    <x-slot name="title">
        - آموزش
    </x-slot>


    <!-- section start -->
    <section class="section_learn section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="single-page top-banner-wrapper">
                                        <a href="javascript:void(0)">
                                            <div class="top-image col-4">
                                                @if(empty($images->first()) and empty($videos->first()))
                                                    <img src="{{asset('images/site/navbar/slider03.jpg')}}"
                                                         class="img-fluid  w-100" alt="">
                                                @elseif(empty($videos->first()) and !empty($images->first()))
                                                    <img src="{{asset('images/learns'.'/'.$images->first()->image)}}"
                                                         class="img-fluid  w-100" alt="">
                                                @else
                                                    <a class="single_topVideo_a" href="{{route('video.single',['code'=>3,'video'=>$videos->first()->video])}}">
{{--                                                        <video width="320" height="240"  controls>--}}
{{--                                                            <source src="{{asset('videos/learns/'.$videos->first()->video)}}" type="video/mp4">--}}
{{--                                                            Your browser does not support the video tag.--}}
{{--                                                        </video>--}}
                                                        <style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe src="https://www.aparat.com/video/video/embed/videohash/7qlOu/vt/frame"  allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe></div>
                                                    </a>
                                                @endif
                                            </div>
                                        </a>

                                        <!-- section content start-->
                                        <div class="learn-content section-content">
                                            <div class="container single-content">
                                                <div class="col-12">
                                                    <h3 class="title">
                                                        <span>
                                                        {{$learn->title}}
                                                        </span>
                                                    </h3>
                                                </div>
                                                <div class="description-div col-12">
                                                    <h5>
                                                        <span>
                                                        {{$learn->description}}
                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- section content end -->


                                        <!-- section media start -->
                                        <div class="single-media">
                                            <div class="row">



                                                <div class="col-12 media-images">
                                                    <label>تصاویر</label>
                                                    <section class="product section-pb-space mb--5">
                                                        <div class="custom-container">
                                                            <div class="row">
                                                                <div class="col pr-0">
                                                                    <div class="product-slide-6 no-arrow">
                                                                        @foreach($images as $image)
                                                                            <div>
                                                                                <div class="product-box">
                                                                                    <div class="product-imgbox">
                                                                                        <div class="product-front">
                                                                                            <a href="{{route('learn.single',[$learn->id,$learn->slut])}}">
                                                                                                <img
                                                                                                    src="{{asset('images/learns/'.$image->image)}}"
                                                                                                    class="img-fluid  "
                                                                                                    alt="{{$learn->title}}">
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>

                                                <hr/>
                                                <br/>

                                                <div class="col-12 media-images">
                                                    <label>ویدئوها</label>
                                                    <section class="product section-pb-space mb--5">
                                                        <div class="custom-container">
                                                            <div class="row">
                                                                <div class="col pr-0">
                                                                    <div class="product-slide-6 no-arrow">
                                                                        @foreach($videos as $video)
                                                                            <div>
                                                                                <div class="product-box">
                                                                                    <div class="product-imgbox">
                                                                                        <div class="product-front">
                                                                                            <a href="{{route('video.single',['code'=>3,'video'=>$video->video])}}">
                                                                                                <video width="320" height="240"  controls>
                                                                                                    <source src="{{asset('videos/learns/'.$video->video)}}" type="video/mp4">
                                                                                                    Your browser does not support the video tag.
                                                                                                </video>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- section media end -->
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
