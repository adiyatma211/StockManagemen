<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\AuthApiController;
use App\Http\Controllers\APIControllers\BarangApiController;
use App\Http\Controllers\APIControllers\PaymentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login',[AuthApiController::class,'login']);
Route::post('/logout',[AuthApiController::class,'logout']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/barang',[BarangApiController::class,'barang']);
    Route::get('/barang/{id}',[BarangApiController::class,'barangDetail']);
    Route::post('/payment',[PaymentApiController::class,'payment']);
    Route::get('/invoice',[PaymentApiController::class,'invoice']);
});
