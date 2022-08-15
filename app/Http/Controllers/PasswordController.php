<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('site.user.password.forget_password');
    }

    public function insertCode(Request $request)
    {
        $mobile = $request->mobile;
        $user = User::where('mobile',$mobile)->first();
        if ($user){
            $code = $user->send_sms_code($mobile);
            $user->update([
                'password' => bcrypt($code),
            ]);
        }else{
            $request->session()->flash('error', 'شماره وارد شده اشتباه است یا شما هنوز ثبت نام نکرده اید لطفا ابتدا ثبت نام کنید!');
            return redirect(route('home'));
        }
        return view('site.user.password.insert_code',compact('mobile'));
    }

    public function confirmCode(Request $request,$mobile)
    {
        $code = $request->code;
        $user = User::where('mobile',$mobile)->first();
        if ($user){
            if (Hash::check($code, $user->password)){
                Auth::login($user);
                $request->session()->flash('status', 'شما با موفقیت وارد حساب خود شدید. لطفا ابتدا رمز عبور خود را تغییر دهید.(رمز عبور فعلی را کد ارسالی به شماره همراهتان وارد کنید)');
                return redirect(route('changePassword'));
            }else{
                $request->session()->flash('error', 'کد وارد شده صحیح نمی باشد!');
                return redirect(route('insert-code',$mobile));
            }
        }else{
            $request->session()->flash('error', 'شماره وارد شده اشتباه است یا شما هنوز ثبت نام نکرده اید لطفا ابتدا ثبت نام کنید!');
            return redirect(route('home'));
        }
    }
}
