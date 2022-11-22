<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerStoreRequest;
use App\Interfaces\Services\CareerServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    private $careerService;

    public function __construct(CareerServiceInterface $careerService)
    {
        $this->careerService = $careerService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->careerService->careerList($request)->response();
    }

    public function store(CareerStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'published_date'
        ]);

        return $this->careerService->saveCareer($payload)->response();
    }

    public function show($careerId): JsonResponse
    {
        return $this->careerService->findCareerById($careerId)->response();
    }

    public function update(CareerStoreRequest $request, $careerId)
    {
        $payload = (object) $request->only([
            'title',
            'content',
            'published_date'
        ]);

        return $this->careerService->updateCareerById($payload, $careerId)->response();
    }

    public function destroy($careerId)
    {
        $this->careerService->deleteCareerById($careerId);
    }
}
