<?php

use App\Http\Controllers\Api\AboutController;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'admin'], function () {
    require 'admin/authenticated.php';
    require 'admin/unauthenticated.php';
});

Route::group(['prefix' => 'about'], function () {
    Route::get('/', [AboutController::class, 'index']);
    Route::get('/{aboutId}', [AboutController::class, 'show']);
});

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/{slug}', [BlogController::class, 'showBySlug']);
});

Route::group(['prefix' => 'careers'], function () {
    Route::get('/', [CareerController::class, 'index']);
    Route::get('/{careerId}', [CareerController::class, 'show']);
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/{clientId}', [ClientController::class, 'show']);
});

Route::group(['prefix' => 'contact-us'], function () {
    Route::get('/', [ContactUsController::class, 'index']);
    Route::get('/{contactUsId}', [ContactUsController::class, 'show']);
});

Route::group(['prefix' => 'landing'], function () {
    Route::get('/', [LandingController::class, 'index']);
    Route::get('/{landingId}', [LandingController::class, 'show']);
});

Route::group(['prefix' => 'landing-featured-images'], function () {
    Route::get('/', [LandingFeaturedImageController::class, 'index']);
    Route::get('/{landingFeaturedImageId}', [LandingFeaturedImageController::class, 'show']);
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/on-going', [ProjectController::class, 'ongoingProject']);
    Route::get('/completed', [ProjectController::class, 'completedProject']);
    Route::get('/{slug}', [ProjectController::class, 'showBySlug']);
});

Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/{slug}', [ServiceController::class, 'showBySlug']);
});

Route::group(['prefix' => 'trainees'], function () {
    Route::get('/', [TraineeController::class, 'index']);
    Route::get('/{traineeId}', [TraineeController::class, 'show']);
});

Route::group(['prefix' => 'training-certificates'], function () {
    Route::get('/', [TrainingCertificateController::class, 'index']);
    Route::get('/{trainingCertificateId}', [TrainingCertificateController::class, 'show']);
});

Route::group(['prefix' => 'trainings'], function () {
    Route::get('/', [TrainingController::class, 'index']);
    Route::get('/{slug}', [TrainingController::class, 'showBySlug']);
    Route::get('/{slug}/trainees', [TrainingController::class, 'showTraineesBySlug']);
});
