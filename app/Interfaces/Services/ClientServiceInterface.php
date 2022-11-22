<?php

namespace App\Interfaces\Services;

interface ClientServiceInterface
{
    public function clientList(object $payload);
    public function saveClient(object $payload);
    public function findClientById(int $clientId);
    public function updateClientById(object $payload, int $clientId);
    public function updateClientLogoById(object $payload, int $clientId);
    public function deleteClientById(int $clientId);
}
