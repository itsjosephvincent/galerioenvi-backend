<?php

namespace App\Services;

use App\Http\Resources\LandingFeaturedImageResource;
use App\Interfaces\Repositories\LandingFeaturedImageRepositoryInterface;
use App\Interfaces\Services\LandingFeaturedImageServiceInterface;
use App\Traits\SortingTraits;

class LandingFeaturedImageService implements LandingFeaturedImageServiceInterface
{
    use SortingTraits;

    private $landingFeaturedImageRepository;

    public function __construct(LandingFeaturedImageRepositoryInterface $landingFeaturedImageRepository)
    {
        $this->landingFeaturedImageRepository = $landingFeaturedImageRepository;
    }

    public function featuredImageList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $featured = $this->landingFeaturedImageRepository->index($payload, $sortField, $sortOrder);

        return LandingFeaturedImageResource::collection($featured);
    }

    public function saveFeaturedImage($payload)
    {
        $featured = $this->landingFeaturedImageRepository->save($payload);

        return new LandingFeaturedImageResource($featured);
    }

    public function findFeaturedImageById($featuredImageId)
    {
        $featured = $this->landingFeaturedImageRepository->show($featuredImageId);

        return new LandingFeaturedImageResource($featured);
    }

    public function updateFeaturedImageById($payload, $featuredImageId)
    {
        $featured = $this->landingFeaturedImageRepository->update($payload, $featuredImageId);

        return new LandingFeaturedImageResource($featured);
    }

    public function deleteFeaturedImageById($featuredImageId)
    {
        $this->landingFeaturedImageRepository->delete($featuredImageId);
    }
}
