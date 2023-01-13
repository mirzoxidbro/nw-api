<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Controllers\AuthController;
use Modules\Core\Http\Controllers\RoleAndPermission\PermissionController;
use Modules\Core\Http\Controllers\RoleAndPermission\RoleController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('assignRole/{userId}/{roleId}', [AuthController::class, 'assignRole']);

    Route::prefix('roles')->group(function(){
        Route::get('getRoles', [RoleController::class, 'getRoles']);
        Route::post('role', [RoleController::class, 'store']);
        Route::post('getPermission/{roleId}', [RoleController::class, 'roleGetPermission']);
        Route::post('updatePermission/{roleId}', [RoleController::class, 'roleUpdatePermission']);
        Route::post('delete/{roleId}', [RoleController::class, 'destroy']);
    });

    Route::prefix('permissions')->group(function(){
        Route::get('/permissions', [PermissionController::class, 'getPermissions']);
    });
});