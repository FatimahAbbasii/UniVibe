<head>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Import Goldman font from Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet">
    <Style>
        body {
            margin: 0;
            font-family: 'Goldman', sans-serif;
            background:  linear-gradient(to bottom, #6C55C8, rgb(255, 255, 255));
            color: #fff;

        }
        .playlist {
            background: #1f2937; /* dark slate background */
            border-radius: 1.5rem;
            padding: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            max-width: 600px;
            margin: 0 auto;
            color: #fcd34d; /* golden yellow text */
        }

        .playlist form input[type="text"] {
            background: #f3f4f6; /* light input bg */
            border-radius: 9999px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            color: #111827;
            border: none;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }

        .playlist form input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 8px #fcd34d;
        }

        .add-button {
            background-color: #8b5cf6;
            color: white;
            border-radius: 9999px;
            padding: 0.75rem;
            font-weight: 700;
            transition: background-color 0.3s ease;
            cursor: pointer;
            width: 100%;
        }

        .add-button:hover {
            background-color: #7c3aed;
        }

        .song {
            background: #374151; /* dark gray */
            border-radius: 1rem;
            padding: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            color: #fcd34d;
        }

        .song:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 15px rgba(252, 211, 77, 0.6);
        }

        .song-info strong {
            font-size: 1.1rem;
            color: #fbbf24;
        }

        .song-info small {
            font-size: 0.9rem;
            color: #fde68a;
        }

        .duration {
            font-size: 0.9rem;
            color: #ddd;
        }

        .song form button {
            background: none;
            border: none;
            color: #fbbf24;
            font-weight: 700;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            transition: color 0.2s ease, background-color 0.2s ease;
        }

        .song form button:hover {
            color: #fff;
            background-color: #7c3aed;
        }
        nav {
            padding-bottom: env(safe-area-inset-bottom, 1rem);
        }

    </Style>
</head>
<body>
<div class="playlist p-4">
    {{-- Search Form --}}
    <form method="GET" action="{{ route('spotify.search', ['slug' => $slug]) }}" class="mb-6 space-y-3">
        <input type="text" name="q" placeholder="Search for songs on Spotify"
               class="w-full p-3 rounded-full text-black text-sm focus:outline-none"
               value="{{ request('q') }}">
        <button type="submit" class="add-button w-full">Search</button>
    </form>

    {{-- Display search results --}}
    @if(isset($tracks) && count($tracks) > 0)
        <div class="space-y-4">
            @foreach ($tracks as $track)
                <div class="song flex flex-col bg-gray-900 rounded-xl p-4 shadow-md">
                    <div class="song-info mb-2">
                        <strong>{{ $track->artists[0]->name }}</strong><br>
                        <small>{{ $track->name }}</small>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="duration text-sm text-gray-400">
                            {{ gmdate("i:s", $track->duration_ms / 1000) }}
                        </div>

                        {{-- Add Song Form --}}
                        <form method="POST" action="{{ route('music.addSong', ['slug' => $slug]) }}">
                            @csrf
                            <input type="hidden" name="artist" value="{{ $track->artists[0]->name }}">
                            <input type="hidden" name="title" value="{{ $track->name }}">
                            <input type="hidden" name="duration" value="{{ gmdate("i:s", $track->duration_ms / 1000) }}">
                            <button type="submit" class="text-yellow-400 hover:text-yellow-300 text-sm font-bold">
                                + Add to Playlist
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif(request()->has('q'))
        <p class="text-white mt-4">No results found for "{{ request('q') }}".</p>
    @endif
</div>
<nav
    class="fixed bottom-0 left-1/2 -translate-x-1/2 bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md w-full mx-auto z-50"
    style="padding-bottom: env(safe-area-inset-bottom, 1rem);"
>
    {{-- Home Icon --}}
    <a href="{{ route('home') }}" class="flex flex-col items-center {{ request()->routeIs('home') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('home.png') }}" alt="Home Icon" class="h-6 w-6 mb-1 object-contain" />
        <span class="text-xs">Home</span>
    </a>

    {{-- Map Icon --}}
    <a href="{{ route('map') }}" class="flex flex-col items-center {{ request()->routeIs('map') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('map.png') }}" alt="Map Icon" class="h-6 w-6 mb-1 object-contain" />
        <span class="text-xs">Map</span>
    </a>

    {{-- Events Icon --}}
    <a href="{{ route('events.index') }}" class="flex flex-col items-center {{ request()->routeIs('events.*') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('event.png') }}" alt="Events Icon" class="h-6 w-6 mb-1 object-contain" />
        <span class="text-xs">Events</span>
    </a>

    {{-- Profile Icon --}}
    <a href="{{ route('profile.edit') }}" class="flex flex-col items-center {{ request()->routeIs('profile.edit') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('profile.png') }}" alt="Profile Icon" class="h-6 w-6 mb-1 object-contain" />
        <span class="text-xs">Profile</span>
    </a>
</nav>

</body>
