<x-main-layout>
    <x-slot name="title">
        - معرفی آموزش جدید
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید آموزش جدیدی ایجاد کنید</h4>
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
                                            <a href="{{ route('learn.list') }}">لیست آموزشها</a>
                                        </li>
                                        <li class="active">
                                            <a href="{{ route('learn.add') }}"> جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="page-title">
                                <h2>معرفی آموزش جدید</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="define-learn" action="{{ route('learn.store') }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="name">عنوان </label>
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="عنوان آموزش خود را وارد کنید">
                                            @error('title')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div class="col-md-12 form-group">
                                            <label for="name">خلاصه </label>
                                            <input type="text" name="abstract" class="form-control"
                                                   placeholder="خلاصه توضیحات خود را وارد نمایید">
                                            @error('abstract')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div id="learnImage" class="row col-md-12 form-group">
                                            <label>تصویر آموزش:</label>

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addImage">
                                                افزودن تصویر جدید
                                            </button>

                                        </div>


                                        <hr>
                                        <br>

                                        <div id="learnVideo" class="row col-md-12 form-group">
                                            <label>ویدئو آموزش:</label>

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addVideo">
                                                افزودن ویدئو جدید
                                            </button>

                                        </div>


                                        <hr>
                                        <br>

                                        <div id="learnCategory" class="row col-md-12 form-group">
                                            <div>
                                                <label>دسته بندی:</label>
                                                <select name="learnCategory" onchange="if(this.value)window[this.value]();" id="learnCategory">
                                                    <option value="{{null}}" class="notProduct" selected>
                                                        انتخاب کنید
                                                    </option>
                                                    <option value="general">
                                                        عمومی
                                                    </option>
                                                    <option value="products">
                                                        محصولات و راهکارها
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>

                                            <button type="button" class="display_none" onclick="javascript:void(0)"
                                                    id="addProduct">
                                                افزودن محصول جدید
                                            </button>

                                        </div>


                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label>توضیحات آموزش:</label>
                                            <textarea placeholder="توضیحات آموزش را وارد کنید" class="form-control"
                                                      name="description"></textarea>
                                            @error('description')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="defineLearn(event)">
                                                معرفی آموزش
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
            function defineLearn(event) {
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
                        document.getElementById(`define-learn`).submit()
                    }
                })
            }
        </script>

        <script>
            var i = 1;
            $("#addImage").click(function () {
                var html = '';
                html += '<br>'
                html += '<div class=" col-md-12 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'تصویر' + i + ':'
                html += '</label>'
                html += ' <input type="file" name=image' + i + ' class="file-upload" id=image' + i + ' accept="image/*" />'
                html += '</div>'
                html += '<br>'

                $('#learnImage').append(html);
                i++
            });
        </script>

        <script>
            var l = 1;
            $("#addVideo").click(function () {
                var html = '';


                html += '<br>'
                html += '<div class=" col-md-12 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'ویدئو' + l + ':'
                html += '</label>'
                html += ' <input type="file" name=video' + l + ' class="file-upload" id=video' + l + ' accept="video/*" />'
                html += '</div>'
                html += '<br>'

                $('#learnVideo').append(html);
                l++
            });
        </script>


        <script>
            var p = 1;
            $("#addProduct").click(function () {
                var html = '';
                html += '<br>'
                html += '<div class=" col-md-12 col-xs-12 col-sm-12">'
                html += '<label>'
                html += 'محصول' + p + ':'
                html += '</label>'
                html += " <select id='productSelect" + p + "' name='productSelect" + p + "'> "
                html += '<option value="{{null}}" selected>'
                html += 'انتخاب کنید'
                html += '</option>'
                html += '@foreach($products as $product)'
                html += '<option value="{{$product->id}}">'
                html += '{{$product->title}}'
                html += '</option>'
                html += '@endforeach'
                html += '</select>'
                html += '</div>'
                html += '<br>'

                $('#learnCategory').append(html);
                l++
            });
        </script>
        <script>
            function general() {
                document.getElementById("addProduct").classList.remove('display_block');
                document.getElementById("addProduct").classList.add('display_none');
            }

            function products() {
                document.getElementById("addProduct").classList.remove('display_none');
                document.getElementById("addProduct").classList.add('display_block');            }
        </script>


    </x-slot>
</x-main-layout>
