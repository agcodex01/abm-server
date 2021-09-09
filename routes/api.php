<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\RemitController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitController;
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

Route::post('login', [AuthController::class, 'authenticate']);
Route::post('logout/{user}', [AuthController::class, 'logout']);
Route::get('billers/u/types', [BillerController::class, 'types']);
Route::apiResource('billers', BillerController::class);
Route::apiResource('units', UnitController::class);
Route::get('units/{unit}/transactions', [TransactionController::class, 'unitTransactions']);
Route::post('units/{unit}/transactions', [TransactionController::class, 'create']);
Route::get('transactions', [TransactionController::class, 'index']);
Route::apiResource('remits', RemitController::class);
Route::get('remits/{remit}/transactions', [RemitController::class, 'findRemitTransactions']);
Route::apiResource('collections', CollectionController::class);
