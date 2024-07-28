<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

// Routes de Passport
Route::group([
    'prefix' => 'oauth',
    'namespace' => '\Laravel\Passport\Http\Controllers',
    'middleware' => ['api'],
], function () {
    Route::post('/token', [AccessTokenController::class, 'issueToken']);
    Route::get('/authorize', [AuthorizationController::class, 'authorize']);
    Route::post('/authorize', [AuthorizationController::class, 'approve']);
    Route::delete('/authorize', [AuthorizationController::class, 'deny']);
    Route::get('/tokens', [AuthorizedAccessTokenController::class, 'forUser']);
    Route::delete('/tokens/{token_id}', [AuthorizedAccessTokenController::class, 'destroy']);
    Route::get('/clients', [ClientController::class, 'forUser']);
    Route::post('/clients', [ClientController::class, 'store']);
    Route::put('/clients/{client_id}', [ClientController::class, 'update']);
    Route::delete('/clients/{client_id}', [ClientController::class, 'destroy']);
    Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
    Route::get('/personal-access-tokens', [PersonalAccessTokenController::class, 'forUser']);
    Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy']);
    Route::post('/transient', [TransientTokenController::class, 'issue']);
});

// Vos routes API pour l'authentification et la gestion des utilisateurs
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::resource('users', UserController::class);
});

