<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Identifier;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use SoapClient;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];
        return view('site.user.register', compact('a', 'b'));
    }


    public function checkCode(Request $request, $mobile)
    {
        $code = $request->code;
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            if (Hash::check($code, $user->statuscode)) {
                Auth::login($user);
                $user->update([
                    'statuscode' => null,
                ]);
                $request->session()->flash('status', 'ثبت نام شما با موفقیت تکمیل شد. به خانواده آرسا خوش آمدید!');
                return redirect(route('dashboard'));
            } else {
                $request->session()->flash('error', 'کد وارد شده صحیح نمی باشد!');
                return view('site.user.check_code', $mobile);
            }
        } else {
            $request->session()->flash('error', 'مشکلی پیش آمده است لطفا مجددا تلاش فرمایید!');
            return redirect(route('home'));
        }
    }

    public function ResendCode(Request $request, $mobile)
    {
        $user = User::where('mobile',$mobile)->first();
        if ($user){
            $code = $user->send_sms_code($mobile);
            $user->update([
                'statuscode' => bcrypt($code),
            ]);
            return view('site.user.check_code', compact('mobile'));
        }else{
            abort('404', 'کاربری با این شماره موبایل یافت نشد');
        }
    }


    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:13', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8'],
            'identifiercode' => ['max:15'],
        ]);

        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum = $a + $b;
        $sum = (string)$sum;

        if (($user_input === $sum)) {
            $mobile = $request->mobile;
            $identifier_code = empty($request->identifiercode) ? null : $request->identifiercode;
            $hec_mobile = random_int(1, 9) . $mobile . random_int(1, 9);
            $hec = dechex($hec_mobile);
            $user = User::create([
                'name' => $request->name,
                'mobile' => $mobile,
                'password' => Hash::make($request->password),
                'refralcode' => $hec,
                'identifier_code' => $identifier_code,


            ]);
            event(new Registered($user));
            $code = $user->send_sms_code($mobile);
            $user->update([
                'statuscode' => bcrypt($code),
            ]);
            return view('site.user.check_code', compact('mobile'));

        } else {
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }

//        return redirect(RouteServiceProvider::HOME);
    }
}
