<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsStoreRequest;
use App\Interfaces\Services\ContactUsServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $contactUsService;

    public function __construct(ContactUsServiceInterface $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->contactUsService->contactUsList($request)->response();
    }

    public function store(ContactUsStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'emails',
            'phones',
            'offices'
        ]);

        return $this->contactUsService->saveContactUs($payload)->response();
    }

    public function show($contactUsId): JsonResponse
    {
        return $this->contactUsService->findContactUsById($contactUsId)->response();
    }

    public function update(ContactUsStoreRequest $request, $contactUsId)
    {
        $payload = (object) $request->only([
            'emails',
            'phones',
            'offices'
        ]);

        return $this->contactUsService->updateContactUsById($payload, $contactUsId)->response();
    }

    public function destroy($contactUsId)
    {
        $this->contactUsService->deleteContactUsById($contactUsId);
    }
}
