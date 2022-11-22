<?php

namespace App\Services;

use App\Http\Resources\AdminResource;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Services\AdminServiceInterface;
use App\Traits\SortingTraits;

class AdminService implements AdminServiceInterface
{
    use SortingTraits;

    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function adminList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $admin = $this->adminRepository->index($payload, $sortField, $sortOrder);

        return AdminResource::collection($admin);
    }

    public function saveAdmin($payload)
    {
        $admin = $this->adminRepository->save($payload);

        return new AdminResource($admin);
    }

    public function findAdminById($adminId)
    {
        $admin = $this->adminRepository->show($adminId);

        return new AdminResource($admin);
    }

    public function updateAdminById($payload, $adminId)
    {
        $admin = $this->adminRepository->update($payload, $adminId);

        return new AdminResource($admin);
    }

    public function updateAdminImageUrl($payload, $adminId)
    {
        $admin = $this->adminRepository->updateAdminImage($payload, $adminId);

        return new AdminResource($admin);
    }

    public function deleteAdminById($adminId)
    {
        $this->adminRepository->delete($adminId);
    }
}
