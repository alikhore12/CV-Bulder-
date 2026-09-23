<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CvPdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cv-builder', function () {
    return view('cv-builder');
})->name('cv-builder');

Route::post('/cv-builder/pdf', [CvPdfController::class, 'download'])
    ->middleware('throttle:10,1')
    ->name('cv-builder.pdf');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
