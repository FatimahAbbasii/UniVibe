<?php

namespace App\Services;

use SpotifyWebAPI\SpotifyWebAPI;
use SpotifyWebAPI\Session as SpotifySession;

class SpotifyService
{
    protected $api;

    public function __construct()
    {
        $session = new SpotifySession(
            config('services.spotify.client_id'),
            config('services.spotify.client_secret')
        );

        $session->requestCredentialsToken();
        $accessToken = $session->getAccessToken();

        $this->api = new SpotifyWebAPI();
        $this->api->setAccessToken($accessToken);
    }

    public function searchTracks($query)
    {
        return $this->api->search($query, 'track')->tracks->items ?? [];
    }
}
