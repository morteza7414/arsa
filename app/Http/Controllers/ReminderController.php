<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function create($id , Request $request)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $mobile = $user->mobile;
        $reminder = Reminder::where('user_id',$user->id)->where('product_id',$product->id)->first();
        if (empty($reminder)){
            $reminder = Reminder::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'mobile' => $mobile,
            ]);
            $request->session()->flash('status', 'محصول در لیست یادآوری قرار گرفت و در صورت موجود شدن در انبار به شما از طریق پیامک اطلاعرسانی خواهد شد');
        }else{
            $request->session()->flash('info', 'این محصول قبلا در لیست یادآوری شما قرار گرفته است');
        }


        return back();
    }
}
