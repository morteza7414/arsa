<x-main-layout>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2> {{auth()->user()->name}}  </h2>
                            <h4>در این بخش شما کاربرانی که به شرکت آرسا معرفی کرده اید را مشاهده می کنید</h4>
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
                                <h2>کاربران معرفی شده</h2>
                            </div>
                            <div class="col-12 getusers-content">
                                <table border="1" class="getusers-table">
                                    <thead class="getusers-thead">
                                    <tr class="getusers-tr">
                                        <th class="getusers-th">نام و نام خانوادگی</th>
                                        <th class="getusers-th">سمت</th>
                                        <th class="getusers-th">تاریخ ثبت نام</th>
                                        <th class="getusers-th">کدکاربری</th>

                                        @if(auth()->user()->role === "manager")
                                            <th class="getusers-th">ویرایش سمت</th>

                                        @endif
                                        @if(auth()->user()->role === "admin")
                                            <th class="getusers-th">ویرایش سمت</th>
                                            <th class="getusers-th">حذف کاربر</th>
                                            <th class="getusers-th">معرف</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody class="getusers-tbody">


                                    @foreach($users as $user)
                                        <tr class="getusers-tr">
                                            <td class="getusers-td">{{$user->name}}</td>
                                            <td class="getusers-td">{{ $user->getRoleInFarsi($user->role) }}</td>
                                            <td class="getusers-td">{{ $user->createdFarsiTime($user->created_at) }}</td>
                                            <td class="getusers-td">{{ $user->refralcode }}</td>

                                            @if(auth()->user()->role === "admin" || auth()->user()->role === "manager")
                                                <td class="getusers-td">
                                                    <div class="row edit-users-role">
                                                        <form action="{{ route('editusers', $user->refralcode) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('put')

                                                            <select name="role">
                                                                <option value="user"
                                                                        @if($user->role === 'user') selected @endif>
                                                                    کاربر
                                                                </option>
                                                                <option value="marketer"
                                                                        @if($user->role === 'marketer') selected @endif>
                                                                    بازاریاب
                                                                </option>
                                                                <option value="salesagent"
                                                                        @if($user->role === 'salesagent') selected @endif>
                                                                    عامل فروش
                                                                </option>
                                                                <option value="representation"
                                                                        @if($user->role === 'representation') selected @endif>
                                                                    نمایندگی
                                                                </option>
                                                                <option value="branch"
                                                                        @if($user->role === 'branch') selected @endif>
                                                                    شعبه
                                                                </option>
                                                                <option value="manager"
                                                                        @if($user->role === 'manager') selected @endif>
                                                                    مدیر
                                                                </option>
                                                                <option value="storekeeper"
                                                                        @if($user->role === 'storekeeper') selected @endif>
                                                                    انباردار
                                                                </option>
                                                            </select>

                                                            @error('role')
                                                            <p class="error">{{ $message }}</p>
                                                            @enderror

                                                            <button class="btn editusers-btn">ویرایش</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                            @if(auth()->user()->role === "admin")
                                                <td class="getusers-td">
                                                    <div class="row edit-users-role">
                                                        <button onclick="destroyUser(event, {{ $user->id }})"
                                                                class="btn editusers-btn deleteuser-btn">حذف
                                                        </button>
                                                        <form action="{{ route('deleteUser', $user->refralcode) }}"
                                                              id="destroy-user-{{ $user->id }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="getusers-td">
                                                    <div class="row">

                                                        @if(!empty($user->parent()))
                                                            <div class="identifier-div">
                                                                {{$user->parent()->name}}
                                                                <form action="{{ route('set.identifier', $user->refralcode) }}"
                                                                      method="post">
                                                                    @csrf
                                                                    <input type="text" name="identifier_refralcode">
                                                                    <button type="submit"
                                                                            class="btn editusers-btn deleteuser-btn">
                                                                        اعمال
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @else
                                                            <form action="{{ route('set.identifier', $user->refralcode) }}"
                                                                  method="post">
                                                                @csrf
                                                                <input type="text" name="identifier_refralcode">
                                                                <button type="submit"
                                                                        class="btn editusers-btn deleteuser-btn">
                                                                    اعمال
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </div>
                                                </td>
                                            @endif
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <hr>
                                <div>
                                    {{ $users->onEachSide(1)->links() }}
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
            function destroyUser(event, id) {
                event.preventDefault();
                Swal.fire({
                    title: 'ایا مطمئن هستید این کاربر را میخواهید حذف کنید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(221, 51, 51)',
                    cancelButtonColor: 'rgb(48, 133, 214)',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'نه منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`destroy-user-${id}`).submit()
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>