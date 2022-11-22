<?php

namespace App\Services;

use App\Http\Resources\ClientResource;
use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Interfaces\Services\ClientServiceInterface;
use App\Traits\SortingTraits;

class ClientService implements ClientServiceInterface
{
    use SortingTraits;

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function clientList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $client = $this->clientRepository->index($payload, $sortField, $sortOrder);

        return ClientResource::collection($client);
    }

    public function saveClient($payload)
    {
        $client = $this->clientRepository->save($payload);

        return new ClientResource($client);
    }

    public function findClientById($clientId)
    {
        $client = $this->clientRepository->show($clientId);

        return new ClientResource($client);
    }

    public function updateClientById($payload, $clientId)
    {
        $client = $this->clientRepository->update($payload, $clientId);

        return new ClientResource($client);
    }

    public function updateClientLogoById($payload, $clientId)
    {
        $client = $this->clientRepository->updateClientLogo($payload, $clientId);

        return new ClientResource($client);
    }

    public function deleteClientById($clientId)
    {
        $this->clientRepository->delete($clientId);
    }
}
