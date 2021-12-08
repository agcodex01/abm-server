<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Unit extends Model
{
    use HasFactory,
        Uuids,
        HasApiTokens,
        Filterable;

    protected $fillable = [
        'name',
        'fund',
        'postal_code',
        'province',
        'city_municipality',
        'barangay',
        'street',
        'disabled',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function config()
    {
        return $this->hasOne(UnitConfig::class);
    }

    public static function externalDto(Unit $unit)
    {
        return [
            'id' => $unit->id,
            'name' => $unit->name,
        ];
    }
}
