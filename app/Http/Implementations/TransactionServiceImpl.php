<?php

namespace App\Http\Implementations;

use App\Http\Services\TransactionService;
use App\Models\Transaction;

class TransactionServiceImpl implements TransactionService {

    public function getTransactions()
    {
        return Transaction::all();
    }
}
