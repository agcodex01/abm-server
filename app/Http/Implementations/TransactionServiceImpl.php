<?php

namespace App\Http\Implementations;

use App\Filters\TransactionFilter;
use App\Http\Services\AccountService;
use App\Http\Services\TransactionService;
use App\Http\Services\UnitService;
use App\Models\Transaction;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TransactionServiceImpl implements TransactionService
{
    private AccountService $accountService;
    private UnitService $unitService;

    public function __construct(AccountService $accountService, UnitService $unitService)
    {
        $this->accountService = $accountService;
        $this->unitService = $unitService;
    }

    public function findAll(TransactionFilter $transactionFilter): Collection
    {
        return Transaction::with('biller', 'unit')
            ->filter($transactionFilter)
            ->get();
    }

    public function findAllByUnit(Unit $unit): Collection
    {
        return $unit->transactions;
    }

    public function findById(string $id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function create(array $data, Unit $unit): Transaction
    {
        $account = $this->accountService->findById($data['account_id']);
        $account->update([
            'number' => $data['number'],
            'balance' => $this->getBalance($data, $account->balance)
        ]);

        $this->unitService->addFund($unit, $data['insertedAmount']);

        return $unit->transactions()->create($data);
    }

    private function getBalance(array $transactionData, $currentBalance)
    {
        return $currentBalance + ($transactionData['insertedAmount'] - $transactionData['amount']);
    }

    public function getTransactionCountPerWeek()
    {

        $transactions =  Transaction::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get()
            ->groupBy('status')
            ->mapToGroups(function ($transactions, $status) {
                return [$status => $transactions];
            })->map(function ($transactions) {
                return  $transactions->first();
            })
            ->map(function ($transactions) {
                return $transactions->groupBy(function ($transaction) {
                    return $transaction->created_at->format('W');
                })->map(function ($transactions) {
                    return $transactions->count();
                });
            })->map(function ($transactions) {
                foreach ($this->weeksOfMonth() as $week) {
                    $weekSale[$week] = 0;
                    foreach ($transactions as $key => $sale) {
                        if ($week == $key) {
                            $weekSale[$week] = $sale;
                        }
                    }
                }
                return collect($weekSale)->values();
            })
            ->all();



        return $transactions;
    }

    private function weeksOfMonth(): array
    {
        $yearAndMonth = date('Y/m/');

        return array(
            date('W', strtotime($yearAndMonth . '07')),
            date('W', strtotime($yearAndMonth . '14')),
            date('W', strtotime($yearAndMonth . '21')),
            date('W', strtotime($yearAndMonth . '28')),
        );
    }
}
