<?php

namespace App\Http\Services;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

interface AccountService
{
    /**
     * Get all accounts of specific biller
     *
     * @param string $billerId uuid id of biller
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllByBillerId(string $billerId): Collection;

    /**
     * Find or create account of specific biller
     *
     * @param array $data  data ['biller_id', 'service_number']
     *
     * @return \App\Models\Account
     */
    public function findOrCreate(array $data): Account;

    /**
     * Use current account balance to create transaction.
     *
     * @param \App\Models\Account $account account to use balance
     */
    public function useBalance(Account $account): bool;

    /**
     * Find Account by ID.
     *
     * @param string $id Uuid id of account
     *
     * @return App\Models\Account
     */
    public function findById(string $id): Account;

    public function updateBalance(Account $account, array $data);
    public function cancelTransactionUpdate(Account $account, array $data);
}
