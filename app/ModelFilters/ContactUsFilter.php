<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ContactUsFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function email($email)
    {
        return $this->where('emails', $email);
    }

    public function phone($phone)
    {
        return $this->where('phones', $phone);
    }

    public function office($office)
    {
        return $this->where('offices', $office);
    }
}
