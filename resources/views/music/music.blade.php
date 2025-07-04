<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }} | UniVibe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Import Goldman font from Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Goldman', sans-serif;
            background:  linear-gradient(to bottom, #6C55C8, rgb(255, 255, 255));
            color: #fff;

        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        .branding {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .welcome {
            padding: 0 1rem;
            font-size: 1rem;
        }

        .highlight {
            color: #fcd34d;
            font-weight: 600;
        }

        .vibe-message {
            font-size: 1.6rem;
            font-weight: bold;
            line-height: 1.3;
            padding: 1rem;
        }

        .vibe-message span {
            color: #facc15;
        }





        .banner h2 {
            color: #facc15;
            font-size: 1.7rem;
            margin: 0;
        }

        .playlist {
            background-color: #111;
            border-top: 1px solid #333;
            padding: 1rem;
            border-radius: 0 0 1.5rem 1.5rem;
        }

        .song {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #222;
            padding: 0.8rem 1rem;
            margin-bottom: 0.6rem;
            border-radius: 1rem;
            box-shadow: 0 0 8px rgba(0,0,0,0.3);
            transition: transform 0.2s ease;
        }

        .song:hover {
            transform: translateY(-2px);
        }

        .song-number {
            font-weight: bold;
            color: #facc15;
            margin-right: 0.8rem;
        }

        .song-info {
            flex: 1;
        }

        .song-info strong {
            display: block;
            font-size: 1rem;
        }

        .song-info small {
            font-size: 0.85rem;
            color: #ccc;
        }

        .add-button {
            width: 100%;
            margin-top: 1rem;
            background: #8b5cf6;
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 999px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-button:hover {
            background: #7c3aed;
        }

        @media(min-width: 768px) {
            .vibe-message {
                font-size: 2rem;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="text-white bg-gradient-univibe flex flex-col min-h-screen">

<header>
    <div class="branding">UniVibe</div>
    <img src="https://i.pravatar.cc/40?img=3" alt="User Avatar" class="avatar">
</header>

<div class="welcome">
    Hey, <span class="highlight">Silvia</span>
</div>

<div class="vibe-message">
    Feel the <span>Hype</span>.<br>
    Rule the Night<br>
    with <span>UniVibe</span>
</div>



<div class="bg-dark-card flex-grow -mt-2 overflow-hidden rounded-t-3xl rounded-b-3xl pb-4">
    <h2>{{ $title }}</h2>
</div>

<div class="playlist pb-[100px]">
    {{-- Add Song Form --}}
    <button
        onclick="window.location.href='{{ route('spotify.search', ['slug' => request()->route('slug')]) }}'"
        class="add-button mb-4"
    >
        Go to Spotify Search
    </button>

    <div class="mt-4"></div>

    @foreach ($songs as $index => $song)
        <div class="song">
            <div class="song-number">{{ $index + 1 }}</div>
            <div class="song-info">
                <strong>{{ $song->artist }}</strong>
                <small>{{ $song->title }}</small>
            </div>
            <div class="duration">{{ $song->duration }}</div>
        </div>
    @endforeach
</div>

<nav
    class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">
    {{-- Home Icon --}}
    <button class="flex flex-col items-center text-purple-700">
        <img src="{{ asset('home.png') }}" alt="Home Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Home</span>
    </button>

    {{-- Map Icon --}}
    <button class="flex flex-col items-center text-gray-500">
        <img src="{{ asset('map.png') }}" alt="Map Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Map</span>
    </button>

    {{-- Events Icon --}}
    <button class="flex flex-col items-center text-gray-500">
        <img src="{{ asset('event.png') }}" alt="Events Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Events</span>
    </button>

    {{-- Profile Icon --}}
    <button class="flex flex-col items-center text-gray-500">
        <img src="{{ asset('profile.png') }}" alt="Profile Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Profile</span>
    </button>
</nav>
</body>
</html>
