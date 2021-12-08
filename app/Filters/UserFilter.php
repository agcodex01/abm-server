<?php

namespace App\Filters;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends Filter
{
    const ENABLE = 'enable';
    const DISABLE = 'disable';
    /**
     *  Filter User by role
     *
     * @param string $value user role.
     *
     * @return \Illuminate\Database\Eloquent\Builder builder object
     */
    public function role(string $value): Builder
    {
        return !$value ? $this->builder :
            $this->builder->whereHas('roles', function (Builder $query) use ($value) {
                $query->where('name', $value);
            });
    }

    /**
     *  Filter User by status
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
