<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
{
    $query = Event::query();

    // Apply filters
    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    if ($request->filled('organizer')) {
        $query->where('organizer', $request->organizer);
    }

    if ($request->filled('vibe_min')) {
        $query->where('vibe_score', '>=', $request->vibe_min);
    }

    if ($request->filled('vibe_max')) {
        $query->where('vibe_score', '<=', $request->vibe_max);
    }

    if ($request->filled('address')) {
        $query->where('address', $request->address);
    }

    if ($request->filled('time')) {
        $query->whereDate('time', $request->time);
    }

    // Get unique filter values for dropdowns
    $categories = Event::select('category')->distinct()->pluck('category');
    $organizers = Event::select('organizer')->distinct()->pluck('organizer');
    $addresses = Event::select('address')->distinct()->pluck('address');
    $dates = Event::selectRaw('DATE(time) as date')->distinct()->pluck('date');

    $events = $query->orderBy('time')->get();

    return view('events.index', compact('events', 'categories', 'organizers', 'addresses', 'dates'));
}

public function show($id)
{
    $event = Event::findOrFail($id);
    return view('event.show', compact('event'));
}
}
