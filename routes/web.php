<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;          // ← one import of Route
use UniSharp\LaravelFilemanager\Lfm;           // ← one import of Lfm

Route::get('/', function () {
    return view('welcome');
});

// ... your other routes ...

require __DIR__.'/auth.php';

// FileManager routes
Route::group([
    'prefix'     => 'laravel-filemanager',
    'middleware' => ['web'],   // or ['web','auth']
], function () {
    Lfm::routes();
});
