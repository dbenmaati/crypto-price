<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\BlogController;

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

Route::get('/top-gainers', [CoinController::class, 'gainers'])->name('gainers.home');
Route::get('/top-losers', [CoinController::class, 'losers'])->name('losers.home');


Route::get('/exchanges', [ExchangeController::class, 'index'])->name('exchange.home');
Route::get('/exchanges/{slug}', [ExchangeController::class, 'single'])->name('exchange.single');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.home');
Route::get('/blog/{slug}', [BlogController::class, 'single'])->name('blog.single');

Route::get('/pages/{slug}', [BlogController::class, 'page'])->name('page.single');

// INSTALL ROUTES
Route::get('install', [InstallController::class, 'showForm'])->name('install');
Route::post('install', [InstallController::class, 'install'])->name('install.process');


