<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biller extends Model
{

    use HasFactory, Uuids, SoftDeletes, Filterable;

    const ELECTRICITY = 'electricity';
    const INTERNET = 'internet';
    const WATER = 'water';

    protected $fillable = [
        'name', 'type'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Get all biller types
     *
     * @return string[]
     */
    public static function getBillerTypes()
    {
        return [
            self::ELECTRICITY,
            self::INTERNET,
            self::WATER
        ];
    }
}
