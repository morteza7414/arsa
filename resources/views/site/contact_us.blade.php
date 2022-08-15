<x-main-layout>

    <x-slot name="title">
        - تماس با ما
    </x-slot>

    <x-slot name="link">
        <meta name="description" content="برای تماس با پشتیبان های شرکت هوشمندسازی ساختمان آرسا می توانید از این بخش اقدام کنید">
        <meta name="keywords" content="تماس با ما/هوشمندسازی ساختمان آرسا">
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>تماس با ما</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="contact-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row section-big-pb-space">
                <div class="col-xl-6 offset-xl-3">
                    <h3 class="text-center mb-3">با ما در ارتباط باشید</h3>
                    <form class="theme-form" action="{{route('contact.register')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">نام</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="نام خود را وارد کنید" required="required">
                                    @error('name')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">نام خانوادگی</label>
                                    <input name="family" type="text" class="form-control" id="last-name" placeholder="نام خانوادگی خود را وارد کنید" required="required">
                                    @error('family')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="review">شماره تماس</label>
                                    <input name="mobile" type="text" class="form-control" id="review" placeholder="شماره تماس خود را وارد کنید"
                                           required="required">
                                    @error('mobile')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input name="email" type="text" class="form-control" placeholder="ایمیل" >
                                    @error('email')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <label>دیدگاه خود را بنویسید</label>
                                    <textarea name="message" class="form-control" placeholder="دیدگاه خود را بنویسید" rows="2" required="required"></textarea>
                                    @error('message')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>کد امنیتی:</label>
                                @include('partials/recaptcha')
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-normal" type="submit">ارسال دیدگاه</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

</x-main-layout>
