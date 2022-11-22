<?php

namespace App\Interfaces\Services;

interface ContactUsServiceInterface
{
    public function contactUsList(object $payload);
    public function saveContactUs(object $payload);
    public function findContactUsById(int $contactUsId);
    public function updateContactUsById(object $payload, int $contactUsId);
    public function deleteContactUsById(int $contactUsId);
}
