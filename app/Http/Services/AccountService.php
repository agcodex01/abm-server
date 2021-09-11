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
     * @param array $transactionData transaction data
     *
     * @return \App\Models\Account
     */
    public function findOrCreate(array $transactionData): Account;
}
