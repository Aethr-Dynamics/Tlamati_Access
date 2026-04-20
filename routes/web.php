<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\IncomeController;

Auth::routes(['register'=>true]);// Habilita la vista de registrar

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    
    Route::resource('school', SchoolController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('rol', RolController::class);
    Route::resource('offer', OfferController::class);
    Route::resource('worker', WorkerController::class);
    Route::resource('student', StudentController::class);
    Route::resource('visitor', VisitorController::class);
    Route::resource('income', IncomeController::class);

});