<x-main-layout>
    <x-slot name="title">
        - پیام
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید محتویات پیام شماره {{$message->id}} را مشاهده نمایید. </h4>
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
                                            <a href="{{ route('contact.unreadMessages') }}">پیام های خوانده نشده</a>
                                        </li>
                                        <li class="@if($status == 2) active @endif">
                                            <a href="{{ route('contact.readMessages') }}">پیام های خوانده شده</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>

                            <div class="col-12 row">
                                <div class="col-12 message-content">
                                    <span>
                                        نام :
                                    </span>
                                    {{$message->name}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 message-content">
                                    <span>
                                        نام خانوادگی :
                                    </span>
                                    {{$message->family}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 message-content">
                                    <span>
                                        شماره تماس :
                                    </span>
                                    {{$message->mobile}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 message-content">
                                    <span>
                                        ایمیل :
                                    </span>
                                    {{$message->email}}
                                </div>

                                <hr>
                                <br>

                                <div class="col-12 message-content">
                                    <span>
                                        تاریخ پیام :
                                    </span>
                                    {{$message->createdFarsiTime($message->created_at)}}
                                </div>

                                <hr>
                                <br>


                                <div class="col-12 message-content">
                                    <span>
                                        متن پیام :
                                    </span>
                                    {{$message->content}}
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