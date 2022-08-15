<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Learn;
use App\Models\News;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Spatie\ImageOptimizer\OptimizerChainFactory;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->reverse()->take(12);
//
//        $bestsales = Sale::all()->sortByDesc('sales');
//
//        $tazinatchoobi = Category::where('child', 'like', '%' . 'تزیینات چوبی' . '%')->orwhere('child', 'like', '%' . 'تزیینات' . '%')->where('parent', '')->get();
//
//        $lots = Category::where('child', 'like', '%' . 'هوشمند' . '%')->where('parent', '')->get();
//
//        $botons = Category::where('child', 'like', '%' . 'اکسسوری' . '%')->orwhere('child', 'like', '%' . 'بتنی' . '%')->where('parent', '')->get();
//
//        $sangs = Category::where('child', 'like', '%' . 'سنگ' . '%')->where('parent', '')->get();

//        $amazing = new Product();
//        $amazing = $amazing->amazing_products();

//        $specials = $newproducts->where('special', true);

        $news = News::all()->reverse()->take(12);
        $learns = Learn::all()->reverse()->take(12);
        return view('site.index', compact('news','products','learns'));

    }

    public function category($title, Request $request)
    {
        $category = Category::where('child', 'like', '%' . $title . '%')->first();
        if (!$request->price_from and !$request->price_to) {
            $from = 'nothing';
            $to = 'nothing';
            $products = $category->products;
        } elseif ($request->price_from and !$request->price_to) {
            $from = $request->price_from;
            $to = 'nothing';
            $products = $category->products->where('final_price', '>=', $from);

        } elseif (!$request->price_from and $request->price_to) {
            $from = 'nothing';
            $to = $request->price_to;
            $products = $category->products->where('final_price', '<=', $to);

        } elseif ($request->price_from and $request->price_to) {
            $from = $request->price_from;
            $to = $request->price_to;
            $products = $category->products->where('final_price', '<=', $to)->where('final_price', '>=', $from);
        }
        return view('site.products.category', compact('title', 'products', 'from', 'to'));
    }


//    public function category($title, Request $request)
//    {
//        if (!$request->price_from and !$request->price_to) {
//            $from = 'nothing';
//            $to = 'nothing';
//            if ($title == 'خانه و آشپزخانه' or $title == 'خانه وآشپزخانه' or $title == 'خانه' or $title == 'آشپزخانه') {
//                $category = Category::where('child', '', '%' . 'خانه' . '%')->orwhere('child', 'like', '%' . 'آشپزخانه' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'کلید لمسی' or $title == 'کلید' or $title == 'کلید هوشمند' or $title == 'کلیدلمسی') {
//                $category = Category::where('child', 'like', '%' . 'کلید' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'هوشمندسازی ساختمان' or $title == 'هوشمند سازی ساختمان') {
//                $category = Category::where('child', 'هوشمندسازی ساختمان')->orwhere('child', 'هوشمند سازی ساختمان')
//                    ->orwhere('child', 'like', '%' . 'خانه' . '%')->where('parent', 'like', '%' . 'هوشمند' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'وسایل دکوری' or $title == 'دکوری') {
//                $category = Category::where('child', 'دکوری')->orwhere('child', 'وسایل دکوری')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'ساعت' or $title == 'ساعت دیواری' or $title == 'ساعت چوبی') {
//                $category = Category::where('child', 'like', '%' . 'ساعت' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'عصا' or $title == 'عصا چوبی' or $title == 'عصای چوبی') {
//                $category = Category::where('child', 'like', '%' . 'عصا' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'سندبلاست' or $title == 'سند بلاست') {
//                $category = Category::where('child', 'سندبلاست')->orwhere('child', 'سند بلاست')
//                    ->orwhere('child', 'like', '%' . 'بلاست' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'نانوآنتیک' or $title == 'نانو آنتیک') {
//                $category = Category::where('child', 'like', '%' . 'نانوآنتیک' . '%')->orwhere('child', 'like', '%' . 'نانو آنتیک' . '%')->
//                orwhere('child', 'like', '%' . 'نانو' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            } elseif ($title == 'amazing' or $title == 'شگفت انگیز') {
//                $products = Product::where('amazing', true)->get()->toArray();
//            } else {
//                $category = Category::where('child', 'like', '%' . $title . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->toArray();
//                }
//            }
//        } elseif ($request->price_from and !$request->price_to) {
//            $from = $request->price_from;
//            $to = 'nothing';
//            if ($title == 'خانه و آشپزخانه' or $title == 'خانه وآشپزخانه' or $title == 'خانه' or $title == 'آشپزخانه') {
//                $category = Category::where('child', '', '%' . 'خانه' . '%')->orwhere('child', 'like', '%' . 'آشپزخانه' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'کلید لمسی' or $title == 'کلید' or $title == 'کلید هوشمند' or $title == 'کلیدلمسی') {
//                $category = Category::where('child', 'like', '%' . 'کلید' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'هوشمندسازی ساختمان' or $title == 'هوشمند سازی ساختمان') {
//                $category = Category::where('child', 'هوشمندسازی ساختمان')->orwhere('child', 'هوشمند سازی ساختمان')
//                    ->orwhere('child', 'like', '%' . 'خانه' . '%')->where('parent', 'like', '%' . 'هوشمند' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'وسایل دکوری' or $title == 'دکوری') {
//                $category = Category::where('child', 'دکوری')->orwhere('child', 'وسایل دکوری')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'ساعت' or $title == 'ساعت دیواری' or $title == 'ساعت چوبی') {
//                $category = Category::where('child', 'like', '%' . 'ساعت' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'عصا' or $title == 'عصا چوبی' or $title == 'عصای چوبی') {
//                $category = Category::where('child', 'like', '%' . 'عصا' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'سندبلاست' or $title == 'سند بلاست') {
//                $category = Category::where('child', 'سندبلاست')->orwhere('child', 'سند بلاست')
//                    ->orwhere('child', 'like', '%' . 'بلاست' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'نانوآنتیک' or $title == 'نانو آنتیک') {
//                $category = Category::where('child', 'like', '%' . 'نانوآنتیک' . '%')->orwhere('child', 'like', '%' . 'نانو آنتیک' . '%')->
//                orwhere('child', 'like', '%' . 'نانو' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'amazing' or $title == 'شگفت انگیز') {
//                $products = Product::where('amazing', true)->where('final_price', '>=', $from)->get()->toArray();
//            } else {
//                $category = Category::where('child', 'like', '%' . $title . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '>=', $from)->toArray();
//                }
//            }
//        } elseif (!$request->price_from and $request->price_to) {
//            $from = 'nothing';
//            $to = $request->price_to;
//            if ($title == 'خانه و آشپزخانه' or $title == 'خانه وآشپزخانه' or $title == 'خانه' or $title == 'آشپزخانه') {
//                $category = Category::where('child', '', '%' . 'خانه' . '%')->orwhere('child', 'like', '%' . 'آشپزخانه' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'کلید لمسی' or $title == 'کلید' or $title == 'کلید هوشمند' or $title == 'کلیدلمسی') {
//                $category = Category::where('child', 'like', '%' . 'کلید' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'هوشمندسازی ساختمان' or $title == 'هوشمند سازی ساختمان') {
//                $category = Category::where('child', 'هوشمندسازی ساختمان')->orwhere('child', 'هوشمند سازی ساختمان')
//                    ->orwhere('child', 'like', '%' . 'خانه' . '%')->where('parent', 'like', '%' . 'هوشمند' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'وسایل دکوری' or $title == 'دکوری') {
//                $category = Category::where('child', 'دکوری')->orwhere('child', 'وسایل دکوری')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'ساعت' or $title == 'ساعت دیواری' or $title == 'ساعت چوبی') {
//                $category = Category::where('child', 'like', '%' . 'ساعت' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'عصا' or $title == 'عصا چوبی' or $title == 'عصای چوبی') {
//                $category = Category::where('child', 'like', '%' . 'عصا' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'سندبلاست' or $title == 'سند بلاست') {
//                $category = Category::where('child', 'سندبلاست')->orwhere('child', 'سند بلاست')
//                    ->orwhere('child', 'like', '%' . 'بلاست' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'نانوآنتیک' or $title == 'نانو آنتیک') {
//                $category = Category::where('child', 'like', '%' . 'نانوآنتیک' . '%')->orwhere('child', 'like', '%' . 'نانو آنتیک' . '%')->
//                orwhere('child', 'like', '%' . 'نانو' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            } elseif ($title == 'amazing' or $title == 'شگفت انگیز') {
//                $products = Product::where('amazing', true)->where('final_price', '<=', $to)->get()->toArray();
//            } else {
//                $category = Category::where('child', 'like', '%' . $title . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->toArray();
//                }
//            }
//        } elseif ($request->price_from and $request->price_to) {
//            $from = $request->price_from;
//            $to = $request->price_to;
//            if ($title == 'خانه و آشپزخانه' or $title == 'خانه وآشپزخانه' or $title == 'خانه' or $title == 'آشپزخانه') {
//                $category = Category::where('child', '', '%' . 'خانه' . '%')->orwhere('child', 'like', '%' . 'آشپزخانه' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'کلید لمسی' or $title == 'کلید' or $title == 'کلید هوشمند' or $title == 'کلیدلمسی') {
//                $category = Category::where('child', 'like', '%' . 'کلید' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'هوشمندسازی ساختمان' or $title == 'هوشمند سازی ساختمان') {
//                $category = Category::where('child', 'هوشمندسازی ساختمان')->orwhere('child', 'هوشمند سازی ساختمان')
//                    ->orwhere('child', 'like', '%' . 'خانه' . '%')->where('parent', 'like', '%' . 'هوشمند' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'وسایل دکوری' or $title == 'دکوری') {
//                $category = Category::where('child', 'دکوری')->orwhere('child', 'وسایل دکوری')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'ساعت' or $title == 'ساعت دیواری' or $title == 'ساعت چوبی') {
//                $category = Category::where('child', 'like', '%' . 'ساعت' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'عصا' or $title == 'عصا چوبی' or $title == 'عصای چوبی') {
//                $category = Category::where('child', 'like', '%' . 'عصا' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'سندبلاست' or $title == 'سند بلاست') {
//                $category = Category::where('child', 'سندبلاست')->orwhere('child', 'سند بلاست')
//                    ->orwhere('child', 'like', '%' . 'بلاست' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'نانوآنتیک' or $title == 'نانو آنتیک') {
//                $category = Category::where('child', 'like', '%' . 'نانوآنتیک' . '%')->orwhere('child', 'like', '%' . 'نانو آنتیک' . '%')->
//                orwhere('child', 'like', '%' . 'نانو' . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            } elseif ($title == 'amazing' or $title == 'شگفت انگیز') {
//                $products = Product::where('amazing', true)->where('final_price', '<=', $to)->where('final_price', '>=', $from)->get()->toArray();
//            } else {
//                $category = Category::where('child', 'like', '%' . $title . '%')->get();
//
//                $products = \Illuminate\Database\Eloquent\Collection::empty()->toArray();
//                foreach ($category as $cat) {
//                    $products += $cat->products->where('final_price', '<=', $to)->where('final_price', '>=', $from)->toArray();
//                }
//            }
//        }
//
//
//        return view('site.products.category', compact('title', 'products', 'from', 'to'));
//    }

    public function search(Request $request)
    {
//        $category = Category::where('child', 'like', '%' . substr($request->category,2,10) . '%')->first();
//        if (!empty($category)){
//            $products = $category->products()->where('title', 'like', '%' . $request->search_input . '%')->get()->toArray();
//        }else{
            $products = Product::where('title', 'like', '%' . $request->search_input . '%')->get();
//        }
//        $title = $request->search_input;
        return view('site.products.search', compact( 'products'));
    }


    public function about()
    {
        return view('site.general.about_us');
    }


    public function branchs()
    {
        return view('site.general.branchs');
    }

    public function oath()
    {
        return view('site.general.oath');
    }

    public function regulation()
    {
        return view('site.general.regulation');
    }
    public function consultation()
    {
        return view('site.general.consultation');
    }
    public function support()
    {
        return view('site.general.support');
    }
    public function services()
    {
        return view('site.general.services');
    }

    public function singleVideo($code,$video)
    {
        return view('site.general.single_video',compact('code','video'));
    }

    public function whyArsa()
    {
        $pathToImage =public_path().'/images/site/rsa_icon.png';
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($pathToImage);
        return view('site.general.whyArsa');
    }


    public function defineArsa()
    {
        return view('site.general.defineArsa');
    }

    public static function recaptcha()
    {
        $a = rand(0,10);
        $b = rand(0,10);
        return compact('a','b');
    }

    public function showCatalog()
    {
        return view('site.general.catalog');
    }


}
