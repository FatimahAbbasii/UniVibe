<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('mainPage');
    });
    Route::get('/map', function () {
        return view('Map');
    });
    Route::get('/events', function () {
        return view('Events');
    });

    Route::get('/createActivity', action: [Controller::class, 'create'])->name('createActivity');

});

require __DIR__ . '/auth.php';
