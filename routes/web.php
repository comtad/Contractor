<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/



Route::get('/', [\App\Http\Controllers\ContractorController::class, 'getContractorsView'])->name('index');
Route::get('/contractors/create', [\App\Http\Controllers\ContractorController::class, 'getCreateForm'])->name('create');
Route::get('/contractors/{contractor}/edit', [\App\Http\Controllers\ContractorController::class, 'getEditForm'])->name('edit');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
