<x-main-layout>
    <x-slot name="title">
        - ویرایش رمزعبور
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما می توانید رمز عبور پنل کاربری خود را تغییر دهید</h4>
                            <br/>
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
                                <h2>تغییر رمز عبور</h2>
                            </div>
                            <form class="editdata-form" method="post" action="{{route('changePassword.store')}}">
                                @method('put')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12 form-group">
                                        <label>رمز عبور فعلی</label>
                                        <input type="password" name="oldPass" class="form-control" id="oldpass" placeholder="رمز عبور فعلی خود را وارد نمایید" >
                                        @error('oldPass')
                                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                        >
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>رمز عبور جدید</label>
                                        <input type="password" name="password" class="form-control" placeholder="رمز عبور جدید خود را وارد کنید" >
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
                                        <label> تکرار رمز عبور جدید</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="تکرار رمز عبور جدید" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>کد امنیتی:</label>
                                        @include('partials/recaptcha')
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-12 form-group">
                                        <button class="btn btn-normal" type="submit">
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
    </section>
    <!-- section end -->
</x-main-layout>