<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class CartController extends Controller
{
    public function index()
    {
        return view('panel.cart.cart');
    }


    public function store(Request $request, Product $product)
    {
        $user = auth()->user();
        $userId = auth()->id();
        $productId = $product->id;
        $price = $product->offPrice();
        $quantity = ($request->quantity) ? $request->quantity : 1;

        if ($request->quantity !== null and $request->quantity < 1) {
            throw ValidationException::withMessages([
                'quantity' => ['مقدار کمتر از 1 مجاز نمی باشد']
            ]);
        }


        $check = Cart::where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)->first();


        if ($quantity <= $product->inventory) {
            if (empty($check)) {
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'product_title' => $product->title,
                    'product_price' => $product->price,
                    'product_offprice' => $price,
                    'off_reason' => $product->off_reason,
                    'quantity' => $quantity,
                    'sum' => $price * $quantity,
                ]);
                $request->session()->flash('status', 'محصول به سبد خرید شما افزوده شد.');
            } else {
                if ($check->quantity + $quantity <= $product->inventory) {
                    $cart_quantity = $check->quantity;
                    $quantityPlus = $cart_quantity + $quantity;
                    $check->update([
                        'quantity' => $quantityPlus,
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'sum' => $price * $quantityPlus,
                    ]);
                    $request->session()->flash('status', 'محصول به سبد خرید شما افزوده شد.');
                }
                else{
                    $request->session()->flash('error', 'موجودی این محصول کمتر از مقدار سفارش شما می باشد!');
                }
            }

            $user->create_order();


        } else {
            $request->session()->flash('error', 'موجودی این محصول کمتر از مقدار سفارش شما می باشد!');
        }

        return back();
    }

    public function plus(Request $request, $id)
    {
        $user = auth()->user();
        $cart = Cart::findOrFail($id);
        $q = $cart->quantity;
        $product = $cart->product;
        $price = $product->offPrice();
        $quantity = $q + 1;
        if ($quantity <= $product->inventory) {
            $cart->update([
                "quantity" => $quantity,
                'sum' => $quantity * $price,
            ]);

        } else {
            $request->session()->flash('error', 'موجودی این محصول کافی نمی باشد!');
        }

        $user->create_order();

        return back();
    }

    public function minus($id)
    {
        $user = auth()->user();
        $cart = Cart::findOrFail($id);
        $q = $cart->quantity;
        $product = $cart->product;
        $price = $product->offPrice();
        if ($q > 1) {
            $quantity = $q - 1;
            $cart->update([
                "quantity" => $quantity,
                'sum' => $quantity * $price,
            ]);
            $order = auth()->user()->order;
            if (empty($order)) {
                $order = auth()->user()->order()->create([
                    'user_id' => auth()->id(),
                    'total_amount' => auth()->user()->total_amount_without_off(),
                    'sum' => auth()->user()->total_sum(),
                ]);
            } else {
                $order->update([
                    'total_amount' => auth()->user()->total_amount_without_off(),
                    'sum' => auth()->user()->total_sum(),
                ]);
            }

        } else {
            throw ValidationException::withMessages([
                'quantity' => ['مقدار کمتر از 1 مجاز نیست.']
            ]);
        }

        $user->create_order();

        return back();
    }

    public function delete($id, Request $request)
    {
        $user = auth()->user();
        $cart = Cart::findOrFail($id);
        $cart->delete();
        $user->create_order();
        $request->session()->flash('status', 'محصول مورد نظر از سبد خرید شما حذف شد.');
        return back();
    }


}
