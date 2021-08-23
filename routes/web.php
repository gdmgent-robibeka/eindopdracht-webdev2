<?php

use App\Http\Controllers\Dashboard\PageController as DashboardPageController;
use App\Http\Controllers\Dashboard\Shop\ShopController as DashboardShopController;
use App\Http\Controllers\Pages\Contact\ContactController;
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

Route::get('/{locale?}', [PageController::class, 'view'])->name('pages.home');
Route::get('/{locale}/{page}', [PageController::class, 'view'])->name('pages.page');

Route::post('/nl/contact', [ContactController::class, 'sendMail'])->name('pages.contact');

Route::get('/{locale}/shop/{slug}', [ShopController::class, 'index'])->name('shop.product');
Route::post('/{locale}/shop/cart', [ShopController::class, 'addToCart'])->name('shop.cart');

// Route::get('/{locale}/shop/slug', function() {
//     return 'Test';
// });

require __DIR__.'/auth.php';
