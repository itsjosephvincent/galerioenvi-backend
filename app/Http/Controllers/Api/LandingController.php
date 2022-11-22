<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LandingStoreRequest;
use App\Interfaces\Services\LandingServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $landingService;

    public function __construct(LandingServiceInterface $landingService)
    {
        $this->landingService = $landingService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->landingService->landingList($request)->response();
    }

    public function store(LandingStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'header_text',
            'video_url'
        ]);

        return $this->landingService->saveLanding($payload)->response();
    }

    public function show($landingId): JsonResponse
    {
        return $this->landingService->findLandingById($landingId)->response();
    }

    public function update(LandingStoreRequest $request, $landingId): JsonResponse
    {
        $payload = (object) $request->only([
            'header_text',
            'video_url'
        ]);

        return $this->landingService->updateLandingById($payload, $landingId)->response();
    }

    public function destroy($landingId)
    {
        $this->landingService->deleteLandingById($landingId);
    }
}
