<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LandingFeaturedImagePhotoUpdateRequest;
use App\Http\Requests\LandingFeaturedImageStoreRequest;
use App\Http\Requests\LandingFeaturedImageUpdateRequest;
use App\Interfaces\Services\LandingFeaturedImageServiceInterface;
use Illuminate\Http\Request;

class LandingFeaturedImageController extends Controller
{
    private $landingFeaturedImageService;

    public function __construct(LandingFeaturedImageServiceInterface $landingFeaturedImageService)
    {
        $this->landingFeaturedImageService = $landingFeaturedImageService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->landingFeaturedImageService->featuredImageList($request)->response();
    }

    public function store(LandingFeaturedImageStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'image_url'
        ]);

        return $this->landingFeaturedImageService->saveFeaturedImage($payload)->response();
    }

    public function show($featuredImageId): JsonResponse
    {
        return $this->landingFeaturedImageService->findFeaturedImageById($featuredImageId)->response();
    }

    public function update(LandingFeaturedImageUpdateRequest $request, $featuredImageId)
    {
        $payload = (object) $request->only([
            'name',
            'image_url'
        ]);

        return $this->landingFeaturedImageService->updateFeaturedImageById($payload, $featuredImageId)->response();
    }

    public function destroy($featuredImageId)
    {
        $this->landingFeaturedImageService->deleteFeaturedImageById($featuredImageId);
    }
}
