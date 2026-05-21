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
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\CodeqrController;

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
    Route::resource('codeqr', CodeqrController::class);

    // Procedimiento para escanear un QR
    // Route::get('/buscar', [BusquedaController::class, 'index']);
    // Route::post('/buscar', [BusquedaController::class, 'buscar'])->name('buscar.id');


    // Ruta para escanear QR (recibe token)
    Route::get('/scan', function (Request $request) {
        $token = $request->query('token');
        if ($token) {
            // Redirigir al buscador con el token como identificador
            return redirect()->route('buscar.index', ['identificador' => $token]);
        }
        return redirect()->route('buscar.index');
    })->name('scan');

    // Ruta principal del buscador
    Route::get('/buscar', [BusquedaController::class, 'index'])->name('buscar.index');
    Route::post('/buscar/id', [BusquedaController::class, 'buscar'])->name('buscar.id');

    Route::post('/codeqr/search', [CodeqrController::class, 'store'])->name('codeqr.search');
    Route::post('/codeqr/generate', [CodeqrController::class, 'generate'])->name('codeqr.generate');

});