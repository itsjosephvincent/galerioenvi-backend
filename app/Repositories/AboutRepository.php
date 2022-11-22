<?php

namespace App\Repositories;

use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Models\About;

class AboutRepository implements AboutRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return About::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $about = new About();
        $about->content = $payload->content;
        $about->mission = $payload->mission;
        $about->vision = $payload->vision;
        $about->save();

        return $about->fresh();
    }

    public function show($aboutId)
    {
        return About::findOrFail($aboutId);
    }

    public function update($payload, $aboutId)
    {
        $about = About::findOrFail($aboutId);
        $about->content = $payload->content;
        $about->mission = $payload->mission;
        $about->vision = $payload->vision;
        $about->save();

        return $about->fresh();
    }

    public function delete($aboutId)
    {
        return About::findOrFail($aboutId)->delete();
    }
}
