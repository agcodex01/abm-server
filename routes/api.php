<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RemitController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UnitConfigController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
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
    Route::get('billers/{biller}/accounts', [AccountController::class, 'index']);
    Route::post('billers/accounts/findOrCreate', [AccountController::class, 'findOrCreate']);
    Route::put('billers/accounts/{account}/useBalance', [AccountController::class, 'useBalance']);
    Route::get('dashboard/summary', [DashboardController::class, 'summary']);
    Route::get('dashboard/transactions/preview', [DashboardController::class, 'transactionPreview']);
    Route::apiResource('users', UserController::class);
    Route::get('users/roles/collectors', [UserController::class, 'collectors']);
    Route::put('users/{user}/password-reset', [UserController::class, 'resetPassword']);
    Route::put('users/{user}/disabled/{status}', [UserController::class, 'disabled']);
    Route::get('roles', [UserController::class, 'roles']);
    Route::get('units/{unit}/config', [UnitConfigController::class, 'getConfig']);
    Route::post('units/{unit}/config', [UnitConfigController::class, 'store']);
    Route::post('units/{unit}/accounts/{account}/cancelTransaction', [TransactionController::class, 'cancelTransaction']);
    Route::put('units/{unit}/disabled/{status}', [UnitController::class, 'disabled']);
    Route::delete('units/{unit}/config', [UnitConfigController::class, 'delete']);
    Route::get('settings', [SettingController::class, 'get']);
    Route::put('settings', [SettingController::class, 'update']);
    Route::get('feedback', [FeedbackController::class, 'index']);
    Route::post('feedback', [FeedbackController::class, 'create']);
    Route::get('users/{user}/notifications', [NotificationController::class, 'notifications']);
    Route::post('users/{user}/notifications/{id}/read', [NotificationController::class, 'read']);
    Route::post('users/{user}/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead']);
    Route::get('remits/{remit}/reports/download', [RemitController::class, 'download']);
});

Route::get('externals/units', [UnitController::class, 'external']);
