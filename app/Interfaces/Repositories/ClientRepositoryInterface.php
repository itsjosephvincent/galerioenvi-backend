<?php

namespace App\Interfaces\Repositories;

interface ClientRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $clientId);
    public function update(object $payload, int $clientId);
    public function updateClientLogo(object $payload, int $clientId);
    public function delete(int $clientId);
}
