<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Interfaces\Services\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function adminAuthenticationByPassword(AuthRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'email',
            'password',
        ]);

        return $this->authService->authenticateAdmin($payload)->response();
    }

    public function logout(Request $request)
    {
        return $this->authService->logoutAdmin($request);
    }

    public function csrf()
    {
        return csrf_token();
    }
}
