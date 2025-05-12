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



});
Route::prefix('questions')->group(function () {
    Route::get('/index', [QuestionController::class, 'index']);
    Route::post('/store', [QuestionController::class, 'store']);
    Route::get('/show/{id}', [QuestionController::class, 'show']);
    Route::put('/update/{id}', [QuestionController::class, 'update']);
    Route::delete('/destroy/{id}', [QuestionController::class, 'destroy']);
});
Route::prefix('subjects')->group(function () {
    Route::get('/index', [SubjectController::class, 'index']);
    Route::post('/store', [SubjectController::class, 'store']);
    Route::get('/show/{id}', [SubjectController::class, 'show']);
    Route::put('/update/{id}', [SubjectController::class, 'update']);
    Route::delete('/destroy/{id}', [SubjectController::class, 'destroy']);
});
Route::prefix('exams')->group(function () {
    Route::get('/index', [ExamController::class, 'index']);
    Route::post('/store', [ExamController::class, 'store']);
    Route::get('/show/{id}', [ExamController::class, 'show']);
    Route::put('/update/{id}', [ExamController::class, 'update']);
    Route::delete('/destroy/{id}', [ExamController::class, 'destroy']);
    Route::get('/startExam/{id}', [ExamController::class, 'startExam']);
    Route::post('/Addmark', [ExamController::class, 'Addmark']);
});


// });