<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mainPage');
});
Route::get('/map', function () {
    return view('Map');
});
Route::get('/events', function () {
    return view('Events');
});
Route::get('/profile', function () {
    return view('Profile');
});
Route::get('/music/{slug}', [\App\Http\Controllers\MusicController::class, 'show']);
Route::post('/music/{slug}/add-song', [MusicController::class, 'addSong'])->name('music.addSong');
Route::get('/music/{slug}', [MusicController::class, 'show'])->name('music.show');

Route::get('/music/{slug}/spotify-search', [SpotifyController::class, 'search'])->name('spotify.search');
Route::post('/music/{slug}/add-song', [MusicController::class, 'addSong'])->name('music.addSong');
