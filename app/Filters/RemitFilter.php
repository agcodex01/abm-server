<?php

namespace App\Filters;

class RemitFilter extends Filter
{
    public function remittedBy(string $name)
    {
        return !$name ? $this->builder : $this->builder->where('remitted_by', $name);
    }
}
