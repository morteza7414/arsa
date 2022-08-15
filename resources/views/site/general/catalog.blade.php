<x-main-layout>

    <x-slot name="title">
        - کاتالوگ
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>کاتالوگ آرسا</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">کاتالوگ</a></li>
                            </ul>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="faq-section section-big-py-space b-g-light">
        <div class="container">
            <object data="https://rsabms.com/public/assets/catalog.pdf" type="application/pdf" width="100%" height="700px">
                <p> مرورگر شما امکان نمایش این pdf را ندارد و به جای آن شما می توانید آن را دانلود کنید
                    <a href="https://rsabms.com/public/assets/catalog.pdf">
                        برای دانلود اینجا کلیک کنید.
                    </a>
                </p>
            </object>
        </div>
    </section>
    <!-- section end -->

</x-main-layout>
