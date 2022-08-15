<x-main-layout>

    <x-slot name="title">
        - ویرایش رویداد
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید رویداد منتخب خود را ویرایش کنید</h4>
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
                                <h2>ویرایش رویداد {{$news->title}}</h2>
                            </div>
                            <div class="product-table">
                                <form class="theme-form" id="editing-news" action="{{ route('news.storeEdit', $news->id) }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="title">عنوان رویداد</label>
                                            <input type="text" name="title" value="{{$news->title}}"
                                                   class="form-control"
                                                   placeholder="{{$news->title}}">
                                            @error('title')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>

                                        <div class="col-md-12 form-group">
                                            <label for="abstract">چکیده رویداد</label>
                                            <input type="text" name="abstract" value="{{$news->abstract}}"
                                                   class="form-control"
                                                   placeholder="{{$news->abstract}}">
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
                                                <form class="theme-form" action="{{ route('newsImage.storeEdit',$image->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="inline_flex gallery_images">
                                                        <img src="{{asset('images/news'.'/'.$image->image)}}"
                                                             style="max-width: 250px"/>
                                                        <input type="file" name="image" class="file-upload"
                                                               accept="image/*"/>
                                                        @error("image")
                                                        <p class="error_message">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                        <button class="btn btn-normal" type="submit" >
                                                            ویرایش عکس
                                                        </button>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>
                                        <div id="newsImage" class="row col-md-12 form-group">
                                            <label>تصویر رویداد:</label>

                                        </div>

                                        <div>
                                            <button type="button" onclick="javascript:void(0)" id="addImage">
                                                افزودن تصویر جدید
                                            </button>
                                        </div>

                                        <div id="productImage" class="row col-md-12 form-group">
                                            <form></form>
                                            @foreach($videos as $video)
                                                <form class="theme-form" action="{{ route('newsVideo.storeEdit',$video->id) }}"
                                                      method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="inline_flex gallery_images">
                                                        <video width="320" height="240"  controls>
                                                            <source src="{{asset('videos/news/'.$video->video)}}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <input type="file" name="video" class="file-upload"
                                                               accept="video/*"/>
                                                        @error("video")
                                                        <p class="error_message">
                                                            {{ $message }}
                                                        </p>
                                                        @enderror
                                                        <button class="btn btn-normal" type="submit" >
                                                            ویرایش ویدئو
                                                        </button>
                                                    </div>
                                                </form>
                                                <br>
                                            @endforeach
                                        </div>

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
                                            <textarea placeholder="{{$news->description}}" class="form-control"
                                                      name="description">{!! $news->description !!}</textarea>
                                            @error('description')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="editProduct(event)">
                                                ویرایش رویداد
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
            function editNews(event) {
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
                        document.getElementById(`editing-news`).submit()
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
