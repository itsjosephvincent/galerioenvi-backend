<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceIconUpdateRequest;
use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Interfaces\Services\ServiceServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceServiceInterface $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->serviceService->serviceList($request)->response();
    }

    public function store(ServiceStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'icon_url',
            'title',
            'description',
            'content'
        ]);

        return $this->serviceService->saveService($payload)->response();
    }

    public function show($serviceId): JsonResponse
    {
        return $this->serviceService->findServiceById($serviceId)->response();
    }

    public function showBySlug($slug): JsonResponse
    {
        return $this->serviceService->findServiceBySlug($slug)->response();
    }

    public function update(ServiceUpdateRequest $request, $serviceId): JsonResponse
    {
        $payload = (object) $request->only([
            'icon_url',
            'title',
            'description',
            'content'
        ]);

        return $this->serviceService->updateServiceById($payload, $serviceId)->response();
    }

    public function updateServiceIcon(ServiceIconUpdateRequest $request, $serviceId): JsonResponse
    {
        $payload = (object) $request->only([
            'icon_url'
        ]);

        return $this->serviceService->updateServiceIconById($payload, $serviceId)->response();
    }

    public function destroy($serviceId)
    {
        $this->serviceService->deleteServiceById($serviceId);
    }
}
