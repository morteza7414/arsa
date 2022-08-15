<x-main-layout>

    <x-slot name="title">
        - صفحه محصول
    </x-slot>


    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        @if($product->type == 1)
                            <div>
                                <h2>محصول</h2>
                                <ul>
                                    <li><a href="index.html">خانه</a></li>
                                    <li><i class="fa fa-angle-double-left"></i></li>
                                    <li><a href="javascript:void(0)">محصول</a></li>
                                </ul>
                            </div>
                        @else
                            <div>
                                <h2>راهکار</h2>
                                <ul>
                                    <li><a href="index.html">خانه</a></li>
                                    <li><i class="fa fa-angle-double-left"></i></li>
                                    <li><a href="javascript:void(0)">خدمات</a></li>
                                    <li><i class="fa fa-angle-double-left"></i></li>
                                    <li><a href="javascript:void(0)">راهکارها</a></li>
                                    <li><i class="fa fa-angle-double-left"></i></li>
                                    <li><a href="javascript:void(0)">{{$product->title}}</a></li>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-4">
                        <label class="label">تصاویر</label>
                        <div class="product-slick no-arrow siteproduct-nav">
                            @foreach($images as $image)
                                @if($image->image)
                                    <div>
                                        <img src="{{asset('images/products/gallery/'.'/'.$image->image)}}" alt=""
                                             class="img-fluid  image_zoom_cls-0">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav siteproduct-nav">
                                    @foreach($images as $image)
                                        @if($image->image)
                                            <div>
                                                <img src="{{asset('images/products/gallery'.'/'.$image->image)}}"
                                                     alt=""
                                                     class="img-fluid  image_zoom_cls-0">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-7 rtl-text">
                        <div class="product-right">
                            <div class="pro-group">
                                <h2>{{$product->title}}</h2>
                                <br>
                                <ul class="pro-price">
                                    <li class="siteproductpage-price">قیمت:</li>
                                    @if($product->offprice() <> $product->price)
                                        <li>{{$product->offprice()}} تومان</li>
                                        <li><span>{{$product->price}} تومان</span></li>
                                        <li class="off-percentage">{{$percentage}}% تخفیف</li>
                                    @else
                                        <li>{{$product->price}} تومان</li>
                                    @endif
                                </ul>
                                @if($product->inventory_display == true)
                                    @if($product->inventory>=1)
                                        <div class="inline_flex">
                                            <h7> موجودی انبار:</h7>
                                            <h7>    {{$product->inventory}} عدد</h7>
                                        </div>
                                    @endif
                                @endif
                                @if($product->inventory == 0)
                                    <div class="inventory-zero">
                                        <h6>اتمام موجودی</h6>
                                    </div>
                                    <div class="reminder_div">
                                        <form action="{{route('reminder.create',$product->id)}}" method="post">
                                            @csrf
                                            <button class="reminder_button" type="submit">در صورت موجود شدن به من اطلاع
                                                بده
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>


                            {{--                            <div class="pro-group">--}}
                            {{--                                <h6 class="product-title">عجله کنید! پایان پیشنهاد در : </h6>--}}
                            {{--                                <div class="timer">--}}

                            {{--                                    <p id="demo">--}}
                            {{--                                    </p>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                            <div id="selectSize"
                                 class="pro-group addeffect-section product-description border-product mb-0">


                                <h6 class="product-title">تعداد</h6>
                                <form action="{{ route('cart.store', $product->id) }}" method="post"
                                      id="addCart-{{$product->id}}">
                                    @csrf
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button type="button" class="qty-minus"></button>
                                            <input name="quantity" class="qty-adj form-control" type="number"
                                                   value="1"/>
                                            <button type="button" class="qty-plus"></button>
                                        </div>
                                        @error('quantity')
                                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                        >
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </form>

                                <div class="product-buttons">
                                    <a href="{{route('cart.store' , $product->id)}}"
                                       id="cartEffect" onclick="cart(event,{{$product->id}})"
                                       class="btn cart-btn btn-normal tooltip-top"
                                       data-tippy-content="افزودن به سبد خرید">
                                        <i class="fa fa-shopping-cart"></i>
                                        افزودن به سبد خرید
                                    </a>


                                    <a href="{{route('like', $product->id)}}"
                                       class="btn btn-normal add-to-wish tooltip-top"
                                       data-tippy-content="افزودن به لیست علاقه مندی"
                                       onclick="like(event,{{$product->id}})">
                                        <i class="fa fa-heart @if($product->is_liked()) like @endif"
                                           aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('like', $product->id) }}" method="post"
                                          id="addLike-{{$product->id}}">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="pro-group">
                                <h6 class="product-title">ویژگی های محصول</h6>
                                <div class="siteproductpage-options">
                                    <table>
                                        <tbody>
                                        @foreach($properties as $option)
                                            <tr class="siteproductpage-property">
                                                <td class="property">{{$option['property']}}</td>
                                                <td class="detail"> {{$option['detail']}}</td>
                                            </tr>


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
{{--                            <div class="pro-group pb-0">--}}
{{--                                <h6 class="product-title">اشتراک گذاری</h6>--}}
{{--                                <ul class="product-social">--}}
{{--                                    <li><a target="_blank"--}}
{{--                                           href="https://www.google.com/maps/@31.7722745,54.2227189,16.75z"><i--}}
{{--                                                class="fa-solid fa-map-marker fa-flip"--}}
{{--                                                style="--fa-animation-duration: 2s;"></i></a></li>--}}
{{--                                    <li><a target="_blank"--}}
{{--                                           href="https://mail.google.com/mail/u/0/?fs=1&to=info@rsaholding.com&bcc=info@rsaholding.com&tf=cm"><i--}}
{{--                                                class="fa-solid fa-envelope fa-flip"--}}
{{--                                                style="--fa-animation-duration: 2s;"></i></a></li>--}}
{{--                                    <li><a href="javascript:void(0)"><i class="fab fa-twitter fa-flip"--}}
{{--                                                                        style="--fa-animation-duration: 2s;"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li><a target="_blank" href="https://www.instagram.com/r.sa_bms/"><i--}}
{{--                                                class="fab fa-instagram fa-flip"--}}
{{--                                                style="--fa-animation-duration: 2s;"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-12">

                        <hr/>
                        <br/>

                        <label class="label">ویدئوها</label>
                        <div class="product-slide-6 no-arrow">
                            @foreach($videos as $video)
                                <div>
                                    <div class="product-box">
                                        <div class="product-imgbox">
                                            @if($video->video)
                                                <div #zoom-on-video class="product-front">
                                                    <a href="{{route('video.single',['code'=>1,'video'=>$video->video])}}">
                                                        <video
                                                            class="img-fluid  image_zoom_cls-0"
                                                            controls>
                                                            <source
                                                                src="{{asset('videos/products/gallery./'.$video->video)}}"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class=" tab-product  tab-exes ">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 ">
                    <div class=" creative-card creative-inner">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                                    href="#top-home"
                                                    role="tab" aria-selected="true">توضیحات</a>
                                <div class="material-border"></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                                                    href="#top-profile"
                                                    role="tab" aria-selected="false">ویژگی ها</a>
                                <div class="material-border"></div>
                            </li>

                            <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab"
                                                    href="#top-review"
                                                    role="tab" aria-selected="false">دیدگاه</a>
                                <div class="material-border"></div>
                            </li>
                        </ul>
                        <div class="tab-content nav-material" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                 aria-labelledby="top-home-tab">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane fade" id="top-profile" role="tabpanel"
                                 aria-labelledby="profile-top-tab">
                                <div class="siteproductpage-footer-property">
                                    <div class="siteproductpage-options">
                                        <table>
                                            <tbody>
                                            @foreach($properties as $option)
                                                <tr class="siteproductpage-property">
                                                    <td class="property">{{$option['property']}}</td>
                                                    <td class="detail"> {{$option['detail']}}</td>
                                                </tr>


                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                                @if(!empty(auth()->user()))
                                    <form class="theme-form" action="{{route('comment.store' , $product->id)}}"
                                          method="post">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-12">

                                            </div>
                                            <div class="col-md-12">
                                                <label>عنوان دیدگاه</label>
                                                <input type="text" class="form-control"
                                                       name="title" placeholder="موضوع دیدگاه خود را وارد کنید"
                                                       required>
                                                @error('title')
                                                <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                                >
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label>متن دیدگاه</label>
                                                <textarea class="form-control" placeholder="متن دیدگاه خود را وارد کنید"
                                                          name="comment" rows="6"></textarea>
                                                @error('comment')
                                                <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                                >
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-normal" type="submit">
                                                    ارسال دیدگاه
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="comment_sign_in">
                                        <h5>
                                            برای ارسال نظرات خود ابتدا باید وارد حساب کاربری خود شوید.
                                        </h5>
                                    </div>
                                @endif

                                <hr>
                                <br>


                                <div class="col-md-12 comments">
                                    <div class="title comments-title">
                                        <h3>
                                            نظرات
                                        </h3>
                                    </div>
                                    <div class="col-md-12 comment-section">
                                        @if(!empty(auth()->user()))
                                            @if(auth()->user()->role === 'admin' or auth()->user()->role === 'manager')
                                                @foreach($comments as $comment)
                                                    <div class="col-md-12">
                                                        <div class="comment_div">
                                                            <div class="inline_flex">
                                                                <span class="bold">کاربر: </span>
                                                                <div class="comment-user">
                                                                    {{$comment->user->name}}
                                                                </div>
                                                            </div>


                                                            <div class="grid">
                                                                <div class="inline_flex">
                                                                    <span class="bold">موضوع :  </span>
                                                                    <div class="comment-title">
                                                                        {{$comment->title}}
                                                                    </div>
                                                                </div>
                                                                <div class="inline_flex">
                                                                    <span class="bold">متن : </span>
                                                                    <div class="comment">
                                                                        {{$comment->comment}}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div>
                                                                <div class="inline_flex">
                                                                    <span class="bold">تاریخ : </span>
                                                                    <div class="comment-date">
                                                                        {{$comment->getCreatedAtInPersian($comment->created_at)}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="operations">
                                                                <div class="comment-delete">
                                                                    <form class="theme-form"
                                                                          action="{{route('comment.destroy' , $comment->id)}}"
                                                                          method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                                class="comment-delete-button">
                                                                            حذف
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="comment-confirm">
                                                                    @if($comment->status === 1 or $comment->status === 3)
                                                                        <form class="theme-form"
                                                                              action="{{route('comment.confirm' , $comment->id)}}"
                                                                              method="post">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                    class="comment-confirm-button">
                                                                                تایید
                                                                            </button>
                                                                        </form>
                                                                    @elseif($comment->status === 2)
                                                                        <form class="theme-form"
                                                                              action="{{route('comment.cancel' , $comment->id)}}"
                                                                              method="post">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                    class="comment-cancel-button">
                                                                                لغو نمایش
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @else
                                                @foreach($verifiedComments as $comment)
                                                    <div class="col-md-12">
                                                        <div class="comment_div">
                                                            <div class="comment-user">
                                                                {{$comment->user->name}}
                                                            </div>
                                                            <div>
                                                                <div class="comment-title">
                                                                    {{$comment->title}}
                                                                </div>
                                                                <div class="comment">
                                                                    {{$comment->comment}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            @endif
                                        @else
                                            @foreach($verifiedComments as $comment)
                                                <div class="col-md-12">
                                                    <div class="comment_div">
                                                        <div class="comment-user">
                                                            {{$comment->user->name}}
                                                        </div>
                                                        <div>
                                                            <div class="comment-title">
                                                                {{$comment->title}}
                                                            </div>
                                                            <div class="comment">
                                                                {{$comment->comment}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        @endif
                                    </div>
                                    <hr>
                                    {{--                                    <div>--}}
                                    {{--                                        {{ $comments->onEachSide(1)->links() }}--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->

    <br/>

    <!--same-products start-->
    <section class="index-section allproduct-slider product section-pb-space mb--5">
        <div class="label-title">
            <a href="{{route('allProducts')}}">
                <h4>
                    محصولات مشابه
                </h4>
            </a>
        </div>
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 no-arrow">
                        @foreach(\App\Models\Product::where('type','=',$product->type)->get() as $product)
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        @if($product->images()->first())
                                            <div class="product-front">
                                                <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                                    <img src="{{asset('images/products/gallery/'.$product->images()->first()->image)}}"
                                                         class="img-fluid  " alt="product">
                                                </a>
                                            </div>
                                        @elseif(empty($product->images()->first()) and $product->videos()->first())
                                            <div class="product-front">
                                                <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                                    <video width="320" height="240"  controls>
                                                        <source src="{{asset('videos/products/gallery/'.$product->videos()->first()->video)}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </a>
                                            </div>
                                        @else
                                            <div class="product-front">
                                                <a href="{{route('productpage',[$product->id,$product->slut])}}">
                                                    <img src="{{asset('images/site/default.png')}}"
                                                         class="img-fluid  " alt="product">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="slider-title">
                                        <h5>
                                            {{$product->title}}
                                        </h5>
                                    </div>
                                    @if($product->abstract)
                                        <div class="slider-abstract">
                                            <h6>
                                                {{$product->final_price}}
                                            </h6>
                                        </div>
                                    @endif

                                </div>

                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--same-products end-->


    <x-slot name="afterfooter">


        <!-- elevatezoom js-->
        <script src="{{asset('bigdeal/assets/js/jquery.elevatezoom.js')}}"></script>

        <!-- timer js -->
    {{--        <script src="{{asset('bigdeal/assets/js/timer1.js')}}"></script>--}}

    <!-- bootstrap js -->
        <script src="{{asset('bigdeal/assets/js/bootstrap.js')}}"></script>


        <!-- Theme js-->
        <script src="{{asset('bigdeal/assets/js/modal.js')}}"></script>


        <!-- popper js-->
        <script src="{{asset('bigdeal/assets/js/popper.js')}}"></script>


    </x-slot>

</x-main-layout>
