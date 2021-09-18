<?php

namespace App\Http\Implementations;

use App\Http\Services\DashboardService;
use App\Http\Services\TransactionService;
use App\Models\Account;
use App\Models\Biller;
use App\Models\Transaction;
use App\Models\Unit;

class DashboardServiceImpl implements DashboardService
{
    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService) {
        $this->transactionService = $transactionService;
    }

    public function getDsSummary(): array
    {
        return [
            [
                'label' => 'Pending Transactions',
                'value' => Transaction::where('status', Transaction::PENDING)->count(),
                'icon' => 'compare_arrows'
            ],
            [
                'label' => 'Accounts',
                'value' => Account::count(),
                'icon' => 'people_outline'
            ],
            [
                'label' => 'Billers',
                'value' => Biller::count(),
                'icon' => 'account_balance'
            ],
            [
                'label' => 'Units',
                'value' => Unit::count(),
                'icon' => 'monitor'
            ]
        ];
    }

    public function transactionPreview(): array
    {
        return $this->transactionService->getTransactionCountPerWeek();
    }
}
