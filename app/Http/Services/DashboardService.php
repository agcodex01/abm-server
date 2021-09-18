<?php

namespace App\Http\Services;

interface DashboardService
{
    /**
     * Get Dashboard summary total { pending transactions, accounts, billers, units}
     *
     * @return array
     */
    public function getDsSummary(): array;

    /**
     * Get transactions preview per status and week
     *
     * @return array
     */
    public function transactionPreview(): array;
}
