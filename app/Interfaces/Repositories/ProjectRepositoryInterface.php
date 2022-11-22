<?php

namespace App\Interfaces\Repositories;

interface ProjectRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function allIncompleteProject(object $payload, string $sortField, string $sortOrder);
    public function allCompleteProject(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $projectId);
    public function showBySlug(string $slug);
    public function update(object $payload, int $projectId);
    public function updateProjectImage(object $payload, int $projectId);
    public function delete(int $projectId);
}
