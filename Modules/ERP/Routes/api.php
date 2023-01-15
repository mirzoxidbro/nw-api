<?php

use Illuminate\Support\Facades\Route;
use Modules\ERP\Http\Controllers\CarpetController;
use Modules\ERP\Http\Controllers\OrderController;
use Modules\ERP\Http\Controllers\WorkmanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('order')->group(function(){
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{order}', [OrderController::class, 'show']);
    Route::put('/{order}', [OrderController::class, 'update']);
    Route::delete('/{order}', [OrderController::class, 'delete']);
});

Route::prefix('carpet')->group(function(){
    Route::get('/', [CarpetController::class, 'index']);
    Route::post('/', [CarpetController::class, 'store']);
    Route::get('/{carpet}', [CarpetController::class, 'show']);
    Route::put('/{carpet}', [CarpetController::class, 'update']);
    Route::delete('/{carpet}', [CarpetController::class, 'delete']);
});

Route::prefix('worker')->group(function(){
    Route::get('/', [WorkmanController::class, 'index']);
    Route::post('/', [WorkmanController::class, 'store']);
    Route::get('/{worker}', [WorkmanController::class, 'show']);
    Route::put('/{worker}', [WorkmanController::class, 'update']);
    Route::delete('/{worker}', [WorkmanController::class, 'delete']);
});