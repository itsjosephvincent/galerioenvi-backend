<?php

namespace App\Services;

use App\Http\Resources\ProjectResource;
use App\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Interfaces\Services\ProjectServiceInterface;
use App\Traits\SortingTraits;

class ProjectService implements ProjectServiceInterface
{
    use SortingTraits;

    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function projectList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $project = $this->projectRepository->index($payload, $sortField, $sortOrder);

        return ProjectResource::collection($project);
    }

    public function incompleteProjectList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $project = $this->projectRepository->allIncompleteProject($payload, $sortField, $sortOrder);

        return ProjectResource::collection($project);
    }

    public function completedProjectList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $project = $this->projectRepository->allCompleteProject($payload, $sortField, $sortOrder);

        return ProjectResource::collection($project);
    }

    public function saveProject($payload)
    {
        $project = $this->projectRepository->save($payload);

        return new ProjectResource($project);
    }

    public function findProjectById($projectId)
    {
        $project = $this->projectRepository->show($projectId);

        return new ProjectResource($project);
    }

    public function findBySlug($slug)
    {
        $project = $this->projectRepository->showBySlug($slug);

        return new ProjectResource($project);
    }

    public function updateProjectById($payload, $projectId)
    {
        $project = $this->projectRepository->update($payload, $projectId);

        return new ProjectResource($project);
    }

    public function updateProjectImageById($payload, $projectId)
    {
        $project = $this->projectRepository->updateProjectImage($payload, $projectId);

        return new ProjectResource($project);
    }

    public function deleteProjectById($projectId)
    {
        $this->projectRepository->delete($projectId);
    }
}
