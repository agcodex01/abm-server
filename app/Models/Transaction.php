<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, Uuids, Filterable;

    const PENDING = 'pending';
    const REMMITED = 'remmited';

    protected $fillable = [
        'unit_id',
        'remit_id',
        'biller_id',
        'service_number',
        'number',
        'amount',
        'status'
    ];

    public function biller()
    {
        return $this->belongsTo(Biller::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function remit()
    {
        return $this->belongsTo(Remit::class);
    }
}
