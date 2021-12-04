<?php

namespace App\Http\Implementations;

use App\Exports\RemitTransactionExport;
use App\Filters\RemitFilter;
use App\Http\Services\RemitService;
use App\Http\Services\TransactionService;
use App\Models\Remit;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class RemitServiceImpl implements RemitService
{

    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function findAll(RemitFilter $remitFilter): Collection
    {
        return Remit::filter($remitFilter)
            ->latest()->get();
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

    public function downloadReport(Remit $remit)
    {
        return Excel::download(new RemitTransactionExport($remit), $this->generateReportName($remit->created_at));
    }


    private function generateReportName($date): string
    {
        return 'remit_report_' . $date . '.xlsx';
    }

    private function associateRemitTransactions(array $transactionIds, Remit $remit)
    {
        foreach ($transactionIds as $transactionId) {
            $transaction = $this->transactionService->findById($transactionId);
            $transaction->update([
                'status' => Transaction::REMITTED,
                'remit_id' => $remit->id
            ]);
        }
    }
}
