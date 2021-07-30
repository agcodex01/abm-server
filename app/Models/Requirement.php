<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'biller_id',
        'number',
        'other',
        'service_number',
    ];

    protected $casts = [
        'other' => 'array'
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
