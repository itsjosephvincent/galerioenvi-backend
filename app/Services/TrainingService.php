<?php

namespace App\Services;

use App\Http\Resources\TrainingResource;
use App\Http\Resources\TrainingTraineesResource;
use App\Interfaces\Repositories\TrainingRepositoryInterface;
use App\Interfaces\Services\TrainingServiceInterface;
use App\Traits\SortingTraits;

class TrainingService implements TrainingServiceInterface
{
    use SortingTraits;

    private $trainingRepository;

    public function __construct(TrainingRepositoryInterface $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function trainingList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $training = $this->trainingRepository->index($payload, $sortField, $sortOrder);

        return TrainingResource::collection($training);
    }

    public function saveTraining($payload)
    {
        $training = $this->trainingRepository->save($payload);

        return new TrainingResource($training);
    }

    public function findTrainingById($trainingId)
    {
        $training = $this->trainingRepository->show($trainingId);

        return new TrainingResource($training);
    }

    public function findTrainingBySlug($slug)
    {
        $training = $this->trainingRepository->showBySlug($slug);

        return new TrainingResource($training);
    }

    public function getTraineesBySlug($slug)
    {
        $training = $this->trainingRepository->getTrainees($slug);

        return TrainingTraineesResource::collection($training);
    }

    public function updateTrainingById($payload, $trainingId)
    {
        $training = $this->trainingRepository->update($payload, $trainingId);

        return new TrainingResource($training);
    }

    public function updateTrainingPhotoById($payload, $trainingId)
    {
        $training = $this->trainingRepository->updateTrainingPhoto($payload, $trainingId);

        return new TrainingResource($training);
    }

    public function deleteTrainingById($trainingId)
    {
        $this->trainingRepository->delete($trainingId);
    }
}
