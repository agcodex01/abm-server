<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class TransactionFilter extends Filter
{
    const TODAY = 'today';
    const THIS_WEEK = 'this_week';
    const THIS_MONTH = 'this_month';

    /**
     * Filter the transactions by unit name.
     *
     * @param  string|null  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function unitName(string $name = null): Builder
    {
        return !$name ? $this->builder :
            $this->builder->whereHas('unit', function (Builder $query) use ($name) {
                $query->where('name', $name);
            });
    }

    /**
     * Filter the transactions by biller name.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function billerName(string $name = null): Builder
    {
        return !$name ? $this->builder :
            $this->builder->whereHas('biller', function (Builder $query) use ($name) {
                $query->where('name', $name);
            });
    }

    /**
     * Filter the transactions by biller type.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function billerType(string $type = null): Builder
    {
        return !$type ? $this->builder :
            $this->builder->whereHas('biller', function (Builder $query) use ($type) {
                $query->where('type', $type);
            });
    }

    /**
     * Filter the transactions by status.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function status(string $status = null)
    {
        return !$status ? $this->builder : $this->builder->where('status', $status);
    }
}
