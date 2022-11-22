<?php

namespace App\Interfaces\Repositories;

interface ServiceRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $serviceId);
    public function showBySlug(string $slug);
    public function update(object $payload, int $serviceId);
    public function updateServiceIcon(object $payload, int $serviceId);
    public function delete(int $serviceId);
}
