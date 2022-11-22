<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TraineeStoreRequest;
use App\Http\Requests\TraineeUpdateRequest;
use App\Interfaces\Services\TraineeServiceInterface;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    private $traineeService;

    public function __construct(TraineeServiceInterface $traineeService)
    {
        $this->traineeService = $traineeService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->traineeService->traineeList($request)->response();
    }

    public function store(TraineeStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'training_certification_id',
            'name',
            'certificate_no',
            'training_date_from',
            'training_date_to'
        ]);

        return $this->traineeService->saveTrainee($payload)->response();
    }

    public function show($traineeId): JsonResponse
    {
        return $this->traineeService->findTraineeById($traineeId)->response();
    }

    public function update(TraineeUpdateRequest $request, $traineeId): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'certificate_no',
            'training_date_from',
            'training_date_to'
        ]);

        return $this->traineeService->updateTraineeById($payload, $traineeId)->response();
    }

    public function destroy($traineeId)
    {
        $this->traineeService->deleteTraineeById($traineeId);
    }
}
