<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('users/register', [UserController::class, 'register']);
    Route::post('users/login',    [UserController::class, 'login']);
    Route::apiResource('students', StudentsController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('enrollments', EnrollmentController::class);
});
// Route::apiResource('/students', StudentController::class);
