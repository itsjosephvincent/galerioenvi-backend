<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ContactUsRepositoryInterface;
use App\Models\ContactUs;

class ContactUsRepository implements ContactUsRepositoryInterface
{
    public function index($payload, $sortField, $sortOrder)
    {
        return ContactUs::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('constants.defaultPageSize'));
    }

    public function save($payload)
    {
        $contactUs = new ContactUs();
        $contactUs->emails = $payload->emails;
        $contactUs->phones = $payload->phones;
        $contactUs->offices = $payload->offices;
        $contactUs->save();

        return $contactUs->fresh();
    }

    public function show($contactUsId)
    {
        return ContactUs::findOrFail($contactUsId);
    }

    public function update($payload, $contactUsId)
    {
        $contactUs = ContactUs::findOrFail($contactUsId);
        $contactUs->emails = $payload->emails;
        $contactUs->phones = $payload->phones;
        $contactUs->offices = $payload->offices;
        $contactUs->save();

        return $contactUs->fresh();
    }

    public function delete($contactUsId)
    {
        return ContactUs::findOrFail($contactUsId)->delete();
    }
}
