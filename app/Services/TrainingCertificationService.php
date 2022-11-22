<?php

namespace App\Services;

use App\Http\Resources\TrainingCertificationResource;
use App\Interfaces\Repositories\TrainingCertificationRepositoryInterface;
use App\Interfaces\Services\TrainingCertificationServiceInterface;
use App\Traits\SortingTraits;

class TrainingCertificationService implements TrainingCertificationServiceInterface
{
    use SortingTraits;

    private $trainingCertificationRepository;

    public function __construct(TrainingCertificationRepositoryInterface $trainingCertificationRepository)
    {
        $this->trainingCertificationRepository = $trainingCertificationRepository;
    }

    public function trainingCertificationList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $certificates = $this->trainingCertificationRepository->index($payload, $sortField, $sortOrder);

        return TrainingCertificationResource::collection($certificates);
    }

    public function saveTrainingCertification($payload)
    {
        $certificate = $this->trainingCertificationRepository->save($payload);

        return new TrainingCertificationResource($certificate);
    }

    public function findTrainingCertificationById($trainingCertificationId)
    {
        $certificate = $this->trainingCertificationRepository->show($trainingCertificationId);

        return new TrainingCertificationResource($certificate);
    }

    public function updateTrainingCertificationById($payload, $trainingCertificationId)
    {
        $certificate = $this->trainingCertificationRepository->update($payload, $trainingCertificationId);

        return new TrainingCertificationResource($certificate);
    }

    public function deleteTrainingCertificationById($trainingCertificationId)
    {
        $this->trainingCertificationRepository->delete($trainingCertificationId);
    }
}
