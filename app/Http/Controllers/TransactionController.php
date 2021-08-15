<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Services\TransactionService;
use App\Models\Unit;

class TransactionController extends Controller
{
    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        return $this->transactionService->findAll();
    }

    public function unitTransactions(Unit $unit)
    {
        return $this->transactionService->findAllByUnit($unit);
    }

    public function create(TransactionRequest $request, Unit $unit)
    {
        return $this->transactionService->create($request->validated(), $unit);
    }
}
