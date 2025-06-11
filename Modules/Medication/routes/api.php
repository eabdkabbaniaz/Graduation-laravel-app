<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Medication\App\Http\Controllers\MedicationController;
use Modules\Medication\app\Http\Controllers\EffectController;
use Modules\Medication\app\Http\Controllers\SystemController;
use Modules\Medication\app\Http\Controllers\MedicationEffectController;

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

Route::middleware(['auth:sanctum'])->group(function () {

Route::prefix('medication')->group(function () {
    Route::get('/index', [MedicationController::class, 'index']);
    Route::post('/store', [MedicationController::class, 'store']);
    Route::get('/show/{id}', [MedicationController::class, 'show']);
    Route::put('/update/{id}', [MedicationController::class, 'update']);
    Route::delete('/destroy/{id}', [MedicationController::class, 'destroy']);
    Route::get('/filter/{systemId?}/{effectId?}', [MedicationController::class, 'filter']);
});
Route::prefix('effect')->group(function () {
    Route::get('/index', [EffectController::class, 'index']);
    Route::post('/store', [EffectController::class, 'store']);
    Route::get('/show/{id}', [EffectController::class, 'show']);
    Route::put('/update/{id}', [EffectController::class, 'update']);
    Route::delete('/destroy/{id}', [EffectController::class, 'destroy']);
});
Route::prefix('system')->group(function () {
    Route::get('/index', [SystemController::class, 'index']);
    Route::post('/store', [SystemController::class, 'store']);
    Route::get('/show/{id}', [SystemController::class, 'show']);
    Route::put('/update/{id}', [SystemController::class, 'update']);
    Route::delete('/destroy/{id}', [SystemController::class, 'destroy']);
});
});