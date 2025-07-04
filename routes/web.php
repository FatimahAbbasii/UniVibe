<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\EventController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('home');

Route::get('/map', function () {
    return view('Map');
    })->name('map');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/createActivity', action: [Controller::class, 'create'])->name('createActivity');
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//spotify routes
Route::get('/music/{slug}', [\App\Http\Controllers\MusicController::class, 'show']);
Route::get('/music/{slug}', [MusicController::class, 'show'])->name('music.show');

Route::post('/music/{slug}/add-song', [MusicController::class, 'addSong'])->name('music.addSong');

Route::get('/music/{slug}/spotify-search', [SpotifyController::class, 'search'])->name('spotify.search');
Route::post('/music/{slug}/add-song', [MusicController::class, 'addSong'])->name('music.addSong');
require __DIR__ . '/auth.php';
