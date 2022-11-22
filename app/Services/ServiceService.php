<?php

namespace App\Services;

use App\Http\Resources\ServiceResource;
use App\Interfaces\Repositories\ServiceRepositoryInterface;
use App\Interfaces\Services\ServiceServiceInterface;
use App\Traits\SortingTraits;

class ServiceService implements ServiceServiceInterface
{
    use SortingTraits;

    private $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function serviceList($payload)
    {
        $sortField = $this->sortField($payload, 'id');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $service = $this->serviceRepository->index($payload, $sortField, $sortOrder);

        return ServiceResource::collection($service);
    }

    public function saveService($payload)
    {
        $service = $this->serviceRepository->save($payload);

        return new ServiceResource($service);
    }

    public function findServiceById($serviceId)
    {
        $service = $this->serviceRepository->show($serviceId);

        return new ServiceResource($service);
    }

    public function findServiceBySlug($slug)
    {
        $service = $this->serviceRepository->showBySlug($slug);

        return new ServiceResource($service);
    }

    public function updateServiceById($payload, $serviceId)
    {
        $service = $this->serviceRepository->update($payload, $serviceId);

        return new ServiceResource($service);
    }

    public function updateServiceIconById($payload, $serviceId)
    {
        $service = $this->serviceRepository->updateServiceIcon($payload, $serviceId);

        return new ServiceResource($service);
    }

    public function deleteServiceById($aboutId)
    {
        $this->serviceRepository->delete($aboutId);
    }
}
