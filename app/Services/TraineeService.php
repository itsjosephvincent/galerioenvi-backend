<?php

namespace App\Services;

use App\Http\Resources\TraineeResource;
use App\Interfaces\Repositories\TraineeRepositoryInterface;
use App\Interfaces\Services\TraineeServiceInterface;
use App\Traits\SortingTraits;

class TraineeService implements TraineeServiceInterface
{
    use SortingTraits;

    private $traineeRepository;

    public function __construct(TraineeRepositoryInterface $traineeRepository)
    {
        $this->traineeRepository = $traineeRepository;
    }

    public function traineeList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $trainee = $this->traineeRepository->index($payload, $sortField, $sortOrder);

        return TraineeResource::collection($trainee);
    }

    public function saveTrainee($payload)
    {
        $trainee = $this->traineeRepository->save($payload);

        return new TraineeResource($trainee);
    }

    public function findTraineeById($traineeId)
    {
        $trainee = $this->traineeRepository->show($traineeId);

        return new TraineeResource($trainee);
    }

    public function updateTraineeById($payload, $traineeId)
    {
        $trainee = $this->traineeRepository->update($payload, $traineeId);

        return new TraineeResource($trainee);
    }

    public function deleteTraineeById($traineeId)
    {
        $this->traineeRepository->delete($traineeId);
    }
}
