<?php

namespace App\Http\Implementations;

use App\Filters\TransactionFilter;
use App\Http\Services\AccountService;
use App\Http\Services\TransactionService;
use App\Http\Services\UnitService;
use App\Models\Account;
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
            ->latest()
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
        $this->accountService->updateBalance($account, $data);

        $this->unitService->addFund($unit, $data['insertedAmount']);

        return $unit->transactions()->create($data);
    }

    public function cancelTransaction(Unit $unit, Account $account, array $data)
    {
        $this->unitService->addFund($unit, $data['insertedAmount']);

        $this->accountService->updateBalance($account, $data);

        return $unit->transactions()->create($data);
    }

    public function getTransactionCountPerWeek(): array
    {

        return Transaction::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get()
            ->groupBy('status')
            ->mapToGroups(fn ($transactions, $status) => [$status => $transactions])
            ->map(fn ($transactions) => $transactions->first())
            ->map(
                fn ($transactions) => $transactions
                    ->groupBy(fn ($transaction) => $transaction->created_at->format('W'))
                    ->map(fn ($transactions) => $transactions->count())
            )->map(function ($transactions) {
                foreach ($this->weeksOfMonth() as $week) {
                    $weeklyTransactions[$week] = 0;
                    foreach ($transactions as $key => $sale) {
                        if ($week == $key) {
                            $weeklyTransactions[$week] = $sale;
                        }
                    }
                }
                return collect($weeklyTransactions)->values();
            })
            ->all();
    }

    private function weeksOfMonth(): array
    {
        $yearAndMonth = date('Y/m/');
        $firstWeekOfMonth = date('W', strtotime($yearAndMonth . '01'));
        $lastDayOfMonth = Carbon::now()->endOfMonth()->format('t');
        $lastWeekOfMonth =  date('W', strtotime($yearAndMonth . $lastDayOfMonth));

        $weeks = collect([]);
        for ($i = $firstWeekOfMonth; $i <= $lastWeekOfMonth; $i++) {
            $weeks->push($i);
        }

        return $weeks->toArray();
    }
}
