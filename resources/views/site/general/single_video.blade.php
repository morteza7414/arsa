<x-main-layout>

    <x-slot name="title">
        - ویدئو
    </x-slot>




    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>ویدئو</h2>
                            <ul>
                                <li><a href="index.html">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">ویدئو</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section_single_video section-big-pt-space b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single_video">
                            @if($code==1)

                                <video width="320" height="240"  controls>
                                    <source src="{{asset('videos/products/gallery/'.$video)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif($code==2)
                                <video width="320" height="240"  controls>
                                    <source src="{{asset('videos/news/'.$video)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif($code==3)
                                <video width="320" height="240"  controls>
                                    <source src="{{asset('videos/learns/'.$video)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif($code==4)
                                <video width="320" height="240"  controls>
                                    <source src="{{asset('videos/projects/'.$video)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



    <x-slot name="afterfooter">



    </x-slot>

</x-main-layout>
