<x-main-layout>
    <x-slot name="title">
        - پیش فاکتور
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h1>هوشمندسازی ساختمان</h1>
                            <h4>در این قسمت شما می توانید پیش فاکتوری برای هوشمندسازی ساختمان خود تهیه کنید</h4>
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
                <div class="col-lg-12">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>این پیش فاکتور به ازای هر طبقه ساختمان می باشد</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="calculating-invoice"
                                      action="{{ route('invoiceCalculator.output') }}"
                                      method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 col-xs-12 col-sm-12 float-right">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label>
                                                        <span style="color:red">*</span>
                                                        نام و نام خانوادگی
                                                    </label>
                                                    <input type="text" name="name" class="form-control" id="name"
                                                           placeholder="نام ونام خانوادگی" required="required">
                                                    @error('name')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label>
                                                        <span style="color:red">*</span>
                                                        شماره موبایل
                                                    </label>
                                                    <input type="number" name="mobile" class="form-control" id="mobile"
                                                           placeholder="شماره موبایل " required="required">
                                                    @error('mobile')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>
                                        <br/>

                                        <div class="col-md-12 col-xs-12 col-sm-12 float-right">
                                            <div class="product-inline-flex col-md-6 col-xs-6 col-sm-6 float-right">
                                                <label> آیا مایل به کنترل سیستم توسط گوشی همراه خود می باشید؟ </label>
                                                <div>
                                                    <input type="checkbox" value="true" name="controlWithPhone">
                                                    @error('controlWithPhone')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="row col-md-12 form-group">
                                            <div class="product-inline-flex col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label>
                                                    <span style="color:red">*</span>
                                                    مساحت زیربنا(مترمربع):
                                                </label>
                                                <div>
                                                    <input type="number" name="area"
                                                           placeholder="زیربنای ساختمان به مترمربع">
                                                    @error('area')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <br>


                                    <div class="row col-md-12 form-group">
                                        <div class="row col-md-12 col-xs-12 col-sm-12">
                                            <label>
                                                <span style="color:red">*</span>
                                                تعداد کلید:
                                            </label>
                                            <div class="col-md-2 col-xs-12 col-sm-12 title_right">
                                                <label>نوع کلید: </label>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12 ">
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>هوشمند: </label>
                                                    <input type="number" name="smartKey"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('smartKey')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>ریموت دار: </label>
                                                    <input type="number" name="remoteKey"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('remoteKey')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>


                                    <hr>
                                    <br>

                                    <div class="row col-md-12 form-group">
                                        <div class="row col-md-12 col-xs-12 col-sm-12">
                                            <label>
                                                <span style="color:red">*</span>
                                                تعداد سرخط مورد نیاز:
                                            </label>
                                            <div class="col-md-2 col-xs-12 col-sm-12 title_right">
                                                <select name="fuse">
                                                    <option value=null selected>
                                                        انتخاب کنید
                                                    </option>
                                                    <option value="16">
                                                        16 سرخط
                                                    </option>
                                                    <option value="32">
                                                        32 سرخط
                                                    </option>
                                                    <option value="48">
                                                        48 سرخط
                                                    </option>
                                                    <option value="64">
                                                        64 سرخط
                                                    </option>
                                                    <option value="80">
                                                        80 سرخط
                                                    </option>
                                                    <option value="96">
                                                        96 سرخط
                                                    </option>
                                                    <option value="112">
                                                        112 سرخط
                                                    </option>
                                                    <option value="0">
                                                        نیاز ندارم
                                                    </option>
                                                </select>
                                                @error('fuse')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <br/>
                                            <div class="col-md-8 col-xs-12 col-sm-12">
                                                <p>
                                                    تعداد سرخط را می توان از تعداد فیوز های کنترل در کنتور انتخاب کرد.
                                                    مثلا اگر ساختمان شما 18 فیوز کنترل کننده در تابلو دارد سرخط مورد
                                                    نیاز شما 32 می شود.
                                                </p>
                                            </div>

                                        </div>
                                        <br/>
                                    </div>

                                    <hr>
                                    <br>

                                    <div class="row col-md-12 form-group">
                                        <div class="row col-md-12 col-xs-12 col-sm-12">
                                            <div class="col-md-2 col-xs-12 col-sm-12 title_right">
                                                <label>امکانات مورد نیاز: </label>
                                            </div>

                                            <div class="col-md-4 col-xs-12 col-sm-12 ">
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>پرده برقی: </label>
                                                    <input type="number" name="electricCurtain"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('electricCurtain')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>سیستم صوت و تصویر: </label>
                                                    <input type="number" name="system"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('system')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>سرمایش و گرمایش: </label>
                                                    <input type="number" name="heater"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('heater')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>درب پارکینگ: </label>
                                                    <input type="number" name="parkingDoor"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('parkingDoor')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>آبیاری هوشمند: </label>
                                                    <input type="number" name="intelligentIrrigation"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('intelligentIrrigation')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text_align_left margin_vertical_10">
                                                    <label>RGB: </label>
                                                    <input type="number" name="RGB"
                                                           class="form-control number-input"
                                                           placeholder="تعداد به عدد">
                                                    @error('RGB')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                    </div>

                                    <hr>
                                    <br>

                                    <div class="col-md-12 form-group text_align_center">
                                        <p>
                                        <h6 style="color: red">
                                            <span>*</span>
                                            تکمیل فیلدهای ستاره دار اجباری است.
                                        </h6>
                                        </p>
                                        <button class="btn btn-normal" onclick="calculateInvoice(event)">
                                            نمایش پیش فاکتور
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <x-slot name="scripts">
        <script>
            function calculateInvoice(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله',
                    cancelButtonText: 'خیر'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`calculating-invoice`).submit()
                    }
                })
            }
        </script>
    </x-slot>


</x-main-layout>


