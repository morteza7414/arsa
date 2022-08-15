<x-main-layout>
    <x-slot name="title">
        - مدیریت محصولات
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید محصولات آرسا را مشاهده کنید</h4>
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
                                        <li class="active">
                                            <a  href="{{ route('product.approachs') }}">راهکارها</a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('product.insert') }}">جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>

                            <div class="bg-white padding-20">
                                <div class="t-header-search">
                                    <form action="" onclick="event.preventDefault();">
                                        <div class="t-header-searchbox font-size-13">
                                            <div type="text" class="text search-input__box font-size-13">
                                                <div class="t-header-search-content ">
                                                    <input type="text" class="text" placeholder="نام محصول">
                                                    <btutton class="btn btn-webamooz_net">جستجو</btutton>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="product-table">
                                <div class="bg-white table__box">
                                    <table class="table product-table">

                                        <thead role="rowgroup">
                                        <tr role="row" class="title-row">
                                            <th>شناسه</th>
                                            <th>نام محصول</th>
                                            <th>موجودی</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr role="row" class="">
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->inventory }}</td>
                                                <td>{{ $product->getCreatedAtInPersian() }}</td>
                                                <td>
                                                    <a href="{{ route('product.destroy', $product->id) }}" onclick="destroyProduct(event, {{ $product->id }})" class="item-delete mlg-15 product-func-a" title="حذف">حذف</a>
                                                    <a href="{{route('productpage' , [$product->id,$product->slut])}}" target="_blank" class="item-eye mlg-15 product-func-a" title="مشاهده">مشاهده</a>
                                                    <a href="{{ route('product.edit', $product->id) }}" class="item-edit product-func-a" title="ویرایش">ویرایش</a>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="post" id="destroy-product-{{ $product->id }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div>
                                        {{ $products->onEachSide(1)->links() }}
                                    </div>
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
        <script>
            function destroyProduct(event, id) {
                event.preventDefault();

                Swal.fire({
                    title: 'ایا از حدف این محصول مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(221, 51, 51)',
                    cancelButtonColor: 'rgb(48, 133, 214)',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'نه منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('destroy-product-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>
