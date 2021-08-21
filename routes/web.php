<?php

use App\Http\Controllers\Dashboard\PageController as DashboardPageController;
use App\Http\Controllers\Pages\Contact\ContactController;
use App\Http\Controllers\Pages\PageController;
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

Route::prefix('dashboard')->name('dashboard')->group(function() {
    Route::middleware(['auth'])->group(function() {
        Route::get('/', function() {
            return view('dashboard');
        })->name('.index');

        Route::get('/pages', [DashboardPageController::class, 'index'])->name('.pages');

        Route::get('/pages/edit/{page}', [DashboardPageController::class, 'edit'])->name('.pages.edit');
        Route::post('/pages/edit/{page}', [DashboardPageController::class, 'postEdit'])->name('.pages.edit');

        Route::get('/pages/edit/{page}/{language}', [DashboardPageController::class, 'editContent'])->name('.pages.editContent');
        Route::post('/pages/edit/{page}/{language}', [DashboardPageController::class, 'postEditContent'])->name('.pages.editContent');
    });
});

Route::get('/{locale?}', [PageController::class, 'view'])->name('pages.home');
Route::get('/{locale}/{page}', [PageController::class, 'view'])->name('pages.page');

Route::post('/nl/contact', [ContactController::class, 'sendMail'])->name('pages.contact');

require __DIR__.'/auth.php';
