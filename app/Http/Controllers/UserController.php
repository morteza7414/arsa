<?php

namespace App\Http\Controllers;


use App\Models\Identifier;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('id','!=','0')->orderBy('id','DESC')->paginate(10);

        return view('panel.users.index', compact('users'));
    }

    public function register()
    {
        return view('register');
    }

    public function profile()
    {
        return \view('panel.profile');
    }

    public function InterduceUser(Request $request)
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];
        return view('panel.user.interduceuser', compact('a', 'b'));
    }

    public function InterduceStore(Request $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:13', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8'],
        ]);
        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum = $a + $b;
        $sum = (string)$sum;
        if (($user_input === $sum)) {
            $hec_mobile = random_int(1, 9) . $request->mobile . random_int(1, 9);
            $hec = dechex($hec_mobile);
            $user = User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
                'refralcode' => $hec,
                'role' => $request->role,
                'identifier_code' => auth()->user()->refralcode,

            ]);
            $mobile = $request->mobile;
            $code = $user->send_sms_code($mobile);
            $user->update([
                'statuscode' => bcrypt($code),
            ]);
            return view('site.user.interduce_user_check_code', compact('mobile'));
        } else {
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }


    }

    public function InterduceUserCheckCode(Request $request, $mobile)
    {
        $code = $request->code;
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            if (Hash::check($code, $user->statuscode)) {
                event(new Registered($user));
                $user->update([
                    'statuscode' => null,
                ]);
                $request->session()->flash('status', 'ثبت نام با موفقیت تکمیل شد.');
                return redirect(route('dashboard'));
            } else {
                $request->session()->flash('error', 'کد وارد شده صحیح نمی باشد!');
                return view('site.user.interduce_user_check_code', $mobile);
            }
        } else {
            $request->session()->flash('error', 'مشکلی پیش آمده است لطفا مجددا تلاش فرمایید!');
            return redirect(route('home'));
        }
    }

    public function getusers(Request $request)
    {
        if (\auth()->user()->role === "admin") {
            $users = User::where('role', '!=', 'admin')->orderBy('id','DESC')->Paginate(10);
        } elseif (\auth()->user()->role === "manager") {
            $users = User::where('role', '!=', 'admin')
                ->where('role', '!=', 'manager')->orderBy('id','DESC')->Paginate(10);
        } else {
            $users = \auth()->user()->children()->orderBy('id','DESC')->paginate(10);
        }
        $count = 1;


        return view('panel.user.getusers', compact('users', 'count'));
    }

    public function editusers(Request $request, $refralcode)
    {
        DB::update('update users set role=:role where refralcode=:refralcode', [
            'role' => $request->role,
            'refralcode' => $refralcode,
        ]);

        $request->session()->flash('status', 'ویرایش به درستی انجام شد!');
        return redirect()->back();
    }

    public function destroy(Request $request, $refralcode)
    {
//        DB::delete('delete from users where id=:id',compact('id'));
        $user = DB::table('users')->where('refralcode', '=', $refralcode)->first();
        if ($user) {
            $id = $user->id;
            User::destroy($id);
        }
        $request->session()->flash('status', 'کاربر مورد نظر شما حدف شد!!');
        return back();
    }


    public function editData()
    {
        $user = \auth()->user();
        return view('panel.user.editData', compact('user'));
    }

    public function storeEditData(Request $request)
    {

        $request->validate([
            'address' => ['required', 'string', 'max:1500'],
            'postalcode' => ['required', 'integer', 'max:9999999999'],
            'name' => ['required', 'string', 'max:255'],
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
        ]);
        $request->session()->flash('status', 'ویرایش اطلاعات انجام شد!');
        return redirect(RouteServiceProvider::HOME);
    }

    public function changePassword()
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];
        return view('panel.user.changePassword', compact('a', 'b'));
    }

    public function saveChangedPassword(Request $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'oldPass' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8'],
        ]);
        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum = $a + $b;
        $sum = (string)$sum;
        if (($user_input === $sum)) {
            $user = \auth()->user();
            if (Hash::check($request->oldPass, $user->password)) {
                DB::update('update users set  password=:password where id=:id', [
                    'password' => bcrypt($request->password),
                    'id' => $user->id,
                ]);
                $request->session()->flash('status', 'رمز عبور شما با موفقیت تغییر یافت!');
                return redirect(RouteServiceProvider::HOME);
            } else {
                $request->session()->flash('error', 'متاسفانه رمز عبور وارد شده مطابقت ندارد!');
                return back();
            }
        } else {
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }
    }

    public function setIdentifier(Request $request, $refralcode)
    {
        $user = User::where('refralcode', $refralcode)->first();
        $identifierUser = User::where('refralcode', $request->identifier_refralcode)->first();
        if ($identifierUser and $user) {
            $editedUser = $user->update([
                'identifier_code' => $request->identifier_refralcode,
            ]);
            $request->session()->flash('status', 'ویرایش معرف کاربر به درستی انجام شد.');
        }else{
            $request->session()->flash('error', 'ویرایش با مشکل مواجه شده است.');
        }

        return back();

    }


}
