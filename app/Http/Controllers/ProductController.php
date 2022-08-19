<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductHistory;
use App\Models\Property;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::where('type' , '=' ,  '1')->paginate(10);
        return view('panel/product/index', compact('products'));
    }

    public function approachs()
    {
        $products = Product::where('type', '2')->paginate(10);
        return view('panel/product/approachs', compact('products'));
    }

    public function insert()
    {
        $properties = DB::table('properties')->distinct()->pluck('property');
        $maincategories = DB::table('categories')->where('parent', '=', '')->distinct()->pluck('child');
        $childcategories = DB::table('categories')->where('parent', '!=', '')->distinct()->pluck('child');

        return view('panel/product/insert', compact('maincategories', 'properties', 'childcategories'));
    }


    public function store(Request $request)
    {
//        dd($request->all());
        if (auth()->user()->can('create', Product::class)) {

            $count = count($request->all());

            $categorymain = ($request->mainCategory) ? 'mainCategory' : 'mainCategorySelected';

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                $categorymain => ['required', 'string', 'max:255', Rule::notIn(['false'])],
                'inventory' => ['required'],
                'abstract' => ['string', 'max:255'],
                'price' => ['required', 'integer', 'max:1000000000000'],
                'image' => ['image'],
                'offprice' => ['max:1000000000000'],
                'amazing_time' => ['integer', 'min:1'],
                'off_reason' => ['max:250'],

            ]);


            if ($request->amazing) {
                if (empty($request->amazing_price)) {
                    throw ValidationException::withMessages([
                        'amazing_price' => ['باید قیمت شگفت انگیز وارد شود']
                    ]);
                }
            }
            if ($request->approach) {
                $type = 2;
            } else {
                $type = 1;
            }


            if ($request->off_reason) {
                $off_reason = $request->off_reason;
            } elseif (empty($request->off_reason) and $request->amazing) {
                $off_reason = 'تخفیف شگفت انگیز';
            } elseif (empty($request->off_reason) and empty($request->amazing) and $request->offprice) {
                $off_reason = 'تخفیف آرسا';
            } else {
                $off_reason = null;
            }

            if ($request->amazing and !empty($request->amazing_price)) {
                $final_price = $request->amazing_price;
            } elseif (!$request->amazing and $request->offprice) {
                $final_price = $request->offprice;
            } elseif (!$request->amazing and !$request->offprice) {
                $final_price = $request->price;
            }

            $slut = str_replace(' ','-',$request->name);

            $product = Product::create([
                'title' => $request->name,
                'slut' => $slut,
                'price' => $request->price,
                'type' => $type,
                'abstract' => ($request->abstract) ? $request->abstract : null,
                'offprice' => ($request->offprice) ? $request->offprice : null,
                'inventory' => $request->inventory,
                'inventory_display' => ($request->inventory_display) ? false : true,
                'amazing' => ($request->amazing) ? true : false,
                'amazing_time' => ($request->amazing) ? $request->amazing_time : null,
                'amazing_price' => ($request->amazing) ? $request->amazing_price : null,
                'off_reason' => $off_reason,
                'special' => ($request->special) ? true : false,
                'description' => ($request->text) ? $request->text : null,
                'final_price' => $final_price,

            ]);

            $product_history = ProductHistory::create([
                'product_id' => $product->id,
                'title' => $product->title,
                'slut' => $product->slut,
                'price' => $product->price,
                'type' => $product->type,
                'abstract' => $product->abstract,
                'offprice' => $product->offprice,
                'inventory' => $product->inventory,
                'amazing' => $product->amazing,
                'amazing_time' => $product->amazing_time,
                'amazing_price' => $product->amazing_price,
                'off_reason' => $product->$off_reason,
                'special' => $product->special,
                'description' => $product->description,
                'final_price' => $product->final_price,

            ]);

            if ($request->$categorymain) {
                $mainCategoryExist = DB::table('categories')->where('child', '=', $request->$categorymain)->where('parent', '=', '')->first();
                if (empty($mainCategoryExist)) {
                    $maincategory = Category::create([
                        'child' => $request->$categorymain,
                        'parent' => "",
                    ]);
                } else {
                    $maincategory = $mainCategoryExist;
                }
                $maincategories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $maincategory->id]);
            }


            for ($i = 1; $i < $count; $i++) {
                $x = "property" . $i;
                $y = "propertyInput" . $i;
                if (!empty($request->$x) and $request->$x != "false" and $request->$y != "false") {
                    $checkExist = DB::table('properties')->where('property', '=', $request->$x)->where('detail', '=', $request->$y)->first();
                    if (empty($checkExist)) {
                        $property = Property::create([
                            'property' => $request->$x,
                            'detail' => $request->$y
                        ]);
                    } else {
                        $property = $checkExist;
                    }
                    $product_properties = DB::insert('insert into products_properties (product_id, property_id) values (?, ?)', [$product->id, $property->id]);

                }


                $a = "child" . $i;
                $b = "childInput" . $i;
                $categorychild = ($request->$b) ? $b : $a;
                if (!empty($request->$categorychild) and $request->$categorychild !== 'false') {
                    if ($request->$categorychild == $request->$b) {
                        if ($i == 1) {
                            $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$b)->where('parent', '=', $request->$categorymain)->first();
                            if (empty($checkCategoryExist)) {
                                $category = Category::create([
                                    'child' => $request->$b,
                                    'parent' => $request->$categorymain,
                                ]);
                            } else {

                                $category = $checkCategoryExist;
                            }
                        } else {
                            $g = $i - 1;
                            $a1 = "child" . $g;
                            $b1 = "childInput" . $g;
                            $categorychild1 = ($request->$b1) ? $b1 : $a1;
                            $checkCategoryExist1 = DB::table('categories')->where('child', '=', $request->$b)->where('parent', '=', $request->$categorychild1)->first();
                            if (empty($checkCategoryExist1)) {
                                $category = Category::create([
                                    'child' => $request->$b,
                                    'parent' => $request->$categorychild1,
                                ]);
                            } else {

                                $category = $checkCategoryExist1;
                            }
                        }
                    } elseif ($request->$categorychild == $request->$a) {
                        if ($i == 1) {
                            $checkCategoryExist2 = DB::table('categories')->where('child', '=', $request->$a)->where('parent', '=', $request->$categorymain)->first();
                            if (empty($checkCategoryExist2)) {
                                $category = Category::create([
                                    'child' => $request->$a,
                                    'parent' => $request->$categorymain,
                                ]);
                            } else {
                                $category = $checkCategoryExist2;
                            }
                        } else {
                            $g = $i - 1;
                            $a1 = "child" . $g;
                            $b1 = "childInput" . $g;
                            $categorychild1 = ($request->$b1) ? $b1 : $a1;
                            $checkCategoryExist3 = DB::table('categories')->where('child', '=', $request->$a)->where('parent', '=', $request->$categorychild1)->first();
                            if (empty($checkCategoryExist3)) {
                                $category = Category::create([
                                    'child' => $request->$a,
                                    'parent' => $request->$categorychild1,
                                ]);
                            } else {
                                $category = $checkCategoryExist3;
                            }
                        }
                    }
                    $categories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $category->id]);
                }


                // codes for gallery //

                $image = "image" . $i;
                $imageCategory = "imageCategory" . $i;
                $imageTitle = "imageTitle" . $i;
                if ($request->$image) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/products/gallery', $file_name, 'public_files');

                    $imageTitle = ($request->$imageTitle) ? $request->$imageTitle : null;
                    $imageCategory = ($request->$imageCategory) ? $request->$imageCategory : null;

                    Gallery::create([
                        'product_id' => $product->id,
                        'image' => $file_name,
                        'title' => $imageTitle,
                        'category' => $imageCategory,
                    ]);
                }

                $video = "video" . $i;
                $videoCategory = "videoCategory" . $i;
                $videoTitle = "videoTitle" . $i;
                if ($request->$video) {
                    $file = $request->file('video' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('videos/products/gallery', $file_name, 'public_files');

                    $videoTitle = ($request->$videoTitle) ? $request->$videoTitle : null;
                    $videoCategory = ($request->$videoCategory) ? $request->$videoCategory : null;
                    Gallery::create([
                        'product_id' => $product->id,
                        'video' => $file_name,
                        'title' => $videoTitle,
                        'category' => $videoCategory,
                    ]);
                }


                    // tags import //
                $tag = "tag".$i;
                if ($request->$tag){
                    if (!empty($request->$tag)){
                        DB::insert('insert into product_tags (product_id, tag) values (?, ?)', [$product->id, $request->$tag]);
                    }
                }

            }

            $request->session()->flash('status', 'معرفی محصول با موفقیت انجام شد!');
            return redirect()->back();
        } else {
            abort('403', 'شما دسترسی ندارید');
        }
    }


    public function insertProperty()
    {
        return view('panel/product/insertproperty');
    }

    public function storeProperty(Request $request)
    {
        $checkExist = DB::table('properties')
            ->where('property', '=', $request->name)
            ->where('detail', '=', $request->detail)->first();
        if (empty($checkExist)) {
            $property = Property::create([
                "property" => $request->name,
                "detail" => $request->detail,
            ]);
            $request->session()->flash('status', 'معرفی ویژگی با موفقیت انجام شد!');
        } else {
            $request->session()->flash('error', 'این ویژگی قبلا در سیستم ثبت شده است!');
        }

        return back();

    }


    public function editorUpload(Request $request)
    {
        $file = $request->file('upload');
        // logo.png
        $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
        $ext = $file->getClientOriginalExtension(); // png

        $file_name = $base_name . '_' . time() . '.' . $ext;
        $file->storeAs('images/banners', $file_name, 'public_files');

        $function = $request->CKEditorFuncNum;
        $url = asset('public/images/banners/' . $file_name);

        return response("<script>window.parent.CKEDITOR.tools.callFunction({$function}, '{$url}', 'فایل به درستی اپلود شد')</script>");
    }


    public function destroy($id)
    {
        if (auth()->user()->can('delete', Product::class)) {

            $product = DB::table('products')->where('id', '=', $id)->first();
            if ($product) {
                Product::destroy($id);
            }


            session()->flash('status', 'محصول با موفقیت حذف شد');

            return back();
        }
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categoryCount = count($product->categories);
        $productCategories = $product->categories;

        $images = $product->galleries->where('video', '=', null);
        $videos = $product->galleries->where('image', '=', null);

        $productProperties = $product->properties;
        $propertyCount = count($product->properties);
        $properties = DB::table('properties')->distinct()->pluck('property');
        $maincategories = DB::table('categories')->where('parent', '=', '')->distinct()->pluck('child');
        $childcategories = DB::table('categories')->where('parent', '!=', '')->distinct()->pluck('child');

        return view('panel/product/edit', compact('product', 'properties', 'maincategories', 'childcategories', 'categoryCount', 'productCategories', 'productProperties', 'propertyCount', 'images', 'videos'));
    }

    public function GalleryStoreEdit(Request $request, Gallery $id)
    {
        if (auth()->user()->can('create', Product::class)) {
            $request->validate([
                'image' => ['image'],
                'imageTitle' => ['max:255'],
            ]);
            $category = ($request->imageCategory)? $request->imageCategory : null;
            $title = ($request->imageTitle) ? $request->imageTitle : null;
            if (empty($request->image and $title == $id->title and $category == $id->category)) {
                $id->delete();
                $request->session()->flash('status', 'عکس مورد نظر با موفقیت حذف شد.');
            } else {
                $file = $request->file('image');
                $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                $ext = $file->getClientOriginalExtension(); // png
                $file_name = $base_name . '_' . time() . '.' . $ext;
                $file->storeAs('images/products/gallery', $file_name, 'public_files');
                $id->update([
                    'image' => $file_name,
                    'title' => $request->imageTitle,
                    'category' => $category,
                ]);
                $request->session()->flash('status', 'عکس مورد نظر با موفقیت ویرایش شد.');
            }
        }
        return back();
    }

    public function videoStoreEdit(Request $request, $id)
    {
        if (auth()->user()->can('create', Product::class)) {
            $request->validate([
                'video' => ['video'],
                'videoCategory' => ['max:255'],
            ]);
            $video = Gallery::where('id', '=', $id)->first();
            $category = ($request->videoCategory)? $request->category : null;
            $title = ($request->videoTitle)?$request->videoTitle:null;
            if (empty($video)) {
                $request->session()->flash('error', 'ویدئو مورد نظر یافت نشد.');
            } else {
                if (empty($request->video) and $category == $video->category and $title == $video->title) {
                    $video->delete();
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت حذف شد.');
                } else {
                    $file = $request->file('video');
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . '_' . time() . '.' . $ext;
                    $file->storeAs('videos/products/gallery', $file_name, 'public_files');
                    $video->update([
                        'video' => $file_name,
                        'title' => $title,
                        'category' => $category,
                    ]);
                    $request->session()->flash('status', 'ویدئو مورد نظر با موفقیت ویرایش شد.');
                }
            }
        }
        return back();
    }

    public function StoreEdit(Request $request)
    {
//        dd($request->all());
        $count = count($request->all());
        $product = Product::findOrFail($request->productId);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'abstract' => ['string', 'max:255'],
            'inventory' => ['required'],
            'price' => ['required', 'integer', 'max:1000000000000'],
            'image' => ['image'],
            'offprice' => ['max:1000000000000'],
            'amazing_time' => ['integer', 'min:1'],
            'off_reason' => ['max:250'],
        ]);
        if ($request->off_reason) {
            $off_reason = $request->off_reason;
        } elseif (empty($request->off_reason) and $request->amazing) {
            $off_reason = 'تخفیف شگفت انگیز';
        } elseif (empty($request->off_reason) and empty($request->amazing) and $request->offprice) {
            $off_reason = 'تخفیف آرسا';
        } else {
            $off_reason = null;
        }
        if ($request->amazing) {
            if (empty($request->amazing_price)) {
                throw ValidationException::withMessages([
                    'amazing_price' => ['باید قیمت شگفت انگیز وارد شود']
                ]);
            }
        }
        if ($request->approach) {
            $type = 2;
        } else {
            $type = 1;
        }
        if ($request->amazing) {
            $final_price = $request->amazing_price;
        } elseif (!$request->amazing and $request->offprice) {
            $final_price = $request->offprice;
        } elseif (!$request->amazing and !$request->offprice) {
            $final_price = $request->price;
        }
        if ($product->inventory == 0 and $request->inventory > 0){
            $product->sendReminderSms();
        }
        $abstract = ($request->abstract) ? $request->abstract : null;
        if (auth()->user()->can('update', Product::class)) {
            if ($product->title != $request->name or $product->abstract != $request->abstract or $product->inventory != $request->inventory or $product->price != $request->price or $product->offprice != $request->offprice or $product->description != $request->text or $product->off_reason != $off_reason or $product->type != $type) {
                $product->update(
                    [
                        'title' => $request->name,
                        'type' => $type,
                        'off_reason' => $off_reason,
                        'abstract' => $abstract,
                        'price' => $request->price,
                        'offprice' => $request->offprice,
                        'description' => $request->text,
                        'final_price' => $final_price,
                        'inventory' => $request->inventory,
                    ]);
            }

            $slut = str_replace(' ','-',$request->name);
            $product->update([
                'slut' => $slut,
            ]);

            if ($request->inventory_display) {
                DB::update('update products set  inventory_display=:inventory_display where id=:id', [
                    'inventory_display' => false,
                    'id' => $request->productId,
                ]);
            } elseif (!($request->inventory_display)) {
                DB::update('update products set  inventory_display=:inventory_display where id=:id', [
                    'inventory_display' => true,
                    'id' => $request->productId,
                ]);
            }
            if ($request->amazing) {
                if (empty($request->amazing_price)) {
                    throw ValidationException::withMessages([
                        'amazing_price' => ['باید قیمت شگفت انگیز وارد شود']
                    ]);
                }
                DB::update('update products set  amazing=:amazing, amazing_time=:amazing_time, amazing_price=:amazing_price where id=:id', [
                    'amazing' => true,
                    'amazing_time' => $request->amazing_time,
                    'amazing_price' => $request->amazing_price,
                    'id' => $request->productId,
                ]);
            } elseif (!($request->amazing)) {
                DB::update('update products set  amazing=:amazing, amazing_time=:amazing_time, amazing_price=:amazing_price where id=:id', [
                    'amazing' => false,
                    'amazing_time' => null,
                    'amazing_price' => null,
                    'id' => $request->productId,
                ]);
            }
            if ($request->special) {
                $product->update([
                    'special' => true,
                ]);
            } elseif (!($request->special)) {
                $product->update([
                    'special' => false,
                ]);
            }

            $product_history = ProductHistory::create([
                'product_id' => $product->id,
                'title' => $product->title,
                'slut' => $product->slut,
                'price' => $product->price,
                'type' => $product->type,
                'abstract' => $product->abstract,
                'offprice' => $product->offprice,
                'inventory' => $product->inventory,
                'amazing' => $product->amazing,
                'amazing_time' => $product->amazing_time,
                'amazing_price' => $product->amazing_price,
                'off_reason' => $product->$off_reason,
                'special' => $product->special,
                'description' => $product->description,
                'final_price' => $product->final_price,

            ]);

            DB::table('categories_products')->where('product_id', '=', $request->productId)->delete();
            DB::table('products_properties')->where('product_id', '=', $request->productId)->delete();


            for ($i = 1; $i <= 9; $i++) {
                $cat = "catchild" . $i;
                if ($request->$cat and $request->$cat !== 'false') {
                    if ($i == 1) {
                        $mainCategoryExist = DB::table('categories')->where('child', '=', $request->$cat)->where('parent', '=', '')->first();
                        if (empty($mainCategoryExist)) {
                            $maincategory = Category::create([
                                'child' => $request->$cat,
                                'parent' => "",
                            ]);
                        } else {
                            $maincategory = $mainCategoryExist;
                        }
                        $maincategories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $maincategory->id]);
                    } else {
                        $g = $i - 1;
                        $cat1 = "catchild" . $g;
                        $parent = $request->$cat1;
                        $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$cat)->where('parent', '=', $parent)->first();
                        if (empty($checkCategoryExist)) {
                            $category = Category::create([
                                'child' => $request->$cat,
                                'parent' => $parent,
                            ]);
                        } else {
                            $category = $checkCategoryExist;
                        }
                        $categories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $category->id]);

                    }
                }
            }

            for ($i = 1; $i <= 9; $i++) {
                $child = "child" . $i;
                $childInput = "childInput" . $i;
                $input = ($request->$childInput) ? $childInput : $child;
                $parent1 = $product->categories->last()->toArray();
                $parent2 = $parent1['child'];
                $parent = (is_string($parent2)) ? $parent2 : "";

                if (!empty($request->$input) and $request->$input) {

                    if ($request->$input == $request->$childInput and $request->$input !== 'false') {
                        if ($i == 1) {
                            $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$childInput)->where('parent', '=', $parent)->first();
                            if (empty($checkCategoryExist)) {
                                $category = Category::create([
                                    'child' => $request->$childInput,
                                    'parent' => $parent,
                                ]);
                            } else {
                                $category = $checkCategoryExist;
                            }
                        } else {
                            $g = $i - 1;
                            $a1 = "child" . $g;
                            $b1 = "childInput" . $g;
                            $categorychild1 = ($request->$b1) ? $b1 : $a1;
                            $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$childInput)->where('parent', '=', $request->$categorychild1)->first();
                            if (empty($checkCategoryExist)) {
                                $category = Category::create([
                                    'child' => $request->$childInput,
                                    'parent' => $request->$categorychild1,
                                ]);
                            } else {
                                $category = $checkCategoryExist;
                            }
                        }

                        $categories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $category->id]);

                    } elseif ($request->$input == $request->$child and $request->$input !== 'false') {
                        if ($i == 1) {
                            $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$child)->where('parent', '=', $parent)->first();
                            if (empty($checkCategoryExist)) {
                                $category = Category::create([
                                    'child' => $request->$child,
                                    'parent' => $parent,
                                ]);
                            } else {
                                $category = $checkCategoryExist;
                            }
                        } else {
                            $g = $i - 1;
                            $a1 = "child" . $g;
                            $b1 = "childInput" . $g;
                            $categorychild1 = ($request->$b1) ? $b1 : $a1;
                            $checkCategoryExist = DB::table('categories')->where('child', '=', $request->$child)->where('parent', '=', $request->$categorychild1)->first();
                            if (empty($checkCategoryExist)) {
                                $category = Category::create([
                                    'child' => $request->$child,
                                    'parent' => $request->$categorychild1,
                                ]);
                            } else {
                                $category = $checkCategoryExist;
                            }
                        }

                        $categories_product = DB::insert('insert into categories_products (product_id, category_id) values (?, ?)', [$product->id, $category->id]);
                    }
                }


                //for property inserted //

                $property = 'property' . $i;
                $detail = 'detail' . $i;

                if (!empty($request->$property) and !empty($request->$detail)) {
                    $checkExist = DB::table('properties')->where('property', '=', $request->$property)->where('detail', '=', $request->$detail)->first();
                    if (empty($checkExist)) {
                        $property = Property::create([
                            'property' => $request->$property,
                            'detail' => $request->$detail
                        ]);
                    } else {
                        $property = $checkExist;
                    }
                    $product_properties = DB::insert('insert into products_properties (product_id, property_id) values (?, ?)', [$product->id, $property->id]);
                }


                $rowproperty = 'rowproperty' . $i;
                $rowdetail = 'rowpropertyInput' . $i;

                if (!empty($request->$rowproperty) and !empty($request->$rowdetail)) {
                    $checkExist = DB::table('properties')
                        ->where('property', '=', $request->$rowproperty)
                        ->where('detail', '=', $request->$rowdetail)->first();
                    if (empty($checkExist)) {
                        $property = Property::create([
                            'property' => $request->$rowproperty,
                            'detail' => $request->$rowdetail
                        ]);
                    } else {
                        $property = $checkExist;
                    }
                    $propertyProductChekExist = DB::table('products_properties')
                        ->where('product_id', '=', $product->id)
                        ->where('property_id', '=', $property->id)->first();
                    if (empty($propertyProductChekExist)) {
                        $product_properties = DB::insert('insert into products_properties (product_id, property_id) values (?, ?)', [$product->id, $property->id]);
                    }
                }
            }

            /** clear tags */
            DB::table('product_tags')->where('product_id',$product->id)->delete();

            /** for gallery update */
            for ($i = 1; $i < $count; $i++) {
                $image = "image" . $i;
                $imageCategory = "imageCategory" . $i;
                $imageTitle = "imageTitle" . $i;
                if ($request->$image) {
                    $file = $request->file('image' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('images/products/gallery', $file_name, 'public_files');
                    $imageTitle = ($request->$imageTitle) ? $request->$imageTitle : null;
                    $imageCategory = ($request->$imageCategory) ? $request->$imageCategory : null;
                    Gallery::create([
                        'product_id' => $product->id,
                        'image' => $file_name,
                        'title' => $imageTitle,
                        'category' => $imageCategory,
                    ]);
                }

                $video = "video" . $i;
                $videoCategory = "videoCategory" . $i;
                $videoTitle = "videoTitle" . $i;
                if ($request->$video) {
                    $file = $request->file('video' . $i);
                    $base_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // logo
                    $ext = $file->getClientOriginalExtension(); // png
                    $file_name = $base_name . $i . '_' . time() . '.' . $ext;
                    $file->storeAs('videos/products/gallery', $file_name, 'public_files');
                    $videoTitle = ($request->$videoTitle) ? $request->$videoTitle : null;
                    $videoCategory = ($request->$videoCategory) ? $request->$videoCategory : null;
                    Gallery::create([
                        'product_id' => $product->id,
                        'video' => $file_name,
                        'title' => $videoTitle,
                        'category' => $videoCategory,
                    ]);
                }

                // tags import //

                $tag = "tag".$i;
                if ($request->$tag){
                    if (!empty($request->$tag)){
                        DB::insert('insert into product_tags (product_id, tag) values (?, ?)', [$product->id, $request->$tag]);
                    }
                }
            }

        }

        $request->session()->flash('status', 'ویرایش اطلاعات انجام شد!');
        return back();

    }


}
