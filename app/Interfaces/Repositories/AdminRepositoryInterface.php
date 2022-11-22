<?php

namespace App\Interfaces\Repositories;

interface AdminRepositoryInterface
{
    public function index(object $payload, string $sortField, string $sortOrder);
    public function save(object $payload);
    public function show(int $adminId);
    public function showByEmail(string $email);
    public function update(object $payload, int $adminId);
    public function updateAdminImage(object $payload, int $adminId);
    public function delete(int $adminId);
}
