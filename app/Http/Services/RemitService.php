<?php

namespace App\Http\Services;

use App\Filters\RemitFilter;
use App\Models\Remit;
use Illuminate\Database\Eloquent\Collection;

interface RemitService
{
    /**
     * Get all remits;
     *
     * @param RemitFilter $remitFilter remit filters
     *
     * @return lluminate\Database\Eloquent\Collection collection of billers.
     */
    public function findAll(RemitFilter $remitFilter): Collection;

    /**
     * Get all remit transactions;
     *
     * @param Remit $remit remit object
     *
     * @return lluminate\Database\Eloquent\Collection collection of billers.
     */
    public function findRemitTransactions(Remit $remit): Collection;

     /**
     * Get specific remit;
     *
     * @param Remit $remit remit object
     *
     * @return Remit remi object.
     */
    public function find(Remit $remit): Remit;

     /**
     * Create new Remit;
     *
     * @param array $data remit data
     *
     * @return Remit remit object.
     */
    public function create(array $data): Remit;
}
