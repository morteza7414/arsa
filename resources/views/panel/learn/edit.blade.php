<x-main-layout>

    <x-slot name="title">
        - ویرایش آموزش
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید آموزش منتخب خود را ویرایش کنید</h4>
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


                            <div class="page-title">
                                <h2>ویرایش آموزش {{$learn->title}}</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="editing-learn"
                                      action="{{ route('learn.storeEdit', $learn->id) }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="title">عنوان آموزش</label>
                                            <input type="text" name="title" value="{{$learn->title}}"
                                                   class="form-control"
                                                   placeholder="{{$learn->title}}">
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
                                            <input type="text" name="abstract" value="{{$learn->abstract}}"
                                                   class="form-control"
                                                   placeholder="خلاصه توضیحات خود را وارد نمایید">
                                            @error('abstract')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div id="productImage" class="row col-md-12 form-group">
                                            <form></form>
                                            @foreach($images as $image)
                                                <form class="theme-form"
                                                      action="{{ route('learnImage.storeEdit',$image->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="inline_flex gallery_images">
                                                        <img src="{{asset('images/learns'.'/'.$image->image)}}"
                                                             style="max-width: 250px"/>
                                                        <input type="file" name="image" class="file-upload"
                                                               accept="image/*"/>
                                                        @error("image")
                                                        <p class="error_message">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                        <button class="btn btn-normal" type="submit">
                                                            ویرایش عکس
                                                        </button>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>
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

                                        <div id="productImage" class="row col-md-12 form-group">
                                            <form></form>
                                            @foreach($videos as $video)
                                                <form class="theme-form"
                                                      action="{{ route('learnVideo.storeEdit',$video->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="inline_flex gallery_images">
                                                        <video width="320" height="240" controls>
                                                            <source src="{{asset('videos/learns/'.$video->video)}}"
                                                                    type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <input type="file" name="video" class="file-upload"
                                                               accept="video/*"/>
                                                        @error("video")
                                                        <p class="error_message">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                        <button class="btn btn-normal" type="submit">
                                                            ویرایش ویدئو
                                                        </button>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>

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
                                                    @if($learn->category == 'general')
                                                    <option value="general" selected>
                                                        عمومی
                                                    </option>
                                                    <option value="products">
                                                        محصولات و راهکارها
                                                    </option>
                                                    @elseif($learn->category == 'products')
                                                        <option value="general">
                                                            عمومی
                                                        </option>
                                                        <option value="products" selected>
                                                            محصولات و راهکارها
                                                        </option>
                                                    @endif
                                                </select>
                                            </div>
                                            @if(!empty($learn->products))
                                                <table class="table product-table">
                                                    <thead role="rowgroup">
                                                    <tr role="row" class="title-row">
                                                        <th>شناسه</th>
                                                        <th>عنوان</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($learn->products as $product)
                                                        <tr role="row" class="">
                                                            <td>{{ $product->id }}</td>
                                                            <td>{{ $product->title }}</td>
                                                            <td>
                                                                <a href="{{ route('learnProduct.destroy', ['product'=> $product->id,'learn'=> $learn->id]) }}" onclick="destroyLearnproduct(event, {{ $product->id }})" class="item-delete mlg-15 product-func-a" title="حذف">حذف</a>
                                                                <form action="{{ route('learnProduct.destroy', ['product'=> $product->id,'learn'=> $learn->id]) }}" method="post" id="destroy-learn-product-{{ $product->id }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                        <div>

                                            <button type="button" class="@if($learn->category == 'products') display_block @else display_none @endif" onclick="javascript:void(0)"
                                                    id="addProduct">
                                                افزودن محصول جدید
                                            </button>

                                        </div>


                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <label>توضیحات آموزش:</label>
                                            <textarea placeholder="{{$learn->description}}" class="form-control"
                                                      name="description">{!! $learn->description !!}</textarea>
                                            @error('description')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="editProduct(event)">
                                                ویرایش آموزش
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
            function editlearn(event) {
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
                        document.getElementById(`editing-learn`).submit()
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

        <script>
            function destroyLearnproduct(event, id) {
                event.preventDefault();
                document.getElementById('destroy-learn-product-' + id).submit();
            }
        </script>
    </x-slot>


</x-main-layout>
