<?php

namespace App\Interfaces\Services;

interface TraineeServiceInterface
{
    public function traineeList(object $payload);
    public function saveTrainee(object $payload);
    public function findTraineeById(int $traineeId);
    public function updateTraineeById(object $payload, int $traineeId);
    public function deleteTraineeById(int $traineeId);
}
