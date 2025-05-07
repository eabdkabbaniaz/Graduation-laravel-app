<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\University\App\Http\Controllers\Auth\LoginController;
use Modules\University\App\Http\Controllers\SisonController;
use Modules\University\App\Http\Controllers\StudentExperienceController;
use Modules\University\App\Http\Controllers\UniversityController;
use Modules\University\App\Http\Controllers\UniversityExperiencesController;
use Modules\University\Repository\UniversityExperiencesSisonRepository;
use Modules\University\Services\StudentExperienceService;

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

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('university', fn (Request $request) => $request->user())->name('university');
});


Route::group(['prefix' => 'University'],function(){
    Route::get('/index', [UniversityController::class, 'index']);
    Route::get('/show/{id}', [UniversityController::class, 'show']);
    Route::post('/create', [UniversityController::class, 'create']);
    Route::delete('/destroy/{id}', [UniversityController::class, 'destroy']);
    Route::patch('/update/{id}', [UniversityController::class, 'update']);
    Route::get('/changeStatus/{id}', [UniversityController::class, 'changeStatus']);
    Route::post('/login', [LoginController::class, 'login']);
   // Route::post('/login1', [LoginController::class, 'login1'])->middleware(['auth:university']);
});
Route::group(['prefix' => 'Sison'],function(){
    Route::get('/index', [SisonController::class, 'index']);
    Route::get('/show/{id}', [SisonController::class, 'show']);
    Route::post('/create', [SisonController::class, 'create']);
    Route::delete('/destroy/{id}', [SisonController::class, 'destroy']);
    Route::patch('/update/{id}', [SisonController::class, 'update']);

});
Route::group(['prefix' => 'UniversityExperiences','middleware'=>['auth:university']],function(){
    Route::get('/index', [UniversityExperiencesController::class, 'index']);
    Route::get('/show/{id}', [UniversityExperiencesController::class, 'show']);
    Route::post('/create', [UniversityExperiencesController::class, 'create']);
    Route::delete('/destroy/{id}', [UniversityExperiencesController::class, 'destroy']);
    Route::get('/changeStatus/{id}', [UniversityExperiencesController::class, 'changeStatus']);

});
Route::group(['prefix' => 'StudentExperiences','middleware'=>['auth:sanctum']],function(){
    Route::get('/index', [StudentExperienceController::class, 'index']);
    Route::get('/show/SisonId/{id}', [StudentExperienceController::class, 'show']);
});


Route::middleware(['auth:university'])->group(function () {
    // Routes accessible to administrators
    Route::post('/login1', [LoginController::class, 'login1']);
});

