<x-main-layout>
    <x-slot name="title">
        - تراکنش ها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید سفارشات آرسا را مدیریت نمایید</h4>
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
                                            <a href="{{ route('transactions.registered') }}">سفارشات ثبت شده</a>
                                        </li>
                                        <li class="@if($status == 4) active @endif">
                                            <a href="{{ route('transactions.ready') }}">سفارشات آماده ارسال</a>
                                        </li>
                                        <li class="@if($status == 5) active @endif">
                                            <a href="{{ route('transactions.sent') }}">سفارشات ارسال شده</a>
                                        </li>
                                        <li class="@if($status == 6) active @endif">
                                            <a href="{{ route('transactions.total') }}">کل سفارشات</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>

                            <div class="bg-white padding-20">
                                <div class="t-header-search">
                                    <form action="" onclick="event.preventDefault();">
                                        <div class="t-header-searchbox font-size-13">
                                            <div type="text" class="text search-input__box font-size-13">
                                                <div class="t-header-search-content ">
                                                    <input type="text" class="text" placeholder="شماره پیگیری">
                                                    <btutton class="btn btn-webamooz_net">جستجو</btutton>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="product-table">
                                <div class="bg-white table__box">
                                    <table class="table product-table">

                                        <thead role="rowgroup">
                                        <tr role="row" class="title-row">
                                            <th>شماره پیگیری</th>
                                            <th>مبلغ</th>
                                            <th>تاریخ سفارش</th>
                                            <th>شناسه تراکنش</th>
                                            <th>وضعیت سفارش</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)

                                            <tr role="row" class="">


                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$order->transaction->id)}}"
                                                       target="_blank">
                                                        {{ $order->transaction->transaction_result->getReferenceId() }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$order->transaction->id)}}"
                                                       target="_blank">
                                                        {{ $order->transaction->paid }}
                                                    </a>
                                                </td>
                                                <td>{{ $order->transaction->getCreatedAtInPersian() }}</td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$order->transaction->id)}}"
                                                       target="_blank">
                                                        {{ (int)$order->transaction->transaction_id }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$order->getStatusInFarsi()}}
                                                </td>
                                                <td>
                                                    @if($status !== 5)
                                                        @if($order->transaction->carts->count() == 1 and $order->transaction->carts->first()->product->categories->first()->child == 'آموزش')
                                                            <form action="{{route('orderStatus.edit',$order->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('put')
                                                                <input value="5" readonly="readonly"
                                                                       name="status" hidden>
                                                                <button type="submit">تایید</button>
                                                            </form>
                                                        @else
                                                            <form action="{{route('orderStatus.edit',$order->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('put')
                                                                <input value="{{$order->status+1}}" readonly="readonly"
                                                                       name="status" hidden>
                                                                <button type="submit">تایید</button>
                                                            </form>
                                                        @endif
                                                    @else
                                                        <form
                                                            action="{{route('invoice',$order->transaction->id)}}">
                                                            <button type="submit">مشاهده</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div>
                                        {{ $orders->onEachSide(1)->links() }}
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
