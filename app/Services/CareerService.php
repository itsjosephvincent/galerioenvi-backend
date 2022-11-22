<?php

namespace App\Services;

use App\Http\Resources\CareerResource;
use App\Interfaces\Repositories\CareerRepositoryInterface;
use App\Interfaces\Services\CareerServiceInterface;
use App\Traits\SortingTraits;

class CareerService implements CareerServiceInterface
{
    use SortingTraits;

    private $careerRepository;

    public function __construct(CareerRepositoryInterface $careerRepository)
    {
        $this->careerRepository = $careerRepository;
    }

    public function careerList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $career = $this->careerRepository->index($payload, $sortField, $sortOrder);

        return CareerResource::collection($career);
    }

    public function saveCareer($payload)
    {
        $career = $this->careerRepository->save($payload);

        return new CareerResource($career);
    }

    public function findCareerById($careerId)
    {
        $career = $this->careerRepository->show($careerId);

        return new CareerResource($career);
    }

    public function updateCareerById($payload, $careerId)
    {
        $career = $this->careerRepository->update($payload, $careerId);

        return new CareerResource($career);
    }

    public function deleteCareerById($careerId)
    {
        $this->careerRepository->delete($careerId);
    }
}
