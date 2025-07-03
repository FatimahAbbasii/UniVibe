<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
        {
            $events = Event::orderBy('time', 'asc')->get();
            return view('events.index', compact('events'));
        }
}
