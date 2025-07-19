<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Experience\App\Http\Controllers\ExperienceController;
use Modules\Experience\App\Http\Controllers\SessionAttendanceController;
use Modules\Experience\App\Http\Controllers\SessionController;
use Modules\Experience\App\Http\Controllers\SessionQuestionsController;
use Modules\Experience\App\Http\Controllers\SemesterController;


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

// <<<<<<< HEAD
Route::middleware(['auth:sanctum'])->group(function () {
 Route::post('/attend', [SessionAttendanceController::class, 'attend']);

    Route::group(['prefix' => 'Experinence'],function(){
    Route::get('/index', [ExperienceController::class, 'index']);
    Route::get('/show/{id}', [ExperienceController::class, 'show']);
    Route::post('/create', [ExperienceController::class, 'create']);
    Route::delete('/destroy/{id}', [ExperienceController::class, 'destroy']);
    Route::patch('/update/{id}', [ExperienceController::class, 'update']);
    Route::get('/changeStatus/{id}', [ExperienceController::class, 'changeStatus']);
    Route::get('/getDrugs/{id}', [ExperienceController::class, 'getDrugs']);
    Route::get('/getExperience', [ExperienceController::class, 'getExperience']);

});
 Route::prefix('session')->group(function () {
    Route::get('/index/{data}', [SessionController::class, 'index']);
    Route::get('/getSessions/{data}', [SessionController::class, 'getSessions']);
    Route::get('/getall', [SessionController::class, 'getall']);
    Route::get('/AllExperience/{data}', [SessionController::class, 'AllExperience']);
    Route::get('/AllSemester', [SessionController::class, 'AllSemester']);
    Route::post('/store', [SessionController::class, 'store']);
    Route::get('/show/{id}', [SessionController::class, 'show']);
    Route::put('/update/{id}', [SessionController::class, 'update']);
    Route::delete('/destroy/{id}', [SessionController::class, 'destroy']);
});
Route::prefix('sessionQuestion')->group(function () {
    Route::post('/store', [SessionQuestionsController::class, 'store']);
// =======
Route::group(['middleware' => ['auth:sanctum', 'role:student']], function () {
    Route::post('/attend', [SessionAttendanceController::class, 'attend']);
});
    // Route::get('experience', fn (Request $request) => $request->user())->name('experience');


    Route::group(['prefix' => 'Experinence', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher']], function () {
        Route::get('/index', [ExperienceController::class, 'index']);
        Route::get('/show/{id}', [ExperienceController::class, 'show']);
        Route::post('/create', [ExperienceController::class, 'create']);
        Route::delete('/destroy/{id}', [ExperienceController::class, 'destroy']);
        Route::patch('/update/{id}', [ExperienceController::class, 'update']);
        Route::get('/changeStatus/{id}', [ExperienceController::class, 'changeStatus']);
        Route::get('/getDrugs/{id}', [ExperienceController::class, 'getDrugs']);
        Route::get('/getExperience', [ExperienceController::class, 'getExperience']);
    });


    Route::group(['prefix' => 'session', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher']], function () {
        Route::post('/store', [SessionController::class, 'store']);
        Route::delete('/destroy/{id}', [SessionController::class, 'destroy']);
    });
    Route::group(['prefix' => 'session', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher|teacher|student']], function () {
        Route::get('/index/{data}', [SessionController::class, 'index']);
        Route::get('/getSessions/{data}', [SessionController::class, 'getSessions']);
        Route::get('/getall', [SessionController::class, 'getall']);
        Route::get('/AllExperience/{data}', [SessionController::class, 'AllExperience']);
        Route::get('/AllSemester', [SessionController::class, 'AllSemester']);
        Route::get('/show/{id}', [SessionController::class, 'show']);
    });
    });

    Route::group(['prefix' => 'sessionQuestion', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher']], function () {
        Route::post('/store', [SessionQuestionsController::class, 'store']);
// >>>>>>> 0d3720e9e0aea73efdc4c8786757f33703908a2b
        Route::put('/update/{id}', [SessionQuestionsController::class, 'update']);
        Route::delete('/destroy/{id}', [SessionQuestionsController::class, 'destroy']);
    });
    Route::group(['prefix' => 'sessionQuestion', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher|teacher|student']], function () {
        Route::get('/show/{id}', [SessionQuestionsController::class, 'show']);
        Route::get('/index', [SessionQuestionsController::class, 'index']);
        Route::get('/showSessionQuestion/question_id/{question_id}', [SessionQuestionsController::class, 'showSessionQuestion']);
    });

Route::group(['prefix' => 'semester', 'middleware' => ['auth:sanctum', 'role:superVisorTeacher|manger']], function () {
    Route::post('/store', [SemesterController::class, 'store']);
    Route::put('/update/{id}', [SemesterController::class, 'update']);
    Route::delete('/destroy/{id}', [SemesterController::class, 'destroy']);
});
});
