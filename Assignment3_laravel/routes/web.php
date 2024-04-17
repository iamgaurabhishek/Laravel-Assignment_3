<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get(
//     'clients',
//     [ClientController::class, 'index']
// )->name('clients.index');

// Route::get(
//     'clients/{id}',
//     [ClientController::class, 'show']
// )->name('clients.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get(
    'clients/trash/{id}',
    [ClientController::class, 'trash']
)->name('clients.trash')->middleware(['auth', 'verified']);

Route::get(
    'clients/trashed/',
    [ClientController::class, 'trashed']
)->name('clients.trashed')->middleware(['auth', 'verified']);

Route::get(
    'clients/restore/{id}',
    [ClientController::class, 'trash']
)->name('clients.restore')->middleware(['auth', 'verified']);


Route::resource('clients', ClientController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
