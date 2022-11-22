<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Models\Client;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ClientRepository implements ClientRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return Client::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $client = new Client();
        $client->name = $payload->name;
        $client->logo_url = '';
        $client->description = $payload->description;
        $client->save();
        $insertMedia = Client::findOrFail($client->id);
        $insertMedia->addMediaFromRequest('logo_url')->toMediaCollection('client_media');
        $insertMedia->logo_url = $insertMedia->getMedia('client_media')->last()->getUrl();
        $insertMedia->save();

        return $client->fresh();
    }

    public function show($clientId)
    {
        return Client::findOrFail($clientId);
    }

    public function update($payload, $clientId)
    {
        $client = Client::findOrFail($clientId);
        $client->name = $payload->name;
        $client->description = $payload->description;
        $client->save();

        return $client->fresh();
    }

    public function updateClientLogo($payload, $clientId)
    {
        $client = Client::findOrFail($clientId);
        $media = Media::where('model_id', $clientId)->where('model_type', 'App\Models\Client')->first();
        if ($media) {
            $media->forceDelete($media->id);
        }
        $client->addMediaFromRequest('logo_url')->toMediaCollection('client_media');
        $client->logo_url = $client->getMedia('client_media')->last()->getUrl();
        $client->save();

        return $client->fresh();
    }

    public function delete($clientId)
    {
        return Client::findOrFail($clientId)->delete();
    }
}
