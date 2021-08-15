<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name',
        'fund',
        'postal_code',
        'province',
        'city',
        'municipality',
        'barangay',
        'street'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
