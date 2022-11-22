<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingStoreRequest;
use App\Http\Requests\TrainingTraineesRequest;
use App\Http\Requests\TrainingUpdateImageRequest;
use App\Http\Requests\TrainingUpdateRequest;
use App\Interfaces\Services\TrainingServiceInterface;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    private $trainingService;

    public function __construct(TrainingServiceInterface $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->trainingService->trainingList($request)->response();
    }

    public function store(TrainingStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'thumbnail_url',
            'title',
            'description',
            'date_from',
            'date_to',
            'location'
        ]);

        return $this->trainingService->saveTraining($payload)->response();
    }

    public function show($trainingId): JsonResponse
    {
        return $this->trainingService->findTrainingById($trainingId)->response();
    }

    public function showBySlug($slug): JsonResponse
    {
        return $this->trainingService->findTrainingBySlug($slug)->response();
    }

    public function showTraineesBySlug($slug): JsonResponse
    {
        return $this->trainingService->getTraineesBySlug($slug)->response();
    }

    public function update(TrainingUpdateRequest $request, $trainingId): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'description',
            'date_from',
            'date_to',
            'location'
        ]);

        return $this->trainingService->updateTrainingById($payload, $trainingId)->response();
    }

    public function updateTrainingImage(TrainingUpdateImageRequest $request, $trainingId)
    {
        $payload = (object) $request->only([
            'thumbnail_url',
        ]);

        return $this->trainingService->updateTrainingPhotoById($payload, $trainingId)->response();
    }

    public function destroy($trainingId)
    {
        $this->trainingService->deleteTrainingById($trainingId);
    }
}
