<?php

namespace App\Providers;

use App\Interfaces\Repositories\AboutRepositoryInterface;
use App\Interfaces\Repositories\AdminRepositoryInterface;
use App\Interfaces\Repositories\BlogRepositoryInterface;
use App\Interfaces\Repositories\CareerRepositoryInterface;
use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Interfaces\Repositories\ContactUsRepositoryInterface;
use App\Interfaces\Repositories\LandingFeaturedImageRepositoryInterface;
use App\Interfaces\Repositories\LandingRepositoryInterface;
use App\Interfaces\Repositories\ProjectRepositoryInterface;
use App\Interfaces\Repositories\ServiceRepositoryInterface;
use App\Interfaces\Repositories\TraineeRepositoryInterface;
use App\Interfaces\Repositories\TrainingCertificationRepositoryInterface;
use App\Interfaces\Repositories\TrainingRepositoryInterface;
use App\Interfaces\Services\AboutServiceInterface;
use App\Interfaces\Services\AdminServiceInterface;
use App\Interfaces\Services\AuthServiceInterface;
use App\Interfaces\Services\BlogServiceInterface;
use App\Interfaces\Services\CareerServiceInterface;
use App\Interfaces\Services\ClientServiceInterface;
use App\Interfaces\Services\ContactUsServiceInterface;
use App\Interfaces\Services\LandingFeaturedImageServiceInterface;
use App\Interfaces\Services\LandingServiceInterface;
use App\Interfaces\Services\ProjectServiceInterface;
use App\Interfaces\Services\ServiceServiceInterface;
use App\Interfaces\Services\TraineeServiceInterface;
use App\Interfaces\Services\TrainingCertificationServiceInterface;
use App\Interfaces\Services\TrainingServiceInterface;
use App\Repositories\AboutRepository;
use App\Repositories\AdminRepository;
use App\Repositories\BlogRepository;
use App\Repositories\CareerRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\LandingFeaturedImageRepository;
use App\Repositories\LandingRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TraineeRepository;
use App\Repositories\TrainingCertificationRepository;
use App\Repositories\TrainingRepository;
use App\Services\AboutService;
use App\Services\AdminService;
use App\Services\AuthService;
use App\Services\BlogService;
use App\Services\CareerService;
use App\Services\ClientService;
use App\Services\ContactUsService;
use App\Services\LandingFeaturedImageService;
use App\Services\LandingService;
use App\Services\ProjectService;
use App\Services\ServiceService;
use App\Services\TraineeService;
use App\Services\TrainingCertificationService;
use App\Services\TrainingService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Repositories
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(LandingRepositoryInterface::class, LandingRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);
        $this->app->bind(TrainingCertificationRepositoryInterface::class, TrainingCertificationRepository::class);
        $this->app->bind(TraineeRepositoryInterface::class, TraineeRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(CareerRepositoryInterface::class, CareerRepository::class);
        $this->app->bind(ContactUsRepositoryInterface::class, ContactUsRepository::class);
        $this->app->bind(LandingFeaturedImageRepositoryInterface::class, LandingFeaturedImageRepository::class);

        //Services
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(LandingServiceInterface::class, LandingService::class);
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
        $this->app->bind(AboutServiceInterface::class, AboutService::class);
        $this->app->bind(ServiceServiceInterface::class, ServiceService::class);
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(TrainingServiceInterface::class, TrainingService::class);
        $this->app->bind(TrainingCertificationServiceInterface::class, TrainingCertificationService::class);
        $this->app->bind(TraineeServiceInterface::class, TraineeService::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);
        $this->app->bind(CareerServiceInterface::class, CareerService::class);
        $this->app->bind(ContactUsServiceInterface::class, ContactUsService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(LandingFeaturedImageServiceInterface::class, LandingFeaturedImageService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
