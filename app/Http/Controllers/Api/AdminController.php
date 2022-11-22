<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPhotoUpdateRequest;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Interfaces\Services\AdminServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->adminService->adminList($request)->response();
    }

    public function store(AdminStoreRequest $request): JsonResponse
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'email',
            'password'
        ]);

        return $this->adminService->saveAdmin($payload)->response();
    }

    public function show($adminId): JsonResponse
    {
        return $this->adminService->findAdminById($adminId)->response();
    }

    public function update(AdminUpdateRequest $request, $adminId)
    {
        $payload = (object) $request->only([
            'first_name',
            'last_name',
            'email',
            'is_active',
        ]);

        return $this->adminService->updateAdminById($payload, $adminId)->response();
    }

    public function updateAdminPhoto(AdminPhotoUpdateRequest $request, $adminId): JsonResponse
    {
        $payload = (object) $request->only([
            'img_url'
        ]);

        return $this->adminService->updateAdminImageUrl($payload, $adminId)->response();
    }

    public function destroy($adminId)
    {
        $this->adminService->deleteAdminById($adminId);
    }
}
