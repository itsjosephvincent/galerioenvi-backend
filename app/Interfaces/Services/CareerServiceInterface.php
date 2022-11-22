<?php

namespace App\Interfaces\Services;

interface CareerServiceInterface
{
    public function careerList(object $payload);
    public function saveCareer(object $payload);
    public function findCareerById(int $careerId);
    public function updateCareerById(object $payload, int $careerId);
    public function deleteCareerById(int $careerId);
}
