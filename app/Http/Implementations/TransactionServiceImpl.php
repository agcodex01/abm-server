<?php

namespace App\Http\Implementations;

use App\Http\Services\TransactionService;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

class TransactionServiceImpl implements TransactionService
{

    public function findAll(): Collection
    {
        return Transaction::all();
    }

    public function findAllByUnit(Unit $unit): Collection
    {
        return $unit->transactions;
    }

    public function findById(int $id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function create(array $data, Unit $unit): Transaction
    {
        return $unit->transactions()->create($data);
    }
}
