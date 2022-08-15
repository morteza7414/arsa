<x-main-layout>
    <x-slot name="title">
        - کاربر نمایندگی
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید اطلاعات کاربر ثبت نام شده برای نمایندگی با کد {{$user->id}} را
                                مشاهده نمایید. </h4>
                            <br/>

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

                @include('partials.panelmenu')

                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">

                            <div class="product-head">
                                <div class="product-head-tab">
                                    <ul>
                                        <li class="@if($status == 1) active @endif">
                                            <a href="{{ route('representation.unread') }}">ثبت نام کنندگان جدید</a>
                                        </li>
                                        <li class="@if($status == 2) active @endif">
                                            <a href="{{ route('representation.read') }}">ثبت نام کنندگان مشاهده شده</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>

                            <div class="col-12 row">
                                <div class="col-12 user-content">
                                    <span>
                                        نام :
                                    </span>
                                    {{$user->name}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        نام خانوادگی :
                                    </span>
                                    {{$user->family}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        شماره تماس :
                                    </span>
                                    {{$user->mobile1}}
                                </div>

                                <hr>
                                <br>

                                @if($user->mobile2)
                                    <div class="col-12 user-content">
                                    <span>
                                        شماره تماس دوم:
                                    </span>
                                        {{$user->mobile2}}
                                    </div>

                                    <hr>
                                    <br>
                                @endif

                                @if($user->phone)
                                    <div class="col-12 user-content">
                                    <span>
                                        شماره ثابت:
                                    </span>
                                        {{$user->phone}}
                                    </div>

                                    <hr>
                                    <br>
                                @endif

                                @if($user->email)
                                    <div class="col-12 user-content">
                                    <span>
                                        ایمیل :
                                    </span>
                                        {{$user->email}}
                                    </div>
                                    <hr>
                                    <br>
                                @endif

                                <div class="col-12 user-content">
                                    <span>
                                        شغل :
                                    </span>
                                    {{$user->job}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        استان :
                                    </span>
                                    {{$user->state}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        شهر :
                                    </span>
                                    {{$user->city}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        آدرس :
                                    </span>
                                    {{$user->address}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        سطح دانش :
                                    </span>
                                    {{$user->Knowledge}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        روش آشنایی با شرکت :
                                    </span>
                                    {{$user->introduction}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 user-content">
                                    <span>
                                        تاریخ ثبت نام :
                                    </span>
                                    {{$user->getDateInPersian($user->created_at)}}
                                </div>

                                <hr>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

</x-main-layout>
