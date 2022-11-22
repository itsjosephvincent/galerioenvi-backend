<?php

namespace App\Interfaces\Services;

interface AdminServiceInterface
{
    public function adminList(object $payload);
    public function saveAdmin(object $payload);
    public function findAdminById(int $adminId);
    public function updateAdminById(object $payload, int $adminId);
    public function updateAdminImageUrl(object $payload, int $adminId);
    public function deleteAdminById(int $adminId);
}
