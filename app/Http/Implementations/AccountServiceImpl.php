<?php

namespace App\Http\Implementations;

use App\Http\Services\AccountService;
use App\Http\Services\BillerService;
use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

class AccountServiceImpl implements AccountService
{
    private BillerService $billerService;

    public function __construct(BillerService $billerService)
    {
        $this->billerService = $billerService;
    }

    public function findAllByBillerId(string $billerId): Collection
    {
        return  $this->billerService->findById($billerId)->accounts;
    }

    public function findOrCreate(array $transactionData): Account
    {
        $biller = $this->billerService
            ->findById($transactionData['biller_id']);

        $account = Account::where('biller_id', $biller->id)
            ->where('service_number', $transactionData['service_number'])
            ->first();

        if ($account == null) {
            $account =  $biller->accounts()->create(
                collect($transactionData)
                    ->only('service_number', 'number')
                    ->all()
            );
        }

        return $account;
    }
}
