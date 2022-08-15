<x-main-layout>
    <x-slot name="title">
        - کدهای تخفیف
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید کدهای تخفیف را مشاهده کنید</h4>
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
                                            <a  href="{{ route('offcodes.index') }}">لیست کدهای تخفیف</a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('offcodes.create') }}">معرفی کد تخفیف جدید</a>
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
                                            <th>کد تخفیف</th>
                                            <th>میزان تخفیف</th>
                                            <th>درصد تخفیف</th>
                                            <th>تعداد باقی مانده</th>
                                            <th>زمان انقضا</th>
                                            <th>دلیل تخفیف</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($offcodes as $offcode)
                                            <tr role="row" class="">
                                                <td>{{ $offcode->code }}</td>
                                                <td>{{ ($offcode->amount)?$offcode->amount: '---' }}</td>
                                                <td>{{ ($offcode->percentage)?$offcode->percentage : '---' }}</td>
                                                <td>{{ ($offcode->quantity)?$offcode->quantity:'---' }}</td>
                                                <td>{{ ($offcode->time)?$offcode->remainingtime($offcode->time,$offcode->created_at):'---' }}</td>
                                                <td>{{ ($offcode->off_reason)?$offcode->off_reason:'---' }}</td>
                                                <td>{{ ($offcode->status()) }}</td>
                                                <td>
                                                    <a href="{{ route('offcodes.edit', $offcode->id) }}" class="item-edit product-func-a" title="ویرایش">ویرایش</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div>
                                        {{ $offcodes->onEachSide(1)->links() }}
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