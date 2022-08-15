<x-main-layout>
    <x-slot name="title">
        - معرفی رویداد جدید
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید رویداد جدیدی ایجاد کنید</h4>
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
                                            <a  href="{{ route('news.show') }}">لیست رویدادها</a>
                                        </li>
                                        <li class="active">
                                            <a  href="{{ route('add.news') }}">معرفی رویداد جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="page-title">
                                <h2>معرفی خبر جدید</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="define-news" action="{{ route('news.store') }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="name">عنوان </label>
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="عنوان رویداد خود را وارد کنید">
                                            @error('title')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label for="name">چکیده </label>
                                            <input type="text" name="abstract" class="form-control"
                                                   placeholder="خلاصه رویداد خود را وارد کنید">
                                            @error('abstract')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div id="newsImage" class="row col-md-12 form-group">
                                            <label>تصویر رویداد:</label>

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addImage">
                                                افزودن تصویر جدید
                                            </button>
                                        </div>


                                        <hr>
                                        <br>

                                        <div id="newsVideo" class="row col-md-12 form-group">
                                            <label>ویدئو رویداد:</label>

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addVideo">
                                                افزودن ویدئو جدید
                                            </button>

                                        </div>



                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label>توضیحات رویداد:</label>
                                            <textarea placeholder="توضیحات رویداد را وارد کنید" class="form-control"
                                                      name="description"></textarea>
                                            @error('description')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="defineNews(event)">
                                                معرفی رویداد
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
            function defineNews(event) {
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
                        document.getElementById(`define-news`).submit()
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

                $('#newsImage').append(html);
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

                $('#newsVideo').append(html);
                l++
            });
        </script>


    </x-slot>
</x-main-layout>
