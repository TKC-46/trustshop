<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShopController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shops.index');
    Route::resource('shops', ShopController::class);
    Route::get('shops/{shop}/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('shops/{shop}/items', [ItemController::class, 'store'])->name('items.store');
    Route::resource('items', ItemController::class)->except(['index', 'create', 'store']);
    Route::post('items/{item}/purchase', [ItemController::class, 'purchase'])->name('items.purchase');
    Route::get('shops/{shop}/items/exportCsv', [ItemController::class, 'exportCsv'])->name('items.exportCsv');
    Route::get('/owner/shops', [ShopController::class, 'ownerShops'])->name('shops.owner.index');
});

require __DIR__.'/auth.php';
