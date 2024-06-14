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


// Route::get('/', [PagesController::class, 'landingpage'])->name('homelanding');


Route::middleware('auth')->group(function () {
    Route::get('/', [PagesController::class, 'landingpage'])->name('homelanding');
    Route::get('/merek', [PagesController::class, 'merek'])->name('merek');
    Route::get('/tipemerek', [PagesController::class, 'tipemerek'])->name('tipemerek');
    Route::get('/laporan', [PagesController::class, 'laporan'])->name('laporan');
});
// Managemen Merek
Route::middleware('auth')->group(function () {
    Route::get('/merek/create', [MerekController::class, 'index'])->name('index.merek');
    Route::post('/merek/create/save', [MerekController::class, 'create'])->name('simpan.merek');
    Route::get('/merek/edit/{id}', [MerekController::class, 'editMerek'])->name('edit.merek');
    Route::post('/merek/edit/simpan/{id}', [MerekController::class, 'update'])->name('update.merek');
    Route::delete('/merek/destroy/{id}', [MerekController::class, 'destroyMerek'])->name('delete.merek');
});

// Managemen Tipe Merek
Route::middleware('auth')->group(function () {
    Route::get('/tipemerek/create', [MerekController::class, 'editindex'])->name('index.tipemerek');
    Route::post('/tipemerek/create/save', [MerekController::class, 'store'])->name('simpan.tipemerek');
    Route::get('/tipemerek/edit/{id}', [MerekController::class, 'edittipe'])->name('edit.tipemerek');
    Route::post('/tipemerek/edit/simpan/{id}', [MerekController::class, 'editItem'])->name('update.tipemerek');
    Route::delete('/tipemerek/destroy/{id}', [MerekController::class, 'destroy'])->name('delete.tipemerek');
});

// Manageme Laporan
Route::middleware('auth')->group(function () {
    Route::get('/laporan/create', [LaporanController::class, 'index'])->name('index.laporan');
    Route::get('/laporan/edit', [LaporanController::class, 'editlaporan'])->name('edit.laporan');
});

Auth::routes();
