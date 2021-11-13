<?php

namespace App\Http\Controllers;

use App\Filters\TransactionFilter;
use App\Http\Requests\TransactionRequest;
use App\Http\Services\NotificationService;
use App\Http\Services\TransactionService;
use App\Models\Unit;
use App\Notifications\TransactionCreated;

class TransactionController extends Controller
{
    private TransactionService $transactionService;
    private NotificationService $notficationService;

    public function __construct(TransactionService $transactionService, NotificationService $notficationService)
    {
        $this->transactionService = $transactionService;
        $this->notficationService = $notficationService;
    }

    public function index(TransactionFilter $transactionFilter)
    {
        return $this->transactionService->findAll($transactionFilter);
    }

    public function unitTransactions(Unit $unit)
    {
        return $this->transactionService->findAllByUnit($unit);
    }

    public function create(TransactionRequest $request, Unit $unit)
    {
        $transaction = $this->transactionService->create($request->validated(), $unit);

        $this->notficationService->notifyUsers(new TransactionCreated($transaction));

        return $transaction;
    }
}
