<?php

namespace App\Interfaces\Services;

interface AboutServiceInterface
{
    public function aboutList(object $payload);
    public function saveAbout(object $payload);
    public function findAboutById(int $aboutId);
    public function updateAboutById(object $payload, int $aboutId);
    public function deleteAboutById(int $aboutId);
}
