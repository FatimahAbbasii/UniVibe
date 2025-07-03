<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EventController;

Route::get('/', function () {
    return view('mainPage');
});

Route::get('/map', function () {
    return view('Map');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/profile', function () {
    return view('Profile');
});
