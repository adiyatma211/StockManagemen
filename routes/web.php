<?php

use App\Http\Controllers\Merek\MerekController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Report\LaporanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [PagesController::class, 'landingpage'])->name('homelanding');

Route::get('/merek', [PagesController::class, 'merek'])->name('merek');


Route::middleware('auth')->group(function () {
    Route::get('/', [PagesController::class, 'landingpage'])->name('homelanding');
    Route::get('/merek', [PagesController::class, 'merek'])->name('merek');
    Route::get('/tipemerek', [PagesController::class, 'tipemerek'])->name('tipemerek');
    Route::get('/laporan', [PagesController::class, 'laporan'])->name('laporan');
});
// Managemen Merek
Route::middleware('auth')->group(function () {
    Route::get('/merek/create', [MerekController::class, 'index'])->name('index.merek');
    Route::get('/merek/edit', [MerekController::class, 'editindex'])->name('edit.merek');
});

// Managemen Tipe Merek
Route::middleware('auth')->group(function () {
    Route::get('/tipemerek/create', [MerekController::class, 'editindex'])->name('index.tipemerek');
    Route::get('/tipemerek/edit', [MerekController::class, 'edittipe'])->name('edit.tipemerek');
});


// Manageme Laporan
Route::middleware('auth')->group(function () {
    Route::get('/laporan/create', [LaporanController::class, 'index'])->name('index.laporan');
    Route::get('/laporan/edit', [LaporanController::class, 'editlaporan'])->name('edit.laporan');

});

Auth::routes();
