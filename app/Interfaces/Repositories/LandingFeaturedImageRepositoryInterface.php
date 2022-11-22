<?php

namespace App\Interfaces\Repositories;

interface LandingFeaturedImageRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $featuredImageId);
    public function update(object $payload, int $featuredImageId);
    public function delete(int $featuredImageId);
}
