<?php

namespace App\Interfaces\Services;

interface LandingServiceInterface
{
    public function landingList(object $payload);
    public function saveLanding(object $payload);
    public function findLandingById(int $landingId);
    public function updateLandingById(object $payload, int $landingId);
    public function deleteLandingById(int $landingId);
}
