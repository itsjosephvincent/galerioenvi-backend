<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class AboutFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function id($id)
    {
        return $this->where('id', $id);
    }

    public function content($content)
    {
        return $this->where('content', 'LIKE', "%$content%");
    }

    public function mission($mission)
    {
        return $this->where('mission', 'LIKE', "%$mission%");
    }

    public function vision($vision)
    {
        return $this->where('vision', 'LIKE', "%$vision%");
    }
}
