<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CareerRepositoryInterface;
use App\Models\Career;

class CareerRepository implements CareerRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Career::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $career = new Career();
        $career->title = $payload->title;
        $career->content = $payload->content;
        $career->published_date = $payload->published_date;
        $career->save();

        return $career->fresh();
    }

    public function show($careerId)
    {
        return Career::findOrFail($careerId);
    }

    public function update($payload, $careerId)
    {
        $career = Career::findOrFail($careerId);
        $career->title = $payload->title;
        $career->content = $payload->content;
        $career->published_date = $payload->published_date;
        $career->save();

        return $career->fresh();
    }

    public function delete($careerId)
    {
        return Career::findOrFail($careerId)->delete();
    }
}
