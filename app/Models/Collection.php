<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory, Uuids, Filterable;

    protected $fillable = [
        'unit_id',
        'collected_by',
        'total',
        'collected_at'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
