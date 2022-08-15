<?php

use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('clear_cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});


require __DIR__ . '/auth.php';

Route::get('/products', 'SiteProductController@allProducts')
    ->name('allProducts');

Route::get('/approachs', 'SiteProductController@allApproachs')
    ->name('allApproachs');

Route::get('/productpage/{product}/{slut}', 'SiteProductController@index')
    ->name('productpage');

Route::get('/productpage/{product}', 'SiteProductController@pastSingle')
    ->name('pastSingle');

Route::get('/catalog' , 'HomeController@showCatalog')
    ->name('showCatalog');

Route::get('/catalog/download' , 'HomeController@downloadCatalog')
    ->name('downloadCatalog');

Route::get('/news/{id}/{slut}', 'NewsController@single')
    ->name('news.single');

Route::get('/learn/{id}/{slut}', 'LearnController@single')
    ->name('learn.single');

Route::get('/all-learn', 'LearnController@all')
    ->name('learn.all');


Route::get('/projects/{id}', 'ProjectController@single')
    ->name('project.single');

Route::get('/all-projects','ProjectController@all')
    ->name('project.all');

Route::get('/news', 'NewsController@all')
    ->name('news');

Route::get('/arsa-reasons', 'HomeController@whyArsa')
    ->name('why.arsa');

Route::get('/arsa-define', 'HomeController@defineArsa')
    ->name('define.arsa');

Route::get('/video/{code}/{video}', 'HomeController@singleVideo')
    ->name('video.single');

Route::post('/likes/{product}', [LikeController::class, 'store'])
    ->name('like')->middleware(['auth']);

Route::get('/wishlist', 'LikeController@wishlist')
    ->name('wishlist')->middleware(['auth']);

Route::get('/category/{title}', 'HomeController@category')
    ->name('category');

Route::get('/search', 'HomeController@search')
    ->name('search');

Route::get('/about-us', 'HomeController@about')
    ->name('about.us');

Route::get('/consultation', 'HomeController@consultation')
    ->name('consultation');

Route::get('/support', 'HomeController@support')
    ->name('support');

Route::get('/services', 'HomeController@services')
    ->name('services');

Route::get('/contact-us', 'ContactController@index')
    ->name('contact.us');

Route::post('/contact-us', 'ContactController@register')
    ->name('contact.register');

Route::get('/branchs', 'HomeController@branchs')
    ->name('branchs');

Route::get('/arsa-oath', 'HomeController@oath')
    ->name('oath');

Route::get('/arsa-regulation', 'HomeController@regulation')
    ->name('regulation');

Route::post('/reminder/{id}','ReminderController@create')
    ->name('reminder.create')->middleware(['auth']);


Route::get('/forget-password', 'PasswordController@forgetPassword')
    ->name('forget-pass');

Route::post('/insert-code', 'PasswordController@insertCode')
    ->name('insert-code');

Route::post('/confirm-code/{mobile}', 'PasswordController@confirmCode')
    ->name('confirm-code');


Route::group(['middleware' => ['auth'], 'prefix' => 'cart'], function () {

    Route::get('/', 'CartController@index')
        ->name('cart.index');

    Route::get('/ordering','OrderController@index')
        ->name('ordering');

    Route::post('/{product}', 'CartController@store')
        ->name('cart.store');

    Route::put('/plus/{id}', 'CartController@plus')
        ->name('quantity.plus');

    Route::put('/minus/{id}', 'CartController@minus')
        ->name('quantity.minus');

    Route::delete('/delet/{id}', 'CartController@delete')
        ->name('cart.delete');

    Route::post('/ordering/offcode','OffcodeController@register')
        ->name('offcode.register');

    Route::get('/purchase', 'PurchaseController@purchase')
        ->name('purchase');

    Route::get('/purchase/result', 'PurchaseController@result')
        ->name('purchase.result');

});


Route::group(['middleware' => ['auth'], 'prefix' => 'transactions'], function () {

    Route::group(['prefix' => 'report'], function () {
        Route::get('/successful', 'TransactionsController@successful')
            ->name('transactions.successful');

        Route::get('/failed', 'TransactionsController@failed')
            ->name('transactions.failed');

        Route::get('/invoice/{id}', 'TransactionsController@invoice')
            ->name('invoice');

        Route::get('/failed-invoice/{message}', 'TransactionsController@failedInvoice')
            ->name('failed-invoice');
    });



    Route::group(['middleware' => ['admin'],'prefix' => 'status'], function () {
        Route::get('/registered', 'TransactionsController@registered')
            ->name('transactions.registered');

        Route::get('/ready', 'TransactionsController@ready')
            ->name('transactions.ready');

        Route::get('/sent', 'TransactionsController@sent')
            ->name('transactions.sent');

        Route::get('/total', 'TransactionsController@total')
            ->name('transactions.total');

    });

    Route::group(['middleware' => ['storekeeper'],'prefix' => 'status'], function () {

        Route::get('/confirmed', 'TransactionsController@confirmed')
            ->name('transactions.confirmed');

        Route::get('/preparing', 'TransactionsController@preparing')
            ->name('transactions.preparing');

    });

    Route::put('/edit-status/{orderStatus}', 'TransactionsController@editOrderStatus')
        ->name('orderStatus.edit');

});

/* start of prefix panel */
Route::group(['middleware' => ['auth'], 'prefix' => 'panel'], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', 'UserController@profile')
        ->name('profile');

    Route::get('/users-index', 'UserController@index')
        ->name('users.index');

    Route::get('/interduce-user', 'UserController@InterduceUser')
        ->name('InterduceUser');

    Route::post('/interduce-user', 'UserController@InterduceStore')
        ->name('interduce.store');

    Route::post('/interduce-user-check-code/{mobile}','UserController@InterduceUserCheckCode')
        ->name('introduce-check-code');

    Route::post('/set-identifier/{refralcode}','UserController@setIdentifier')
        ->name('set.identifier')->middleware(['admin']);

    Route::get('/getusers', 'UserController@getusers')
        ->name('getusers');

    Route::put('/getusers/{refralcode}', 'UserController@editusers')
        ->name('editusers')->middleware(['manager']);

    Route::delete('/deleteUser/{refralcode}', 'UserController@destroy')
        ->name('deleteUser')->middleware(['admin']);

    Route::get('/edit-data', 'UserController@editData')
        ->name('editData');

    Route::put('/edit-data', 'UserController@storeEditData')
        ->name('editData.store');

    Route::get('/changePassword', 'UserController@changePassword')
        ->name('changePassword');

    Route::put('/changePassword', 'UserController@saveChangedPassword')
        ->name('changePassword.store');

    Route::get('/messages/unread-messages','ContactController@unreadMessages')
        ->name('contact.unreadMessages')->middleware(['manager']);

    Route::get('/messages/read-messages','ContactController@readMessages')
        ->name('contact.readMessages')->middleware(['manager']);

    Route::get('/single-message/{id}','ContactController@singleMessage')
        ->name('contact.singleMessage')->middleware(['manager']);


    Route::group(['middleware' => ['admin'], 'prefix' => 'offcodes'], function () {
        Route::get('/','OffcodeController@index')
            ->name('offcodes.index');

        Route::get('/create','OffcodeController@create')
            ->name('offcodes.create');

        Route::post('/create','OffcodeController@store')
            ->name('offcodes.store');

        Route::get('/edit/{offcode}','OffcodeController@edit')
            ->name('offcodes.edit');

        Route::put('/edit/{offcode}','OffcodeController@storeEdit')
            ->name('offcodes.edit.store');
    });


    Route::group(['middleware' => ['manager'], 'prefix' => 'product'], function () {
        Route::get('/index', 'ProductController@index')
            ->name('product.index');

        Route::get('/approachs', 'ProductController@approachs')
            ->name('product.approachs');

        Route::get('/insert', 'ProductController@insert')
            ->name('product.insert');

        Route::post('/insert', 'ProductController@store')
            ->name('product.store');

        Route::delete('/destroy/{id}', 'ProductController@destroy')
            ->name('product.destroy');

        Route::get('/edit', 'ProductController@edit')
            ->name('product.edit');

        Route::get('/insertProperty', 'ProductController@insertProperty')
            ->name('insertProperty');

        Route::post('/insertProperty', 'ProductController@storeProperty')
            ->name('property.insert');

        Route::post('/editor/upload', 'ProductController@editorUpload')
            ->name('editorUpload');

        Route::get('/edit/{id}', 'ProductController@edit')
            ->name('product.edit');

        Route::put('/edit', 'ProductController@StoreEdit')
            ->name('product.storeEdit');

        Route::put('/gallery-edit/{id}', 'ProductController@GalleryStoreEdit')
            ->name('gallery.storeEdit');

        Route::put('/product-video-edit/{id}', 'ProductController@videoStoreEdit')
            ->name('productVideo.storeEdit');

    });

    Route::group(['middleware' => ['admin'], 'prefix' => 'reports'], function () {
        Route::get('/', 'ReportsController@index')
            ->name('reports.index');

        Route::get('/caractor/{id}', 'ReportsController@caractor')
            ->name('reports.caractor');

    });

    Route::group(['middleware' => ['manager'], 'prefix' => 'comments'], function () {

        Route::get('/', 'CommentController@index')
            ->name('comments.index');

        Route::get('/to-confirm', 'CommentController@toConfirm')
            ->name('comments.toConfirm');

        Route::get('/cancelled', 'CommentController@cancelled')
            ->name('comments.cancelled');

    });


    Route::group(['prefix' => 'news'], function () {
        Route::get('/show}', 'NewsController@show')
            ->name('news.show')->middleware(['manager']);

        Route::delete('/destroy/{id}', 'NewsController@destroy')
            ->name('news.destroy')->middleware(['manager']);

        Route::post('/store', 'NewsController@store')
            ->name('news.store')->middleware(['manager']);

        Route::get('/add}', 'NewsController@addnews')
            ->name('add.news')->middleware(['manager']);

        Route::get('/edit/{id}', 'NewsController@edit')
            ->name('news.edit')->middleware(['manager']);

        Route::put('/edit/{id}', 'NewsController@storeEdit')
            ->name('news.storeEdit')->middleware(['manager']);

        Route::put('/edit-image/{id}', 'NewsController@newsImageStoreEdit')
            ->name('newsImage.storeEdit')->middleware(['manager']);

        Route::put('/edit-video/{id}', 'NewsController@newsVideoStoreEdit')
            ->name('newsVideo.storeEdit')->middleware(['manager']);

        Route::post('/editor/upload', 'NewsController@editorUpload')
            ->name('newsEditorUpload');

    });

    Route::group(['prefix' => 'learn','middleware'=>(['manager'])], function () {
        Route::get('/list}', 'LearnController@list')
            ->name('learn.list');

        Route::delete('/destroy/{id}', 'LearnController@destroy')
            ->name('learn.destroy');

        Route::delete('/destroy-learn-product/{product}/{learn}', 'LearnController@destroyLearnProduct')
            ->name('learnProduct.destroy');

        Route::post('/store', 'LearnController@store')
            ->name('learn.store');

        Route::get('/add}', 'LearnController@addLearn')
            ->name('learn.add');

        Route::get('/edit/{id}', 'LearnController@edit')
            ->name('learn.edit');

        Route::put('/edit/{id}', 'LearnController@storeEdit')
            ->name('learn.storeEdit');

        Route::put('/edit-image/{id}', 'LearnController@learnImageStoreEdit')
            ->name('learnImage.storeEdit');

        Route::put('/edit-video/{id}', 'LearnController@learnVideoStoreEdit')
            ->name('learnVideo.storeEdit');

        Route::post('/editor/upload', 'LearnController@editorUpload')
            ->name('learnEditorUpload');

    });

    Route::group(['prefix' => 'project','middleware'=>(['manager'])], function () {
        Route::get('/list}', 'ProjectController@list')
            ->name('project.list');

        Route::delete('/destroy/{id}', 'ProjectController@destroy')
            ->name('project.destroy');

        Route::post('/store', 'ProjectController@store')
            ->name('project.store');

        Route::get('/add}', 'ProjectController@addProject')
            ->name('project.add');

        Route::get('/edit/{id}', 'ProjectController@edit')
            ->name('project.edit');

        Route::put('/edit/{id}', 'ProjectController@storeEdit')
            ->name('project.storeEdit');

        Route::put('/edit-image/{id}', 'ProjectController@projectImageStoreEdit')
            ->name('projectImage.storeEdit');

        Route::put('/edit-video/{id}', 'ProjectController@projectVideoStoreEdit')
            ->name('projectVideo.storeEdit');
    });

    Route::group(['prefix' => 'representation','middleware'=>(['manager'])], function () {
        Route::get('/unreadUsers' , 'RepresentationController@unreadUsers')
            ->name('representation.unread');
        Route::get('/readUsers' , 'RepresentationController@readUsers')
            ->name('representation.read');
        Route::get('/single/{id}' , 'RepresentationController@single')
            ->name('representation.single');
    });

});
/** end prefix panel  */


Route::group(['middleware' => ['auth'], 'prefix' => 'comment'], function () {
    Route::post('/store/{product}', 'CommentController@store')
        ->name('comment.store');

    Route::delete('/destroy/{comment}', 'CommentController@destroy')
        ->name('comment.destroy')->middleware(['manager']);

    Route::post('/confirm/{comment}', 'CommentController@confirm')
        ->name('comment.confirm')->middleware(['manager']);

    Route::post('/cancel/{comment}', 'CommentController@cancel')
        ->name('comment.cancel')->middleware(['manager']);

});

/** start prefix invoice  */
Route::group(['prefix' => 'invoice'], function () {
    Route::get('/input','InvoiceCalculatorController@input')
        ->name('invoiceCalculator.input');
    Route::post('/output','InvoiceCalculatorController@output')
        ->name('invoiceCalculator.output');
});
/** end prefix invoice  */

/** start prefix representation  */
Route::group(['prefix' => 'representation'], function () {
    Route::get('/representation' , 'RepresentationController@representation')
        ->name('representation');
    Route::Post('/representation/store' , 'RepresentationController@store')
        ->name('representation.store');
});
/** end prefix representation  */

