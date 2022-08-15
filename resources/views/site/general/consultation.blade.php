<x-main-layout>

    <x-slot name="title">
        - مشاوره
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>مشاوره</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">مشاوره</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- about section start -->
    <section class="about-page section-big-py-space">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-section"><img src="{{asset('images/site/fake/blog3.jpg')}}" class="img-fluid   w-100" alt=""></div>
                </div>
                <div class="col-lg-6">
                    <p>
                        هلدینگ آرسا با هدف بومی کردن تکنولوژی های برتر در زمینه  صنایع نوآور و خاص ساختمان راه اندازی گردیده است.
                        موفقیت این شرکت در عرصه های مختلف و پروژه های متفاوت به دلایل زیر سبب افتخار مدیران آن می باشد
                        بهره گیری ازدانش روز و  تکنولوژی های برتردنیا،نوآوری در زمینه عرضه محصولات جدید،توجه به نیاز ها و سلیقه ی ایرانیان،تشکیل شبکه فروش گسترده در سراسر ایران ،آموزش و ایجاد شبکه خدمات پس از فروش با حداکثر انتظارات در ۲۴ ساعت از شبانه روز و بومی کردن دانش فنی بوسیله انتقال تکنولوژی،مونتاژ و تولید به جهت بی نیازی از واردات خارجی. شرکت آرسا امیدوار است در آینده ای نزدیک با توجه به کمبود ها و نیاز ها در زمینه محصولات با کیفیت در کنار خدمات مناسب سبد محصولات کامل تری را آماده عرضه به هموطنان گرامی نماید.
                    </p>
                </div>

                <div class="col-lg-12 contact-detail-list">
                    <label>
                        اطلاعات تماس
                    </label>
                    <div class="row">
                        <ul>
                            <li>
                                <i class="fa-solid fa-phone fa-beat" style="--fa-animation-duration: 2s;"></i>                                  <div class="contact-list-apart">
                                    <label>
                                        شماره تماس:
                                    </label>
                                    <p>
                                        09198387828
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope fa-beat" style="--fa-animation-duration: 2s;"></i>
                                <div class="contact-list-apart">
                                    <label>
                                        ایمیل:
                                    </label>
                                    <p>
                                        info@rsabms.com
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->



</x-main-layout>
