<?php

namespace App\Exports;

use App\Models\Remit;
use \Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RemitTransactionExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithCustomStartCell,
    WithEvents,
    WithStyles
{
    public function __construct(private Remit $remit)
    {
    }

    public function collection()
    {
        return $this->remit->transactions()
            ->with('unit', 'biller', 'account')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Unit',
            'Biller',
            'Biller Type',
            'Account #',
            'Contact #',
            'Amount',
            'Created At'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->unit->name,
            $transaction->biller->name,
            $transaction->biller->type,
            $transaction->account->service_number,
            $transaction->account->number,
            $transaction->amount,
            $transaction->created_at
        ];
    }
    public function startCell(): string
    {
        return 'A5';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->mergeCells('A1:G2');
                $event->sheet->setCellValue('A1', 'Remit Report as of ' . $this->remit->created_at->format('d M. D , Y'));
                $event->sheet->setCellValue('A3', 'Remitted By: ' . $this->remit->remitted_by);
                $event->sheet->setCellValue('G3', 'Total: ' . $this->remit->total);
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1'    => [
                'font' => [
                    'bold' => true
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center'
                ]
            ],
            5 => [ // Header
                'font' => [
                    'bold' => true
                ]
            ],
        ];
    }
}
