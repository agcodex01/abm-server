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

    public function findOrCreate(array $data): Account
    {
        $biller = $this->billerService
            ->findById($data['biller_id']);

        $account = Account::where([
            ['biller_id', $biller->id],
            ['service_number', $data['service_number']]
        ])->first();

        if ($account == null) {
            $account =  $biller->accounts()->create($data);
        }

        return $account;
    }

    public function useBalance(Account $account): bool
    {
        return $account->update([
            'balance' => 0
        ]);
    }

    public function findById(string $id): Account
    {
        return Account::findOrFail($id);
    }

    public function updateBalance(Account $account, array $data)
    {
        if ($account->balance >= $data['insertedAmount']) {
            $account->update([
                'number' => $data['number'],
                'balance' => $account->balance - $data['insertedAmount']
            ]);
        } else {
            $account->update([
                'number' => $data['number'],
                'balance' => $data['insertedAmount'] - $data['amount']
            ]);
        }
    }

    public function cancelTransactionUpdate(Account $account, array $data)
    {
        if ($data['insertedAmount'] > $account->balance) {
            $account->update([
                'number' => $data['number'],
                'balance' => $account->balance + ($data['insertedAmount'] - $account->balance)
            ]);
        }
    }
}
