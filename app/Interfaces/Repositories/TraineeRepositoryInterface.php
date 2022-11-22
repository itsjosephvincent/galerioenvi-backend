<?php

namespace App\Interfaces\Repositories;

interface TraineeRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $traineeId);
    public function update(object $payload, int $traineeId);
    public function delete(int $traineeId);
}
