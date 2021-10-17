<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitConfig extends Model
{
    use HasFactory, Uuids;

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'unit_id',
        'token'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
