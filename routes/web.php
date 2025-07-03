<?php

use App\Http\Controllers\EventController;
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

