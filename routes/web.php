<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


//Rutas no autenticadas
Route::get('/', [DashboardController::class, 'index'])->name('welcome');


//Rutas autenticadas
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
});


