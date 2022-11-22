<?php

namespace App\Interfaces\Repositories;

interface TrainingRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $trainingId);
    public function showBySlug(string $slug);
    public function getTrainees(string $slug);
    public function update(object $payload, int $trainingId);
    public function updateTrainingPhoto(object $payload, int $trainingId);
    public function delete(int $trainingId);
}
