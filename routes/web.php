<?php

use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

// # PER IL CONTROLLER NORMALE STATICO SI FA IL GET
// Route::get('/comic', [ComicController::class, 'index'])->name('comic.index');

// # PER LE CRUD E QUINDI IL CONTROLLER RESOURCE SI FA IL RESOURCE APPUNTO
Route::resource('comics', ComicController::class);