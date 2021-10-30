<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'unit_id',
        'account_id',
        'message'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
