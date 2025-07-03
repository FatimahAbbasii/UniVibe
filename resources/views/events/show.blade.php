<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $event->name }} - UniVibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Goldman', sans-serif;
        }

        .bg-dark {
            background-color: #1a1a1a;
        }

        .text-neon-yellow {
            color: #FFA706;
        }

        .text-univibe-purple {
            color: #6C55C8;
        }
    </style>
</head>

<body class="bg-dark text-white min-h-screen flex flex-col justify-between">

    {{-- Header --}}
    <div class="bg-gradient-to-b from-purple-700 to-black p-6 pb-4 rounded-b-3xl">
        <div class="flex justify-between items-center mb-3">
            <h1 class="text-3xl">Events</h1>
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-full w-10 h-10 border-2 border-white">
        </div>
        <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->name }}" class="w-full rounded-3xl h-48 object-cover mb-2">
        <div class="absolute top-36 right-8 bg-yellow-400 text-purple-800 text-xs font-bold px-3 py-1 rounded-full">
            {{ ucfirst($event->category) }}
        </div>
    </div>

    {{-- Content --}}
    <div class="p-6 pt-2 space-y-4">
        <h2 class="text-3xl text-neon-yellow font-bold leading-snug">{{ $event->name }}</h2>
        <div class="flex items-center text-sm space-x-2">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-6 h-6 rounded-full">
            <span class="text-white">by <strong>{{ $event->organizer }}</strong></span>
            <span class="text-yellow-400">4.3 ★★★★☆</span>
        </div>

        <p class="text-gray-200 text-sm leading-relaxed">{{ $event->description }}</p>

        <div>
            <h3 class="uppercase text-univibe-purple text-xs font-bold">Location</h3>
            <p class="text-sm">{{ $event->address }}</p>
        </div>

        <div>
            <h3 class="uppercase text-univibe-purple text-xs font-bold">Time & date</h3>
            <p class="text-sm">{{ \Carbon\Carbon::parse($event->time)->format('jS M, H:i') }}</p>
        </div>

        <div class="text-center mt-6">
            <p class="mb-2">Are you coming?</p>
            <div class="flex justify-around text-sm font-semibold">
                <button class="px-4 py-2 border rounded-full">Yes</button>
                <button class="px-4 py-2 border rounded-full">Maybe</button>
                <button class="px-4 py-2 border rounded-full">No</button>
            </div>
        </div>

        <div class="flex items-center space-x-3 mt-6">
            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="w-8 h-8 rounded-full border-2 border-white">
            <img src="https://randomuser.me/api/portraits/women/66.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-3">
            <img src="https://randomuser.me/api/portraits/men/78.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-3">
            <span class="text-xs ml-3">silvia1, silvia2, silvia3 and others are coming to this event</span>
        </div>
    </div>

    {{-- Bottom Nav --}}
    <nav class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('home.png') }}" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Home</span>
        </button>
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('map.png') }}" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Map</span>
        </button>
        <button class="flex flex-col items-center text-purple-700">
            <img src="{{ asset('event.png') }}" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Events</span>
        </button>
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('profile.png') }}" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Profile</span>
        </button>
    </nav>
</body>

</html>
