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
                            <h4>در این بخش شما می توانید تراکنش های ناموفق خود را مشاهده نمایید</h4>
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
                                        <li>
                                            <a href="{{ route('transactions.successful') }}">سفارشات موفق</a>
                                        </li>
                                        <li class="active">
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
                                            <th>شناسه تراکنش</th>
                                            <th>تاریخ سفارش</th>
                                            <th>مبلغ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)

                                            <tr role="row" class="">
                                                <div hidden>
                                                    @if(!empty($transaction['transaction_result']['message']) and  is_string($transaction['transaction_result']['message']))
                                                        {{$message = $transaction['transaction_result']['message']}}
                                                    @elseif(is_string($transaction['transaction_result']) and $transaction['transaction_result'] !== null and strlen($transaction['transaction_result'])<50)
                                                        {{$message = $transaction['transaction_result']}}
                                                    @else
                                                        {{$message = 'به دلیل مسائل فنی'}}
                                                    @endif
                                                </div>
                                                <td>
                                                    <a class="failed-transactions-content"
                                                       href="{{route('failed-invoice',['message'=>$message,'payment_id'=>$transaction->payment_id])}}"
                                                       target="_blank">
                                                        {{ $transaction['payment_id'] }}
                                                    </a>

                                                </td>
                                                <td>{{ $transaction->getCreatedAtInPersian() }}</td>
                                                <td>
                                                    <a class="failed-transactions-content"
                                                       href="{{route('failed-invoice',['message'=>$message,'payment_id'=>$transaction['payment_id']])}}" target="_blank">
                                                        {{ $transaction['paid'] }}
                                                    </a>
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