<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\LandingController;
use App\Http\Controllers\Api\LandingFeaturedImageController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TraineeController;
use App\Http\Controllers\Api\TrainingCertificateController;
use App\Http\Controllers\Api\TrainingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'control' => AdminController::class,
        'landing' => LandingController::class,
        'clients' => ClientController::class,
        'about' => AboutController::class,
        'services' => ServiceController::class,
        'projects' => ProjectController::class,
        'trainings' => TrainingController::class,
        'training-certifications' => TrainingCertificateController::class,
        'trainees' => TraineeController::class,
        'blogs' => BlogController::class,
        'careers' => CareerController::class,
        'contact-us' => ContactUsController::class,
        'featured-images' => LandingFeaturedImageController::class
    ]);

    Route::post('/featured-images/{featuredImageId}', [LandingFeaturedImageController::class, 'update']);
    Route::post('/blogs/{blogId}/update-blog-thumbnail', [BlogController::class, 'updateBlogPhoto']);
    Route::post('/clients/{clientId}/update-client-logo', [ClientController::class, 'updateLogo']);
    Route::post('/control/{adminId}/update-admin-image', [AdminController::class, 'updateAdminPhoto']);
    Route::post('/projects/{projectId}/update-project-thumbnail', [ProjectController::class, 'updateProjectPhoto']);
    Route::post('/services/{serviceId}/update-service-icon', [ServiceController::class, 'updateServiceIcon']);
    Route::post('/trainings/{trainingId}/update-training-image', [TrainingController::class, 'updateTrainingImage']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
