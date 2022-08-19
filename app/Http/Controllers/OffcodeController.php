<?php

namespace App\Http\Controllers;

use App\Models\Offcode;
use App\Models\Order;
use App\Models\Product;
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
//        dd($request->all());
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

            for ($i = 1; $i <= count(Product::all()); $i++) {
                $product = "product" . "-" . $i;
                if ($request->$product) {
                    DB::insert('insert into offcode_products (product_id, offcode_id) values (?, ?)', [$request->$product, $offcode->id]);
                }
            }

            $request->session()->flash('status', 'کد تخفیف با موفقیت ایجاد شد.');
            return back();
        }
    }

    public function edit(Offcode $offcode)
    {
        if (auth()->user()->can('update', $offcode)) {
//            dd($offcode->products);
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

            DB::table('offcode_products')->where('offcode_id', $offcode->id)->delete();
            for ($i = 1; $i <= count(Product::all()); $i++) {
                $product = "product" . "-" . $i;

                if ($request->$product) {
                    DB::insert('insert into offcode_products (product_id, offcode_id) values (?, ?)', [$request->$product, $offcode->id]);
                }
            }

            $request->session()->flash('status', 'کد تخفیف با موفقیت ویرایش شد.');
            return redirect(route('offcodes.index'));
        }
    }

    public function register(Request $request)
    {
        $user = auth()->user();
        $order = $user->order;
        $now = Carbon::now();
        $carts = $user->carts;
        $offcode = Offcode::where('code', $request->offcode)->first();


        if (!empty($offcode) and !empty($order)) {
            $offcodeProducts = $offcode->products;
            foreach ($carts as $cart) {
                foreach ($offcodeProducts as $offcodeProduct) {
                    if ($offcodeProduct->id == $cart->product_id) {
                        if (isset($offcode->quantity) and $offcode->quantity > 0) {
                            $price = $offcodeProduct->offPrice();
                            if ($offcode->percentage) {
                                $off_amount = ($price * $offcode->percentage) / 100;
                            } elseif (empty($offcode->percentage) and $offcode->amount) {
                                $off_amount = $offcode->amount;
                            }
                            $cart->update([
                                'product_offprice' => $price - $off_amount,
                                'off_reason' => $offcode->off_reason,
                                'sum' => ($price - $off_amount) * $cart->quantity,
                            ]);
                            $offcode->update([
                                'quantity' => $offcode->quantity - 1,
                            ]);
                        } elseif (empty($offcode->quantity) and isset($offcode->time) and $offcode->created_at > $now->subHour($offcode->time)) {
                            $price = $offcodeProduct->offPrice();
                            if ($offcode->percentage) {
                                $off_amount = ($price * $offcode->percentage) / 100;
                            } elseif (empty($offcode->percentage) and $offcode->amount) {
                                $off_amount = $offcode->amount;
                            }
                            $cart->update([
                                'product_offprice' => $price - $off_amount,
                                'off_reason' => $offcode->off_reason,
                                'sum' => ($price - $off_amount) * $cart->quantity,
                            ]);
                        } else {
                            $request->session()->flash('error', 'متاسفانه این کد منقضی شده است.');
                            return back();
                        }

                        DB::insert('insert into carts_offcodes (offcode_id, cart_id, user_id, off_amount) values (?, ?, ?, ?)', [$offcode->id, $cart->id, $user->id, $off_amount]);
                    }
                }
            }


            $order->update([
                'total_amount' => $user->total_amount_without_off(),
                'sum' => $user->total_sum(),
            ]);
            $request->session()->flash('status', 'کد تخفیف با موفقیت اعمال شد.');

            return back();
        } else {
            $request->session()->flash('error', 'چنین کد تخفیفی وجود ندارد!');
            return back();
        }
    }
}
