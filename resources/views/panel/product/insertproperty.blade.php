<x-main-layout>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید کاربرانی را به سایت آرسا معرفی کنید</h4>
                            <br/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

{{--    @php--}}

{{--    $interdusecode = auth()->user()->refralcode;--}}

{{--    @endphp--}}



<!-- section start -->
    <section class="section-big-py-space b-g-light">
        <div class="container">
            <div class="row">

                @include('partials.panelmenu')

                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>معرفی ویژگی جدید</h2>
                            </div>
                            <div class="interducing-table">
                                <form class="theme-form" action="{{ route('property.insert') }}" id="introducing-property" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="name">نام ویژگی</label>
                                            <input type="text" name="name" class="form-control" id="fname"
                                                   placeholder="نام ویژگی">
                                            @error('name')
                                            <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                            >
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="detail">مقدار ویژگی</label>
                                            <input type="text" name="detail" class="form-control" id="lname"
                                                   placeholder="مقدار ویژگی">
                                            @error('detail')
                                            <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                            >
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="introduceProperty(event)">
                                                معرفی ویژگی
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
            function introduceProperty(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله ویژگی را وارد کن',
                    cancelButtonText: 'نه اجازه بده دوباره چک کنم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`introducing-property`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>



