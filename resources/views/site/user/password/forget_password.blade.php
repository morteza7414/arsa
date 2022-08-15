<x-main-layout>

    <x-slot name="title">
        - ورود
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>فراموشی رمز عبور</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">فراموشی رمز عبور</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page pwd-page section-big-py-space b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="theme-card">
                        <h3>رمز عبور خود را فراموش کرده اید</h3>
                        <form class="theme-form" action="{{route('insert-code')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="mobile" type="text" class="form-control" placeholder="شماره تماس خود را وارد نمایید مانند 09123456789" required="">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-normal">تایید و ارسال</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


</x-main-layout>