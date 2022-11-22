<?php

namespace App\Interfaces\Services;

interface TrainingCertificationServiceInterface
{
    public function trainingCertificationList(object $payload);
    public function saveTrainingCertification(object $payload);
    public function findTrainingCertificationById(int $trainingCertificationId);
    public function updateTrainingCertificationById(object $payload, int $trainingCertificationId);
    public function deleteTrainingCertificationById(int $trainingCertificationId);
}
