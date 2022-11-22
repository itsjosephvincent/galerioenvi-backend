<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ServiceRepositoryInterface;
use App\Models\Service;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Service::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $service = new Service();
        $service->icon_url = '';
        $service->title = $payload->title;
        $service->description = $payload->description;
        $service->content = $payload->content;
        $service->save();
        $insertMedia = Service::findOrFail($service->id);
        $insertMedia->addMediaFromRequest('icon_url')->toMediaCollection('service_media');
        $insertMedia->icon_url = $insertMedia->getMedia('service_media')->last()->getUrl();
        $insertMedia->save();

        return $service->fresh();
    }

    public function show($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function showBySlug($slug)
    {
        return Service::where('slug', $slug)->first();
    }

    public function update($payload, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->title = $payload->title;
        $service->description = $payload->description;
        $service->content = $payload->content;
        $service->save();

        return $service->fresh();
    }

    public function updateServiceIcon($payload, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $media = Media::where('model_id', $serviceId)->where('model_type', 'App\Models\Service')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $service->addMediaFromRequest('icon_url')->toMediaCollection('service_media');
        $service->icon_url = $service->getMedia('service_media')->last()->getUrl();
        $service->save();

        return $service->fresh();
    }

    public function delete($serviceId)
    {
        return Service::findOrFail($serviceId)->delete();
    }
}
