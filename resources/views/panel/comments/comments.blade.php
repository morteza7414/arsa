<x-main-layout>
    <x-slot name="title">
        - مدیریت نظرات
    </x-slot>

    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>  {{auth()->user()->name}}  </h2>
                            <h4>در این قسمت شما می توانید نظرات کاربران را مدیریت کنید</h4>
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
                                        <li class="@if(request()->is('panel/comments/to-confirm')) active @endif">
                                            <a href="{{ route('comments.toConfirm') }}">در انتظار تایید</a>
                                        </li>
                                        <li class="@if(request()->is('panel/comments')) active @endif">
                                            <a href="{{ route('comments.index') }}">همه نظرات</a>
                                        </li>
                                        <li class="@if(request()->is('panel/comments/cancelled')) active @endif">
                                            <a href="{{ route('comments.cancelled') }}">لغو نمایش شده</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                            <br>


                            <div class="col-12 getusers-content">
                                <table border="1" class="getusers-table">
                                    <thead class="getusers-thead">
                                    <tr class="getusers-tr">
                                        <th class="getusers-th">محصول</th>
                                        <th class="getusers-th">کاربر</th>
                                        <th class="getusers-th">عنوان</th>
                                        <th class="getusers-th">دیدگاه</th>
                                        <th class="getusers-th">وضعیت</th>
                                        <th class="getusers-th">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody class="getusers-tbody">


                                    @foreach($comments as $comment)
                                        <tr class="getusers-tr">
                                            <td class="getusers-td">{{   $comment->product->title   }}</td>
                                            <td class="getusers-td">{{$comment->user->name}}</td>
                                            <td class="getusers-td">{{$comment->title}}</td>
                                            <td class="getusers-td">{{$comment->comment}}</td>
                                            <td class="getusers-td">
                                                @if($comment->status === 1)
                                                    در انتظار
                                                @elseif($comment->status === 2)
                                                    تایید شده
                                                @elseif($comment->status === 3)
                                                    لغو نمایش
                                                @endif
                                            </td>


                                            <td class="getusers-td">
                                                <div class="row edit-users-role">
                                                    <button onclick="destroyComment(event, {{ $comment->id }})"
                                                            class="btn editusers-btn deleteuser-btn">حذف
                                                    </button>
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
                                                            <button type="submit" class="comment-cancel-button">
                                                                لغو نمایش
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <form action="{{ route('comment.destroy', $comment->id) }}"
                                                          id="destroy-comment-{{ $comment->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <hr>
                                <div>
                                    {{ $comments->onEachSide(1)->links() }}
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
            function destroyComment(event, id) {
                event.preventDefault();

                Swal.fire({
                    title: 'ایا از حدف این دیدگاه مطمئن هستید؟',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'rgb(221, 51, 51)',
                    cancelButtonColor: 'rgb(48, 133, 214)',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'نه منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('destroy-comment-' + id).submit();
                    }
                })
            }
        </script>
    </x-slot>
</x-main-layout>