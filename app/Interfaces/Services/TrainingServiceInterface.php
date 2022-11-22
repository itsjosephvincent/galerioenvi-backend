<?php

namespace App\Interfaces\Services;

interface TrainingServiceInterface
{
    public function trainingList(object $payload);
    public function saveTraining(object $payload);
    public function findTrainingById(int $trainingId);
    public function findTrainingBySlug(string $slug);
    public function getTraineesBySlug(string $slug);
    public function updateTrainingById(object $payload, int $trainingId);
    public function updateTrainingPhotoById(object $payload, int $trainingId);
    public function deleteTrainingById(int $trainingId);
}
