<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;


class SiteProductController extends Controller
{
    public function index(Product $product)
    {
        $percentage = $product->price_percentage();
        $properties = $product->properties->toArray();
        $images = $product->images();
        $videos = $product->videos();

        $comments = Comment::all()->reverse()->where('product_id', $product->id);
        if ($comments->toArray()) {
            $comments = $comments->toQuery()->paginate(10);
        } else {
            $comments = Comment::where('product_id', $product->id)->paginate(10);
        }

        $verifiedComments = $product->comments->where('status', 2);
        if ($verifiedComments->toArray()) {
            $verifiedComments = $verifiedComments->toQuery()->paginate(10);
        } else {
            $verifiedComments = Comment::where('product_id', $product->id)->where('status', 2)->paginate(10);
        }

        return view('site/products/product', compact('product', 'percentage', 'properties', 'images', 'videos', 'comments', 'verifiedComments'));
    }

    public function allProducts()
    {
        $products = Product::where('type', '=', 1)->orWhere('type', '=', '2')->paginate(18);
        return view('site.products.all', compact('products'));
    }

    public function allApproachs()
    {
        $products = Product::where('type', '=', 2)->paginate(18);
        return view('site.products.approachs', compact('products'));
    }

    public function pastSingle($product)
    {
        $product = Product::findOrFail($product);
        if ($product) {
            $id = $product->id;
            $slut = $product->slut;
            return redirect(route('productpage', [$id,$slut]));
        }
    }


}
