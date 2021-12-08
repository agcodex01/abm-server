<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UnitFilter extends Filter
{
    const ENABLE = 'enable';
    const DISABLE = 'disable';

    /**
     *  Filter Unit by status
     *
     * @param string $value enable or disable.
     *
     * @return \Illuminate\Database\Eloquent\Builder builder object
     */
    public function status(string $value): Builder
    {
        if ($this->getStatus($value) === null) {
            return $this->builder;
        }

        return $this->builder->where(
            'disabled',
            $this->getStatus($value)
        );
    }

    private function getStatus($value)
    {
        switch ($value) {
            case self::ENABLE:
                return 0;
            case self::DISABLE:
                return 1;
            default:
                return null;
        }
    }
}
