<?php

namespace App\Interfaces\Repositories;

interface ContactUsRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $contactUsId);
    public function update(object $payload, int $contactUsId);
    public function delete(int $contactUsId);
}
