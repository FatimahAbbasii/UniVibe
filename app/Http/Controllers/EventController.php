<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class EventController extends Controller
{
    public function show($slug)
    {
        // Fetch songs from database based on event_slug
        $songs = Song::where('event_slug', $slug)->get();

        // Convert slug to title (e.g., 'study-night' => 'Study Night')
        $title = ucwords(str_replace('-', ' ', $slug));

        return view('event', [
            'title' => $title,
            'songs' => $songs
        ]);
    }

    public function addSong(Request $request, $slug)
    {
        $request->validate([
            'artist' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:10',
        ]);

        // Store new song in the database
        Song::create([
            'event_slug' => $slug,
            'artist' => $request->artist,
            'title' => $request->title,
            'duration' => $request->duration,
        ]);

        return redirect()->route('event.show', ['slug' => $slug]);
    }
}

