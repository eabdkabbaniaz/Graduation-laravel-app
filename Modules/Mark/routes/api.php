<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Mark\App\Http\Controllers\GradeController;

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
    Route::group(['prefix' => 'Grades', 'middleware' => ['role:superVisorTeacher']], function () {
        Route::get('getCalculationMethods', [GradeController::class, 'getCalculationMethods']);
        Route::post('updateCalculationMethods/{id}', [GradeController::class, 'updateCalculationMethods']);
    });
    Route::group(['middleware' => ['role:teacher|superVisorTeacher']], function () {
        Route::get('studentGrades/{userId}', [GradeController::class, 'studentGrades']);
        Route::get('allStudentGrades', [GradeController::class, 'allStudentGrades']);
        Route::get('userDetails/{user_id}', [GradeController::class, 'userDetails']);
    });

    Route::group(['prefix' => 'Grades', 'middleware' => ['role:student']], function () {
        Route::get('myGrades', [GradeController::class, 'myGrades']);
        Route::get('myDetails', [GradeController::class, 'myDetails']);
    });

    Route::group(['middleware' => ['role:superVisorTeacher']], function () {
        Route::post('export', [GradeController::class, 'export']);
    });
});
