<?php

use App\Http\Controllers\AgenceIonicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehiculeIonicController;
use App\Http\Controllers\CommandeIonicController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/agences', [AgenceIonicController::class, 'index']);
    Route::get('/agence/{agenceId}', [AgenceIonicController::class, 'show']);
    Route::get('/voiture/{voitureId}', [AgenceIonicController::class, 'showCommande']);
    Route::get('/agences/{agenceId}/voitures', [VehiculeIonicController::class, 'index']);
    Route::get('/voitures/{voitureId}', [VehiculeIonicController::class, 'show']);
    Route::post('/commandes', [CommandeIonicController::class, 'store']);
    Route::get('/commandes/user/{userId}', [CommandeIonicController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
