<?php

namespace App\Repositories;

use App\Interfaces\Repositories\LandingRepositoryInterface;
use App\Models\Landing;

class LandingRepository implements LandingRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Landing::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $landing = new Landing();
        $landing->header_text = $payload->header_text;
        $landing->video_url = $payload->video_url;
        $landing->save();

        return $landing->fresh();
    }

    public function show($landingId)
    {
        return Landing::findOrFail($landingId);
    }

    public function update($payload, $landingId)
    {
        $landing = Landing::findOrFail($landingId);
        $landing->header_text = $payload->header_text;
        $landing->video_url = $payload->video_url;
        $landing->save();

        return $landing->fresh();
    }

    public function delete($landingId)
    {
        return Landing::findOrFail($landingId)->delete();
    }
}
