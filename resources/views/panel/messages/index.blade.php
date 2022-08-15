<x-main-layout>
    <x-slot name="title">
        - پیام ها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید پیام های مشتریان را مشاهده نمایید</h4>
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

                            <div class="product-table">
                                <div class="bg-white table__box">
                                    <table class="table product-table">

                                        <thead role="rowgroup">
                                        <tr role="row" class="title-row">
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>شماره تماس</th>
                                            <th>تاریخ پیام</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($messages as $message)

                                            <tr role="row" class="">


                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('contact.singleMessage',$message->id)}}"
                                                       target="_blank">
                                                        {{ $message->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('contact.singleMessage',$message->id)}}"
                                                       target="_blank">
                                                        {{ $message->family }}
                                                    </a>
                                                </td>
                                                <td>{{ $message->mobile }}</td>
                                                <td>
                                                    {{$message->createdFarsiTime($message->created_at)}}
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('contact.singleMessage',$message->id)}}"
                                                       target="_blank">
                                                        مشاهده
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div>
                                        {{ $messages->onEachSide(1)->links() }}
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