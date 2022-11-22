<?php

namespace App\Interfaces\Services;

interface LandingFeaturedImageServiceInterface
{
    public function featuredImageList(object $payload);
    public function saveFeaturedImage(object $payload);
    public function findFeaturedImageById(int $featuredImageId);
    public function updateFeaturedImageById(object $payload, int $featuredImageId);
    public function deleteFeaturedImageById(int $featuredImageId);
}
