<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class TraineeFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function certificateNo($certificateNo)
    {
        return $this->where('certificate_no', 'LIKE', "$certificateNo%");
    }

    public function trainingDateFrom($date)
    {
        return $this->where('training_date_from', $date);
    }

    public function trainingDateTo($date)
    {
        return $this->where('training_date_to', $date);
    }
}
