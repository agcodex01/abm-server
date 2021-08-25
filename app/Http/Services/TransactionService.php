<?php

namespace App\Http\Services;

use App\Filters\TransactionFilter;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

interface TransactionService
{
    /**
     * Get all transactions;
     *
     * @param \App\Filters\TransactionFilter
     *
     * @return lluminate\Database\Eloquent\Collection collection of transactions.
     */
    public function findAll(TransactionFilter $transactionFilter): Collection;

     /**
     * Get all transactions by unit;
     *
     * @param App\Models\Unit $unit where transactions was created.
     * @return lluminate\Database\Eloquent\Collection collection of transactions.
     */
    public function findAllByUnit(Unit $unit): Collection;

    /**
     * Find Transaction by ID.
     *
     * @param int $id
     *
     * @return App\Models\Transaction
     */
    public function findById(int $id): Transaction;

    /**
     * Create Transaction.
     *
     * @param array $data  validated TransactionRequest data.
     * @param App\Models\Unit $unit where transaction came from.
     *
     * @return App\Models\Transaction new transaction created
     */
    public function create(array $data, Unit $unit): Transaction;
}
