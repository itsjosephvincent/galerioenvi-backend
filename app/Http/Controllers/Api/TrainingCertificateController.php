<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingCertificationStoreRequest;
use App\Http\Requests\TrainingCertificationUpdateRequest;
use App\Interfaces\Services\TrainingCertificationServiceInterface;
use Illuminate\Http\Request;

class TrainingCertificateController extends Controller
{
    private $trainingCertificationService;

    public function __construct(TrainingCertificationServiceInterface $trainingCertificationService)
    {
        $this->trainingCertificationService = $trainingCertificationService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->trainingCertificationService->trainingCertificationList($request)->response();
    }

    public function store(TrainingCertificationStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'training_id',
            'name'
        ]);

        return $this->trainingCertificationService->saveTrainingCertification($payload)->response();
    }

    public function show($trainingCertificationId): JsonResponse
    {
        return $this->trainingCertificationService->findTrainingCertificationById($trainingCertificationId)->response();
    }

    public function update(TrainingCertificationUpdateRequest $request, $trainingCertificationId)
    {
        $payload = (object) $request->only([
            'name'
        ]);

        return $this->trainingCertificationService->updateTrainingCertificationById($payload, $trainingCertificationId)->response();
    }

    public function destroy($trainingCertificationId)
    {
        $this->trainingCertificationService->deleteTrainingCertificationById($trainingCertificationId);
    }
}
