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
<<<<<<< HEAD
=======
// <<<<<<< HEAD
>>>>>>> 1094675df6dce2c42ecdbf32af1132bdd6476951
    Route::group(['middleware' => ['role:student']], function () {
        Route::get('Statistics/{semester_id}', [StudentStatisticsController::class, 'Statistics']);
        Route::get('Marks', [StudentStatisticsController::class, 'Marks']);
    });
<<<<<<< HEAD

=======
// =======
Route::get('Statistics', [StudentStatisticsController::class,'Statistics']);
Route::get('Marks', [StudentStatisticsController::class,'Marks']);

// >>>>>>> 1a0b79efc53432b9acd827fc0e0eb424eb8e744a
>>>>>>> 1094675df6dce2c42ecdbf32af1132bdd6476951
});
