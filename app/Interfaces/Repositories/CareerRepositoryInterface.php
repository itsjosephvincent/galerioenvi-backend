<?php

namespace App\Interfaces\Repositories;

interface CareerRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $careerId);
    public function update(object $payload, int $careerId);
    public function delete(int $careerId);
}
