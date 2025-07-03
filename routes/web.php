<?php

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
