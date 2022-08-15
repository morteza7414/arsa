<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{

    public function store(Request $request, Product $product)
    {
        $userId = auth()->id();
        $productId = $product->id;
        $check = DB::table('likes')->where('user_id', '=', $userId)
            ->where('product_id', '=', $productId)->first();
        if (empty($check)) {
            DB::insert('insert into likes (product_id, user_id) values (?, ?)', [$productId, $userId]);
            $request->session()->flash('status', 'محصول به لیست علاقه مندی های شما افزوده شد.');
        } else {
            DB::table('likes')->where('user_id', '=', $userId)
                ->where('product_id', '=', $productId)->delete();
            $request->session()->flash('status', 'محصول از لیست علاقه مندی های شما حذف شد.');
        }


        return back();
    }

    public function wishlist()
    {
        return view('panel/wishlist');
    }
}
