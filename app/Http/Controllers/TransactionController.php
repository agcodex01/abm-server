<?php

namespace App\Http\Controllers;

use App\Events\NewTransactionCreated;
use App\Filters\TransactionFilter;
use App\Http\Requests\TransactionRequest;
use App\Http\Services\TransactionService;
use App\Models\Unit;
use App\Permission\Permission;
use App\Permission\PermissionCapabilities;

class TransactionController extends Controller
{

    public function __construct(
        private TransactionService $transactionService,
        private Permission $permission
    ) {
    }

    public function index(TransactionFilter $transactionFilter)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_TRANSACTIONS_LABEL
        );

        return $this->transactionService->findAll($transactionFilter);
    }

    public function unitTransactions(Unit $unit)
    {
        $this->permission->throwIfAccessDenied(
            PermissionCapabilities::VIEW_TRANSACTIONS_LABEL
        );

        return $this->transactionService->findAllByUnit($unit);
    }

    public function create(TransactionRequest $request, Unit $unit)
    {
        $transaction = $this->transactionService->create($request->validated(), $unit);

        NewTransactionCreated::dispatch($transaction);

        return $transaction;
    }
}
