<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\ExchangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home - Calendar
Route::get('/', [CoinController::class, 'index'])->name('coins.home');
Route::get('/coin/{slug}', [CoinController::class, 'single'])->name('ico.single');

Route::get('/exchanges', [ExchangeController::class, 'index'])->name('exchange.home');
Route::get('/exchanges/{slug}', [ExchangeController::class, 'single'])->name('exchange.single');
