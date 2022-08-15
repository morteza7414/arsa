<?php

namespace App\Http\Controllers;

use App\Models\Representation;
use Illuminate\Http\Request;

class RepresentationController extends Controller
{
    public function representation()
    {
        $recaptcha = HomeController::recaptcha();
        $a = $recaptcha['a'];
        $b = $recaptcha['b'];
        return view('site.general.representation',compact('a', 'b'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recaptcha' => ['required', 'int'],
            'name' => ['required', 'string', 'max:250'],
            'family' => ['required', 'string', 'max:250'],
            'mobile1' => ['required', 'string', 'max:13', 'min:11' , 'unique:representations'],
            'mobile2' => ['max:13'],
            'phone' => ['max:13'],
            'email' => ['max:250'],
            'Knowledge' => ['required','max:250'],
            'introduction' => ['required','max:250'],
            'job' => ['required', 'string', 'max:250'],
            'state' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:250'],
            'address' => ['required', 'string', 'max:1000'],
        ]);

        $a = $request->random_input_a;
        $b = $request->random_input_b;
        $user_input = $request->recaptcha;
        $sum = $a + $b;
        $sum = (string)$sum;

        if (($user_input === $sum)) {
            $representation = Representation::create([
                'name' => $request->name,
                'family' => $request->family,
                'mobile1' => $request->mobile1,
                'mobile2' => ($request->mobile2) ? $request->mobile2 : null,
                'phone' => ($request->phone) ? $request->phone : null,
                'email' => ($request->email) ? $request->email : null,
                'job' => $request->job,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'Knowledge' => $request->Knowledge,
                'introduction' => $request->introduction,
            ]);
            $request->session()->flash('status', 'تبریک، ثبت نام شما برای گرفتن نمایندگی شرکت آرسا انجام شد و به زودی کارشناسان شرکت با شما تماس می گیرند.');
            return redirect(route('home'));
        } else {
            throw ValidationException::withMessages([
                'recaptcha' => ['کد امنیتی صحیح نمی باشد']
            ]);
        }
    }

    public function unreadUsers()
    {
        $users = Representation::where('status', 1)->orderBy('id', 'DESC')->paginate(10);

        $status = 1 ;

        return view('panel.representation.index', compact('users','status'));

    }

    public function readUsers()
    {
        $users = Representation::where('status', 2)->orderBy('id', 'DESC')->paginate(10);

        $status = 2 ;

        return view('panel.representation.index', compact('users','status'));
    }

    public function single($id)
    {
        $user = Representation::findOrFail($id);

        if ($user->status !== 2){
            $user->update([
                'status' => 2,
            ]);
        }
        $status = 0;

        return view('panel.representation.single' , compact('user','status'));

    }



}
