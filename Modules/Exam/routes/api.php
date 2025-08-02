<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Exam\App\Http\Controllers\ExamController;
use Modules\Exam\app\Http\Controllers\QuestionController;
use  Modules\Exam\app\Http\Controllers\SubjectController;
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
    // Route::get('exam', fn (Request $request) => $request->user())->name('exam');

    Route::group(['prefix' => 'questions', 'middleware' => ['role:superVisorTeacher']], function () {
        Route::post('/store', [QuestionController::class, 'store']);
        Route::put('/update/{id}', [QuestionController::class, 'update']);
        Route::delete('/destroy/{id}', [QuestionController::class, 'destroy']);
    });
    Route::group(['prefix' => 'questions','middleware' => ['role:teacher|manger|superVisorTeacher']], function () {
        Route::get('/index', [QuestionController::class, 'index']);
        Route::get('/show/{id}', [QuestionController::class, 'show']);
    });

    Route::group(['prefix' => 'subjects', 'middleware' => ['role:superVisorTeacher']], function () {
        Route::put('/update/{id}', [SubjectController::class, 'update']);
        Route::delete('/destroy/{id}', [SubjectController::class, 'destroy']);
        Route::post('/store', [SubjectController::class, 'store']);
    });
    Route::group(['prefix' => 'subjects','middleware' => ['role:teacher|manger|superVisorTeacher']], function () {
        Route::get('/index', [SubjectController::class, 'index']);
        Route::get('/show/{id}', [SubjectController::class, 'show']);
    });
    Route::group(['prefix' => 'exams', 'middleware' => ['role:superVisorTeacher']], function () {
        Route::post('/store', [ExamController::class, 'store']);
        Route::put('/update/{id}', [ExamController::class, 'update']);
        Route::delete('/destroy/{id}', [ExamController::class, 'destroy']);
    });
    Route::group(['prefix' => 'exams', 'middleware' => ['role:teacher|manger|student|superVisorTeacher']], function () {
        Route::get('/index', [ExamController::class, 'index']);
        Route::get('/show/{id}', [ExamController::class, 'show']);
    });
    Route::group(['prefix' => 'exams', 'middleware' => ['role:student']], function () {
        Route::get('/startExam/{id}', [ExamController::class, 'startExam']);
        Route::post('/Addmark', [ExamController::class, 'Addmark']);
    });
});
