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
                            <h4>در این بخش شما می توانید سفارشات قبلی خود را مشاهده نمایید</h4>
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
                                        <li class="active">
                                            <a href="{{ route('transactions.successful') }}">سفارشات موفق</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('transactions.failed') }}">سفارشات ناموفق</a>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)

                                            <tr role="row" class="">


                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$transaction['id'])}}" target="_blank">
                                                        {{ $transaction['transaction_result']->getReferenceId() }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$transaction['id'])}}" target="_blank">
                                                        {{ $transaction['paid'] }}
                                                    </a>
                                                </td>
                                                <td>{{ $transaction->getCreatedAtInPersian() }}</td>
                                                <td>
                                                    <a class="successful-transactions-content"
                                                       href="{{route('invoice',$transaction['id'])}}" target="_blank">
                                                        {{ (int)$transaction['transaction_id'] }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($transaction->orderStatus->status == 1)
                                                        <div>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                        </div>
                                                    @elseif($transaction->orderStatus->status == 2)
                                                        <div>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                        </div>
                                                    @elseif($transaction->orderStatus->status == 3)
                                                        <div>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                        </div>
                                                    @elseif($transaction->orderStatus->status == 4)
                                                        <div>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                        </div>
                                                    @elseif($transaction->orderStatus->status == 5)
                                                        <div>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                            <i class="fa fa-circle green" aria-hidden="true"></i>
                                                        </div>
                                                    @endif
                                                    {{$transaction->orderStatus->getStatusInFarsi()}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div>
                                        {{ $transactions->onEachSide(1)->links() }}
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