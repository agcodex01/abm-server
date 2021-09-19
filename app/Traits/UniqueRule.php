<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait UniqueRule
{
    public function getUniqueRule(Model $model)
    {
        return  $model == null ? '' : ',' . $model->id;
    }
}
