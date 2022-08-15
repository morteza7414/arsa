<x-main-layout>

    <x-slot name="title">
        - ثبت نام
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>ثبت نام</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">ثبت نام</a></li>
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
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">ایجاد حساب کاربری</h3>
                        <form class="theme-form" action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="email">نام و نام خانوادگی</label>
                                    <input type="text" name="name" class="form-control" id="fname" placeholder="نام و نام خانوادگی" required="required">
                                    @error('name')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="review">شماره تماس</label>
                                    <input type="number" name="mobile" class="form-control" id="lname" placeholder="شماره تماس" required="required">
                                    @error('mobile')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-3">


                                <div class="col-md-12 form-group">
                                    <label>رمز عبور</label>
                                    <input type="password" name="password" class="form-control" placeholder="رمز عبور خود را وارد کنید" required="required">
                                    @error('password')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>تکرار رمز عبور</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="تکرار رمز عبور" required="required">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label> کد معرف </label>
                                    <input type="text" name="identifiercode" class="form-control" placeholder="کد معرف خود را وارد کنید" >
                                    @error('identifiercode')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>کد امنیتی:</label>
                                    @include('partials/recaptcha')
                                </div>
                                <div class="col-md-12 form-group">
                                    <button class="btn btn-normal" type="submit">
                                        ایجاد حساب کاربری
                                    </button>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 ">
                                    <p>از قبل حساب کاربری دارید؟ <a href="{{route('login')}}" class="txt-default">وارد شوید</a>
                                    </p>
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