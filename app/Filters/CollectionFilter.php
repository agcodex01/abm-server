<?php

namespace App\Filters;



class CollectionFilter extends Filter
{

    public function collectedBy(string $name)
    {
        return !$name ? $this->builder : $this->builder->where('collected_by', $name);
    }

    public function collectedAt($date)
    {
        return !$date ? $this->builder: $this->builder->whereDate('collected_at', $date);;
    }
}
