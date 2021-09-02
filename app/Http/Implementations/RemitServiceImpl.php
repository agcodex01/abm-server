<?php

namespace App\Http\Implementations;

use App\Filters\RemitFilter;
use App\Http\Services\RemitService;
use App\Http\Services\TransactionService;
use App\Models\Remit;
use App\Models\Transaction;
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
        return $remit->transactions;
    }

    public function find(Remit $remit): Remit
    {
        return $remit;
    }

    public function create(array $data): Remit
    {
        $remit = Remit::create($data);

        foreach ($data['transaction_ids'] as $transactionId) {

            $transaction = $this->transactionService->findById($transactionId);
            $transaction->update([
                'status' => Transaction::REMMITED,
                'remit_id' => $remit->id
            ]);
        }

        return $remit;
    }
}
