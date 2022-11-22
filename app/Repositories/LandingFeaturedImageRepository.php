<?php

namespace App\Repositories;

use App\Interfaces\Repositories\LandingFeaturedImageRepositoryInterface;
use App\Models\LandingFeaturedImage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LandingFeaturedImageRepository implements LandingFeaturedImageRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return LandingFeaturedImage::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $featured = new LandingFeaturedImage();
        $featured->name = $payload->name;
        $featured->image_url = '';
        $featured->save();
        $insertMedia = LandingFeaturedImage::findOrFail($featured->id);
        $insertMedia->addMediaFromRequest('image_url')->toMediaCollection('featured_media');
        $insertMedia->image_url = $insertMedia->getMedia('featured_media')->last()->getUrl();
        $insertMedia->save();

        return $featured->fresh();
    }

    public function show($featuredImageId)
    {
        return LandingFeaturedImage::findOrFail($featuredImageId);
    }

    public function update($payload, $featuredImageId)
    {
        $featured = LandingFeaturedImage::findOrFail($featuredImageId);
        $featured->name = $payload->name;
        if (isset($payload->image_url)) {
            $media = Media::where('model_id', $featured->id)->where('model_type', 'App\Models\LandingFeaturedImage')->first();
            if ($media) {
                $media->forceDelete($media->id);
            }
            $featured->addMediaFromRequest('image_url')->toMediaCollection('featured_media');
            $featured->image_url = $featured->getMedia('featured_media')->last()->getUrl();
        }
        $featured->save();

        return $featured->fresh();
    }

    public function delete($featuredImageId)
    {
        return LandingFeaturedImage::findOrFail($featuredImageId)->delete();
    }
}
