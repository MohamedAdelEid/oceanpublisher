<?php

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

/**
 * This is Admin Routes Controllers.
 */
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SerialController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\LookupController;
use App\Http\Controllers\Admin\UserController;



/**
 * Routing Regular Expression.
 */
Route::pattern('id','[0-9]+');

/**
 * Read the Notifications Route.
 */
Route::get('readNotifications/{notify_id}', function($id) {
    
    $notifyDB = \DB::table('notifications')->where('id', $id)->first();
    $timeDate = \Carbon\Carbon::now();
    $notify = \DB::table('notifications')->where('id', $id)->update(['read_at' => $timeDate->toDateTimeString()]);
    $data = json_decode($notifyDB->data);

    return redirect()->to($data->url);
});

/**
* Auth Routes.
*/
Auth::routes(['verify' => true]);


/**
 * Website Routes.
*/
Route::get('/', [WebsiteController::class, 'index'])->name('/');
Route::get('searching', [WebsiteController::class, 'searching'])->name('searching');
Route::get('/category/{category}', [WebsiteController::class, 'getCategoryProducts'])->name('showCategory');
Route::get('/sub-category/{category}', [WebsiteController::class, 'getSubCategory'])->name('showSubCategory');
Route::get('/product/{product}', [WebsiteController::class, 'getProduct'])->name('showProduct');
Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('aboutUs');
// Route::get('/faqs', [WebsiteController::class, 'FAQs'])->name('faqs');
Route::get('/career', [WebsiteController::class, 'careerForm'])->name('career');
Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contactUs');
Route::post('/contact-message/{page}', [WebsiteController::class, 'contactMessage'])->name('contactMessage');
Route::post('/newsletter', [WebsiteController::class, 'subscribeNewsletter'])->name('storeNewsletter');
Route::post('/download', [WebsiteController::class, 'downloadSource'])->name('downloadSource');
Route::get('/privacy-policy', [WebsiteController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-and-conditions', [WebsiteController::class, 'termsAndConditions'])->name('termsAndConditions');

/**
 * Admin Portal Routes.
*/
Route::group(['middleware' => ['auth', 'verified', 'adminAuth'], 'prefix' => env('APP_ADMIN_PREFIX')], function() {

    /**
     * Clear the system caches.
     */
    Route::get('clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return redirect()->route('/');
    });

    /**
     * Link the storage folders.
     */
    Route::get('linkstorage', function () {
        Artisan::call('storage:link');
        return redirect()->route('/');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('serials', SerialController::class);
    Route::get('serials/{product}/edit-group', [SerialController::class, 'editGroup'])->name('serials.edit-group');
    Route::put('serials/{product}/edit-group', [SerialController::class, 'updateGroup'])->name('serials.update-group');
    Route::resource('categories', CategoryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('faqs', FAQController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('newsletters', NewsletterController::class)->only('index', 'destroy');
    Route::resource('messages', MessageController::class)->only('index', 'show', 'destroy');
    Route::resource('lookups', LookupController::class)->only('index', 'update');
    Route::resource('users', UserController::class);

});