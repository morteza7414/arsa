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
                                <h2>معرفی کاربر جدید</h2>
                            </div>
                            <div class="interducing-table">
                                <form class="theme-form" action="{{ route('interduce.store') }}" id="introducing-user" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 form-group">
                                            <label for="name">نام و نام خانوادگی</label>
                                            <input type="text" name="name" class="form-control" id="fname"
                                                   placeholder="نام و نام خانوادگی">
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
                                            <label for="mobile">شماره تماس</label>
                                            <input type="number" name="mobile" class="form-control" id="lname"
                                                   placeholder="شماره تماس">
                                            @error('mobile')
                                            <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                            >
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-3">


                                        <div class="col-md-12 form-group">
                                            <label>رمز عبور</label>
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="رمز عبور خود را وارد کنید">
                                            @error('password')
                                            <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                            >
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>تکرار رمز عبور</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   placeholder="تکرار رمز عبور">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>کد معرف</label>
                                            <input type="text" name="refralcode" class="form-control"
                                                   value="{{auth()->user()->refralcode}}" readonly="readonly">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label>نقش کاربر: </label>
                                            <select name="role">
                                                <option value="user" selected>
                                                    کاربر
                                                </option>
                                                @if(
                                                auth()->user()->role === "admin" ||
                                                 auth()->user()->role === "manager" ||
                                                 auth()->user()->role === "branch" ||
                                                 auth()->user()->role === "representation" ||
                                                 auth()->user()->role === "salesagent")
                                                    <option value="marketer">
                                                        بازاریاب
                                                    </option>
                                                @endif
                                                @if(
                                                auth()->user()->role === "admin" ||
                                                 auth()->user()->role === "manager" ||
                                                 auth()->user()->role === "branch" ||
                                                 auth()->user()->role === "representation")
                                                    <option value="salesagent">
                                                        عامل فروش
                                                    </option>
                                                @endif
                                                @if(
                                                auth()->user()->role === "admin" ||
                                                 auth()->user()->role === "manager" ||
                                                 auth()->user()->role === "branch")
                                                    <option value="representation">
                                                        نمایندگی
                                                    </option>
                                                @endif
                                                @if(
                                                auth()->user()->role === "admin" ||
                                                 auth()->user()->role === "manager")
                                                    <option value="branch">
                                                        شعبه
                                                    </option>
                                                @endif
                                                @if(
                                                auth()->user()->role === "admin")
                                                    <option value="manager">
                                                        مدیر
                                                    </option>
                                                    <option value="storekeeper">
                                                        انباردار
                                                    </option>

                                                @endif
                                            </select>
                                            @error('role')
                                            <p class="error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <br/>
                                        <div class="form-group col-md-6">
                                            <label>کد امنیتی:</label>
                                            @include('partials/recaptcha')
                                        </div>


                                        <div class="col-md-12 form-group">
                                            <button class="btn btn-normal" onclick="introduceUser(event)">
                                                معرفی کاربر
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
            function introduceUser(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'آیا از درستی اطلاعات وارد شده مطمئن هستید؟',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(48, 133, 214)',
                    cancelButtonColor: 'rgb(221, 51, 51)',
                    confirmButtonText: 'بله کاربر را معرفی کن',
                    cancelButtonText: 'نه اجازه بده دوباره چک کنم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`introducing-user`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>



