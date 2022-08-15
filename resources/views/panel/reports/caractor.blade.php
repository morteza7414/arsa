<x-main-layout>
    <x-slot name="title">
        - گزارش شعبه
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
                            <h4>در این قسمت ادمین می تواند گزارشات شعبه مورد نظرتان را مشاهده نماید</h4>
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
                                    <form class='inline_flex' action="{{route('reports.caractor',$id)}}">
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
                                @if($from == 'all')
                                    <h2>گزارش کلی از کاربر مورد نظر</h2>
                                @elseif($from !== 'all' and $from !== 0 and $to === 0 )
                                    <h2>
                                        گزارشی از کاربر مورد نظر از تاریخ
                                        <span class="color-1">
                                            {{verta($from)->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @elseif($from !== 'all' and $from === 0 and $to !== 0)
                                    <h2>
                                        گزارشی از کاربر مورد نظر تا تاریخ
                                        <span class="color-1">
                                            {{verta($to)->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @elseif($from !== 'all' and $from !== 0 and $to !== 0)
                                    <h2>
                                        گزارشی از کاربر مورد نظر از تاریخ
                                        <span class="color-1">
                                            {{verta($from)->format('y/m/d')}}
                                        </span>
                                        تا تاریخ
                                        <span class="color-1">
                                            {{Verta($to)->format('y/m/d')}}
                                        </span>
                                    </h2>
                                @endif
                            </div>

                            <hr>
                            <br>

                            <div class="col-12">
                                <div class="col-12 inline_flex caractor_row">
                                    <div class="col-4 reports_content">
                                        <text>
                                            <h5>
                                                نام کاربر:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                            <span>
                                                {{$caractor->name}}
                                            </span>
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-4 reports_content">
                                        <text>
                                            <h5>
                                                سمت :
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                            <span>
                                                {{$caractor->getRoleInFarsi($caractor->role)}}
                                            </span>
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-4 reports_content">
                                        <text>
                                            <h5>
                                                معرف:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                            <span>
                                                @if($caractor->parent())
                                                    {{$caractor->parent()->name}}
                                                @else
                                                    نامشخص
                                                @endif
                                            </span>
                                            </h5>
                                        </text>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                تعداد کاربران مجموعه:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{$children_count}}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                میزان فروش مجموعه:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{$caractor_sale - $caractor_pay}}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                میزان خرید شخصی:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{$caractor_pay}}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>
                                    <div class="col-12 reports_content">
                                        <text>
                                            <h5>
                                                مجموع فروش:
                                            </h5>
                                        </text>
                                        <text>
                                            <h5>
                                                <span>
                                                    {{$caractor_sale}}
                                                </span>
                                                نفر
                                            </h5>
                                        </text>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <hr>
                            <br>

                            <div class="col-12">
                                <div class="col-12 reports_title">
                                    <h3>اعضای مجموعه:</h3>
                                </div>
                                <div class="col-md-12 tree">
                                    <li>
                                        <span>
                                            {{$caractor->name}}
                                        </span>
                                        @if(count($caractor->children))
                                            @include('partials.report.manage_child',['children' => $caractor->children])
                                        @endif
                                    </li>
                                </div>
                            </div>


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

