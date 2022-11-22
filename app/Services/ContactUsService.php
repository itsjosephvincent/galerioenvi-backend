<?php

namespace App\Services;

use App\Http\Resources\ContactUsResource;
use App\Interfaces\Repositories\ContactUsRepositoryInterface;
use App\Interfaces\Services\ContactUsServiceInterface;
use App\Traits\SortingTraits;

class ContactUsService implements ContactUsServiceInterface
{
    use SortingTraits;

    private $contactUsRepository;

    public function __construct(ContactUsRepositoryInterface $contactUsRepository)
    {
        $this->contactUsRepository = $contactUsRepository;
    }

    public function contactUsList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $contactUs = $this->contactUsRepository->index($payload, $sortField, $sortOrder);

        return ContactUsResource::collection($contactUs);
    }

    public function saveContactUs($payload)
    {
        $contactUs = $this->contactUsRepository->save($payload);

        return new ContactUsResource($contactUs);
    }

    public function findContactUsById($contactUsId)
    {
        $contactUs = $this->contactUsRepository->show($contactUsId);

        return new ContactUsResource($contactUs);
    }

    public function updateContactUsById($payload, $contactUsId)
    {
        $contactUs = $this->contactUsRepository->update($payload, $contactUsId);

        return new ContactUsResource($contactUs);
    }

    public function deleteContactUsById($contactUsId)
    {
        $this->contactUsRepository->delete($contactUsId);
    }
}
