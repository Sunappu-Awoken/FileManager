<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//  handles “/”
Route::get('/', function () {
    return view('welcome');  
    
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';

// FileManager routes
Route::group([
    'prefix'     => 'laravel-filemanager',
    'middleware' => ['web','auth'],
], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
