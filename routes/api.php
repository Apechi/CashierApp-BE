<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);


Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'userInfo']);
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/type', TypeController::class);
    Route::apiResource('/menu', MenuController::class);
    Route::apiResource('/customer', CustomerController::class);
    Route::apiResource('/table', TableController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/stok', StokController::class);
    Route::apiResource('/employee', EmployeeController::class);
});
