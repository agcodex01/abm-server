<?php

namespace App\Http\Implementations;

use App\Filters\RemitFilter;
use App\Http\Services\RemitService;
use App\Http\Services\TransactionService;
use App\Models\Remit;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RemitServiceImpl implements RemitService
{

    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function findAll(RemitFilter $remitFilter): Collection
    {
        return Remit::filter($remitFilter)->get();
    }

    public function findRemitTransactions(Remit $remit): Collection
    {
        return Transaction::with('biller', 'unit')->whereHas('remit', function (Builder $query) use ($remit) {
            $query->where('id', $remit->id);
        })->get();
    }

    public function find(Remit $remit): Remit
    {
        return $remit;
    }

    public function create(array $data): Remit
    {
        $remit = Remit::create($data);

        $this->associateRemitTransactions($data['transaction_ids'], $remit);

        return $remit;
    }

    private function associateRemitTransactions(array $transactionIds, Remit $remit)
    {
        foreach ($transactionIds as $transactionId) {
            $transaction = $this->transactionService->findById($transactionId);
            $transaction->update([
                'status' => Transaction::REMMITED,
                'remit_id' => $remit->id
            ]);
        }
    }
}
