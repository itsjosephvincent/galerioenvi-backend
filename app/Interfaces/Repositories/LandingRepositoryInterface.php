<?php

namespace App\Interfaces\Repositories;

interface LandingRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $landingId);
    public function update(object $payload, int $landingId);
    public function delete(int $landingId);
}
