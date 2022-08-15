<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];

        return view('site.user.login', compact('a', 'b'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'mobile' => ['required', 'string', 'max:13'],
            'password' => ['required', Rules\Password::defaults(), 'min:8'],
        ]);
        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum =   $a + $b ;
        $sum = (string)$sum;

        if (($user_input === $sum)){
            $user = User::where('mobile',$request->mobile)->first();
            $mobile = $request->mobile;
            if ($user->statuscode === null){
                $request->authenticate();

                $request->session()->regenerate();

                return redirect()->intended(RouteServiceProvider::HOME);
            }
            else{
                $request->session()->flash('info', 'ابتدا باید شماره همراه خود را تایید نمایید');
                $code = $user->send_sms_code($mobile);
                $user->update([
                    'statuscode' => bcrypt($code),
                ]);
                return view('site.user.check_code', compact('mobile'));
            }

        }else{
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }


    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
