<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/modules');
});

// views
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
Route::get('/modules/{id}', [ModuleController::class, 'show'])->name('modules.show');

// actions
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::put('/modules/{id}/status', [ModuleController::class, 'updateStatus'])->name('modules.updateStatus');
Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');
