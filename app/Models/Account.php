<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'biller_id',
        'service_number',
        'number'
    ];

    public function biller()
    {
        return $this->belongsTo(Biller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
