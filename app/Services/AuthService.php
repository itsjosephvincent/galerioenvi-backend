<?php

namespace App\Services;

use App\Exceptions\Auth\InvalidCredentialsException;
use App\Http\Resources\AdminAuthResource;
use App\Http\Resources\AdminResource;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Services\AuthServiceInterface;
use App\Traits\EncryptionTraits;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    use EncryptionTraits;

    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function authenticateAdmin($payload)
    {
        $email = $payload->email;
        $password = $payload->password;
        $admin = $this->adminRepository->showByEmail($email);

        if (!$admin) {
            throw new InvalidCredentialsException();
        } else {
            if (!Hash::check($password, $admin->password)) {
                throw new InvalidCredentialsException();
            } else {
                $token = $admin->createToken('auth-token')->plainTextToken;

                $data = (object) [
                    'token' => $token,
                    'admin' => new AdminResource($admin)
                ];
                return new AdminAuthResource($data);
            }
        }
    }

    public function logoutAdmin($request)
    {
        return $request->user()->tokens()->delete();
    }
}
