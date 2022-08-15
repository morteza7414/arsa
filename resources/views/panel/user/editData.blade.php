<x-main-layout>
    <x-slot name="title">
        - ویرایش اطلاعات
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>لطفا اطلاعات پروفایل خود را ویرایش کنید</h4>
                            <br/>
                            {{--                            <ul>--}}
                            {{--                                <li><a href="{{route('home')}}">خانه</a></li>--}}
                            {{--                                <li><i class="fa fa-angle-double-left"></i></li>--}}
                            {{--                                <li><a href="javascript:void(0)">داشبورد</a></li>--}}
                            {{--                            </ul>--}}
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
                                <h2>ویرایش اطلاعات حساب</h2>
                            </div>
                            <form class="editdata-form" method="post" action="{{route('editData.store')}}">
                                @method('put')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12 form-group">
                                        <label>نام و نام خانوادگی</label>
                                        <input type="text" value="{{$user->name}}" name="name" class="form-control" id="fname" placeholder="{{$user->name}}" >
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
                                        <label>آدرس</label>
                                        <input type="text" value="{{$user->address}}" name="address" class="form-control" id="address" placeholder="{{ ($user->address)? $user->address : "آدرس پستی خود را وارد نمایید"}}" >
                                        @error('address')
                                        <p style="margin-bottom: 1rem;
                                color: #D8000C;
                                text-align: right;"
                                        >
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>کد پستی</label>
                                        <input type="text" value="{{$user->postalcode}}" name="postalcode" class="form-control" id="postalcode" placeholder="{{($user->postalcode)? $user->postalcode : "کدپستی خود را وارد نمایید"}}" >
                                        @error('address')
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