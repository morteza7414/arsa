<?php

namespace App\Http\Controllers;

use App\Models\Offcode;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffcodeController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('create', Offcode::class)) {
            $offcodes = Offcode::paginate(10);
            return view('panel.offcodes.index', compact('offcodes'));
        }
    }

    public function create()
    {
        if (auth()->user()->can('create', Offcode::class)) {
            return view('panel.offcodes.create');
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('create', Offcode::class)) {
            $request->validate([
                'code' => ['required', 'string', 'max:255', 'unique:offcodes'],
                'off_reason' => ['required', 'string', 'max:255'],
            ]);
            if (empty($request->amount)) {
                $request->validate([
                    'percentage' => ['required', 'integer', 'max:100', 'min:1'],
                ]);
            } else {
                $request->validate([
                    'amount' => ['required', 'integer', 'min:1'],
                ]);
            }

            if (empty($request->quantity)) {
                $request->validate([
                    'time' => ['required', 'integer', 'min:1'],
                ]);
            } else {
                $request->validate([
                    'quantity' => ['required', 'integer', 'min:1'],
                ]);
            }

            $offcode = Offcode::create([
                'code' => $request->code,
                'amount' => ($request->amount) ? $request->amount : null,
                'percentage' => ($request->percentage) ? $request->percentage : null,
                'quantity' => ($request->quantity) ? $request->quantity : null,
                'time' => ($request->time) ? $request->time : null,
                'off_reason' => $request->off_reason,
            ]);

            $request->session()->flash('status', 'کد تخفیف با موفقیت ایجاد شد.');
            return back();
        }
    }

    public function edit(Offcode $offcode)
    {
        if (auth()->user()->can('update', $offcode)) {
            return view('panel.offcodes.edit', compact('offcode'));
        }
    }

    public function storeEdit(Offcode $offcode, Request $request)
    {
        if (auth()->user()->can('update', $offcode)) {
            $request->validate([
                'code' => ['required', 'string', 'max:255'],
                'off_reason' => ['required', 'string', 'max:255'],
            ]);
            if (empty($request->amount)) {
                $request->validate([
                    'percentage' => ['required', 'integer', 'max:100', 'min:1'],
                ]);
            } else {
                $request->validate([
                    'amount' => ['required', 'integer', 'min:1'],
                ]);
            }

            if (empty($request->quantity)) {
                $request->validate([
                    'time' => ['required', 'integer', 'min:1'],
                ]);
            } else {
                $request->validate([
                    'quantity' => ['required', 'integer', 'min:1'],
                ]);
            }


            $offcode->update([
                'code' => $request->code,
                'amount' => ($request->amount) ? $request->amount : null,
                'percentage' => ($request->percentage) ? $request->percentage : null,
                'quantity' => ($request->quantity) ? $request->quantity : null,
                'time' => ($request->time) ? $request->time : null,
                'off_reason' => $request->off_reason,
            ]);

            $request->session()->flash('status', 'کد تخفیف با موفقیت ویرایش شد.');
            return redirect(route('offcodes.index'));
        }
    }

    public function register(Request $request)
    {
        $user = auth()->user();
        $order = $user->order;
        $now = Carbon::now();

        $offcode = Offcode::where('code', $request->offcode)->first();
        if (!empty($offcode) and !empty($order)) {
            $order_offcode = DB::table('orders_offcodes')->where('offcode_id', '=', $offcode->id)
                ->where('user_id', '=', $user->id)->where('order_id', '=', $order->id)->first();
            if (empty($order_offcode)) {
                if (isset($offcode->quantity) and $offcode->quantity > 0) {
                    if ($offcode->percentage) {
                        $off_amount = ($order->sum * $offcode->percentage) / 100;

                        $order->update([
                            'sum' => $order->sum - $off_amount,
                        ]);
                    } elseif (empty($offcode->percentage) and $offcode->amount) {
                        $off_amount = $offcode->amount;
                        $order->update([
                            'sum' => $order->sum - $off_amount,
                        ]);
                    }
                    $offcode->update([
                        'quantity' => $offcode->quantity - 1,
                    ]);


                } elseif (empty($offcode->quantity) and isset($offcode->time) and $offcode->created_at > $now->subHour($offcode->time)) {
                    if ($offcode->percentage) {
                        $off_amount = ($order->sum * $offcode->percentage) / 100;
                        $order->update([
                            'sum' => ($order->sum - $off_amount),
                        ]);
                    } elseif (empty($offcode->percentage) and $offcode->amount) {
                        $off_amount = $offcode->amount;
                        $order->update([
                            'sum' => ($order->sum - $off_amount),
                        ]);
                    }
                } else {
                    $request->session()->flash('error', 'متاسفانه این کد منقضی شده است.');
                    return back();
                }

                $order_offcode = DB::insert('insert into orders_offcodes (offcode_id, order_id, user_id, off_amount) values (?, ?, ?, ?)', [$offcode->id, $order->id, $user->id, $off_amount]);
            } else {
                $request->session()->flash('error', 'این کد قبلا توسط شما استفاده شده است.');
                return back();
            }

            $request->session()->flash('status', 'کد تخفیف با موفقیت اعمال شد.');
            return back();
        } else {
            $request->session()->flash('error', 'چنین کد تخفیفی وجود ندارد!');
            return back();
        }
    }
}
