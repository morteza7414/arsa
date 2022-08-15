<x-main-layout>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> سلام {{auth()->user()->name}}  </h2>
                            <h4>به پنل کاربری خود خوش آمدید</h4>
                            <br/>
                            {{--                            <ul>--}}
                            {{--                                <li><a href="{{route('home')}}">خانه</a></li>--}}
                            {{--                                <li><i class="fa fa-angle-double-left"></i></li>--}}
                            {{--                                <li><a href="javascript:void(0)">داشبورد</a></li>--}}
                            {{--                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->



    <!-- section start -->
    <section class="section-big-py-space b-g-light">
        <div class="container">
            <div class="row">

                @include('partials/panelmenu')

                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>اطلاعات حساب</h2>
                            </div>
                            <div class="user-data-table">
                                <div class="row col-md-12 col-sm-12 col-xs-12 datatitle">
                                    <div class=" dashboard-title1">
                                        موضوع
                                    </div>
                                    <div class="dashboard-title1">
                                        اطلاعات
                                    </div>
                                    <div class=" dashboard-title1">
                                        ویرایش
                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                        نام و نام خانوادگی
                                    </div>
                                    <div class=" dashboard-data1">
                                        {{auth()->user()->name}}
                                    </div>
                                    <div class=" dashboard-data1">
                                        <a href="{{route('editData')}}">ویرایش</a>
                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                        شماره موبایل
                                    </div>
                                    <div class=" dashboard-data1">
                                        {{auth()->user()->mobile}}
                                    </div>
                                    <div class=" dashboard-data1">

                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                        سمت
                                    </div>
                                    <div class=" dashboard-data1">
                                        {{auth()->user()->getRoleInFarsi()}}
                                    </div>
                                    <div class=" dashboard-data1">

                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                       آدرس
                                    </div>
                                    <div class=" dashboard-data1">
                                        {{(auth()->user()->address)?auth()->user()->address:'هنوز آدرسی ثبت نشده است'}}
                                    </div>
                                    <div class=" dashboard-data1">
                                        <a href="{{route('editData')}}">ویرایش</a>
                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                        کدپستی
                                    </div>
                                    <div class=" dashboard-data1">
                                        {{(auth()->user()->postalcode)?auth()->user()->postalcode:'هنوز کدپستی ثبت نشده است'}}
                                    </div>
                                    <div class=" dashboard-data1">
                                        <a href="{{route('editData')}}">ویرایش</a>
                                    </div>
                                </div>
                                <div class="row col-md-12 col-sm-12 col-xs-12 databox1">
                                    <div class=" dashboard-data1">
                                        کد کاربری
                                    </div>
                                    <div class=" dashboard-data1 dashboard-refralcode">
                                        {{auth()->user()->refralcode}}
                                </div>
                                    <div class=" dashboard-data1">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
</x-main-layout>


{{--<div class="col-lg-9">--}}
{{--    <div class="dashboard-right">--}}
{{--        <div class="dashboard">--}}
{{--            <div class="page-title">--}}
{{--                <h2>داشبورد من</h2>--}}
{{--            </div>--}}
{{--            <div class="welcome-msg">--}}
{{--                <p>سلام، رضا افشار!</p>--}}
{{--                <p>شما در این قسمت می توانید حساب کاربری خود در فروشگاه بیگ دیل را مشاهده کنید و تغییرات لازم را--}}
{{--                    انجام دهید، پس از ویرایش اطلاعات خود آن را ذخیره کنید</p>--}}
{{--            </div>--}}
{{--            <div class="box-account box-info">--}}

{{--                <div class="row">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="box">--}}
{{--                            <div class="box-title">--}}
{{--                                <h3>اطلاعات تماس</h3><a href="javascript:void(0)">ویرایش</a>--}}
{{--                            </div>--}}
{{--                            <div class="box-content">--}}
{{--                                <h6>رضا افشار</h6>--}}
{{--                                <h6>Rezafshar@gmail.com</h6>--}}
{{--                                <h6><a href="javascript:void(0)">تغییر رمز عبور</a></h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="box">--}}
{{--                            <div class="box-title">--}}
{{--                                <h3>خبرنامه</h3><a href="javascript:void(0)">ویرایش</a>--}}
{{--                            </div>--}}
{{--                            <div class="box-content">--}}
{{--                                <p>شما می توانید در این قسمت عضویت در خبرنامه را فعال یا لغو کنید، با عضویت در خبرنامه از آخرین--}}
{{--                                    اطلاعیه ها، محصولات جدید، و جدیدترین تخفیف ها با خبر خواهید شد</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-title">--}}
{{--                            <h3>آدرس</h3><a href="javascript:void(0)">مدیریت آدرس</a>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <h6>آدرس پیش فرض ارسال صورت حساب</h6>--}}
{{--                                <address>شما آدرس پیش فرضی برای ارسال صورت حساب ثبت نکردید.<br><a--}}
{{--                                            href="javascript:void(0)">ویرایش آدرس</a>--}}
{{--                                </address>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <h6>آدرس پیش فرض ارسال سفارشات</h6>--}}
{{--                                <address>تهران، میدان آزادی، خیابان آزادی، پلاک 7<br><a href="javascript:void(0)">ویرایش--}}
{{--                                        آدرس</a></address>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--    <x-slot name="title">--}}
{{--        - داشبورد--}}
{{--    </x-slot>--}}
{{--    <div class="breadcrumb">--}}
{{--        <ul>--}}
{{--            <li><a href="{{ route('dashboard') }}" title="پیشخوان">پیشخوان</a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="main-content">--}}
{{--        <div class="row no-gutters font-size-13 margin-bottom-10">--}}
{{--            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">--}}
{{--                <p> تعداد کاربران </p>--}}
{{--                <p>20 نفر</p>--}}
{{--            </div>--}}
{{--            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">--}}
{{--                <p>تعداد پست ها</p>--}}
{{--                <p>20 پست</p>--}}
{{--            </div>--}}
{{--            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">--}}
{{--                <p>تعداد نظرات</p>--}}
{{--                <p>300 نظر</p>--}}
{{--            </div>--}}
{{--            <div class="col-3 padding-20 border-radius-3 bg-white  margin-bottom-10">--}}
{{--                <p>تعداد دسته بندی ها</p>--}}
{{--                <p>300 نظر</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--</x-panel-layout>--}}
