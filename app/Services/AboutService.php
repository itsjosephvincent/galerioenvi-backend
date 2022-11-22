<?php

namespace App\Services;

use App\Http\Resources\AboutResource;
use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Interfaces\Services\AboutServiceInterface;
use App\Traits\SortingTraits;

class AboutService implements AboutServiceInterface
{
    use SortingTraits;

    private $aboutRepository;

    public function __construct(AboutRepositoryInterface $aboutRepository)
    {
        $this->aboutRepository = $aboutRepository;
    }

    public function aboutList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $about = $this->aboutRepository->index($payload, $sortField, $sortOrder);

        return AboutResource::collection($about);
    }

    public function saveAbout($payload)
    {
        $about = $this->aboutRepository->save($payload);

        return new AboutResource($about);
    }

    public function findAboutById($aboutId)
    {
        $about = $this->aboutRepository->show($aboutId);

        return new AboutResource($about);
    }

    public function updateAboutById($payload, $aboutId)
    {
        $about = $this->aboutRepository->update($payload, $aboutId);

        return new AboutResource($about);
    }

    public function deleteAboutById($aboutId)
    {
        $this->aboutRepository->delete($aboutId);
    }
}
