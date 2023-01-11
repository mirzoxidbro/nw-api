<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
