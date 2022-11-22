<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CareerFilter extends ModelFilter
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
        return $this->where('title', 'LIKE', "%$title%");
    }

    public function date($date)
    {
        return $this->where('published_date', $date);
    }
}
