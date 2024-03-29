<?php

namespace App\Http\Services;

use App\Filters\TransactionFilter;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Collection;

interface TransactionService
{
    /**
     * Get all transactions;
     *
     * @param \App\Filters\TransactionFilter $transactionFilter
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
     * @param string $id UUID id
     *
     * @return App\Models\Transaction
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function findById(string $id): Transaction;

    /**
     * Create Transaction.
     *
     * @param array $data  validated TransactionRequest data.
     * @param App\Models\Unit $unit where transaction came from.
     *
     * @return App\Models\Transaction new transaction created
     */
    public function create(array $data, Unit $unit): Transaction;

    /**
     * Get all transaction group per week
     *
     * @return  array - [ 'week' => total ]
     *
     */
    public function getTransactionCountPerWeek(): array;

    public function cancelTransaction(Unit $unit, Account $account, array $data);
}
