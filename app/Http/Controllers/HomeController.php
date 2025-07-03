<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function home()
    {
    $latestEvent = Event::latest('time')->first();
    return view('mainPage', compact('latestEvent'));
}
}
