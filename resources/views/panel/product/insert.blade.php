<x-main-layout>
    <x-slot name="title">
        - معرفی محصول
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید محصولات جدیدی را به سایت آرسا معرفی کنید</h4>
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
                                            <a  href="{{ route('product.index') }}">محصولات</a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('product.approachs') }}">راهکارها</a>
                                        </li>
                                        <li class="active">
                                            <a  href="{{ route('product.insert') }}">جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="page-title">
                                <h2>معرفی محصول جدید</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="introducing-product" action="{{ route('product.store') }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 col-xs-12 col-sm-12 float-right">
                                            <div class="product-inline-flex col-md-6 col-xs-6 col-sm-6 float-right">
                                                <label> آیا این محصول جزو راه کارها است؟: </label>
                                                <div>
                                                    <input type="checkbox" value="true" name="approach">
                                                    @error('approach')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="name"> عنوان</label>
                                            <input type="text" name="name" class="form-control" id="fname"
                                                   placeholder="عنوان خود را وارد کنید">
                                            @error('name')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label > خلاصه توضیحات</label>
                                            <input type="text" name="abstract" class="form-control"
                                                   placeholder="خلاصه توضیحات خود را وارد کنید">
                                            @error('abstract')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>


                                        <div id="categoryRow" class="row col-md-12 form-group">
                                            <div class="row col-md-12 col-xs-12 col-sm-12">
                                                <label>دسته بندی </label>
                                                <div class="product-inline-flex col-md-4 col-xs-12 col-sm-12">
                                                    <label>دسته بندی اصلی: </label>
                                                    <select name="mainCategorySelected">
                                                        <option value="false" selected>
                                                            انتخاب کنید
                                                        </option>
                                                        @foreach($maincategories as $cat)
                                                            <option value="{{$cat}}">
                                                                {{$cat}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('mainCategorySelected')
                                                    <p class="error_message" >
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="product-inline-flex col-md-8 col-xs-12 col-sm-12 product-insert-category">
                                                    <label>افزودن: </label>
                                                    <input type="text" name="mainCategory"
                                                           class="form-control product-input"
                                                           placeholder="نام دسته بندی ">
                                                    @error('mainCategory')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <br/>
                                        </div>
                                        <br/>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="categoryAddRow">
                                                افزودن زیردسته
                                            </button>
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="row col-md-12 form-group">
                                            <div class="product-inline-flex col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label>موجودی انبار:</label>
                                                <div>
                                                    <input type="text" name="inventory"
                                                           placeholder=" موجودی انبار را وارد کنید ">
                                                    @error('inventory')
                                                    <p class="error_message" >
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="product-inline-flex col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label> عدم نمایش موجودی انبار: </label>
                                                <div>
                                                    <input type="checkbox" value="false" name="inventory_display">
                                                    @error('inventory_display')
                                                    <p class="error_message" >
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <br>


                                    <div class="row g-3">
                                        <div class="row col-md-12 form-group">
                                            <div class="col-md-4">
                                                <label>قیمت محصول:</label>
                                                <input type="number" name="price" class="form-control"
                                                       placeholder="قیمت اصلی محصول">
                                                @error('price')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>قیمت با تخفیف:</label>
                                                <input type="number" name="offprice" class="form-control"
                                                       placeholder="قیمت محصول با تخفیف ">
                                                @error('offprice')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>دلیل تخفیف:</label>
                                                <input type="text" name="off_reason" class="form-control"
                                                       placeholder="دلیل تخفیف قیمت ">
                                                @error('off_reason')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="row col-md-12 form-group">
                                            <div class="col-md-12 col-xs-12 col-sm-12 float-right">
                                                <div class="product-inline-flex col-md-2 col-xs-2 col-sm-2 float-right">
                                                    <label> محصولات ویژه: </label>
                                                    <div>
                                                        <input type="checkbox" value="true" name="special">
                                                        @error('special')
                                                        <p class="error_message">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-inline-flex col-md-2 col-xs-2 col-sm-2 float-right">
                                                <label> تخفیف شگفت انگیز: </label>
                                                <div>
                                                    <input type="checkbox" value="true" name="amazing">
                                                    @error('amazing')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div style="padding-right: 10px"
                                                 class="product-inline-flex col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label> زمان شگفت انگیز:</label>
                                                <div class="product-qty-box-div">
                                                    <div class="qty-box">
                                                        <div class="input-group">
                                                            <button type="button" class="qty-minus"></button>
                                                            <input name="amazing_time" class="qty-adj form-control"
                                                                   type="number" value="1"/>
                                                            <button type="button" class="qty-plus"></button>
                                                        </div>
                                                    </div>
                                                    @error('amazing_time')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="product-inline-flex col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label> قیمت شگفت انگیز:</label>
                                                <div>
                                                    <input type="text" name="amazing_price"
                                                           placeholder=" قیمت شگفت انگیز ">
                                                    @error('amazing_price')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        <br>


                                        <div id="productImage" class="row col-md-12 form-group">
                                            <label>تصویر محصول:</label>
                                            <input type="file" name="image" class="file-upload" id="image1"
                                                   accept="image/*"/>
{{--                                            <div style="height: 600px;">--}}
{{--                                                <div id="fm"></div>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addImage">
                                                افزودن تصویر جدید
                                            </button>

                                        </div>


                                        <hr>
                                        <br>


                                        <div id="productVideo" class="row col-md-12 form-group">
                                            <label>ویدئو:</label>

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addVideo">
                                                افزودن ویدئو جدید
                                            </button>
                                        </div>

                                        <hr>
                                        <br>

                                        <div id="newRow" class="row col-md-12 form-group">
                                            <label>مشخصات محصول:</label>
                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addRow">
                                                افزودن خط جدید
                                            </button>
                                            <a href="{{route('insertProperty')}}">
                                                معرفی ویژگی جدید
                                            </a>
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label>توضیحات محصول:</label>
                                            <textarea placeholder="توضیحات محصول را وارد کنید" class="form-control"
                                                      name="text"></textarea>
                                            @error('content')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="introduceProduct(event)">
                                                معرفی محصول
                                            </button>
                                        </div>
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
            function introduceProduct(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله محصول را وارد کن',
                    cancelButtonText: 'نه اجازه بده دوباره چک کنم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`introducing-product`).submit()
                    }
                })
            }
        </script>

        <script>
            var i = 1;
            $("#addRow").click(function () {
                var html = '';

                html += '<div class="row col-md-12 col-xs-12 col-sm-12">'
                html += '<div class="col-md-3 col-xs-12 col-sm-12">'
                html += '<label>'
                html += ' انتخاب: '
                html += '</label>'
                html += " <select id='select" + i + "' name='property" + i + "'> "
                html += '<option value="false" selected>'
                html += 'انتخاب کنید'
                html += '</option>'
                html += '@foreach($properties as $property)'
                html += '<option value="{{$property}}">'
                html += '{{$property}}'
                html += '</option>'
                html += '@endforeach'
                html += '</select>'
                html += '</div>'

                html += '<div class="col-md-8 col-xs-12 col-sm-12">'
                html += '<label>'
                html += ' مقدار ویژگی: '
                html += '</label>'
                html += ' <input name=propertyInput' + i + ' class="col-9" type="text" placeholder="مقدار ویژگی مدنظر خود را وارد نمایید">'
                html += '</div>'
                html += '</div>'

                $('#newRow').append(html);
                i++
            });
        </script>

        <script>
            var j = 1;
            $("#categoryAddRow").click(function () {
                var html = '';


                html += '<br>'
                html += '<div class="row col-md-12 col-xs-12 col-sm-12">'
                html += '<div class="col-md-4 col-xs-12 col-sm-12">'
                html += '<label>'
                html += ' زیر دسته :'
                html += '</label>'
                html += " <select id='categorySelect" + j + "' name='child" + j + "'> "
                html += '<option value="false" selected>'
                html += 'انتخاب کنید'
                html += '</option>'
                html += '@foreach($childcategories as $child)'
                html += '<option value="{{$child}}">'
                html += '{{$child}}'
                html += '</option>'
                html += '@endforeach'
                html += '</select>'
                html += '</div>'

                html += '<div class="col-md-8 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'افزودن: '
                html += '</label>'
                html += ' <input name=childInput' + j + ' class="form-control product-input" type="text" placeholder="نام زیردسته مورد نظرتان را وارد کنید">'
                html += '</div>'
                html += '</div>'

                $('#categoryRow').append(html);
                j++
            });
        </script>

        <script>
            var k = 1;
            $("#addImage").click(function () {
                var html = '';
                html += '<br>'
                html += '<label>'
                html += 'تصویر' + k + ':'
                html += '</label>'
                html += '<div class=" col-md-4 col-xs-12 col-sm-12">'
                html += ' <input type="file" name=image' + k + ' class="file-upload" id=image' + k + ' accept="image/*" />'
                html += '</div>'
                html += '<div class=" col-md-4 col-xs-12 col-sm-12">'
                html += ' <input type="text" name=imageTitle' + k + ' placeholder="عنوان عکس" id=imageTitle' + k + ' />'
                html += '</div>'
                html += '<div class="col-md-4 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'دسته بندی:'
                html += '</label>'
                html += " <select id='imageCategory" + k + "' name='imageCategory" + k + "'> "
                html += '<option value="{{null}}" selected>'
                html += 'انتخاب کنید'
                html += '</option>'
                html += '<option value="rahbordi">'
                html += 'راهبردی'
                html += '</option>'
                html += '<option value="general">'
                html += 'عمومی'
                html += '</option>'
                html += '</select>'
                html += '</div>'
                html += '<br>'

                $('#productImage').append(html);
                k++
            });
        </script>

        <script>
            var l = 1;
            $("#addVideo").click(function () {
                var html = '';

                html += '<br>'
                html += '<label>'
                html += 'ویدئو' + l + ':'
                html += '</label>'
                html += '<div class=" col-md-4 col-xs-12 col-sm-12">'
                html += ' <input type="file" name=video' + l + ' class="file-upload" id=video' + l + ' accept="video/*" />'
                html += '</div>'
                html += '<div class=" col-md-4 col-xs-12 col-sm-12">'
                html += ' <input type="text" name=videoTitle' + l + ' placeholder="عنوان ویدئو" id=videoTitle' + l + ' />'
                html += '</div>'
                html += '<div class="col-md-4 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'دسته بندی:'
                html += '</label>'
                html += " <select id='videoCategory" + l + "' name='videoCategory" + l + "'> "
                html += '<option value="{{null}}" selected>'
                html += 'انتخاب کنید'
                html += '</option>'
                html += '<option value="rahbordi">'
                html += 'راهبردی'
                html += '</option>'
                html += '<option value="general">'
                html += 'عمومی'
                html += '</option>'
                html += '</select>'
                html += '</div>'
                html += '<br>'

                $('#productVideo').append(html);
                l++
            });
        </script>

        <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('text', {
                language: 'fa',
                filebrowserUploadUrl: '{{ route("editorUpload", ["_token" => csrf_token()]) }}',
                filebrowserUploadMethod: 'form'
            });
        </script>

    </x-slot>


</x-main-layout>


{{--<div class="col-md-3 col-xs-12 col-sm-12">--}}
{{--    <label>انتخاب: </label>--}}
{{--    <select id="select1" name="property1">--}}
{{--        <option selected>انتخاب کنید</option>--}}
{{--        @foreach($properties as $property)--}}
{{--            <option onclick="addValue()" value="{{$property}}">--}}
{{--                {{$property}}--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--</div>--}}

{{--<div class="col-md-8 col-xs-12 col-sm-12">--}}
{{--    <label>مقدار ویژگی: </label>--}}

{{--    <input name="propertyInput1" type="text" placeholder="مقدار ویژگی مدنظر خود را وارد نمایید">--}}
{{--</div>--}}
