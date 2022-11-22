<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutStoreRequest;
use App\Interfaces\Services\AboutServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    private $aboutService;

    public function __construct(AboutServiceInterface $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->aboutService->aboutList($request)->response();
    }

    public function store(AboutStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'content',
            'mission',
            'vision'
        ]);

        return $this->aboutService->saveAbout($payload)->response();
    }

    public function show($aboutId): JsonResponse
    {
        return $this->aboutService->findAboutById($aboutId)->response();
    }

    public function update(AboutStoreRequest $request, $aboutId): JsonResponse
    {
        $payload = (object) $request->only([
            'content',
            'mission',
            'vision'
        ]);

        return $this->aboutService->updateAboutById($payload, $aboutId)->response();
    }

    public function destroy($aboutId)
    {
        $this->aboutService->deleteAboutById($aboutId);
    }
}
