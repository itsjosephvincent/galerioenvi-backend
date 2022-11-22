<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TrainingFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function title($title)
    {
        return $this->where('name', 'LIKE', "%$title%");
    }

    public function dateFrom($date)
    {
        return $this->where('date_from', $date);
    }

    public function dateTo($date)
    {
        return $this->where('date_to', $date);
    }

    public function location($location)
    {
        return $this->where('location', $location);
    }
}
