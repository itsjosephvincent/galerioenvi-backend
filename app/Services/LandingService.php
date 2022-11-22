<?php

namespace App\Services;

use App\Http\Resources\LandingResource;
use App\Interfaces\Repositories\LandingRepositoryInterface;
use App\Interfaces\Services\LandingServiceInterface;
use App\Traits\SortingTraits;

class LandingService implements LandingServiceInterface
{
    use SortingTraits;

    private $landingRepository;

    public function __construct(LandingRepositoryInterface $landingRepository)
    {
        $this->landingRepository = $landingRepository;
    }

    public function landingList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $landing = $this->landingRepository->index($payload, $sortField, $sortOrder);

        return LandingResource::collection($landing);
    }

    public function saveLanding($payload)
    {
        $landing = $this->landingRepository->save($payload);

        return new LandingResource($landing);
    }

    public function findLandingById($landingId)
    {
        $landing = $this->landingRepository->show($landingId);

        return new LandingResource($landing);
    }

    public function updateLandingById($payload, $landingId)
    {
        $landing = $this->landingRepository->update($payload, $landingId);

        return new LandingResource($landing);
    }

    public function deleteLandingById($landingId)
    {
        $this->landingRepository->delete($landingId);
    }
}
