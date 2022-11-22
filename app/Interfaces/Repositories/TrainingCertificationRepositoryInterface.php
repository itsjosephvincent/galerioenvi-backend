<?php

namespace App\Interfaces\Repositories;

interface TrainingCertificationRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $trainingCertificationId);
    public function update(object $payload, int $trainingCertificationId);
    public function delete(int $trainingCertificationId);
}
