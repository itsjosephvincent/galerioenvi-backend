<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Interfaces\Repositories\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Admin::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $admin = new Admin();
        $admin->first_name = $payload->first_name;
        $admin->last_name = $payload->last_name;
        $admin->email = $payload->email;
        $admin->password = Hash::make($payload->password);
        $admin->img_url = '';
        $admin->is_active = true;
        $admin->save();
        $insertMedia = Admin::findOrFail($admin->id);
        $insertMedia->addMediaFromRequest('img_url')->toMediaCollection('admin_media');
        $insertMedia->img_url = $insertMedia->getMedia('admin_media')->last()->getUrl();
        $insertMedia->save();

        return $admin->fresh();
    }

    public function show($adminId)
    {
        return Admin::findOrFail($adminId);
    }

    public function showByEmail(string $email)
    {
        return Admin::where('email', $email)->first();
    }

    public function update($payload, $adminId)
    {
        $admin = Admin::findOrFail($adminId);
        $admin->first_name = $payload->first_name;
        $admin->last_name = $payload->last_name;
        $admin->email = $payload->email;
        $admin->is_active = $payload->is_active;
        $admin->save();

        return $admin->fresh();
    }

    public function updateAdminImage($payload, $adminId)
    {
        $admin = Admin::findOrFail($adminId);
        $media = Media::where('model_id', $adminId)->where('model_type', 'App\Models\Admin')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $admin->addMediaFromRequest('img_url')->toMediaCollection('admin_media');
        $admin->img_url = $admin->getMedia('admin_media')->last()->getUrl();
        $admin->save();

        return $admin->fresh();
    }

    public function delete($adminId)
    {
        return Admin::findOrFail($adminId)->delete();
    }
}
