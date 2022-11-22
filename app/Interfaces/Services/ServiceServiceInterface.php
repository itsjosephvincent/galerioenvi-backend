<?php

namespace App\Interfaces\Services;

interface ServiceServiceInterface
{
    public function serviceList(object $payload);
    public function saveService(object $payload);
    public function findServiceById(int $serviceId);
    public function findServiceBySlug(string $slug);
    public function updateServiceById(object $payload, int $serviceId);
    public function updateServiceIconById(object $payload, int $serviceId);
    public function deleteServiceById(int $serviceId);
}
