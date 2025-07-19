<?php

// use App\statHttp\Controllers\StudentStatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Statistics\App\Http\Controllers\StudentStatisticsController;
// use Modules\Statistics\App\Http\Controllers\StatisticsController;

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
// <<<<<<< HEAD
    Route::group(['middleware' => ['role:student']], function () {
        Route::get('Statistics/{semester_id}', [StudentStatisticsController::class, 'Statistics']);
        Route::get('Marks', [StudentStatisticsController::class, 'Marks']);
    });
});
