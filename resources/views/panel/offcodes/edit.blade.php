<x-main-layout>
    <x-slot name="title">
        - ویرایش کدتخفیف
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید کدتخفیف مورد نظرتان را ویرایش کنید</h4>
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
                                        <li class="active">
                                            <a href="{{ route('product.index') }}">لیست کدهای تخفیف</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('offcodes.create') }}">معرفی کد تخفیف جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="product-table">
                                <form class="theme-form" id="edit-offcode"
                                      action="{{ route('offcodes.edit.store' ,$offcode->id) }}"
                                      method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label class="bold" for="code">کد تخفیف:</label>
                                            <input type="text" name="code" class="form-control" id="fname"
                                                   value="{{$offcode->code}}" required>
                                            @error('code')
                                            <p class="error_message">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="row col-md-12 form-group">
                                            <div class="row col-md-12 col-xs-12 col-sm-12">
                                                <label class="bold"> مقدار یا درصد تخفیف: </label>
                                                <div class="product-inline-flex col-md-6 col-xs-12 col-sm-12">
                                                    <label>مقدار تخفیف: </label>
                                                    <input type="number" name="amount" class="form-control width_70"
                                                           id="fname"
                                                           value="{{$offcode->amount}}">
                                                    @error('amount')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="product-inline-flex col-md-6 col-xs-12 col-sm-12">
                                                    <label>درصد تخفیف: </label>
                                                    <input type="number" name="percentage" class="form-control width_70"
                                                           id="fname"
                                                           value="{{$offcode->percentage}}">
                                                    @error('percentage')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="warning">
                                            <h7>
                                                وارد کردن یکی از فیلدهای بالا الزامی است و نیازی به پر کردن هردو نیست
                                            </h7>
                                        </div>


                                        <hr>
                                        <br>


                                        <div class="row col-md-12 form-group">
                                            <div class="row col-md-12 col-xs-12 col-sm-12">
                                                <label class="bold"> تعداد یا زمان تخفیف: </label>
                                                <div
                                                    class="product-inline-flex col-md-6 col-xs-12 col-sm-12 float-right">
                                                    <label>تعداد:</label>
                                                    <input type="number" name="quantity" class="form-control width_70"
                                                           value="{{$offcode->quantity}}">
                                                    @error('quantity')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div
                                                    class="product-inline-flex col-md-6 col-xs-12 col-sm-12 float-right">
                                                    <label>زمان:</label>

                                                    <input type="number" name="time" class="form-control width_70"
                                                           value="{{$offcode->time}}">
                                                    @error('time')
                                                    <p class="error_message">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="warning">
                                            <h7>
                                                وارد کردن یکی از فیلدهای بالا الزامی است و نیازی به پر کردن هردو نیست
                                            </h7>
                                        </div>
                                    </div>


                                    <hr>
                                    <br>


                                    <div class="row g-3">
                                        <div class="row col-md-12 form-group">
                                            <div class="col-md-4">
                                                <label class="bold">دلیل تخفیف:</label>
                                                <input type="text" name="off_reason" class="form-control"
                                                       value="{{$offcode->off_reason}}" required>
                                                @error('off_reason')
                                                <p class="error_message">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>


                                        <hr>
                                        <br>

                                        <div class="row col-12 form-group">
                                            <label class="bold">چه محصولاتی شامل این تخفیف میشوند؟</label>
                                            <div hidden>{{$i=1}}</div>
                                            @foreach(\App\Models\Product::all() as $product)
                                                <div class="inline_flex col-4 border-1 offcode-products">
                                                    <div class="p-10">
                                                        {{$product->title}}
                                                    </div>
                                                    @if(empty($offcode->products()->where('id',$product->id)->first()))
                                                        <input type="checkbox" name="product-{{$i}}"
                                                               value="{{$product->id}}">
                                                    @else
                                                        <input type="checkbox" name="product-{{$i}}"
                                                               value="{{$product->id}}" checked="checked">
                                                    @endif
                                                </div>
                                                <div hidden>{{$i++}}</div>
                                            @endforeach
                                        </div>

                                        <hr>
                                        <br>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="editOffcode(event)">
                                                ویرایش
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
            function editOffcode(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله',
                    cancelButtonText: 'نه اجازه بده دوباره چک کنم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`edit-offcode`).submit()
                    }
                })
            }
        </script>

    </x-slot>


</x-main-layout>

