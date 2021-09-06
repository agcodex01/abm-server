<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class BillerFilter extends Filter
{
    /**
     *  Filter Biller by type
     *
     * @param string $value type of biller.
     *
     * @return \Illuminate\Database\Eloquent\Builder builder object
     */
    public function type(string $value): Builder
    {
        return !$value ? $this->builder : $this->builder->where('type', $value);
    }
}
