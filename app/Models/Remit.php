<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remit extends Model
{
    use HasFactory, Uuids, Filterable;

    protected $fillable = [
        'remitted_by',
        'total'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
