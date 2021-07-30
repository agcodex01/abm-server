<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'amount',
        'remit_id',
        'requirement_id',
        'status'
    ];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
