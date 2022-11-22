<?php

namespace App\Interfaces\Repositories;

interface AboutRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $aboutId);
    public function update(object $payload, int $aboutId);
    public function delete(int $aboutId);
}
