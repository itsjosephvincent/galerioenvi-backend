<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TrainingCertificationRepositoryInterface;
use App\Models\TrainingCertification;

class TrainingCertificationRepository implements TrainingCertificationRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return TrainingCertification::filter($payload->all())
            ->where('training_id', $payload->training_id)
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $trainingCertification = new TrainingCertification();
        $trainingCertification->training_id = $payload->training_id;
        $trainingCertification->name = $payload->name;
        $trainingCertification->save();

        return $trainingCertification->fresh();
    }

    public function show($trainingCertificationId)
    {
        return TrainingCertification::findOrFail($trainingCertificationId);
    }

    public function update($payload, $trainingCertificationId)
    {
        $trainingCertification = TrainingCertification::findOrFail($trainingCertificationId);
        $trainingCertification->name = $payload->name;
        $trainingCertification->save();

        return $trainingCertification->fresh();
    }

    public function delete($trainingCertificationId)
    {
        return TrainingCertification::findOrFail($trainingCertificationId)->delete();
    }
}
