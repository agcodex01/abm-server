<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout/{user}', [AuthController::class, 'logout']);
Route::apiResource('billers', BillerController::class);
Route::apiResource('units', UnitController::class);
Route::get('units/{unit}/transactions', [TransactionController::class, 'unitTransactions']);
Route::post('units/{unit}/transactions', [TransactionController::class, 'create']);
Route::get('transactions', [TransactionController::class, 'index']);
