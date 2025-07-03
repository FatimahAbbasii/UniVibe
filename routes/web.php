<?php

use App\Http\Controllers\EventController;
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
Route::get('/event/{slug}', [\App\Http\Controllers\EventController::class, 'show']);
Route::post('/event/{slug}/add-song', [EventController::class, 'addSong'])->name('event.addSong');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/event/{slug}/spotify-search', [SpotifyController::class, 'search'])->name('spotify.search');
Route::post('/event/{slug}/add-song', [EventController::class, 'addSong'])->name('event.addSong');
