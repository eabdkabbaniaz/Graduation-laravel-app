<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Student\App\Http\Controllers\AuthController;
use Modules\Student\App\Http\Controllers\CategoryController;
use Modules\Student\App\Http\Controllers\ReportController;
use Modules\Student\App\Http\Controllers\ReportsController;
use Modules\Student\App\Http\Controllers\StudentAdminController;
use Modules\Student\App\Http\Controllers\StudentController;
use Modules\Student\App\Http\Controllers\StudentImportController;
use Modules\Student\App\Http\Controllers\StudentProfileController;
use Modules\Student\App\Http\Controllers\TeacherController;

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
    Route::get('student', fn(Request $request) => $request->user())->name('student');
});



Route::group(['prefix'=>'Report',['auth:sanctum','role:superVisorTeacher|student|teacher']],function(){
Route::post('create', [ReportController::class, 'create']);
Route::get('show/session_id/{id}', [ReportController::class, 'show']);
});
Route::group(['prefix'=>'Report','middleware' => ['auth:sanctum','role:superVisorTeacher']],function(){
Route::get('index', [ReportController::class, 'index']);
});

Route::group(['prefix'=>'Auth'],function(){
Route::post('ChangePassword', [AuthController::class, 'ChangePassword'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
});

Route::group(['prefix'=>'studentAdmin','middleware' => ['auth:sanctum','role:superVisorTeacher']],function(){
    Route::get('/index', [StudentAdminController::class, 'index']);
    Route::delete('/destroy/{id}', [StudentAdminController::class, 'destroy']);
    Route::patch('update/{id}', [StudentAdminController::class, 'update']);
    Route::post('create', [StudentAdminController::class, 'create']);
    Route::post('/import-students', [StudentImportController::class, 'import']);
});
Route::group(['prefix' => 'Student'],function(){
    Route::get('show/{message}', [StudentAdminController::class, 'show']);
});
Route::group(['prefix' => 'Category'],function(){
    Route::get('/index', [CategoryController::class, 'index']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
});

Route::group(['prefix'=>'teacher','middleware' => ['auth:sanctum','role:manger']],function(){
    Route::get('/index', [TeacherController::class, 'index']);
    Route::get('/toggleActivation/{id}', [TeacherController::class, 'toggleActivation']);
    Route::delete('/destroy/{id}', [TeacherController::class, 'destroy']);
    Route::patch('update/{id}', [TeacherController::class, 'edit']);
    Route::post('create', [TeacherController::class, 'create']);
    Route::post('login', [TeacherController::class, 'login']);
});

