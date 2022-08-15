<x-main-layout>
    <x-slot name="title">
        - مدیریت اخبار
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید لیست رویدادهای آرسا را مشاهده کنید</h4>
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
                                            <a  href="{{ route('news.show') }}">لیست رویدادها</a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('add.news') }}">معرفی رویداد جدید</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>



                            <div class="product-table">
                                <div class="bg-white table__box">
                                    <table class="table product-table">

                                        <thead role="rowgroup">
                                        <tr role="row" class="title-row">
                                            <th>شناسه</th>
                                            <th>عنوان</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($news as $singleNews)
                                            <tr role="row" class="">
                                                <td>{{ $singleNews->id }}</td>
                                                <td>{{ $singleNews->title }}</td>
                                                <td>{{ $singleNews->getUpdatedAtInPersian() }}</td>
                                                <td>
                                                    <a href="{{ route('news.destroy', $singleNews->id) }}" onclick="destroyNews(event, {{ $singleNews->id }})" class="item-delete mlg-15 product-func-a" title="حذف">حذف</a>
                                                    <a href="{{route('news.single' , [$singleNews->id,$singleNews->slut])}}" target="_blank" class="item-eye mlg-15 product-func-a" title="مشاهده">مشاهده</a>
                                                    <a href="{{ route('news.edit', $singleNews->id) }}" class="item-edit product-func-a" title="ویرایش">ویرایش</a>
                                                    <form action="{{ route('news.destroy', $singleNews->id) }}" method="post" id="destroy-news-{{ $singleNews->id }}">
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
                                        {{ $news->onEachSide(1)->links() }}
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
            function destroyNews(event, id) {
                event.preventDefault();

                Swal.fire({
                    title: 'ایا از حدف این خبر مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(221, 51, 51)',
                    cancelButtonColor: 'rgb(48, 133, 214)',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'نه منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('destroy-news-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>
