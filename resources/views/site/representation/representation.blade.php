<x-main-layout>

    <x-slot name="title">
        - اخذ نمایندگی
    </x-slot>

    <x-slot name="link">
        <meta name="description" content="شرکت هوشمندسازی ساختمان آرسا در راستای رضایتمندی بیشتر مشتریان نمایندگی فروش اهدا می کند">
        <meta name="keywords" content="نمایندگی/اخذ نمایندگی/هوشمندسازی ساختمان آرسا">
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h1 hidden>اخذ نمایندگی</h1>
                            <h2>اخذ نمایندگی</h2>
                            <ul>
                                <li><a href="{{route('home')}}">خانه</a></li>
                                <li><i class="fa fa-angle-double-left"></i></li>
                                <li><a href="javascript:void(0)">اخذ نمایندگی</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section id="representation" class="contact-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row section-big-pb-space">
                <div class="col-12 topic-div">
                    <h3 class="text-center mb-3">شرایط گرفتن نمایندگی</h3>
                    <div class="col-12 margin_auto">
                        <h4 class="text-justify mb-3">
                            جهت اخذ نمایندگی شرکت هوشمندسازی ساختمان آرسا لازم است تا در ابتدا برای داشتن نمونه از تمامی
                            محصولات این شرکت حداقل یک عدد خریداری شود. همچنین می بایست در دوره هوشمندسازی این شرکت
                            به عنوان دوره نمایندگی شرکت نمایید تا مجاز به اخذ مدرک نمایندگی شوید.
                        </h4>
                        <h4 class="text-justify mb-3">
                            در تمامی مراحل مشاورین شرکت در خدمت شما بزرگواران خواهند بود تا بتوانید به راحتی شرایط اخذ
                            نمایندگی را کسب نمایید.
                        </h4>
                    </div>
                </div>
                <br/>
                <hr>
                <div class="col-xl-6 offset-xl-3">
                    <h3 class="text-center mb-3">پس از تکمیل فرم زیر منتظر تماس کارشناسان شرکت باشید</h3>
                    <form class="theme-form" action="{{route('representation.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        <span class="color-red">*</span>
                                        نام
                                    </label>
                                    <input name="name" type="text" class="form-control" id="name"
                                           placeholder="نام خود را وارد کنید" required="required">
                                    @error('name')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="family">
                                        <span class="color-red">*</span>
                                        نام خانوادگی
                                    </label>
                                    <input name="family" type="text" class="form-control" id="last-name"
                                           placeholder="نام خانوادگی خود را وارد کنید" required="required">
                                    @error('family')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input name="email" type="text" class="form-control" placeholder="ایمیل">
                                    @error('email')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">
                                        <span class="color-red">*</span>
                                        شماره همراه
                                    </label>
                                    <input name="mobile1" type="number" class="form-control"
                                           placeholder="اعداد به انگلیسی وارد نمایید"
                                           required="required">
                                    @error('mobile1')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره همراه2</label>
                                    <input name="mobile2" type="number" class="form-control"
                                           placeholder="اعداد به انگلیسی وارد نمایید"
                                           >
                                    @error('mobile2')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>شماره ثابت</label>
                                    <input name="phone" type="number" class="form-control"
                                           placeholder="اعداد به انگلیسی وارد نمایید">
                                    @error('phone')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <span class="color-red">*</span>
                                        شغل
                                    </label>
                                    <input name="job" type="text" class="form-control"
                                           placeholder="شغل فعلی و یا پیشین خود را وارد نمایید" required="required">
                                    @error('job')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <span class="color-red">*</span>
                                        استان
                                    </label>
                                    <input name="state" type="text" class="form-control"
                                           placeholder="استان محل زندگی" required="required">
                                    @error('state')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <span class="color-red">*</span>
                                        شهر
                                    </label>
                                    <input name="city" type="text" class="form-control"
                                           placeholder="شهر محل زندگی" required="required">
                                    @error('city')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label>
                                        <span class="color-red">*</span>
                                        آدرس محل زندگی/کار
                                    </label>
                                    <textarea name="address" class="form-control" placeholder="آدرس محل زندگی و یا کار خود را وارد نمایید"
                                              rows="2" required="required"></textarea>
                                    @error('message')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        <span class="color-red">*</span>
                                        سطح آشنایی با این علم:
                                    </label>
                                    <select name="Knowledge">
                                        <option value="{{null}}" selected>
                                            انتخاب کنید
                                        </option>
                                        <option value="خیلی زیاد">
                                            عالی
                                        </option>
                                        <option value="زیاد">
                                            زیاد
                                        </option>
                                        <option value="متوسط">
                                            متوسط
                                        </option>
                                        <option value="کم">
                                            کم
                                        </option>
                                        <option value="خیلی کم">
                                            خیلی کم
                                        </option>
                                    </select>
                                    @error('Knowledge')
                                    <p class="error_message">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        <span class="color-red">*</span>
                                        نحوه آشنایی با آرسا:
                                    </label>
                                    <select name="introduction">
                                        <option value="{{null}}" selected>
                                            انتخاب کنید
                                        </option>
                                        <option value="اینستاگرام">
                                            اینستاگرام
                                        </option>
                                        <option value="جست و جوی گوگل">
                                            جست و جوی گوگل
                                        </option>
                                        <option value="معرفی دوستان">
                                            معرفی دوستان
                                        </option>
                                        <option value="تبلیغات محیطی">
                                            تبلیغات محیطی
                                        </option>
                                        <option value="روش های دیگر">
                                            روش های دیگر
                                        </option>
                                    </select>
                                    @error('introduction')
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
                            <div class="col-12">
                                <h6 class="margin_vertical_10 color-red">
                                    <span class="color-red">*</span>
                                    (تکمیل فیلدهای ستاره دار الزامی است)
                                </h6>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->

</x-main-layout>
