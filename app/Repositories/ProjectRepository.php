<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Models\Project;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Project::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function allIncompleteProject($payload, $sortField, $sortOrder)
    {
        return Project::where('completed_date', null)
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function allCompleteProject($payload, $sortField, $sortOrder)
    {
        return Project::whereNotNull('completed_date')
            ->filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $project = new Project();
        $project->thumbnail_url = '';
        $project->title = $payload->title;
        $project->description = $payload->description;
        $project->location = $payload->location;
        $project->published_date = $payload->published_date;
        $project->content = $payload->content;
        $project->save();
        $insertMedia = Project::findOrFail($project->id);
        $insertMedia->addMediaFromRequest('thumbnail_url')->toMediaCollection('project_media');
        $insertMedia->thumbnail_url = $insertMedia->getMedia('project_media')->last()->getUrl();
        $insertMedia->save();

        return $project->fresh();
    }

    public function show($projectId)
    {
        return Project::findOrFail($projectId);
    }

    public function showBySlug($slug)
    {
        return Project::where('slug', $slug)->first();
    }

    public function update($payload, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $project->title = $payload->title;
        $project->description = $payload->description;
        $project->location = $payload->location;
        $project->published_date = $payload->published_date;
        $project->content = $payload->content;
        $project->completed_date = $payload->completed_date;
        $project->save();
        return $project->fresh();
    }

    public function updateProjectImage($payload, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $media = Media::where('model_id', $projectId)->where('model_type', 'App\Models\Project')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $project->addMediaFromRequest('thumbnail_url')->toMediaCollection('project_media');
        $project->thumbnail_url = $project->getMedia('project_media')->last()->getUrl();
        $project->save();

        return $project->fresh();
    }

    public function delete($projectId)
    {
        return Project::findOrFail($projectId)->delete();
    }
}
