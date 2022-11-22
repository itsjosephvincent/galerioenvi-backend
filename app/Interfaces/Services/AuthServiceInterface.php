<?php

namespace App\Interfaces\Services;

interface AuthServiceInterface
{
    public function authenticateAdmin(object $payload);
    public function logoutAdmin(object $request);
}
