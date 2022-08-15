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
                            <h2>ورود</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">ورود</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                    <div class="theme-card">
                        <h3 class="text-center">صفحه ورود</h3>
                        <form class="theme-form" action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>شماره موبایل</label>
                                <input type="text" name="mobile" class="form-control"
                                       placeholder=" شماره موبایل خود را وارد کنید" required="">
                                @error('mobile')
                                <p class="error_message">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>رمز عبور</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="رمز عبور خود را وارد کنید" required="">

                                @error('password')
                                <p class="error_message">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>کد امنیتی:</label>
                                @include('partials/recaptcha')
                            </div>
                            <button class="btn btn-normal" type="submit">ورود</button>
                            <a class="float-end txt-default mt-2" href="{{route('forget-pass')}}"> فراموشی رمز عبور؟</a>
                        </form>
                        <p class="mt-3">با استفاده از فرم بالا می توانید به حساب کاربری خود در فروشگاه وارد شوید و
                            سفارشات خود را مدیریت کنید، اگر از قبل ثبت نام نکرده اید با استفاده از لینک زیر یک حساب
                            کاربری جدید بسازید.</p>
                        <a href="{{route('register')}}" target="_blank" class="txt-default pt-3 d-block">ایجاد حساب
                            جدید</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


</x-main-layout>