<x-main-layout>
    <x-slot name="title">
        - گزارشات
    </x-slot>
    <x-slot name="link">
        <link rel="stylesheet" href="{{asset('assets/persian_datepicker/css/persian-datepicker.css')}}"/>
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> گزارشات </h2>
                            <h4>در این قسمت ادمین می تواند گزارشات سایت را مشاهده نماید</h4>
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

                            <div class="page-head">
                                <div class="page-head-tab">
                                    <form class='inline_flex' action="{{route('reports.index')}}">
                                        <div class="form-group inline_flex">
                                            <text>از تاریخ؟</text>
                                            <div class='date' id='datetimepicker'>
                                                <input name="from" type='text' id="from" class="form-control "/>
                                            </div>
                                        </div>
                                        <div class="form-group inline_flex">
                                            <text>تا تاریخ؟</text>
                                            <div class='date' id='datetimepicker'>
                                                <input name="to" type='text' id="to" class="form-control "/>
                                            </div>
                                        </div>
                                        <div class="form-button">
                                            <button type="submit">اعمال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="page-title">
                                @if($data['from'] == 'all')
                                        <h2>گزارش کلی از قسمت های مختلف سایت</h2>
                                @elseif($data['from'] !== 'all' and $data['from'] !== 0 and $data['to'] === 0 )
                                    <h2>
                                        گزارشی از قسمت های مختلف سایت از تاریخ
                                        <span class="color-1">
                                            {{verta($data['from'])->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @elseif($data['from'] !== 'all' and $data['from']=== 0 and $data['to'] !== 0)
                                    <h2>
                                        گزارشی از قسمت های مختلف سایت تا تاریخ
                                        <span class="color-1">
                                            {{verta($data['to'])->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @elseif($data['from'] !== 'all' and $data['from'] !== 0 and $data['to'] !== 0)
                                    <h2>
                                        گزارشی از قسمت های مختلف سایت از تاریخ
                                        <span class="color-1">
                                            {{verta($data['from'])->format('y/m/d')}}
                                        </span>
                                        تا تاریخ
                                        <span class="color-1">
                                            {{Verta($data['to'])->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @endif
                            </div>

                            <hr>
                            <br>

                            <div class="col-12">
                                <div class="col-12 reports_title">
                                    <h3>کاربران:</h3>
                                </div>
                                <div class="col-12 ">
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تعداد کل ثبت نام شده:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userTotal'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>
                                    {{--                                    <div class="col-12 reports_content">--}}
                                    {{--                                        <table id="reportsPage-users-table" border=1px>--}}
                                    {{--                                            <thead>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <th class="role">نقش</th>--}}
                                    {{--                                                <th>تعداد</th>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            </thead>--}}
                                    {{--                                            <tbody>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">ادمین</td>--}}
                                    {{--                                                <td>{{ $data['userAdmin'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">مدیر فروش</td>--}}
                                    {{--                                                <td>{{ $data['userManager'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">شعبه</td>--}}
                                    {{--                                                <td>{{ $data['userBranch'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">نمایندگی</td>--}}
                                    {{--                                                <td>{{ $data['userRepresentation'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">عامل فروش</td>--}}
                                    {{--                                                <td>{{ $data['userSalesagent'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">بازاریاب</td>--}}
                                    {{--                                                <td>{{ $data['userMarketer'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            <tr>--}}
                                    {{--                                                <td class="role">کاربر</td>--}}
                                    {{--                                                <td>{{ $data['userUser'] }}</td>--}}
                                    {{--                                            </tr>--}}
                                    {{--                                            </tbody>--}}
                                    {{--                                        </table>--}}
                                    {{--                                    </div>--}}


                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>ادمین</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userAdmin'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>مدیر فروش</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userManager'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>شعبه</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userBranch'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>نمایندگی</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userRepresentation'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>عامل فروش</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userSalesagent'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>بازاریاب</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userMarketer'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                    <div class="col-12 reports_content">
                                        <text>
                                            <h4>
                                                تعداد افراد با نقش <span>کاربر</span>:
                                            </h4>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['userUser'] }}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>

                                </div>
                            </div>


                            <hr>
                            <br>


                            <div class="col-12">
                                <div class="col-12 reports_title">
                                    <h3>محصولات:</h3>
                                </div>
                                <div class="col-12 ">
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تعداد کل محصولات ثبت شده:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                               <span>
                                                   {{ $data['productTotal'] }}
                                               </span>
                                                عدد

                                            </h5>
                                        </text>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <br>

                            <div class="col-12">
                                <div class="col-12 reports_title">
                                    <h3>تراکنش ها:</h3>
                                </div>
                                <div class="col-12 ">
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تعداد کل تراکنش ها:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['transactionTotal'] }}
                                                </span>
                                                عدد
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تراکنش های موفق:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['transactionSuccess'] }}
                                                </span>
                                                عدد
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تراکنش های ناموفق:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['transactionFailed'] }}
                                                </span>
                                                عدد
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                مبلغ پرداختی:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{ $data['transactionPaid'] }}
                                                </span>
                                                ریال
                                            </h5>
                                        </text>
                                    </div>

                                </div>
                            </div>


                            <hr>
                            <br>


                            <div class="col-12">
                                <div class="col-12 reports_title">
                                    <h3>لیست شعب:</h3>
                                </div>
                                <div class="col-12 ">
                                    @foreach($data['branchs'] as $branch)
                                        <a href="{{route('reports.caractor', $branch->id)}}">
                                            <div class="col-12 reports_content">
                                                <text>
                                                    <h5>
                                                        {{$branch->name}}
                                                    </h5>
                                                </text>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>


                            <hr>
                            <br>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <x-slot name="scripts">
        <script src="{{asset('assets/persian_datepicker/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/persian_datepicker/js/persian-datepicker.js')}}"></script>
        <script>
            $('#from').datepicker({
                onSelect: function (dateText, inst) {
                    $('#to').datepicker('option', 'minDate', new JalaliDate(inst['selectedYear'], inst['selectedMonth'], inst['selectedDay']));
                }
            });
            $('#to').datepicker();
        </script>
    </x-slot>

</x-main-layout>

