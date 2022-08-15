<x-main-layout>
    <x-slot name="title">
        - لیست آموزشها
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید لیست آموزشهای آرسا را مشاهده کنید</h4>
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
                                            <a  href="{{ route('learn.list') }}">لیست آموزشها</a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('learn.add') }}">جدید</a>
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
                                        @foreach($learns as $learn)
                                            <tr role="row" class="">
                                                <td>{{ $learn->id }}</td>
                                                <td>{{ $learn->title }}</td>
                                                <td>{{ $learn->getCreatedAtInPersian() }}</td>
                                                <td>
                                                    <a href="{{ route('learn.destroy', $learn->id) }}" onclick="destroyLearns(event, {{ $learn->id }})" class="item-delete mlg-15 product-func-a" title="حذف">حذف</a>
                                                    <a href="{{route('learn.single' , [$learn->id,$learn->slut])}}" target="_blank" class="item-eye mlg-15 product-func-a" title="مشاهده">مشاهده</a>
                                                    <a href="{{ route('learn.edit', $learn->id) }}" class="item-edit product-func-a" title="ویرایش">ویرایش</a>
                                                    <form action="{{ route('learn.destroy', $learn->id) }}" method="post" id="destroy-learn-{{ $learn->id }}">
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
                                        {{ $learns->onEachSide(1)->links() }}
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
            function destroyLearns(event, id) {
                event.preventDefault();

                Swal.fire({
                    title: 'ایا از حدف این آموزش مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(221, 51, 51)',
                    cancelButtonColor: 'rgb(48, 133, 214)',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'نه منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('destroy-learn-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>
