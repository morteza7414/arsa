<x-main-layout>
    <x-slot name="title">
        - اخذ نمایندگی
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید افرادی که برای نمایندگی ثبت نام کرده اند را مشاهده نمایید</h4>
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
                                        @foreach($users as $user)

                                            <tr role="row" class="">


                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('representation.single',$user->id)}}"
                                                       target="_blank">
                                                        {{ $user->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('representation.single',$user->id)}}"
                                                       target="_blank">
                                                        {{ $user->family }}
                                                    </a>
                                                </td>
                                                <td>{{ $user->mobile1 }}</td>
                                                <td>
                                                    {{$user->getDateInPersian($user->created_at)}}
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('representation.single',$user->id)}}"
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
                                        {{ $users->onEachSide(1)->links() }}
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
