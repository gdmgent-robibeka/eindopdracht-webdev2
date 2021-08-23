<?php

use App\Http\Controllers\Dashboard\PageController as DashboardPageController;
use App\Http\Controllers\Dashboard\Shop\ShopController as DashboardShopController;
use App\Http\Controllers\Pages\Contact\ContactController;
use App\Http\Controllers\Pages\News\NewsController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\Shop\ShopController;
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

Route::get('/login', function() {
    return view('login');
});
Route::get('/register', function() {
    return view('register');
});

// Admin dashboard routes
Route::middleware(['auth'])->group(function() {
    Route::prefix('dashboard')->name('dashboard')->group(function() {
        Route::get('/', function() {
            return view('dashboard');
        })->name('.index');

        Route::prefix('/pages')->name('.pages')->group(function() {
            Route::get('/', [DashboardPageController::class, 'index']);

            Route::get('/edit/{page}', [DashboardPageController::class, 'edit'])->name('.edit');
            Route::post('/edit/{page}', [DashboardPageController::class, 'postEdit'])->name('.edit');

            Route::get('/edit/{page}/{language}', [DashboardPageController::class, 'editContent'])->name('.editContent');
            Route::post('/edit/{page}/{language}', [DashboardPageController::class, 'postEditContent'])->name('.editContent');
        });

        Route::prefix('/shop')->name('.shop')->group(function() {
            Route::get('/', [DashboardShopController::class, 'index']);
        });
    });
});

// News routes
Route::get('/{locale}/news/{slug}', [NewsController::class, 'index'])->name('pages.news');
Route::get('/{locale}/newsletter', [NewsController::class, 'signUp'])->name('newsletter.index');
Route::post('/newsletter', [NewsController::class, 'storeSignUp'])->name('newsletter');

// Standard page routes
Route::get('/{locale?}', [PageController::class, 'view'])->name('pages.home');
Route::get('/{locale}/{page}', [PageController::class, 'view'])->name('pages.page');

// Contact mail routes
Route::post('/contact', [ContactController::class, 'sendMail'])->name('pages.contact');



// Shop routes
Route::prefix('/{locale}/shop')->name('shop')->group(function() {
    Route::get('/order', [ShopController::class, 'viewForm'])->name('.order');
    Route::post('/order', [ShopController::class, 'order'])->name('.order');

    Route::get('/order/{order}', [ShopController::class, 'getOrder'])->name('.order.status');

    Route::get('/{slug}', [ShopController::class, 'index'])->name('.product');
    Route::post('/cart', [ShopController::class, 'addToCart'])->name('.cart');
});

Route::post('/webhooks/mollie', [ShopController::class, 'webhook'])->name('webhooks.mollie');

require __DIR__.'/auth.php';
