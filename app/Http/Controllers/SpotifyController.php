<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function search(Request $request, SpotifyService $spotify, $slug)
    {
        $query = $request->input('q');
        $tracks = $query ? $spotify->searchTracks($query) : [];

        return view('spotify-search', [
            'tracks' => $tracks,
            'slug' => $slug,
        ]);
    }
}
