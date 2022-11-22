<?php

namespace App\Interfaces\Services;

interface ProjectServiceInterface
{
    public function projectList(object $payload);
    public function incompleteProjectList(object $payload);
    public function completedProjectList(object $payload);
    public function saveProject(object $payload);
    public function findProjectById(int $projectId);
    public function findBySlug(string $slug);
    public function updateProjectById(object $payload, int $projectId);
    public function updateProjectImageById(object $payload, int $projectId);
    public function deleteProjectById(int $projectId);
}
