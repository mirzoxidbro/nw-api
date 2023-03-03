<?php

use Illuminate\Support\Facades\Route;
use Modules\ERP\Http\Controllers\UserController;
use Modules\ERP\Http\Controllers\AuthController;
use Modules\ERP\Http\Controllers\OrderController;
use Modules\ERP\Http\Controllers\WalletController;
use Modules\ERP\Http\Controllers\AttendanceController;
use Modules\ERP\Http\Controllers\DebtHistoryController;
use Modules\ERP\Http\Controllers\OrderItemController;
use Modules\ERP\Http\Controllers\TransactionController;
use Modules\ERP\Http\Controllers\TransactionPurposeController;

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

Route::group(['prefix' => 'erp/v1'], static function () {

    Route::group(['prefix' => 'auth'], static function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('get-info', [AuthController::class, 'me']);
        Route::post('register', [UserController::class, 'store']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/{id}', [UserController::class, 'show']);
        Route::post('/{id}', [UserController::class, 'update']);
        Route::post('/profile/{id}', [UserController::class, 'profileUpdate']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);
        Route::get('/{order}', [OrderController::class, 'show']);
        Route::put('/{order}', [OrderController::class, 'update']);
        Route::delete('/{order}', [OrderController::class, 'delete']);
    });

    Route::prefix('orderitem')->group(function () {
        Route::get('/', [OrderItemController::class, 'index']);
        Route::post('/', [OrderItemController::class, 'store']);
        Route::get('/{orderitem}', [OrderItemController::class, 'show']);
        Route::put('/{orderitem}', [OrderItemController::class, 'update']);
        Route::delete('/{orderitem}', [OrderItemController::class, 'delete']);
    });


    Route::prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index']);
        Route::post('/', [AttendanceController::class, 'store']);
        Route::get('/{attendance}', [AttendanceController::class, 'show']);
        Route::put('/{attendance}', [AttendanceController::class, 'update']);
        Route::delete('/{attendance}', [AttendanceController::class, 'delete']);
    });

    Route::prefix('transaction_purpose')->group(function () {
        Route::get('/', [TransactionPurposeController::class, 'index']);
        Route::post('/', [TransactionPurposeController::class, 'store']);
        Route::put('/{attendance}', [TransactionPurposeController::class, 'update']);
        Route::delete('/{attendance}', [TransactionPurposeController::class, 'delete']);
    });

    Route::prefix('transactions')->group(function () {
        Route::post('/transaction', [TransactionController::class, 'transaction']);
        Route::get('/alltransactions', [TransactionController::class, 'alltransactions']);
    });
});
