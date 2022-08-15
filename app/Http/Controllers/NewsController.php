<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function show()
    {
        $news = News::paginate(10);
        return view('panel.news.show', compact('news'));
    }

    public function addnews()
    {
        return view('panel.news.addnews');
    }

    public function store(Request $request)
    {
        if (auth()->user()->can('create', News::class)) {
            $count = count($request->all());


            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'abstract' => ['required', 'string', 'max:255'],
                'image' => ['image'],
                'description' => ['required', 'string', 'max:10000  '],
            ]);
            $slut = str_replace(' ','-',$request->title);

            $news = News::create([
                'title' => $request->title,
                'slut' => $slut,
                'abstract' => $request->abstract,
                'description' => $request->description,
            ]);

            for ($i = 1; $i < $count; $i++) {
                $x = "image" . $i;
                $y = "video" . $i;
                $image = $request->$x;
                $video = $request->$y;
                if (!empty($image)) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/news', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into news_gallery (news_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$news->id, $file_name, $time, $time]);
                } elseif (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/news', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into news_gallery (news_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$news->id, $file_name1, $time, $time]);
                }
            }
            $request->session()->flash('status', 'رویداد با موفقیت معرفی شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->can('delete', News::class)) {
            $news = News::findOrFail($id);
            if ($news) {
                News::destroy($id);
            }
            session()->flash('status', 'رویداد با موفقیت حذف شد');
            return back();
        }
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $images = DB::table('news_gallery')->where('news_id', '=', $news->id)
            ->where('image', '!=', null)->get();
        $videos = DB::table('news_gallery')->where('news_id', '=', $news->id)
            ->where('video', '!=', null)->get();
        return view('panel/news/edit', compact('news', 'images', 'videos'));
    }

    public function storeEdit(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $count = count($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:10000  '],
        ]);
        if (auth()->user()->can('update', News::class)) {
            $slut = str_replace(' ','-',$request->title);
            $news->update([
                'slut' => $slut,
            ]);
            if ($news->title != $request->title) {
                $news->update([
                    'title' => $request->title,
                ]);
            } elseif ($news->abstract != $request->abstract) {
                $news->update([
                    'abstract' => $request->abstract,
                ]);
            } elseif ($news->description != $request->description) {
                $news->update([
                    'description' => $request->description,
                ]);
            }
            for ($i = 1; $i < $count; $i++) {
                $x = "image" . $i;
                $y = "video" . $i;
                $image = $request->$x;
                $video = $request->$y;
                if (!empty($image)) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/news', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into news_gallery (news_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$news->id, $file_name, $time, $time]);
                } elseif (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/news', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into news_gallery (news_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$news->id, $file_name1, $time, $time]);
                }
            }
            $request->session()->flash('status', 'رویداد با موفقیت ویرایش شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }


    public function newsImageStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('update', News::class)) {
            $image = DB::table('news_gallery')->where('id', '=', $id)->first();
            if (empty($image)) {
                $request->session()->flash('error', 'عکس مورد نظر یافت نشد.');
            } else {
                if (empty($request->image)) {
                    DB::table('news_gallery')->where('id', '=', $id)
                        ->delete();
                    $request->session()->flash('status', 'عکس مورد نظر با موفقیت حذف شد.');
                } else {
                    $request->validate([
                        'image' => ['image'],
                    ]);

                    $file = $request->file('image');

                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png

                    $file_name = $base_name . '_' . time() . '.' . $ext;

                    $file->storeAs('images/news', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('news_gallery')->where('id', '=', $id)
                        ->update(['image' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'عکس مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function newsVideoStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('update', News::class)) {
            $video = DB::table('news_gallery')->where('id', '=', $id)->first();
            if (empty($video)) {
                $request->session()->flash('error', 'ویدئو مورد نظر یافت نشد.');
            } else {
                if (empty($request->video)) {
                    DB::table('news_gallery')->where('id', '=', $id)
                        ->delete();
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت حذف شد.');
                } else {
                    $request->validate([
                        'video' => ['video'],
                    ]);

                    $file = $request->file('video');

                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png

                    $file_name = $base_name . '_' . time() . '.' . $ext;

                    $file->storeAs('videos/news', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('news_gallery')->where('id', '=', $id)
                        ->update(['video' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function single($id)
    {
        $news = News::findOrFail($id);
        $images = DB::table('news_gallery')->where('news_id','=',$id)
            ->where('image','!=',null)->get();
        $videos = DB::table('news_gallery')->where('news_id','=',$id)
            ->where('video','!=',null)->get();
//        dd($news,$images,$videos);
        return view('site.news.single',compact('news','images','videos'));

    }

    public function all()
    {

        $news = News::all();
        return view('site.news.all',compact('news'));
    }
}
