<?php

namespace App\Repositories;

use App\Interfaces\Repositories\TrainingRepositoryInterface;
use App\Models\Trainee;
use App\Models\Training;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TrainingRepository implements TrainingRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Training::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $training = new Training();
        $training->thumbnail_url = '';
        $training->title = $payload->title;
        $training->description = $payload->description;
        $training->date_from = $payload->date_from;
        $training->date_to = $payload->date_to;
        $training->location = $payload->location;
        $training->save();
        $insertMedia = Training::findOrFail($training->id);
        $insertMedia->addMediaFromRequest('thumbnail_url')->toMediaCollection('training_media');
        $insertMedia->thumbnail_url = $insertMedia->getMedia('training_media')->last()->getUrl();
        $insertMedia->save();

        return $training->fresh();
    }

    public function show($trainingId)
    {
        return Training::findOrFail($trainingId);
    }

    public function showBySlug($slug)
    {
        return Training::where('slug', $slug)->first();
    }

    public function getTrainees($slug)
    {
        return Training::join('training_certifications', 'trainings.id', '=', 'training_certifications.training_id')
            ->join('trainees', 'training_certifications.id', '=', 'trainees.training_certification_id')
            ->where('trainings.slug', $slug)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function update($payload, $trainingId)
    {
        $training = Training::findOrFail($trainingId);
        $training->title = $payload->title;
        $training->description = $payload->description;
        $training->date_from = $payload->date_from;
        $training->date_to = $payload->date_to;
        $training->location = $payload->location;
        $training->save();

        return $training->fresh();
    }

    public function updateTrainingPhoto($payload, $trainingId)
    {
        $training = Training::findOrFail($trainingId);
        $media = Media::where('model_id', $trainingId)->where('model_type', 'App\Models\Training')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $training->addMediaFromRequest('thumbnail_url')->toMediaCollection('training_media');
        $training->thumbnail_url = $training->getMedia('training_media')->last()->getUrl();
        $training->save();

        return $training->fresh();
    }

    public function delete($trainingId)
    {
        return Training::findOrFail($trainingId)->delete();
    }
}
