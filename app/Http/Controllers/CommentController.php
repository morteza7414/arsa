<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'title' => $request->title,
            'comment' => $request->comment,
        ]);

        $request->session()->flash('status', 'ممنون بابت پیامی که ارسال کردید. همکاری با شما باعث خوشحالی ماست.');

        return back();
    }

    public function destroy(Comment $comment, Request $request)
    {
        if ($comment) {
            $comment->delete();
            $request->session()->flash('status', 'دیدگاه مورد نظر شما حذف شد!');
        }else{
            $request->session()->flash('error', 'دیدگاه مورد نظر وجود ندارد!');
        }

        return back();
    }

    public function confirm(Comment $comment, Request $request)
    {
        if ($comment) {
            $comment->update([
                'status' => 2,
            ]);
            $request->session()->flash('status', 'دیدگاه مورد نظر شما تایید شد!');
        }else{
            $request->session()->flash('error', 'احتمالا دیدگاه مورد نظر قبلا تایید یا حذف شده است!');
        }

        return back();
    }

    public function cancel(Comment $comment, Request $request)
    {
        if ($comment and $comment->status == 2) {
            $comment->update([
                'status' => 3,
            ]);
            $request->session()->flash('status', 'نمایش دیدگاه مورد نظر لغو شد!');
        }else{
            $request->session()->flash('error', 'دیدگاه مورد نظر وجود ندارد یا در وضعیت مناسبی نیست!');
        }

        return back();
    }


    public function index()
    {
        $comments = Comment::all()->reverse()->toQuery()->paginate(10);
        return view('panel.comments.comments',compact('comments'));
    }

    public function toConfirm()
    {
        $comments = Comment::all()->reverse()->where('status','=',1);
        if ($comments->toArray()){
            $comments = $comments->toQuery()->paginate(10);
        }else{
            $comments = Comment::where('status',1)->paginate(10);
        }
        return view('panel.comments.comments',compact('comments'));
    }

    public function cancelled()
    {
        $comments = Comment::all()->reverse()->where('status','=',3);
        if ($comments->toArray()){
            $comments = $comments->toQuery()->paginate(10);
        }else{
            $comments = Comment::where('status',3)->paginate(10);
        }
        return view('panel.comments.comments',compact('comments'));
    }
}
