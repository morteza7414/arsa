<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];
        return view('site.contact_us', compact('a', 'b'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'name' => ['required', 'string', 'max:250'],
            'family' => ['required', 'string', 'max:250'],
            'mobile' => ['required', 'max:99999999999'],
            'email' => ['max:200'],
            'message' => ['required', 'string', 'max:1500'],
        ]);
        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum = $a + $b;
        $sum = (string)$sum;

        if (($user_input === $sum)) {
            $contact = Contact::create([
                'name' => $request->name,
                'family' => $request->family,
                'mobile' => $request->mobile,
                'email' => ($request->email) ? $request->email : null,
                'content' => $request->message,
            ]);
            $request->session()->flash('status', 'ممنون بابت پیامی که ارسال کردید. همکاران ما به زودی پاسخ پیامتان را خواهند داد.');
            return back();
        } else {
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }


    }

    public function unreadMessages()
    {
        $messages = Contact::where('status', 1)->orderBy('id', 'DESC')->paginate(10);

        $status = 1 ;

        return view('panel.messages.index', compact('messages','status'));

    }

    public function readMessages()
    {
        $messages = Contact::where('status', 2)->orderBy('id', 'DESC')->paginate(10);

        $status = 2 ;

        return view('panel.messages.index', compact('messages','status'));
    }

    public function singleMessage($id)
    {
        $message = Contact::findOrFail($id);

        if ($message->status !== 2){
            $message->update([
                'status' => 2,
            ]);
        }

        $status = 0;

        return view('panel.messages.single' , compact('message','status'));

    }



}
