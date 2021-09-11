<?php

namespace App\Http\Implementations;

use App\Filters\TransactionFilter;
use App\Http\Services\AccountService;
use App\Http\Services\TransactionService;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class TransactionServiceImpl implements TransactionService
{
    private AccountService $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function findAll(TransactionFilter $transactionFilter): Collection
    {
        return Transaction::with('biller', 'unit')
            ->filter($transactionFilter)
            ->get();
    }

    public function findAllByUnit(Unit $unit): Collection
    {
        return $unit->transactions;
    }

    public function findById(string $id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function create(array $data, Unit $unit): Transaction
    {
        $account = $this->accountService->findOrCreate($data);

        $data['account_id'] = $account->id;

        return $unit->transactions()->create($data);
    }
}
