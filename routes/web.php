<?php

// # QUI IMPORTIAMO IL CONTROLLER STATICO
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;

// # QUI IMPORTIAMO IL RESOURCE CONTROLLER
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

// # PER IL CONTROLLER NORMALE STATICO SI FA IL GET COME QUELLO SOPRA
// Route::get('/comic', [ComicController::class, 'index'])->name('comic.index');

// # PER LE CRUD SI FA IL RESOURCE CONTROLLER QUESTA ISTRUZIONE SOTTO GESTIRA' TUTTE LE CRUD
Route::resource('comics', ComicController::class);