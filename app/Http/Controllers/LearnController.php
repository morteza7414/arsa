<?php

namespace App\Http\Controllers;

use App\Models\Learn;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearnController extends Controller
{
    public function addLearn()
    {
        $products = Product::all()->reverse();
        return view('panel.learn.addLearn', compact('products'));
    }

    public function list()
    {
        $learns = Learn::paginate(10);
        return view('panel.learn.list', compact('learns'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        if (auth()->user()->can('create', Learn::class)) {
            $count = count($request->all());
            $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'abstract' => ['string', 'max:255'],
                'description' => ['required', 'string', 'max:10000  '],
            ]);
            $category = 'general';
            if ($request->learnCategory == 'products') {
                $category = 'products';
            }
            $slut = str_replace(' ','-',$request->title);

            $learn = Learn::create([
                'title' => $request->title,
                'slut' => $slut,
                'description' => $request->description,
                'category' => $category,
                'abstract' => ($request->abstract)?$request->abstract : null,
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
                    $file->storeAs('images/learns', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into learns_gallery (learn_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$learn->id, $file_name, $time, $time]);
                } elseif (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/learns', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into learns_gallery (learn_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$learn->id, $file_name1, $time, $time]);
                }

                if ($category == 'products'){
                    $productSelect = "productSelect" . $i;
                    $productSelected = $request->$productSelect;
                    if (!empty($productSelected)) {
                        $product = Product::findOrFail($productSelected);
                        $learn->products()->save($product);
                        }
                }
            }
            $request->session()->flash('status', 'آموزش با موفقیت معرفی شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }

    public function destroy($id)
    {
        $learn = Learn::findOrFail($id);
        if (auth()->user()->can('delete', $learn)) {
            if ($learn) {
                Learn::destroy($id);
            }
            session()->flash('status', 'آموزش با موفقیت حذف شد');
            return back();
        }
    }
    public function destroyLearnProduct($product,$learn)
    {

        $learn = Learn::findOrFail($learn);
        $product = Product::findOrFail($product);
        if (auth()->user()->can('delete', $learn)) {
            DB::table('learns_products')->where('product_id', '=', $product->id)
                ->where('learn_id','=',$learn->id)->delete();
            session()->flash('status', 'محصول مورد نظر شما از لیست آموزش حذف شد');
        }
        return back();
    }

    public function edit($id)
    {
        $learn = Learn::findOrFail($id);
        $products = Product::all()->reverse();
        $images = $learn->images();
        $videos = $learn->videos();
        return view('panel/learn/edit', compact('learn', 'images', 'videos','products'));
    }

    public function storeEdit(Request $request, $id)
    {
        $learn = Learn::findOrFail($id);
        $count = count($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'abstract' => ['string', 'max:255'],
            'description' => ['required', 'string', 'max:10000  '],
        ]);
        if (auth()->user()->can('update', $learn)) {
            $slut = str_replace(' ','-',$request->title);
            $learn->update([
                'slut' => $slut,
            ]);
            if ($learn->title != $request->title) {
                $learn->update([
                    'title' => $request->title,
                ]);
            } elseif ($learn->description != $request->description) {
                $learn->update([
                    'description' => $request->description,
                ]);
            } elseif ($learn->abstract != $request->abstract) {
                $learn->update([
                    'abstract' => $request->abstract,
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
                    $file->storeAs('images/learns', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into learns_gallery (learn_id, image , created_at, updated_at) values (?, ?, ?, ?)', [$learn->id, $file_name, $time, $time]);
                } elseif (!empty($video)) {
                    $file1 = $request->file('video' . $i);
                    $base_name1 = pathinfo($file1->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext1 = $file1->getClientOriginalExtension(); // png
                    $file_name1 = $base_name1 . $i . '_' . time() . '.' . $ext1;
                    $file1->storeAs('videos/learns', $file_name1, 'public_files');
                    $time = Carbon::now();
                    DB::insert('insert into learns_gallery (learn_id, video, created_at, updated_at) values (?, ?, ?, ?)', [$learn->id, $file_name1, $time, $time]);
                }

                if ($request->learnCategory == 'products'){
                    $productSelect = "productSelect" . $i;
                    $productSelected = $request->$productSelect;
                    if (!empty($productSelected)) {
                        $product = Product::findOrFail($productSelected);
                        $learn->products()->save($product);
                    }
                }
            }
            $request->session()->flash('status', 'آموزش با موفقیت ویرایش شد!');
            return redirect()->back();
        } else {
            abort('403', 'متاسفانه شما دسترسی ندارید');
        }
    }


    public function learnImageStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('create', Learn::class)) {
            $image = DB::table('learns_gallery')->where('id', '=', $id)->first();
            if (empty($image)) {
                $request->session()->flash('error', 'عکس مورد نظر یافت نشد.');
            } else {
                if (empty($request->image)) {
                    DB::table('learns_gallery')->where('id', '=', $id)
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

                    $file->storeAs('images/learns', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('learns_gallery')->where('id', '=', $id)
                        ->update(['image' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'عکس مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function learnVideoStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('create', Learn::class)) {
            $video = DB::table('learns_gallery')->where('id', '=', $id)->first();
            if (empty($video)) {
                $request->session()->flash('error', 'ویدئو مورد نظر یافت نشد.');
            } else {
                if (empty($request->video)) {
                    DB::table('learns_gallery')->where('id', '=', $id)
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

                    $file->storeAs('videos/learns', $file_name, 'public_files');
                    $time = Carbon::now();
                    DB::table('learns_gallery')->where('id', '=', $id)
                        ->update(['video' => $file_name, 'updated_at' => $time]);
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function single($id)
    {
        $learn = Learn::findOrFail($id);
        $images = $learn->images();
        $videos = $learn->videos();
        return view('site.learn.single', compact('learn', 'images', 'videos'));

    }


    public function all()
    {
        $categoryG = Learn::where('category','=','general')->paginate(5);
        $categoryP = Learn::where('category','=','products')->paginate(5);

        return view('site.learn.all', compact('categoryG','categoryP'));
    }
}
