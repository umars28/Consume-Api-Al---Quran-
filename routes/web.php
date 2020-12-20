<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\TafsirController;

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

Route::get('/', [SurahController::class, 'index'])->name('index');
Route::post('/surah', [SurahController::class, 'search'])->name('surah');
Route::post('/tafsir', [TafsirController::class, 'search'])->name('tafsir');
