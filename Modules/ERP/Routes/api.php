<?php

use Illuminate\Support\Facades\Route;
use Modules\ERP\Http\Controllers\UserController;
use Modules\ERP\Http\Controllers\AuthController;
use Modules\ERP\Http\Controllers\OrderController;
use Modules\ERP\Http\Controllers\AttendanceController;
use Modules\ERP\Http\Controllers\DailyWorkVolumeController;
use Modules\ERP\Http\Controllers\DebtHistoryController;
use Modules\ERP\Http\Controllers\OrderItemController;
use Modules\ERP\Http\Controllers\TransactionController;
use Modules\ERP\Http\Controllers\TransactionPurposeController;
use Modules\ERP\Http\Controllers\WalletController;

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
Route::group(['prefix' => 'auth'], static function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [UserController::class, 'store']);
}); 
Route::group(['prefix' => 'erp/v1', 'middleware' => 'auth:sanctum'], static function () {

    Route::group(['prefix' => 'auth'], static function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('get-info', [AuthController::class, 'me']);
    }); 

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('can:get users list');
        Route::post('/{id}', [UserController::class, 'show']);
        Route::post('/{id}', [UserController::class, 'update'])->middleware('can:user update');
        Route::post('/profile/{id}', [UserController::class, 'profileUpdate']);
        Route::post('/giverole', [UserController::class, 'giveRole']);
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('can:delete user');
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->middleware('can:get orders');
        Route::post('/', [OrderController::class, 'store'])->middleware('can:create orders');
        Route::get('/{order}', [OrderController::class, 'show'])->middleware('can:show orders');
        Route::put('/{order}', [OrderController::class, 'update'])->middleware('can:update orders');
        Route::delete('/{order}', [OrderController::class, 'destroy'])->middleware('can:delete orders');
    });

    Route::prefix('orderitem')->group(function () {
        Route::get('/', [OrderItemController::class, 'index'])->middleware('can:get order items');
        Route::post('/', [OrderItemController::class, 'store'])->middleware('can:create order items');
        Route::get('/{orderitem}', [OrderItemController::class, 'show'])->middleware('can:show order items');
        Route::put('/{orderitem}', [OrderItemController::class, 'update'])->middleware('can:update order items');
        Route::delete('/{orderitem}', [OrderItemController::class, 'destroy'])->middleware('can:delete order items');
    });


    Route::prefix('attendance')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->middleware('can:get attendance');
        Route::post('/', [AttendanceController::class, 'store'])->middleware('can:create attendance');
        Route::get('/{attendance}', [AttendanceController::class, 'show'])->middleware('can:show attendance');
        Route::put('/{attendance}', [AttendanceController::class, 'update'])->middleware('can:update attendance');
        Route::delete('/{attendance}', [AttendanceController::class, 'delete'])->middleware('can:delete attendance');
    });

    Route::prefix('transaction_purpose')->group(function () {
        Route::get('/', [TransactionPurposeController::class, 'index'])->middleware('can:get transaction purposes');
        Route::post('/', [TransactionPurposeController::class, 'store'])->middleware('can:create transaction purposes');
        Route::put('/{attendance}', [TransactionPurposeController::class, 'update'])->middleware('can:update transaction purposes');
        Route::delete('/{attendance}', [TransactionPurposeController::class, 'delete'])->middleware('can:delete transaction purposes');
    });

    Route::prefix('transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->middleware('can:get transactions');
        Route::get('/dailystatistics', [TransactionController::class, 'dailystatistics'])->middleware('can:get daily statistics');
        Route::get('/monthlystatistics', [TransactionController::class, 'monthlystatistics'])->middleware('can:get monthly statistics');
        Route::get('/yearlystatistics', [TransactionController::class, 'yearlystatistics'])->middleware('can:get yearly statistics');
        Route::post('/transaction', [TransactionController::class, 'transaction'])->middleware('can:create transaction');
    });

    Route::prefix('wallet')->group(function () {
        Route::get('/', [WalletController::class, 'index'])->middleware('can:get wallet');
    });

    Route::prefix('workvolume')->group(function () {
        Route::get('/', [DailyWorkVolumeController::class, 'index'])->middleware('can:get daily work volume');
    });

    Route::prefix('bebthistory')->group(function () {
        Route::get('/', [DebtHistoryController::class, 'index'])->middleware('can:get debt history');
    });
});
