<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'name',
        'url'
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
