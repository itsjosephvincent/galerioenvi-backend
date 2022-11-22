<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateImageRequest;
use App\Interfaces\Services\ProjectServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->projectService->projectList($request)->response();
    }

    public function ongoingProject(Request $request): JsonResponse
    {
        return $this->projectService->incompleteProjectList($request)->response();
    }

    public function completedProject(Request $request): JsonResponse
    {
        return $this->projectService->completedProjectList($request)->response();
    }

    public function store(ProjectStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'description',
            'location',
            'published_date',
            'content',
            'thumbnail_url'
        ]);

        return $this->projectService->saveProject($payload)->response();
    }

    public function show($projectId): JsonResponse
    {
        return $this->projectService->findProjectById($projectId)->response();
    }

    public function showBySlug($slug): JsonResponse
    {
        return $this->projectService->findBySlug($slug)->response();
    }


    public function update(ProjectStoreRequest $request, $projectId): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'description',
            'location',
            'published_date',
            'content',
            'completed_date'
        ]);

        return $this->projectService->updateProjectById($payload, $projectId)->response();
    }

    public function updateProjectPhoto(ProjectUpdateImageRequest $request, $projectId): JsonResponse
    {
        $payload = (object) $request->only([
            'thumbnail_url'
        ]);

        return $this->projectService->updateProjectImageById($payload, $projectId)->response();
    }

    public function destroy($projectId)
    {
        $this->projectService->deleteProjectById($projectId);
    }
}
