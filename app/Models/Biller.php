<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biller extends Model
{

    use HasFactory, UsesUuid, SoftDeletes;

    protected $fillable = [
        'name', 'type'
    ];

    public function requirement()
    {
        return $this->hasOne(Requirement::class);
    }
}
