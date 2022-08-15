<div class="col-lg-3 pannel_menu">
    <div class="account-sidebar"><a class="popup-btn">حساب کاربری من</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-right"
                                                                         aria-hidden="true"></i> بازگشت</span></div>
        <div class="block-content ">
            <ul>
                <li class="@if(request()->is('panel/dashboard')) active @endif">
                    <a href="{{route('dashboard')}}">اطلاعات
                        حساب</a>
                </li>

                <li class="@if(request()->is('panel/getusers')) active @endif">
                    <a href="{{route('getusers')}}">کاربران</a>
                </li>

                @if(auth()->user()->role === "admin" )
                    <li class="@if(request()->is('transactions/status/*') or !empty(\App\Models\OrderStatus::where('status','=',4)->orWhere('status','=','1')->first())) active @endif"><a href="{{route('transactions.registered')}}">مدیریت سفارشات</a></li>
                @endif

                @if(auth()->user()->role === "storekeeper" )
                    <li class="@if(request()->is('transactions/status/*') or !empty(\App\Models\OrderStatus::where('status','=',2)->orWhere('status','=','3')->first())) active @endif"><a href="{{route('transactions.confirmed')}}">مدیریت سفارشات</a></li>
                @endif

                <li class="@if(request()->is('transactions/report/*')) active @endif">
                    <a href="{{route('transactions.successful')}}">سفارشات من</a>
                </li>

                <li @if(request()->is('/wishlist')) active @endif>
                    <a href="{{route('wishlist')}}">لیست علاقه مندی من</a>
                </li>

                @if(auth()->user()->role === "admin" ||  auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/product/*')) active @endif"><a href="{{route('product.index')}}">محصولات</a></li>
                @endif

                @if(auth()->user()->role === "admin")
                    <li class="@if(request()->is('panel/reports')) active @endif"><a href="{{route('reports.index')}}">گزارشات </a></li>
                @endif

                @if(auth()->user()->role === "admin")
                    <li class="@if(request()->is('panel/offcodes/*')) active @endif"><a href="{{route('offcodes.index')}}">کدهای تخفیف </a></li>
                @endif

                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/comments/*') or !empty(\App\Models\Comment::where('status','=','1')->first())) active @endif"><a href="{{route('comments.toConfirm')}}">نظرات </a></li>
                @endif

                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/messages/*')) active @elseif(!empty(\App\Models\Contact::where('status',1)->get()->toArray()))) active @endif"><a href="{{route('contact.unreadMessages')}}">پیام ها </a></li>
                @endif

                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/representation/*')) active @elseif(!empty(\App\Models\Representation::where('status',1)->get()->toArray()))) active @endif"><a href="{{route('representation.unread')}}">اخذ نمایندگی</a></li>
                @endif

                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/news/*')) active @endif">
                        <a href="{{route('news.show')}}">
                            رویدادها
                        </a>
                    </li>
                @endif
                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/learn/*')) active @endif">
                        <a href="{{route('learn.list')}}">
                            آموزش
                        </a>
                    </li>
                @endif

                @if(auth()->user()->role === "admin" or auth()->user()->role === "manager")
                    <li class="@if(request()->is('panel/project/*')) active @endif">
                        <a href="{{route('project.list')}}">
                            پروژه های اجرایی
                        </a>
                    </li>
                @endif

                <li class="@if(request()->is('panel/interduce-user')) active @endif">
                    <a href="{{route('InterduceUser')}}">
                        معرفی کاربر
                    </a>
                </li>

                <li class="@if(request()->is('panel/changePassword')) active @endif">
                    <a href="{{route('changePassword')}}">تغییر رمز عبور</a>
                </li>

                <li class="last">
                    <a href="{{ route('logout') }}" class="logout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        خروج از حساب کاربری
                    </a>
                    <form action="{{ route('logout') }}" method="post" id="logout-form">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
