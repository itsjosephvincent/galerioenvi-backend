<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// csrf
Route::get('/auth/sanctum/csrf-cookie', [AuthController::class, 'csrf']);
// Authentication
Route::post('/auth/login', [AuthController::class, 'adminAuthenticationByPassword']);
