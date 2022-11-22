<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientLogoUpdateRequest;
use App\Http\Requests\ClientStoreRequest;
use App\Interfaces\Services\ClientServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->clientService->clientList($request)->response();
    }

    public function store(ClientStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'logo_url',
            'description'
        ]);

        return $this->clientService->saveClient($payload)->response();
    }

    public function show($clientId): JsonResponse
    {
        return $this->clientService->findClientById($clientId)->response();
    }

    public function update(ClientStoreRequest $request, $clientId): JsonResponse
    {
        $payload = (object) $request->only([
            'name',
            'description'
        ]);

        return $this->clientService->updateClientById($payload, $clientId)->response();
    }

    public function updateLogo(ClientLogoUpdateRequest $request, $clientId): JsonResponse
    {
        $payload = (object) $request->only([
            'logo_url'
        ]);

        return $this->clientService->updateClientLogoById($payload, $clientId)->response();
    }

    public function destroy($clientId)
    {
        $this->clientService->deleteClientById($clientId);
    }
}
