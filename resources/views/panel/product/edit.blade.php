<x-main-layout>

    <x-slot name="title">
        - ویرایش محصول
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید محصول منتخب خود را ویرایش کنید</h4>
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
                                <h2>ویرایش {{$product->title}}</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="editing-product" action="{{ route('product.storeEdit') }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div hidden><input type="text" readonly="readonly" value="{{$product->id}}"
                                                       name="productId"/></div>

                                    <div class="col-md-12 col-xs-12 col-sm-12 float-right">
                                        <div class="product-inline-flex col-md-6 col-xs-6 col-sm-6 float-right">
                                            <label> آیا این محصول جزو راه کارها است؟: </label>
                                            <div>
                                                <input type="checkbox" value="true" name="approach"
                                                       @if($product->type === 2) checked="true" @endif>
                                                @error('approach')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="name">نام محصول</label>
                                            <input type="text" name="name" value="{{$product->title}}"
                                                   class="form-control" id="fname"
                                                   placeholder="{{$product->title}}">
                                            @error('name')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div class="col-md-12 form-group">
                                            <label> خلاصه توضیحات</label>
                                            <input type="text" name="abstract" class="form-control"
                                                   placeholder="خلاصه توضیحات خود را وارد کنید"
                                                   value="{{$product->abstract}}">
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
                                                <label>دسته بندی اصلی</label>


                                                @for($i=1;$i<=$categoryCount;$i++)
                                                    @foreach($productCategories as $category)
                                                        <div
                                                            class="col-md-8 col-xs-12 col-sm-12 product-insert-category">
                                                            <label>نام دسته بندی: </label>
                                                            <input type="text" name="catchild{{$i}}"
                                                                   value="{{$category->child}}"
                                                                   class="form-control product-input"
                                                                   placeholder="{{$category->child}}">
                                                            @error('$category')
                                                            <p class="error_message">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div hidden>{{$i++}}</div>
                                                    @endforeach
                                                @endfor
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
                                            <div class="product-inventory col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label>موجودی انبار:</label>
                                                <div>
                                                    <input type="text" name="inventory" value="{{$product->inventory}}"
                                                           placeholder="{{$product->inventory}} ">
                                                    @error('inventory')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="product-inventory col-md-5 col-xs-5 col-sm-5 float-right">
                                                <label> عدم نمایش موجودی انبار: </label>
                                                <div>
                                                    <input type="checkbox" value="false" name="inventory_display">
                                                    @error('inventory_display')
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


                                    <div class="row g-3">
                                        <div class="row col-md-12 form-group">
                                            <div class="col-md-4">
                                                <label>قیمت محصول:</label>
                                                <input type="number" name="price" class="form-control"
                                                       value="{{$product->price}}"
                                                       placeholder="{{$product->price}}">
                                                @error('price')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>قیمت با تخفیف:</label>
                                                <input type="number" name="offprice" class="form-control"
                                                       value="{{($product->offprice)? $product->offprice : null}}"
                                                       placeholder="{{($product->offprice)? $product->offprice : null}}">
                                                @error('offprice')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label>دلیل تخفیف:</label>
                                                <input type="text" name="off_reason" class="form-control"
                                                       value="{{($product->off_reason)? $product->off_reason : null}}"
                                                       placeholder="{{($product->off_reason)? $product->off_reason : null}}">
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
                                                        <input type="checkbox" value='true'
                                                               @if($product->special == true) checked="true"
                                                               @endif name="special">
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
                                                    <input type="checkbox" value="true"
                                                           @if($product->amazing == true) checked="true"
                                                           @endif name="amazing">
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
                                                                   type="number"
                                                                   value="{{($product->amazing_time)? $product->amazing_time : 1}}"/>
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
                                                           value="{{($product->amazing_price)? $product->amazing_price : null}}"
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
                                            <form></form>
                                            @foreach($images as $image)
                                                <form class="theme-form"
                                                      action="{{ route('gallery.storeEdit',$image->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="gallery_images">
                                                        <img
                                                            src="{{asset('images/products/gallery'.'/'.$image->image)}}"
                                                            style="max-width: 250px"/>
                                                        <div class="col-12">
                                                            <input type="file" name="image" class="file-upload"
                                                                   accept="image/*"/>
                                                            <input type="text" name="imageTitle" placeholder="عنوان عکس"
                                                                   value="{{$image->title}}"/>
                                                            <select name='imageCategory'>
                                                                @if(!empty($image->category))
                                                                    @if($image->category == 'rahbordi')
                                                                        <option value="rahbordi" selected>
                                                                            راهبردی
                                                                        </option>
                                                                        <option value="general">
                                                                            عمومی
                                                                        </option>
                                                                    @elseif($image->category == 'general')
                                                                        <option value="general" selected>
                                                                            عمومی
                                                                        </option>
                                                                        <option value="rahbordi">
                                                                            راهبردی
                                                                        </option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{null}}" selected>
                                                                        انتخاب کنید
                                                                    </option>
                                                                    <option value="rahbordi">
                                                                        راهبردی
                                                                    </option>
                                                                    <option value="general">
                                                                        عمومی
                                                                    </option>
                                                                @endif
                                                            </select>

                                                            @error("image")
                                                            <p class="error_message">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror

                                                            <button class="btn btn-normal" type="submit">
                                                                ویرایش عکس
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>
                                        <div>
                                            <div>
                                                <button type="button" onclick="javascript:void(0)" id="addImage">
                                                    افزودن تصویر جدید
                                                </button>
                                            </div>

                                        </div>


                                        <hr>
                                        <br>

                                        <div id="productVideo" class="row col-md-12 form-group">
                                            <form></form>
                                            @foreach($videos as $video)
                                                <form class="theme-form"
                                                      action="{{ route('productVideo.storeEdit',$video->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="gallery_images">
                                                        <video width="320" height="240" controls>
                                                            <source
                                                                src="{{asset('videos/products/gallery/'.$video->video)}}"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div class="col-12">
                                                            <input type="file" name="video" class="file-upload"
                                                                   accept="video/*"/>
                                                            <input type="text" name="videoTitle"
                                                                   placeholder="عنوان ویدئو"
                                                                   value="{{$video->title}}"/>
                                                            <select name='videoCategory'>
                                                                @if(!empty($video->category))
                                                                    @if($video->category == 'rahbordi')
                                                                        <option value="rahbordi" selected>
                                                                            راهبردی
                                                                        </option>
                                                                        <option value="general">
                                                                            عمومی
                                                                        </option>
                                                                    @elseif($video->category == 'general')
                                                                        <option value="general" selected>
                                                                            عمومی
                                                                        </option>
                                                                        <option value="rahbordi">
                                                                            راهبردی
                                                                        </option>
                                                                    @endif
                                                                @else
                                                                    <option value="{{null}}" selected>
                                                                        انتخاب کنید
                                                                    </option>
                                                                    <option value="rahbordi">
                                                                        راهبردی
                                                                    </option>
                                                                    <option value="general">
                                                                        عمومی
                                                                    </option>
                                                                @endif
                                                            </select>
                                                            @error("video")
                                                            <p class="error_message">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                            <button class="btn btn-normal" type="submit">
                                                                ویرایش ویدئو
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addVideo">
                                                افزودن ویدئو جدید
                                            </button>
                                        </div>


                                        <hr>
                                        <br>

                                        <div id="productTags" class="row col-md-12 form-group">
                                            <label>تگ ها:</label>
                                            <div hidden>{{$t =1}}</div>
                                            @foreach($product->tags() as $tag)
                                                <div class="tag-input col-md-4 col-xs-12 col-sm-12 inline_flex">
                                                    <label>
                                                        تگ {{$t}}:
                                                    </label>
                                                    <input type="text" name="tag{{$t}}" class="input-group-text" value="{{$tag->tag}}"/>
                                                </div>
                                                <div hidden>{{$t++}}</div>
                                            @endforeach

                                        </div>
                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addTag">
                                                افزودن تگ جدید
                                            </button>
                                        </div>


                                        <hr>
                                        <br>


                                        <div id="newRow" class="row col-md-12 form-group">
                                            <label>مشخصات محصول:</label>
                                            @for($i=1;$i<=$propertyCount;$i++)
                                                @foreach($productProperties as $property)
                                                    <div class="col-md-12">
                                                        <input type="text" name="property{{$i}}"
                                                               value="{{$property->property}}"/>
                                                        <input type="text" name="detail{{$i}}"
                                                               value="{{$property->detail}}"/>
                                                    </div>
                                                    <div hidden>{{$i++}}</div>


                                                @endforeach
                                                <br>
                                            @endfor
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
                                            {{--                                            <input type="text" name="description" class="form-control"--}}
                                            {{--                                                   placeholder="توضیحات محصول را وارد کنید">--}}
                                            {{--                                            <textarea placeholder="توضیحات محصول را وارد کنید" class="form-control" name="description"></textarea>--}}
                                            <textarea placeholder="{{$product->description}}" class="form-control"
                                                      name="text">{!! $product->description !!}</textarea>
                                            @error('content')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="editProduct(event)">
                                                ویرایش محصول
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
            function editProduct(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله محصول را ویرایش کن',
                    cancelButtonText: 'نه اجازه بده دوباره چک کنم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`editing-product`).submit()
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
                html += " <select id='select" + i + "' name='rowproperty" + i + "'> "
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
                html += ' <input name=rowpropertyInput' + i + ' class="col-9" type="text" placeholder="مقدار ویژگی مدنظر خود را وارد نمایید">'
                html += '</div>'
                html += '</div>'

                $('#newRow').append(html);
                i++
            });
        </script>

        <script>
            var i = 1;
            $("#categoryAddRow").click(function () {
                var html = '';


                html += '<br>'
                html += '<div class="row col-md-12 col-xs-12 col-sm-12">'
                html += '<div class="col-md-4 col-xs-12 col-sm-12">'
                html += '<label>'
                html += ' زیر دسته :'
                html += '</label>'
                html += " <select id='categorySelect" + i + "' name='child" + i + "'> "
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
                html += ' <input name=childInput' + i + ' class="form-control product-input" type="text" placeholder="نام زیردسته مورد نظرتان را وارد کنید">'
                html += '</div>'
                html += '</div>'

                $('#categoryRow').append(html);
                i++
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

        <script>
            var t = `{{count($product->tags())+1}}`
            $("#addTag").click(function () {
                var html = '';

                html += '<br>'
                html += '<div class="tag-input col-md-4 col-xs-12 col-sm-12 inline_flex">'
                html += '<label>'
                html += 'تگ' + t + ':'
                html += '</label>'
                html += ' <input type="text" name=tag' + t + ' class="input-group-text" id=tag' + t + ' placeholder="تگ مورد نظر خود را وارد نمایید" />'
                html += '</div>'
                html += '<br>'

                $('#productTags').append(html);
                t++
            });
        </script>

        <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('text', {
                language: 'fa',
                filebrowserUploadUrl: '{{ route("editorUpload", ["_token" => csrf_token()]) }}',
                filebrowserUploadMethod: 'form',
            })
        </script>
    </x-slot>


</x-main-layout>
