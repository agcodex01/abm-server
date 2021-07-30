<?php

namespace App\Http\Controllers;

use App\Http\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        return $this->transactionService->getTransactions();
    }
}
